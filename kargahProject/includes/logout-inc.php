<?php

session_start();
session_unset();
session_destroy();

if (isset($_GET["accountDeletion"])) {
    header("location: ../index.php?accountDeletion=success");
    exit();
}

if (isset($_GET["passChange"])) {
    header("location: ../login.php?passChange=success");
    exit();
}

header("location: ../index.php");
exit();