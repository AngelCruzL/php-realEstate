<?php

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

$db = dbConnection();

use App\Estate;

Estate::setDB($db);
