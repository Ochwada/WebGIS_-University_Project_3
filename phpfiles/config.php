<!-- Assumptions:
-There is access to root user.
Root is the user name or account that bydefault has access to all
commands and files on a Linux or other Unix-like operating system.
It is also referred to as the root account,root user and the superuser.
-->
<?php
define('DB_SERVER', 'localhost:3306');
// Starting MySQL Database...
// /Applications/XAMPP/xamppfiles/mysql/scripts/ctl.sh : mysql  started at port 3306
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rootpassword');
define('DB_DATABASE', 'database');
$db =mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE );
?>
