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
    public $lastName;
    public $name;
    public $promotion;
    public $email;
    public $img_profile;
    public $type;

    public function __toString() {
        if ($this->promotion != null) {
            return "[$this->login] $this->lastName $this->name, $this->promotion, $this->email " . "<br/>";
        } else {
            return "[$this->login] $this->lastName $this->name, $this->email " . "<br/>";
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

    public static function getSuffix($dbh, $login) {
        $user = Utilisateur::getUtilisateur($dbh, $login);
        $query = "SELECT img_profile FROM utilisateurs where login=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
        while ($courant = $sth->fetch()) {
            return $courant;
        }
        return null;
    }

    public static function insererUtilisateur($dbh, $login, $mdp, $name, $lastName, $promotion, $email, $img_name) {
        $success = false;
        if (Utilisateur::getUtilisateur($dbh, $login) == null) {
            $query = "INSERT INTO utilisateurs (login, mdp, name, lastName, email, promotion, img_profile) VALUES (?, SHA1(?),?,?,?,?,?) ";
            $sth = $dbh->prepare($query);
            if ($img_name != null) {
                list($larg, $haut, $type, $attr) = getimagesize($img_name);
                if ($type == 2 || $type == 3) { //we only accept .jpg and .png format
                    if ($type == 2)
                        $suffix = ".jpg";
                    else
                        $suffix = ".png";
                    if (move_uploaded_file($img_name, "photos/profile_" . $login . $suffix)) {
                        $sth->execute(array($login, $mdp, $name, $lastName, $email, $promotion, "photos/profile_" . $login . $suffix));
                        $success = true;
                    } else {
                        echo "echec de la copie";
                    }
                } else {
                    echo "error of format";
                }
            } else {
                $sth->execute(array($login, $mdp, $name, $lastName, $email, $promotion, null));
                $success = true;
            }
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

    public static function changeMdp($dbh, $login, $mdp_new) {
        $query = "UPDATE utilisateurs SET mdp=SHA1(?) WHERE login=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($mdp_new, $login));
        return true;
    }

    public static function delete($dbh, $login) {
        $query = "DELETE FROM utilisateurs WHERE login=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
        return true;
    }

    public static function publishArticle($dbh, $login, $name, $price_uni, $type, $number, $description, $img_name) {
        $success = false;
        $query = "INSERT INTO articles (name, price_uni, type, number, login_utilisateur, description, img_path) VALUES (?,?,?,?,?,?,?) ";
        $sth = $dbh->prepare($query);

        if ($img_name != null) {
            list($larg, $haut, $type_img, $attr) = getimagesize($img_name);
            if ($type_img == 2 || $type_img == 3) { //we only accept .jpg and .png format
                if ($type_img == 2)
                    $suffix = ".jpg";
                else
                    $suffix = ".png";
                $name_nospace = str_ireplace(" ", "", $name);
                $moved = move_uploaded_file($img_name, "photos/articles_" . $login . "_" . $name_nospace . $suffix);
                if ($moved) {
                    $img_path = "photos/articles_" . $login . "_" . $name_nospace . $suffix;
                    $sth->execute(array($name, $price_uni, $type, $number, $login, $description, $img_path));
                    $success = true;
                }
            }
        }
        return $success;
    }

    public static function modifyProfile($dbh, $login, $nouv_prenom, $nouv_nom, $nouv_email, $nouv_promotion) {
        $query = "UPDATE utilisateurs SET name=?, lastName=?, email=?, promotion=? WHERE login=? ";
        $sth = $dbh->prepare($query);
        $sth->execute(array($nouv_prenom, $nouv_nom, $nouv_email, $nouv_promotion, $login));
        return true;
    }

    public static function addToCart($dbh, $login, $ID_article) {
        $query = "INSERT INTO voeuxlist (login_utilisateur, ID_article) VALUES (?,?) ";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login, $ID_article));
        return true;
    }

    public static function deleteFromCart($dbh, $login, $ID_article) {
        $query = "DELETE FROM voeuxlist WHERE login_utilisateur=? and ID_article =?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login, $ID_article));
        return true;
    }
    
    public static function deleteArticles($dbh, $ID_article) {
        $query = "DELETE FROM articles WHERE ID =?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($ID_article));
        return true;
    }
    
    
}

class Article {

    public $ID;
    public $name;
    public $price_uni;
    public $type;
    public $number;
    public $date_begin;
    public $login_utilisateur;
    public $description;
    public $img_path;

    public static function search($dbh, $keyword) {
        $query = "SELECT * FROM articles WHERE name like ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Article');
        $sth->execute(array("%".$keyword."%"));
        $list = array();
        while ($courant = $sth->fetch()) {
            array_push($list, $courant);
        }
        return $list; // return a list of articles whose name is like $keyword
    }

    public static function getArticleByID($dbh, $ID) {
        $query = "SELECT * FROM articles where ID=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Article');
        $sth->execute(array($ID));
        while ($courant = $sth->fetch()) {
            return $courant;
        }
    }

    public static function getTypeArticle($dbh, $type) {
        $query = "SELECT * FROM articles where type=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Article');
        $sth->execute(array($type));
        $list = array();
        while ($courant = $sth->fetch()) {
            array_push($list, $courant);
        }
        return $list;
    }

    public static function getAllArticle($dbh) {
        $query = "SELECT * FROM articles";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Article');
        $sth->execute();
        $list = array();
        while ($courant = $sth->fetch()) {
            array_push($list, $courant);
        }
        return $list;
    }

    public static function getRightArticle($dbh, $typechosen) {
        if ($typechosen == "AllTheGoods") {
            $article_list = Article::getAllArticle($dbh);
        } else {
            $article_list = Article::getTypeArticle($dbh, $typechosen);
        }
        return $article_list;
    }

    public static function getArticleFromCart($dbh, $login) {
        $query = "SELECT ID_article FROM voeuxlist where login_utilisateur=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
        $list = array();
        while ($courant = $sth->fetch()) {
            array_push($list, Article::getArticleByID($dbh, $courant[0]));
        }
        return $list;
    }
    
    public static function getArticleByLogin($dbh, $login){
        $query = "SELECT ID FROM articles where login_utilisateur=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
        $list = array();
        while ($courant = $sth->fetch()) {
            array_push($list, Article::getArticleByID($dbh, $courant[0]));
        }
        return $list;
    }

}
