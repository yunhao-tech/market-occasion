<?php

class Database {

    public static function connect() {
        $dsn = 'mysql:dbname=occasion_market;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }

}

class Utilisateur {

    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $promotion;
    public $naissance;
    public $email;
    public $feuille;

    public function __toString() {
        $birthday = explode("-", $this->naissance);
        if ($this->promotion != null) {
            return "[$this->login] $this->prenom $this->nom, né le $birthday[2]/$birthday[1]/$birthday[0], X$this->promotion, $this->email " . "<a href='index.php?login=$this->login' target='_blank'>voir les amis</a>" . "<br/>";
        } else {
            return "[$this->login] $this->prenom $this->nom, né le $birthday[2]/$birthday[1]/$birthday[0], $this->email " . "<a href='index.php?login=$this->login' target='_blank'>voir les amis</a>" . "<br/>";
        }
    }

    public static function getUtilisateur($dbh, $login) {
        $query = "SELECT * FROM utilisateurs where login=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        while ($courant = $sth->fetch()) {
            return $courant;
        }
        return null;
    }

    public static function insererUtilisateur($dbh, $login, $mdp, $nom, $prenom, $promotion, $naissance, $email, $feuille) {
        $success = false;
        if (Utilisateur::getUtilisateur($dbh, $login) == null) {
            $query = "INSERT INTO utilisateurs (login, mdp, nom, prenom, promotion, naissance, email, feuille) VALUES (?, SHA1(?),?,?,?,?,?,?) ";
            $sth = $dbh->prepare($query);
            $sth->execute(array($login, $mdp, $nom, $prenom, $promotion, $naissance, $email, $feuille));
            $success = true;
        }
        return $success;
    }

    public static function testerMdp($dbh, $user, $mdp) {
        if ($user != null) {
            if (sha1($mdp) == $user->mdp) {
                return true;
            }
            return false;
        }
        return false;
    }
    
    public static function changeMdp($dbh, $login, $mdp_new){
        $query = "UPDATE utilisateurs SET mdp=SHA1(?) WHERE login=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($mdp_new, $login));
        return true;
    }
    
    public static function delete($dbh, $login){
        $query = "DELETE FROM utilisateurs WHERE login=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
        return true;
    } 

}
