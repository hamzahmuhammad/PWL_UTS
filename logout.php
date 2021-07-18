<?php 
    session_start();
    //session_destroy();
    unset($_SESSION['MEMBER']);

    //landing page
    header('Location:http://localhost/PWL_UTS/index.php?hal=home');

?>