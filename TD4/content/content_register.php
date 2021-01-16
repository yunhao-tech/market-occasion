<?php

$form_values_valid = false;
if (isset($_POST["login"]) && $_POST["login"] != "" &&
        isset($_POST["nom"]) && $_POST["nom"] != "" &&
        isset($_POST["prenom"]) && $_POST["prenom"] != "" &&
        isset($_POST["naissance"]) && $_POST["naissance"] != "" &&
        isset($_POST["email"]) && $_POST["email"] != "" &&
        isset($_POST["feuille"]) && $_POST["feuille"] != "" &&
        isset($_POST["up"]) && $_POST["up"] != "" &&
        isset($_POST["up2"]) && $_POST["up2"] != "") {

    $b1 = Utilisateur::getUtilisateur($dbh, $_POST["login"]) == null;
    $b2 = $_POST["up"] == $_POST["up2"];
    if ($b1 && $b2) {
        $promotion = isset($_POST["promotion"]) ? $_POST["promotion"] : null;
        $form_values_valid = Utilisateur::insererUtilisateur($dbh, $_POST["login"], $_POST["up"], $_POST["nom"], $_POST["prenom"], $promotion, $_POST["naissance"], $_POST["email"], $_POST["feuille"]);
        echo "Welcome! You have successfully registered!";
    }
}
if (!$form_values_valid) {
    if (isset($_POST["login"])) {
        echo "Fail to register. Please try it again.";
        echo "<br> <br>";
    }
    if (isset($_POST["nom"]))
        $nom = $_POST["nom"];
    else
        $nom = "";
    if (isset($_POST["prenom"]))
        $prenom = $_POST["prenom"];
    else
        $prenom = "";
    if (isset($_POST["promotion"]))
        $promotion = $_POST["promotion"];
    else
        $promotion = "";
    if (isset($_POST["naissance"]))
        $naissance = $_POST["naissance"];
    else
        $naissance = "";
    if (isset($_POST["email"]))
        $email = $_POST["email"];
    else
        $email = "";
    if (isset($_POST["feuille"]))
        $feuille = $_POST["feuille"];
    else
        $feuille = "";
    echo<<<chaine
    <form action="index.php?page=register&todo=register" method="post"
          oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
        <p>
            <label for="login">login:</label>
            <input id="login" type=text required name=login>
        </p>
        <p>
             Nom : <input type="text" name="nom" value= "$nom"  required />
        </p>
        <p>
             Prénom : <input type="text" name="prenom" value="$prenom" required />
        </p>
        <p>
            Promotion : <input type="text" name="promotion" value="$promotion" required />
        </p>
        <p>
            Naissance : <input type="date" name="naissance" value="$naissance" required />
        </p>
        <p>
            Email : <input type="email" name="email" value="$email" required />
        </p>
        <p>
            Feuille : <input type="text" name="feuille" value="$feuille" required />
        </p>

        <p>
            <label for="password1">Password:</label>
            <input id="password1" type=password required name=up>
        </p>
        <p>
            <label for="password2">Confirm password:</label>
            <input id="password2" type=password name=up2>
        </p>
        <input type=submit value="Create account">
    </form>

chaine;
}
