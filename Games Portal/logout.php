<?php
SESSION_START();
$_SESSION = array();
SESSION_DESTROY();
HEADER("location:index.php");
EXIT();
?>