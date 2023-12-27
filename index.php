<?php

require_once __DIR__ . '/vendor/autoload.php';

use Steampixel\Route;
use Proekt\DBconnect;
use Proekt\controllers\UserController;

/**
*
*GET Metods
*
*/

Route::add("/", function(){
    echo 'hello world';
});

Route::add("/reg", function(){
    include 'src/views/userReg.php';
});

Route::add("/auth", function(){
    include 'src/views/userAuth.php';
});

Route::add("/api/reg",function() {
    $json = json_decode(file_get_contents("php://input"),true);
    $uc = new UserController;
    $uc->reg($json);
}, 'POST');

Route::add("/api/auth",function() {
    $json = json_decode(file_get_contents("php://input"),true);
    $uc = new UserController;
    $uc->auth($json);
}, 'POST');

Route::add("/ul", function() {
        include 'src/views/userList.php';
    });


Route::add("/api/verify", function() {
        
    $json = json_decode(file_get_contents("php://input"), true);
    $uc = new UserContoller;
    $uc->auth($json);
    
},"post");

Route::add("/api/getUsers", function() {
    $db = DBconnect::connect();
    $res = $db->query("SELECT * FROM `users`");

    $json = [];

    while($ress = mysqli_fetch_assoc($res)) {
        array_push($json, $ress);
    }

    echo json_encode($json);

});

Route::run('/');


/**
*
*POST Metods
*
*/


