<?php 

$app->middleware('before', function(){
    session_start();
});

$app->middleware('before', function(){
    header('Content-Type: application/json');
});