<?php
require ('../app/database/Database.php');

//require the page
function page($name) {
    require( __DIR__ . "/app/includes/{$name}.php");
}

// Verify is the request method is POST
function is_post() : bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}


function dd( string|array $variable) : void {

    echo "<pre>";
        var_dump($variable);
    echo "</pre>";
}


function is_valid( string|int $donnees) : string|int{

    if (is_int($donnees)) {
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    } else {
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
}
// Send a flash message in the html

function flash_message(string $message) : string {
    $params = [
        "success" => "<p class='flash-p'>$message</p>",
        "danger" => "<div><p>'$message'</p></div>"
    ];

    foreach ($params as $value) {
      return  $value;
    }
}

// Verify is the user is connected
function is_connected() {

    if (session_status() ===  PHP_SESSION_NONE) {
      return  session_start();
    }
    return !empty($_SESSION['user']);

}

