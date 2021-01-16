<?php

function printLoginForm($askedPage) {
     echo <<<CHAINE
     <form action="index.php?page=$askedPage&todo=login" method="post">
    <p>Login : <input type="text" name="login" placeholder="Login" required /></p>
    <p>Password : <input type="password" name="mdp" placeholder="Password" required /></p>
    <p><input type="submit" value="Valider" /></p>
 
  </form>
CHAINE;
}

function printLogoutForm(){
    echo <<<CHAINE
    <form action="index.php?todo=logout" method="post">
    <p><input type="submit" value="Deconnexion" /></p>       
    </form>
CHAINE;
}
