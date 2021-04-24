<?php
if (array_key_exists("type", $_GET)) {
    $typechosen = $_GET["type"];
    if ($typechosen == "AllTheGoods"){
        $type_name = "AllTheGoods";
    }
    else{
     $type_name = findTypeName($typechosen);   
    }
} else {
    $typechosen = "AllTheGoods"; //valeur par defaut
    $type_name = "AllTheGoods";
}
if (isset($_POST["keyword"])){
    $keyword = trim($_POST['keyword']); 
}
else{
    $keyword = null;
}

if($keyword != null){
    $article_list = Article::search($dbh, $keyword);
}
else{
    $article_list = Article::getRightArticle($dbh,$type_name);
}

generateShoppingHeader();
generateSideMenu();



generateArticlePage($article_list);

generateShoppingFooter();
