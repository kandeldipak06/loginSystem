<?php 
session_start();
session_unset();
//session_distroy();
header("Location: ../index.php");