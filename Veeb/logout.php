<?php 
session_start();
session_unset();
    $_SESSION['FBID'] = NULL;
    $_SESSION['FULLNAME'] = NULL;
    $_SESSION['EMAIL'] =  NULL;
	session_destroy();
header("Location: " ."http://transporttech.cs.ut.ee/");        
?>
