<?php

class Shopware_Plugins_Core_SatagMd5Osc_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    public function getVersion()
    {
        $info = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'plugin.json'), true);
        if ($info) {
            return $info['currentVersion'];
        } else {
            throw new Exception('The plugin has an invalid version file.');
        }
    }

    public function getLabel()
    {
        return 'SatagMd5Osc';
    }

    public function uninstall()
    {
        return true;
    }

    public function update($oldVersion)
    {
        return true;
    }

    public function install()
    {
        if (!$this->assertMinimumVersion('4.3.0')) {
            throw new \RuntimeException('At least Shopware 4.3.0 is required');
        }

        // this event collects all password encoders
        $this->subscribeEvent(
            'Shopware_Components_Password_Manager_AddEncoder',
            'onAddEncoder'
        );

        return true;
    }

    /**
     * Add our own encoder to the internal encoder collection
     *
     * @param Enlight_Event_EventArgs $args
     * @return array|mixed
     */
    public function onAddEncoder(Enlight_Event_EventArgs $args)
    {
        $this->registerMyComponents();

        $hashes = $args->getReturn();

        $hashes[] = new \Shopware\SatagMd5Osc\Md5OscEncoder();

        return $hashes;
    }

    /**
     * Register the plugin's namespace
     */
    public function registerMyComponents()
    {
        $this->Application()->Loader()->registerNamespace(
            'Shopware\SatagMd5Osc',
            $this->Path()
        );
    }
}
