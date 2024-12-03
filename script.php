<?php
// script.php

// Display errors for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// Autoload classes (if using a PSR-4 autoloader, adjust as needed)
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// Example function
function helloWorld() {
    echo "Hello, World!";
}

// Call the example function
helloWorld();
?>