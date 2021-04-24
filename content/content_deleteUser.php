<?php

if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    echo "<script>alert('You do not have access to this page!')</script>";
    require ("./content/content_welcome.php");
    exit();
}

$delete_values_valid = false;
$user_LOGIN = Utilisateur::getUtilisateur($dbh, $_SESSION["login"]);
$type_user_login = $user_LOGIN->type;
if ($type_user_login == 'admin') {
    if (isset($_POST["login"]) && $_POST["login"] != "") {
        $user_to_delete = Utilisateur::getUtilisateur($dbh, $_POST["login"]);
        if ($user_to_delete != null) { // the account to be deleted exists
            $type_user_delete = $user_to_delete->type;
            if ($type_user_delete == 'admin') {
                echo "<script>alert('You cannot delete the admin account!')</script>";
            } else { // admin wants to delete a normal account
                $delete_values_valid = Utilisateur::delete($dbh, $_POST["login"]);
                if ($delete_values_valid){
                    $path = $user_to_delete->img_profile;
                    unlink($path);
                }
            }
        } else { // the account to be deleted does not exist
            echo "<script>alert('Please check the login of user to be deleted.')</script>";
        }
    }
} else { // a normal user can only delete his own account
    if (isset($_POST["up"]) && $_POST["up"] != "") {
        $user_to_delete = $user_LOGIN;
        $b1 = $user_to_delete != null;
        $b2 = Utilisateur::testerMdp($dbh, $user_to_delete, $_POST["up"]);
        if ($b1 && $b2) {
            $delete_values_valid = Utilisateur::delete($dbh, $_SESSION["login"]);
             if ($delete_values_valid){
                    $path = $user_to_delete->img_profile;
                    unlink($path);
                }
        }
    }
}

if ($delete_values_valid) {
    if ($type_user_login != "admin") {
        echo "<script>alert('Goodbye! Looking forward to seeing you again.')</script>";
        require ("./content/content_welcome.php");
    } else {
        echo "<script>alert('You have deleted this user.')</script>";
        require ("./content/content_myaccount.php");
    }
}

if (!$delete_values_valid) {
    if ($type_user_login != "admin") { //$user_LOGIN is not admin
echo <<<chaine
<div class = "row">
    <div class = "col-md-4 offset-md-4 gris">
        <form action="index.php?page=deleteUser&todo=deleteUser" method="post">
                <label for="password">Password:</label>
                <input id="password" type=password required name=up>
            <input type=submit value="Delete my account">
        </form>
    </div>
</div>
chaine;
    } else {  //$user_LOGIN is admin, who wants to delete an account
echo <<<chaine
<div class = "row">
    <div class = "col-md-4 offset-md-4 gris">
        <form action="index.php?page=deleteUser&todo=deleteUser" method="post">
            <p>
                <label for="login">login:</label>
                <input id="login" type=text required name=login>
            </p>
            <input type=submit value="Delete this account">
        </form>
    </div>
</div>
chaine;
    }
}



