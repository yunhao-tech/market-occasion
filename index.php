<?php

session_name("WelcomeMyGuest!"); // ne pas mettre d'espace dans le nom de session !
session_start();
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}

require("utilities/utils.php");
require ('utilities/dbh.php');
require ("utilities/printForms.php");
require ("utilities/logInOut.php");

$dbh = Database::connect();

// traitement des contenus de formulaires
if (isset($_GET["todo"]) && $_GET["todo"] == "login") {
    logIn($dbh);
}
if (isset($_GET["todo"]) && $_GET["todo"] == "logout") {
    logOut();
}

if (array_key_exists("page", $_GET)) {
    $askedPage = $_GET["page"];
} else {
    $askedPage = "welcome"; //valeur par defaut
}
$authorized = checkPage($askedPage);

if ($authorized) {
    $pageTitle = getPageTitle($askedPage);
} else {
    $pageTitle = "Erreur";
}
$lastName = null;
$name = null;
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    $login = $_SESSION["login"];
    $user = Utilisateur::getUtilisateur($dbh, $login);
    if ($user != null) {
        $user_type = $user->type;
        $lastName = $user->lastName;
        $name = $user->name;
    } else {
        $user_type = "normal";
    }
} else {
    $user_type = "normal";
}

generateHeader($pageTitle, "./css/style.css");
if ($authorized) {
    generateMenu($user_type, $lastName, $name);
    echo "<div id='content'>";
    require ("./content/content_$askedPage.php");
    echo "</div>";
} else {
    echo "<script>alert('Login to have access to this page!')</script>";
}

$dbh = null; // Déconnexion de MySQL

generateFooter();

