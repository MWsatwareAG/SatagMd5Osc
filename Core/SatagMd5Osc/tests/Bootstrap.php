<?php
require "./../../../../../../tests/Shopware/TestHelper.php";

$helper = \TestHelper::Instance();
$loader = $helper->Loader();

$pluginDir = __DIR__ . '/../';

$loader->registerNamespace(
    'Shopware\\SatagMd5Osc',
    $pluginDir
);
