<?php

session_name("WelcomeMyGuest"); // ne pas mettre d'espace dans le nom de session !
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
if (isset($_GET["todo"]) && $_GET["todo"] == "register") {
    
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
    $pageTitle = "welcome"; //valeur par defaut
}

generateHeader($pageTitle, "./css/style.css");
if ($authorized) {
    echo "<nav id='menu'>";
    generateMenu($askedPage);
    echo "</nav>";
    echo "<div id='content'>";
    require ("./content/content_$askedPage.php");
    echo "</div>";
} else {
    echo "<p>Désolé, la page demandée n'existe pas ou n'est accessible qu'aux gentlemen.</p>";
}


// affichage de formulaires
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    if ($askedPage != "changePassword")
        echo "<p><a href='index.php?page=changePassword&todo=changePassword' target='_blank'>Changer mon mot de passe</a></p>";
    if ($askedPage != "deleteUser")
        echo "<p><a href='index.php?page=deleteUser&todo=deleteUser' target='_blank'>Je veux supprimer mon compte</a></p>";
    printLogoutForm();
} else {
    if ($askedPage != "register") {
        echo "<p><a href='index.php?page=register&todo=register' target='_blank'>Je crée mon compte ici</a></p>";
    }
    printLoginForm($askedPage);
}




$dbh = null; // Déconnexion de MySQL

generateFooter();
?>
