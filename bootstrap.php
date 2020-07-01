<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createMutable(FCPATH);
$dotenv->load();
