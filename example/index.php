<?php

require __DIR__ . '/../source/Ket4z/RestServer/RestServer.php';
require 'TestController.php';

$server = new \Ket4z\RestServer\RestServer('debug');
$server->addClass('TestController');
$server->handle();
