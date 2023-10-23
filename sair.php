<?php
    session_start();

    unset($_SESSION['sessaoID']);
    unset($_SESSIO['sessaoNome']);

    Header("Location: index.php")
?>