<?php

// Includes

require_once 'includes/google-api-php-client/apiClient.php';
require_once 'includes/google-api-php-client/contrib/apiOauth2Service.php';
require_once 'includes/idiorm.php';
require_once 'includes/relativeTime.php';

// Session. Pass your own name if you wish.

session_name('tzine_demo');
session_start();

// Database configuration with the IDIORM library

$host = '';
$user = '';
$pass = '';
$database = '';



// Changing the connection to unicode
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Google API. Obtain these settings from https://code.google.com/apis/console/

$redirect_url = 'http://hajer.smartestsuite.com/enm/google2/index.php'; // The url of your web site
$client_id = '575161187707-ub22dfqnu4dhin4tu8s59m43ekafs92v.apps.googleusercontent.com';
$client_secret = 'XJTRXCqiXMpdG9IhLIJokd7d';
$api_key = 'AIzaSyChiXQqSY0we0r4_JoaefrDDcJKkNzju80';
