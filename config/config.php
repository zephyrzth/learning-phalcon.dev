<?php
 
return new \Phalcon\Config(array(
    'application' => array(
    'name' => 'Learning Phalcon'
    ),
    'root_dir' => __DIR__.'/../',
    'view' => array(
        'cache' => array(
            'dir' => __DIR__.'/../cache/volt/'
        )
    ),
    'database' => array(
        'adapter' => 'Mysql',
        'host' => '192.168.43.230',
        'username' => 'learning_phalcon',
        'password' => 'learning_phalcon',
        'dbname' => 'learning_phalcon',
     ),
));
