<?php

$app->get('/login', function () {
// echo "Login world";
  $app->render('login.php');
});

$app->get('/dashboard', function() {
  //  $app->render('dashboard.php');
});


