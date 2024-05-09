<?php

// Define the path to the .env file
$env_path = __DIR__ . '/../.env';

if(!file_exists($env_path)){

    $env_example_path = __DIR__ . '/../.env.example';
    if(!file_exists($env_example_path)){
        throw new Exception("~/.env.example not found", 1);
    }

    //copy
    if (!copy($env_example_path, $env_path)) {
        throw new Exception("Fail: copy ~/.env.example to ~/.env", 1);
    }
}


// Check if the .env file exists
if (!file_exists($env_path)) {
    throw new Exception("~/.env not found", 1);
}

// Read the contents of the .env file and convert to lowercase for case-insensitive comparison
$env_content = strtolower(file_get_contents($env_path));

// Check if the "app_installed=false" string exists in the .env content
if (strpos($env_content, 'app_installed=false') !== false) {

    // Check .htaccess for public folder document root
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '';

    // If the URI does not start with '/public', display a message
    if (strpos($uri, '/public') === 0) {
        echo "Set the domain's document root to the 'public' directory, and familiarize yourself with the Laravel 'public' folder document root";
        echo "<br/>Or<br/>";
        echo "~/htaccess.example to ~/.htaccess";
        echo "<br/>Or<br/>";
        echo "~/.htaccess not found or not working.";
        exit();
    }

    // If the URI starts with '/public', require the installation script
    require __DIR__ . '/../public/install_files/install.php';

    // Exit the script after installation
    exit();
}
