<?php
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    printLoginForm($askedPage);
    exit();
}
if (isset($_SESSION["loggedIn"]) && $_SESSION['loggedIn'])
        $login = $_SESSION['login'];
    else
        $login = null;

$user = Utilisateur::getUtilisateur($dbh, $login);
$user_type = $user->type;

if($user_type == "admin"){
    $list_article = Article::getAllArticle($dbh);
    $title = "All articles";
}
else{
    $list_article = Article::getArticleByLogin($dbh,$login);
    $title = "My published articles";
}

$size = sizeof($list_article);
$total_price = 0;
 foreach ($list_article as $article) {
     $article_price = $article->price_uni;
     $total_price += $article_price;
 }


 generateArticlesPublishedHeader($title, $size);
 
 generateArticlesPublishedPage($list_article);
 
 generateCartFooter($total_price);
