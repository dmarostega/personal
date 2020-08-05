<?php

// require_once "define.php";   

use APP\Define;
use DMarostega\config\Configure as Configure;


Define::run();

Configure::create('main');
// // Configure::setPathTemplate('/resources/main/');
Configure::addLink('css/personalite.css');
Configure::addScript('js/jquery.js');
Configure::addSubPath('img','images');


Configure::create('admin');
Configure::addLink('plugins/fontawesome-free/css/all.min.css');
Configure::addLink('dist/css/adminlte.min.css');
Configure::addScript('plugins/jquery/jquery.min.js');
Configure::addScript('plugins/bootstrap/js/bootstrap.bundle.min.js');
Configure::addScript('dist/js/adminlte.min.js');
Configure::addSubPath('img','dist/img');

// Configure::create('admin');

// echo Configure::PathRender();
// Confiture::OlaMundo();

