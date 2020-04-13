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
));
