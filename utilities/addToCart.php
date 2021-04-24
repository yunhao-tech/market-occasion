<?php
require ("dbh.php");
require ("utils.php");
$dbh = Database::connect();
$success = false;
if (isset($_POST["id_article"]) && $_POST["id_article"] != "" &&
        isset($_POST["login"]) && $_POST["login"] != ""){
    $login_user_article = $_POST['login_user_article']; //user who uploaded this article
    $login = $_POST['login']; //user who wants to add this article into cart
    if ($login == $login_user_article){
        echo 3;
    } else{
        $list_article = Article::getArticleFromCart($dbh, $login); // the list of articles in the current cart
        $ID_article = $_POST['id_article'];
        foreach ($list_article as $article) {
            if ($article->ID == $ID_article){ // if one of the article ID equals to the ID of article to be added, then stop it
                $dbh = null;
                echo 2;
                exit();
            }
        } 
        // if the article to be added does not exist in the cart, then add it.
        $success = Utilisateur::addToCart($dbh, $_POST["login"], $_POST["id_article"]);
        if ($success) echo 1; else echo 0;
    }
}
$dbh=null;

