<?php

if (!isset($_SESSION['loggedIn'])) {
    echo "Page non autorisée";
    return;
}
$entered_values_valid = false;
if (isset($_POST["login"]) && $_POST["login"] != "" &&
        isset($_POST["upOld"]) && $_POST["upOld"] != "" &&
        isset($_POST["up"]) && $_POST["up"] != "" &&
        isset($_POST["up2"]) && $_POST["up2"] != "") {

    $user = Utilisateur::getUtilisateur($dbh, $_POST["login"]);
    $b1 = $_POST["up"] == $_POST["up2"];
    $b2 = $user != null;
    $b3 = Utilisateur::testerMdp($dbh, $user, $_POST["upOld"]);
    if ($b1 && $b2 && $b3) {
        $entered_values_valid = Utilisateur::changeMdp($dbh, $_POST['login'], $_POST['up2']);
        echo "You have changed your password! Please remerber it carefully.";
    }
}

if (!$entered_values_valid) {
    echo<<<chaine
    <form action="index.php?page=changePassword&todo=changePassword" method="post"
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
    <p>
        <label for="login">login:</label>
        <input id="login" type=text required name=login>
    </p>
    <p>
        <label for="password1">Old password:</label>
        <input id="password_old" type=password required name=upOld>
    </p>
    <p>
        <label for="password1">New password:</label>
        <input id="password1" type=password required name=up>
    </p>
    <p>
        <label for="password2">Confirm password:</label>
        <input id="password2" type=password name=up2>
    </p>
    <input type=submit value="Change my password">
    </form>
chaine;
}


