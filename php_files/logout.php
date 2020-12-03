<?php
//DELETING COOKIE.
    setcookie("login","true",time() - 3600);
    header('Location: login.php');
?>