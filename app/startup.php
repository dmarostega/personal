<?php

require_once "define.php";

use APP\Define;
use APP\config\Configure as Configure;

Define::run();
Configure::create('main');
// // Configure::setPathTemplate('/resources/main/');
Configure::addLink('css/personalite.css');
Configure::addScript('js/jquery.js');
// Configure::addSubPath('img','images');

// Configure::create('admin');

// echo Configure::PathRender();
// Confiture::OlaMundo();

