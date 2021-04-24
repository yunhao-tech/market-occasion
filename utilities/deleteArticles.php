<?php
require ("dbh.php");
require ("utils.php");
$dbh = Database::connect();
$success = false;
if (isset($_POST["id_article"]) && $_POST["id_article"] != ""){
    $success = Utilisateur::deleteArticles($dbh, $_POST["id_article"]);
}
if ($success){
    $image_path = $_POST['image_path'];
    unlink("../".$image_path);
}
$dbh=null;
if ($success) echo 1; else echo 0;

