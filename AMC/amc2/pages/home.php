<?php
session_start();
var_dump($_SESSION);
       echo "<br>";
       echo "status" . session_status();
       echo "<br>";
       echo "logado: ". $_SESSION['login'];
       echo "<br>";
echo "hora: " . $_SESSION["sessiontime"];
 echo "<br>";
       echo session_id();
       echo "<br>";
       session_unset();
       session_destroy();
       echo "status: ". session_status();
?>