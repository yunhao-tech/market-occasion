<?php

function logIn($dbh) {
    if (isset($_POST["login"]) && isset($_POST["mdp"])) {
        $login = $_POST['login'];
        $user = Utilisateur::getUtilisateur($dbh, $login);
        $mdp = $_POST["mdp"];
        $test = Utilisateur::testerMdp($dbh, $user, $mdp);
        if ($test) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['login'] = $login;
        }
        return $test;
    }
}

function logOut() {
    $_SESSION['loggedIn'] = false;
    unset($_SESSION['login']);
}
