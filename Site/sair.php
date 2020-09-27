<?php
    session_start();
    unset($_session['id_usuario']);
    session_destroy();
    header("location: ../Portal/index.php");
?>