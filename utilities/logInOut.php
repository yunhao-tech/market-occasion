<?php

function logIn($dbh) {
    $_SESSION['loggedIn'] = false;
    if (isset($_POST["login"])) {
        $login = $_POST['login'];
        $user = Utilisateur::getUtilisateur($dbh, $login);
        $mdp = $_POST["mdp"];
        $test = Utilisateur::testerMdp($dbh, $user, $mdp);
        if ($test) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['login'] = $login;
        } else {
            echo "<script>alert('Fail to login. Please check your login and password.')</script>";
        }
        return $test;
    }
}

function logOut() {
    unset($_SESSION['loggedIn']);
    unset($_SESSION['login']);
}
