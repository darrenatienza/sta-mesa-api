<?php
include 'constant.php';
$setting = [
    'driver' => 'mysql',
    'address' => 'localhost',
    'port' => '3306',
    'username' => $USER_NAME,
    'password' => '',
    'database' => $DB_NAME,
    'debug' => true,
    // middlewares 
    // cors must be first to avoid course errors
    'middlewares' => 'cors,dbAuth,authorization,sanitation,validation',
    'dbAuth.mode' => 'optional',//'required'
    'dbAuth.registerUser'=> 1, // enable user registration
    'dbAuth.passwordLength' => 0,
    'sanitation.handler' => function ($operation, $tableName, $column, $value) {
        if($tableName == 'users' && $column['name'] == 'password')
            return(password_hash($value,PASSWORD_DEFAULT));
        return is_string($value) ? strip_tags($value) : $value;
    },


    
];