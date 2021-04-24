<?php

if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    printLoginForm($askedPage);
    exit();
}

$article_published = false;
if (isset($_POST["name"]) && $_POST["name"] != "" &&
        isset($_POST["price_uni"]) && $_POST["price_uni"] != "" &&
        isset($_POST["type"]) && $_POST["type"] != "" &&
        isset($_POST["number"]) && $_POST["number"] != "" &&
        isset($_POST["description"]) && $_POST["description"] != "") {

    if (!empty($_FILES['fichier']['tmp_name']) && is_uploaded_file($_FILES['fichier']['tmp_name'])) {
        $img_name = $_FILES['fichier']['tmp_name'];
    } else {
        $img_name = null;
    }
    
    $article_published = Utilisateur::publishArticle($dbh, $_SESSION['login'], $_POST["name"], $_POST["price_uni"], $_POST["type"], $_POST["number"], $_POST["description"], $img_name);
    if (!$article_published){
        echo "<script>alert('Fail to upload!')</script>";
    }
}

if ($article_published) {
    echo "<script>alert('Your article has been successfully published!')</script>";
    require ("./content/content_welcome.php");
}

if (!$article_published) {
    echo<<<chaine
<div class="row">
    <div class="col-md-4 offset-md-4 gris">
        <form action="index.php?page=publish&todo=publish" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" required name="name" class="form-control" placeholder="Enter the article name">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" type="int" name="price_uni" required placeholder="Enter the unit price in euro">
                <small class="text-muted">The price must be an integer</small>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="type">
                    <option selected>Choose...</option>
                    <option>Electronic devices</option>
                    <option>School supplies</option>
                    <option>Daily necessities</option>
                    <option>Kitchenware</option>
                    <option>Food</option>
                </select>
            </div>
            <div class="form-group">
                <label>Number</label>
                <input type="int"  required name="number" class="form-control" placeholder="How many do you want to sold?">
                <small class="text-muted">The must must be an integer</small>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label>Upload the photos of article</label>
                <input type="file" name="fichier" class="form-control-file">
                <small class="form-text text-muted">Please upload a photo of format jpg or png.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
chaine;
}



