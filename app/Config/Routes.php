<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post("/rectangle", "Controller::rectangle");
$routes->get("/now", "Controller::now");
$routes->get("/name", "Controller::name");

$routes->post("/messages", "Controller::createMessage");
$routes->get("/messages", "Controller::getMessage");