<?php 

    session_start();

    session_destroy();
    header('Location: index.php');

    // echo '<pre>';
    //     print_r($_SESSION);
    // echo '</pre>';



    // unset($_SESSION['x']);
    // echo '<pre>';
    //     print_r($_SESSION);
    // echo '</pre>';

    // session_destroy();
    // echo '<pre>';
    //     print_r($_SESSION);
    // echo '</pre>';
?>