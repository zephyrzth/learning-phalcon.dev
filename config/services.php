<?php
 
use \Phalcon\Logger\Adapter\File as Logger;
 
$di['security'] = function () {
    $security = new \Phalcon\Security();
    $security->setWorkFactor(10);
    return $security;
};
 
$di['url'] = function () use ($config, $di) {
    $url = new \Phalcon\Url();
    return $url;
};
 
$di['voltService'] = function ($view) use ($config) {
    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $this);
    if (!is_dir($config->view->cache->dir)) {
        mkdir($config->view->cache->dir);
    }
    $volt->setOptions(array(
        "path" => $config->view->cache->dir,
        "extension" => ".compiled",
        "always" => true
    ));
    return $volt;
};
 
$di['logger'] = function () {
    $file = __DIR__ . "/../logs/" . date("Y-m-d") . ".log";
    $logger = new Logger($file, array('mode' => 'w+'));
    return $logger;
};
