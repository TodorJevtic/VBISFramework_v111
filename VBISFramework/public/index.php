<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\AdministrationController;
use app\controllers\ProductController;
use app\core\Application;

$app = new Application();


$app->router->get("/", [HomeController::class, 'index']);
$app->router->get("/korpa", [HomeController::class, 'korpa']);
$app->router->get("/porucivanje", [HomeController::class, 'porucivanje']);
$app->router->post("/createProductProcess", [ProductController::class, 'createProductProcess']);
$app->router->get("/api/administration/users", [AdministrationController::class, 'getAllUsers']);
$app->router->get("/createProduct", [ProductController::class, 'createProduct']);
$app->router->get("/home", [HomeController::class,"index"]);
$app->router->get("/sanitarija", [HomeController::class,"sanitarija"]);
$app->router->get("/rasveta", [HomeController::class,"rasveta"]);
$app->router->get("/alati", [HomeController::class,"alati"]);
$app->router->get("/kontakt", [HomeController::class,"kontakt"]);
$app->router->get("/info", [HomeController::class,"info"]);
$app->router->get("/productList", [HomeController::class,"productList"]);
$app->router->get("/product/delete", [ProductController::class, 'delete']);
$app->router->get("/api/product/rows/json", [ProductController::class,"rows"]);
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->get("/logout", [AuthController::class, 'logout']);
$app->router->get("/admin", [HomeController::class, 'admin']);
$app->router->get("/api/orders", [HomeController::class, 'orders']);
$app->router->post("/loginProcess", [AuthController::class, 'loginProcess']);
$app->router->get("/registration", [AuthController::class, 'registration']);
$app->router->post("/registrationProcess", [AuthController::class, 'registrationProcess']);
$app->router->get("/noValidUser", [AuthController::class, 'accessDenied']);

$app->run();