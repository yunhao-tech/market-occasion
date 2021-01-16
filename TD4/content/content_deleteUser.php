<?php

if (!isset($_SESSION['loggedIn'])) {
    echo "Page non autorisée";
    return;
}
$delete_values_valid = false;
if (isset($_POST["login"]) && $_POST["login"] != "" &&
        isset($_POST["up"]) && $_POST["up"] != "") {

    $user = Utilisateur::getUtilisateur($dbh, $_POST["login"]);
    $b1 = $user != null;
    $b2 = Utilisateur::testerMdp($dbh, $user, $_POST["up"]);
    if ($b1 && $b2) {
        $delete_values_valid = Utilisateur::delete($dbh, $_POST["login"]);
        echo "Goodbye! We are looking forward to see you again.";
    }
}

if (!$delete_values_valid) {
    echo <<<chaine
    <form action="index.php?page=deleteUser&todo=deleteUser" method="post">
    <p>
        <label for="login">login:</label>
        <input id="login" type=text required name=login>
    </p>
    <p>
        <label for="password">Password:</label>
        <input id="password" type=password required name=up>
    </p>
    <input type=submit value="Delete my account">
    </form>

chaine;
}



