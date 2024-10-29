<?php

namespace App;

use InvalidArgumentException;

// Set database configuration with fallbacks
define("PHPGRID_DBTYPE", "mysqli");
$dbPort = env("DB_PORT", 3306);  // Updated to use DB_PORT from the environment
$dbHost = env("DB_HOST", "127.0.0.1");
$dbUser = env("DB_USERNAME", "root");
$dbPass = env("DB_PASSWORD", "");
$dbName = env("DB_DATABASE", "saasapp");

if (empty($dbHost) || empty($dbUser) || empty($dbName)) {
    throw new InvalidArgumentException('Database configuration values cannot be empty.');
}

// Define constants for database connection
define("PHPGRID_DBHOST", $dbHost);
define("PHPGRID_DBUSER", $dbUser);
define("PHPGRID_DBPASS", $dbPass);
define("PHPGRID_DBNAME", $dbName);
define("PHPGRID_DBPORT", $dbPort);  // Added the port constant

// Define the path for Gridphp library
define("PHPGRID_LIBPATH", base_path("app/Classes/Gridphp/"));

class Gridphp
{
    public static function get()
    {
        // Load the jqGrid library
        require_once PHPGRID_LIBPATH . "jqgrid_dist.php";

        // Initialize jqGrid instance
        $grid = new \jqgrid();

        // Enable export functionality in the grid (if applicable)
        $grid->set_options([
            'export' => [
                'enabled' => true,
                'formats' => ['pdf', 'excel', 'csv', 'html'], // Supported export formats
                'filename' => 'export', // Default filename for exports
                'heading' => 'Exported Data', // Default heading for exported files
                'orientation' => 'portrait', // Page orientation
                'paper' => 'A4', // Page size
                'paged' => 'all', // Page to export
                'range' => 'all', // Data range to export
            ],
        ]);

        return $grid;
    }
}
