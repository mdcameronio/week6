<?php

// this is my controler

//turn on buffering
ob_start();

// turnon error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//start session
session_start();
var_dump($_SESSION);
//require autoload file
require_once('vendor/autoload.php');
require ('model/data-layer.php');

//create instance of the base class
$f3 = Base::instance();


//define a default root
$f3->route('GET /', function ($f3) {
    //echo "<h1>hello world</h1>";

    //save some data
    $f3->set('username','hon');

    $f3->set('title','working with templets');

    $f3->set('color','green');

    $f3->set('radius', 10);

    $fruits =  array('apple','orange','banana');

    $f3->set('fruits', $fruits);



    $f3 ->set('dessert', getdessert());

    $f3->set('colors',getColors());

    $view = new Template();
    echo $view->render('views/info.html');

});

//$f3->route('GET /breakfast', function () {
//    //echo "<h1>hello world</h1>";
//
//    $view = new Template();
//    echo $view->render('views/breakfast.html');
//
//});
//
//$f3->route('GET /lunch', function () {
//    //echo "<h1>hello world</h1>";
//
//    $view = new Template();
//    echo $view->render('views/lunch.html');
//
//});
//
////define a route for order 1
//$f3->route('GET|POST /order1', function ($f3) {
//    //echo "<h1>hello world</h1>";
//    //TODO  validate the data
//    //if the form has been posted
//    if($_SERVER['REQUEST_METHOD']=='POST'){
//        //add dasta to session verible
//        $_SESSION['food'] = $_POST['food'];
//        $_SESSION['meal'] = $_POST['meal'];
//
//        //redirect user to next page
//        $f3->reroute('order2');
//    }
//
//    $view = new Template();
//    echo $view->render('views/orderForm1.html');
//
//});
//
////order form 2
//$f3->route('GET|POST /order2', function ($f3) {
//    //echo "<h1>hello world</h1>";
//    //TODO  validate the data
//    //if the form has been posted
//    if($_SERVER['REQUEST_METHOD']=='POST'){
//        //add dasta to session verible
//        if(isset($_POST['conds'])){
//            $_SESSION['conds']= implode(", ", $_POST['conds']);
//        }
//        else{
//            $_SESSION['conds']= "none selected";
//        }
//        //$_SESSION['conds'] = $_POST['conds'];
//
//
//        //redirect user to next page
//        $f3->reroute('order3');
//    }
//
//    $view = new Template();
//    echo $view->render('views/orderForm2.html');
//
//});
//
//
//
////ordreform3
//$f3->route('GET|POST /order3', function ($f3) {
//    //echo "<h1>hello world</h1>";
//
//    if($_SERVER['REQUEST_METHOD']=='POST'){
//        //add dasta to session verible
//        if(isset($_POST['bev'])){
//            $_SESSION['bev']= implode(", ", $_POST['bev']);
//        }
//        else{
//            $_SESSION['bev']= "none selected";
//        }
//
//        //redirect user to next page
//        $f3->reroute('summary');
//    }
//
//    $view = new Template();
//    echo $view->render('views/orderForm3.html');
//
//});
//
////summary route
//$f3->route('GET /summary', function () {
//    //echo "<h1>hello world</h1>";
//
//    $view = new Template();
//    echo $view->render('views/summary.html');
//    //clear session data
//    session_destroy();
//
//});


//run fat free
$f3->run();

//ob fluish
ob_flush();