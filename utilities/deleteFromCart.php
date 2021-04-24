<?php
require ("dbh.php");
require ("utils.php");
$dbh = Database::connect();
$success = false;
if (isset($_POST["id_article"]) && $_POST["id_article"] != "" &&
        isset($_POST["login"]) && $_POST["login"] != ""){
    $success = Utilisateur::deleteFromCart($dbh, $_POST["login"], $_POST["id_article"]);
}
$dbh=null;
if ($success) echo 1; else echo 0;


