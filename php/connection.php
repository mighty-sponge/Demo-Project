<?php

define("hostname", "db");
define("username", "root");
define("password", "root");
define("database", "todolist");
$table = "todo";

function db(){
	
    global $link;
	
    $link = mysqli_connect(hostname, username, password, database) or die("couldn’t connect to db");
	
    return $link;
};
