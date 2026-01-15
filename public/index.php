<?php

// Start session
session_start();

//  Load configuration
require_once __DIR__ . '/../config/config.php';

//  Load core classes
require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Core/Router.php';

//  Load models
require_once __DIR__ . '/../app/Models/User.php';
require_once __DIR__ . '/../app/Models/Role.php';

//  Load controllers
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/CandidateController.php';
require_once __DIR__ . '/../app/Controllers/RecruiterController.php';
require_once __DIR__ . '/../app/Controllers/AdminController.php';

// Create router
$router = new Router();


// Public Routes 
$router->add('GET', 'login', [AuthController::class, 'login']);
$router->add('POST', 'login', [AuthController::class, 'authenticate']);
$router->add('GET', 'register', [AuthController::class, 'register']);
$router->add('POST', 'register', [AuthController::class, 'store']);

// Protected Routes 
$router->add('GET', 'candidate/dashboard', [CandidateController::class, 'dashboard'], true);
$router->add('GET', 'recruiter/dashboard', [RecruiterController::class, 'dashboard'], true);
$router->add('GET', 'admin/dashboard', [AdminController::class, 'dashboard'], true);


//Dispatch router

$router->dispatch();

