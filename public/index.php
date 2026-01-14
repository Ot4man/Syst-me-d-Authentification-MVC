<?php
//Start session
session_start();

// Load configuration
require_once __DIR__ . '/../config/config.php';

//  Load core classes
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Router.php';

//  Load models
require_once __DIR__ . '/../app/Models/User.php';
require_once __DIR__ . '/../app/Models/Role.php';

//  Load controllers
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/CandidateController.php';
require_once __DIR__ . '/../app/Controllers/RecruiterController.php';
require_once __DIR__ . '/../app/Controllers/AdminController.php';

//  Run the router (empty for now)
$router = new Router();
$router->dispatch();
