<?php

namespace Shopware\SatagMd5Osc;

use Shopware\Components\Password\Encoder\PasswordEncoderInterface;

class Md5OscEncoder implements PasswordEncoderInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Md5Osc';
    }

    /**
     * This is just an example. MD5 is not recommended for password encryption!
     *
     * @param  string $password
     * @return string
     */
    public function encodePassword($password)
    {
        $plain = $password;
        $password = '';

        for ($i=0; $i<10; $i++) {
            $password .= mt_rand();
        }

        $salt = substr(md5($password), 0, 2);

        $password = md5($salt . $plain) . ':' . $salt;

        return $password;

    }

    /**
     * @param  string $password
     * @param  string $hash
     * @return bool
     */
    public function isPasswordValid($password, $hash)
    {
        if(strpos($hash, ':') !== false) {
            $stack = explode(':', $hash);

            if (sizeof($stack) != 2) return false;
            if (md5($stack[1] . $password) == $stack[0]) {
                return true;
            }
        }

        return false;
    }

    /**
     * Only used, for e.g. bcrypt which keeps track of the "rounds" the password was encoded
     *
     * @param  string $hash
     * @return bool
     */
    public function isReencodeNeeded($hash)
    {
        return false;
    }
}
