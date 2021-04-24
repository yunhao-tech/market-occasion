<?php
$success = false;
if (isset($_POST["login"]) && $_POST["login"] != "" &&
        isset($_POST["name"]) && $_POST["name"] != "" &&
        isset($_POST["lastName"]) && $_POST["lastName"] != "" &&
        isset($_POST["email"]) && $_POST["email"] != "" &&
        isset($_POST["up"]) && $_POST["up"] != "" &&
        isset($_POST["up2"]) && $_POST["up2"] != "") {

    $b1 = (Utilisateur::getUtilisateur($dbh, $_POST["login"]) == null);
    $b2 = ($_POST["up"] == $_POST["up2"]);
    if ($b1 && $b2) {
        $promotion = isset($_POST["promotion"]) ? $_POST["promotion"] : null;
        if (!empty($_FILES['fichier']['tmp_name']) && is_uploaded_file($_FILES['fichier']['tmp_name'])) {
            $img_name = $_FILES['fichier']['tmp_name'];
        } else {
            $img_name = null;
        }
        $success = Utilisateur::insererUtilisateur($dbh, $_POST["login"], $_POST["up"], $_POST["name"], $_POST["lastName"],  $promotion, $_POST["email"], $img_name);
    }
}

if ($success){
    echo "<script>alert('Welcome! You have successfully registered!')</script>";
    require ("./content/content_welcome.php");
}

if (!$success) {
    if (isset($_POST["login"])) {
        echo "<script>alert('Fail to register. Please try again!')</script>";
    }
    if (isset($_POST["name"]))
        $name = $_POST["name"];
    else
        $name = "";
    if (isset($_POST["lastName"]))
        $lastName = $_POST["lastName"];
    else
        $lastName = "";
    if (isset($_POST["promotion"]))
        $promotion = $_POST["promotion"];
    else
        $promotion = "";
    if (isset($_POST["email"]))
        $email = $_POST["email"];
    else
        $email = "";
    echo<<<chaine
<div class="row">
    <div class="col-md-4 offset-md-4 gris">
        <form action="index.php?page=register&todo=register" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Login</label>
                <input type="text" required name="login" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input id="password1" class="form-control" type="password" required name=up>
            </div>
            <div class="form-group">
                <label>Confirm your password</label>
                <input id="password2" class="form-control" type="password" name=up2>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value= "$name"  required class="form-control">
            </div>
            <div class="form-group">
                <label>Last name</label>
                <input type="text" name="lastName" value= "$lastName"  required class="form-control">
            </div>
            <div class="form-group">
                <label>Email adresse</label>
                <input type="email" name="email" value="$email" required class="form-control"  placeholder="It's the only way to contact you!">
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label>Promotion</label>
                <input type="text" name="promotion" value="$promotion" class="form-control">
            </div>
            <div class="form-group">
                <label>Upload your photo</label>
                <input type="file" name="fichier" class="form-control-file"/>
                <small class="form-text text-muted">Please upload a photo of format jpg or png.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

chaine;
}
