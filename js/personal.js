$(document).ready(function () {
    $('.addToCart').click(function () {
        var id_article = $(this).attr('data-article-id');
        var login = $(this).attr('data-login');
        var login_user_article = $(this).attr('data-login-user-article');
        if (login == "null"){
            alert("Please login to add into your cart");
        } else {
            $.post("utilities/addToCart.php", {id_article: id_article, login: login, login_user_article : login_user_article}, function (result) {
                if (result == 1) { //article added to the cart
                    alert("This article have been added to the cart!");
                } else if (result == 0) {
                    alert("Fail to add to the cart.");
                } else if (result == 2){
                    alert("There is already this article in your cart!");
                } else if (result == 3){
                    alert("Add your articles into cart does not make sense!");
                }
            });
        }
    })
    
    $('.deleteFromCart').click(function () {
        var id_article = $(this).attr('data-article-id');
        var login = $(this).attr('data-login');
       
        $.post("utilities/deleteFromCart.php", {id_article: id_article, login: login}, function (result) {
            if (result == 1) { //article deleted from the cart
                var elem = document.getElementById(id_article);
                elem.parentNode.removeChild(elem);
            } else if (result == 0) {
                alert("Fail to delete article from the cart.");
            }
        })
        window.location.reload();
    })
    
    $('.deleteArticles').click(function () {
        var id_article = $(this).attr('data-article-id');
        var image_path = $(this).attr('data-image-path');
        $.post("utilities/deleteArticles.php", {id_article: id_article, image_path : image_path}, function (result) {
            alert(result);
            if (result == 1) { //article deleted from the list published
                var elem = document.getElementById(id_article);
                elem.parentNode.removeChild(elem);
            } else if (result == 0){
                alert("Fail to delete the published article.");
            }
        })
        window.location.reload();
    })
    
    
  
    
})


