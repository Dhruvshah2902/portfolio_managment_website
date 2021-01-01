<?php
session_start();
$dbhost = "localhost"; /* Host name */
$dbuser = "temp"; /* User */
$dbpass = "temp"; /* Password */
$dbname = "project"; /* Database name */

$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}