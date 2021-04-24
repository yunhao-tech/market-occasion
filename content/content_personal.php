<?php

if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    printLoginForm($askedPage);
    exit();
}
$login = $_SESSION['login'];
$user = Utilisateur::getUtilisateur($dbh, $login);
$prenom = $user->name;
$nom = $user->lastName;
$email = $user->email;
if ($user->promotion != null)
    $promotion = $user->promotion;
else
    $promotion = "mystery";
$suffix = Utilisateur::getSuffix($dbh, $login);

$profile_modified = false;
$b1 = (isset($_POST["prenom"]) && $_POST["prenom"] != "" );
$b2 = (isset($_POST["nom"]) && $_POST["nom"] != "");
$b3 = (isset($_POST["email"]) && $_POST["email"] != "");
$b4 = (isset($_POST["promotion"]) && $_POST["promotion"] != "");
if ($b1)
    $nouv_prenom = $_POST["prenom"];
else
    $nouv_prenom = $prenom;
if ($b2)
    $nouv_nom = $_POST["nom"];
else
    $nouv_nom = $nom;
if ($b3)
    $nouv_email = $_POST["email"];
else
    $nouv_email = $email;
if ($b4)
    $nouv_promotion = $_POST["promotion"];
else
    $nouv_promotion = $promotion;

if ($b1 || $b2 || $b3 || $b4) {
    $profile_modified = Utilisateur::modifyProfile($dbh, $login, $nouv_prenom, $nouv_nom, $nouv_email, $nouv_promotion);
}

if ($profile_modified)
    echo "<script>alert('You have successfully modified your personal information!')</script>";

echo <<<chaine
<div class="container rounded bg-white mt-5">
    <div class="row">
        <form action = "index.php?page=personal&todo=personal" method = "post">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src=$suffix[0] width="90" alt="profile photo"><span class="font-weight-bold">$prenom $nom</span><span class="text-black-50">$email</span><span>Ecole Polytechnique</span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <a href="index.php?page=welcome"><h6>Back to home</h6></a>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    <div class="row mt-2">
                        
                        <div class="col-md-6"><label>First Name</label></div>
                        
                        <div class="col-md-6"><label>Last Name</label></div>
                    </div>
                    <div class="row mt-2">
                        
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="first name" value=$nouv_prenom name=prenom></div>
                        
                        <div class="col-md-6"><input type="text" class="form-control" value=$nouv_nom placeholder="Doe" name=nom></div>
                    </div>
                    <div class="row mt-3">
                        
                        <div class="col-md-6"><label>Email</label></div>
                        
                        <div class="col-md-6"><label>Promotion</label></div>
                    </div>
                    <div class="row mt-3">
                        
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" value=$nouv_email name=email></div>
                        
                        <div class="col-md-6"><input type="text" class="form-control" value=$nouv_promotion placeholder="Promotion" name=promotion></div>
                    </div>
                    <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </div>
            </div>
        </form>
    </div>
</div>
chaine;



