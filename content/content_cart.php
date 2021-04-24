<?php

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    $login = $_SESSION["login"];
    $list_article = Article::getArticleFromCart($dbh, $login);
    $size = sizeof($list_article);
    $total_price = 0;
    foreach ($list_article as $article) {
        $article_price = $article->price_uni;
        $total_price += $article_price;
    }


    generateCartHeader($size);

    generateCartPage($list_article);

    generateCartFooter($total_price);
} else {
    printLoginForm($askedPage);
}

