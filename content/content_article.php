<?php

if (array_key_exists("article", $_GET)) {
    $article_id_chosen = $_GET["article"];
}

// var_dump($article_id_chosen);
$article = Article::getArticleByID($dbh, $article_id_chosen);
$article_id = $article->ID;
$article_name = $article->name;
$article_price = $article->price_uni;
$article_image = $article->img_path;
$article_description = $article->description;
$login_user_article = $article->login_utilisateur;
if (isset($_SESSION["loggedIn"]) && $_SESSION['loggedIn']) {
    $login = $_SESSION['login'];
} else {
    $login = "null";
}

$owner = Utilisateur::getUtilisateur($dbh, $login_user_article);
$mail = $owner->email;
echo <<<chaine
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="$article_image" width="250" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <a href="index.php?page=shopping"><span class="ml-1">Back</span></a> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Contact the owner : $mail</span>
                                <h5 class="text-uppercase">$article_name</h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price" style="color:black">€$article_price</span>
                                </div>
                            </div>
                            <p class="about">$article_description</p>
                            <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase addToCart" article_id=$article_id login=$login login_user_article=$login_user_article>Add to cart</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
chaine;
