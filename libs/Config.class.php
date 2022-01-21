<?php

namespace OpenDereferrer;

use OpenDereferrer\SingletonFactory;

class Config extends SingletonFactory
{

    protected $configFile = __DIR__ . '/../config.php';
    protected $config = [];

    public function __construct()
    {
        require_once $this->configFile;
        $this->config = $config;
    }

    public function get($key)
    {
        return $this->config[$key];
    }

}