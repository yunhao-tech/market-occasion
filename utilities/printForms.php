<?php

function printLoginForm($askedPage) {
    echo <<<CHAINE
<div class="row">
    <div class="col-md-4 offset-md-4 gris">
        <form action="index.php?page=$askedPage&todo=login" method="post">
            <div class="form-group">
                <label>Login</label>
                <input type="text" class="form-control" name="login" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="mdp" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
CHAINE;
}
/*
function printLogoutForm() {
    echo <<<CHAINE
    <form action="index.php?todo=logout" method="post">
    <button type="submit" class="btn btn-primary">Deconnexion</button>      
    </form>
CHAINE;
}

function printDeleteForm(){
    echo <<<CHAINE
    <form action="index.php?page=deleteUser&todo=deleteUser" method="post">
    <button type="submit" class="btn btn-primary">Delete my account</button>      
    </form>
CHAINE;
}
 * 
 */
?>
