<?php 

$app->middleware('before', function(){
    //echo 'before';
});

$app->middleware('after', function(){
    //echo 'depois';
});