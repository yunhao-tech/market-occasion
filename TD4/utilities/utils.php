<?php

$page_list = array(
    array(
        "name" => "welcome",
        "title" => "Accueil de notre site",
        "menutitle" => "Accueil"),
    array(
        "name" => "contacts",
        "title" => "Qui sommes-nous ?",
        "menutitle" => "Nous contacter"),
    array(
        "name" => "register",
        "title" => "Page of registration",
        "menutitle" => "Inscription"),
    array(
        "name" => "changePassword",
        "title" => "Changer mot de passe",
        "menutitle" => "Change your password"),
    array(
        "name" => "deleteUser",
        "title" => "Je veux partir",
        "menutitle" => "Je veux partir")
);

$page_list_commun = array(
    array(
        "name" => "welcome",
        "title" => "Accueil de notre site",
        "menutitle" => "Accueil"),
    array(
        "name" => "contacts",
        "title" => "Qui sommes-nous ?",
        "menutitle" => "Nous contacter")
);

function generateHeader($titre, $link) {
    echo <<<CHAINE
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="$link">
        <title>$titre</title>
    </head>
    <body>
CHAINE;
}

function generateFooter() {
    echo<<<chaine
     </body>
    </html>
chaine;
}

function checkPage($askedPage) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page["name"] == $askedPage) {
            return true;
        }
    }
    return false;
}

function getPageTitle($page_name) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page["name"] == $page_name) {
            return $page["title"];
        }
    }
}

function generateMenu($page_name) {
    global $page_list_commun;
    echo <<<chaine
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menu de navigateur</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
chaine;
    foreach ($page_list_commun as $page) {
        if ($page['name'] == $page_name) {
            echo '<li class="nav-item active">';
        } else {
            echo '<li class="nav-item">';
        }
        echo '<a class="nav-link" href="index.php?page=' . $page['name'] . '">' . $page['menutitle'] . "</a>";
        echo '</li>';
    }
    echo <<<chaine
   </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>
chaine;
}

function secure($tab) {
    foreach ($tab as $cle => $valeur) {
        $tab[$cle] = htmlspecialchars($valeur);
    }
    return $tab;
}
