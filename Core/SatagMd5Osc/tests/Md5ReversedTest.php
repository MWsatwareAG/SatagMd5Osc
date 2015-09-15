<?php


/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class Md5OscTest extends Shopware\Components\Test\Plugin\TestCase
{
    public function testHashEncoder()
    {
        $encoder = new \Shopware\SatagMd5Osc\Md5OscEncoder();
        $hash = $encoder->encodePassword('secret');
        # it should not be the same combination
        $this->assertNotEquals($hash, $encoder->encodePassword('secret'));

        $this->assertNotEmpty($hash);
    }

    public function testIsValid()
    {
        $encoder = new \Shopware\SatagMd5Osc\Md5OscEncoder();
        $isValid = $encoder->isPasswordValid('secret', 'b786b40d6a3f3bba2c2c3cfd41055b50:3b');

        $this->assertTrue($isValid);
    }

    public function testInvalidPassword()
    {
        $encoder = new \Shopware\SatagMd5Osc\Md5OscEncoder();
        $isValid = $encoder->isPasswordValid('secret', 'some random hash');

        $this->assertFalse($isValid);
    }
}
