<?php
session_start();
if(isset($_SESSION))
{
session_destroy();
echo var_dump($_SESSION);
header("location: login.php");
}
?>