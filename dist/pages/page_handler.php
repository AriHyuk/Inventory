<?php
// Page handler
// Create this as "page_handler.php"

// Ensure ini settings for error reporting
ini_set('display_errors', 0); // Set to 0 in production, 1 in development
error_reporting(E_ALL);

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Function to safely include files
function safe_include($file) {
    if (file_exists($file)) {
        include($file);
        return true;
    }
    return false;
}

// Check if the page parameter exists and include the corresponding file
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$file_to_include = '';

switch ($page) {
    case 'stok-barang':
        $file_to_include = 'stok-barang.php';
        break;
    case 'dashboard':
        $file_to_include = 'dashboard.php';
        break;
    // Add other pages as needed
    default:
        $file_to_include = 'dashboard.php';
}

// This is the function that will be included in your halaman.php
function load_page() {
    global $file_to_include;
    if (!empty($file_to_include) && file_exists($file_to_include)) {
        include($file_to_include);
    } else {
        echo "<div class='content-wrapper'><section class='content'>";
        echo "<div class='error-page'>";
        echo "<h2 class='headline text-warning'>404</h2>";
        echo "<div class='error-content'>";
        echo "<h3><i class='fas fa-exclamation-triangle text-warning'></i> Oops! Page not found.</h3>";
        echo "<p>We could not find the page you were looking for.</p>";
        echo "</div></div></section></div>";
    }
}