<?php
 @session_start();
 if($_SERVER['REMOTE_ADDR'] != '127.0.0.1')
 ini_set('display_errors','Off');
 include_once("mysql.class.php"); 
 include_once("classes.php"); 
 include_once("functions.php"); 
 include_once("paging_class.php");
 include_once("thumb_generator.php");
 include_once("contants.php");
 
 if($_SERVER['REMOTE_ADDR']=="127.0.0.1"){
 define('DB_SERVER', 'localhost');  
 define('DBUSER', 'root');
 define('DBPASS', '');
 //define('DBNAME', 'gcd');
 define('DBNAME', 'greencity'); 
 }else{
 define('DB_SERVER', 'localhost');  
 define('DBUSER', 'greencity');
 define('DBPASS', 'Abc#12345');
 define('DBNAME', 'greencity');
 }
 
 $db= new Database(DB_SERVER,DBUSER,DBPASS,DBNAME);
 $cls= new Login_Process();
?>