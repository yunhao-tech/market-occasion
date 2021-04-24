<?php

$page_list = array(
    array(
        "name" => "welcome",
        "title" => "Xchange",
        "menutitle" => "Welcome"),
    array(
        "name" => "contacts",
        "title" => "Who are we?",
        "menutitle" => "ContactUs"),
    array(
        "name" => "register",
        "title" => "Page of registration",
        "menutitle" => "Registration"),
    array(
        "name" => "changePassword",
        "title" => "Password change",
        "menutitle" => "ChangeMyPassword"),
    array(
        "name" => "deleteUser",
        "title" => "Delete user",
        "menutitle" => "DeleteMyAccount"),
    array(
        "name" => "cart",
        "title" => "Cart",
        "menutitle" => "Cart"),
    array(
        "name" => "shopping",
        "title" => "Shopping",
        "menutitle" => "Shopping"),
    array(
        "name" => "personal",
        "title" => "PersonalInformation",
        "menutitle" => "PersonalInformation"),
    array(
        "name" => "publish",
        "title" => "Publish",
        "menutitle" => "Publish"),
    array(
        "name" => "article",
        "title" => "Article",
        "menutitle" => "Article"),
    array(
        "name" => "deleteGoods",
        "title" => "DeleteGoods",
        "menutitle" => "Delete"),
    array(
        "name" => "login",
        "title" => "Login",
        "menutitle" => "Login"),
    array(
        "name" => "navigation",
        "title" => "Navigation",
        "menutitle" => "Navigation")
);

$page_list_commun = array(
    array(
        "name" => "welcome",
        "title" => "Xchange",
        "menutitle" => "Welcome"),
    array(
        "name" => "contacts",
        "title" => "Who are we?",
        "menutitle" => "ContactUs"),
    array(
        "name" => "myaccount",
        "title" => "My account",
        "menutitle" => "MyAccount")
);

function generateHeader($titre, $link) {
    echo <<<CHAINE
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/personal.js"></script>
        <link rel="stylesheet" href="$link">
        <title>$titre</title>
    </head>
    <body>
CHAINE;
}

function generateFooter() {
    echo <<<chaine
     </body>
    </html>
    chaine;
}

function checkPage($askedPage) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page["name"] == $askedPage) {
            return true;
        }
    }
    return false;
}

function getPageTitle($page_name) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page["name"] == $page_name) {
            return $page["title"];
        }
    }
}

function generateMenu($user_type, $lastName, $name) {
    if ($user_type == "normal" && $name != null) {
        echo <<<chaine
    <div class="container-fluid px-0">
    <nav class="navbar navbar-expand-md navbar-light bg-white p-0"> <a class="navbar-brand mr-4" href="index.php?page=welcome"><strong>Xchange</strong></a> <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MyAccount<span class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=shopping">
                                        <div class="fa-icon text-center"> <span class="fa fa-shopping-bag"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Shopping</h6> <small class="text-muted">Find something to buy</small> </div></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=cart">
                                        <div class="fa-icon text-center"> <span class="fa fa-shopping-cart"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Cart</h6> <small class="text-muted">View my cart</small>
                                             </div></a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=publish">
                                        <div class="fa-icon text-center"> <span class="fa fa-plus-circle"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Publish</h6> <small class="text-muted">Upload something to sell</small>
                                             </div></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"> <a class="dropdown-item" href="index.php?page=personal">
                                        <div class="fa-icon text-center"> <span class="fa fa-user"></span> </div>
                                        <div class="d-flex flex-column">
                                                <h6 class="mb-0">My Space</h6> <small class="text-muted">View my personal information</small>
                                             </div></a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=changePassword&todo=changePassword">
                                        <div class="fa-icon text-center"> <span class="fa fa-key"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Security</h6> <small class="text-muted">Change my password</small>
                                            </div></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=deleteGoods">
                                        <div class="fa-icon text-center"> <span class="fa fa-window-close"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">View my goods</h6> <small class="text-muted">Manage my goods uploaded</small>
                                            </div> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customers<span class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu2" aria-labelledby="navbarDropdown2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=login">
                                        <div class="fa-icon text-center"> <span class="fa fa-sign-in"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">LogIn</h6> <small class="text-muted">Log in or change user account</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?todo=logout">
                                        <div class="fa-icon text-center"> <span class="fa fa-sign-out"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">LogOut</h6> <small class="text-muted">Log out</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=register&todo=register">
                                        <div class="fa-icon text-center"> <span class="fa fa-registered"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Register</h6> <small class="text-muted">Creat a new account</small>
                                            </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=deleteUser&todo=deleteUser">
                                        <div class="fa-icon text-center"> <span class="fa fa-trash"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">LeaveUs</h6> <small class="text-muted">Delete my account</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More<span class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu3" aria-labelledby="navbarDropdown3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=contacts">
                                        <div class="fa-icon text-center"> <span class="fa fa-feed"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Contacts</h6> <small class="text-muted">Contact us</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=navigation">
                                        <div class="fa-icon text-center"> <span class="fa fa-question"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Navigation</h6> <small class="text-muted">How to navigate our site</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
      <div class="col-md-2 nav-item">Welcome <a href="index.php?page=personal">$lastName $name</a></div>
    </nav>
</div>   
chaine;
    } else if ($user_type == "normal" && $name == null){
                echo <<<chaine
    <div class="container-fluid px-0">
    <nav class="navbar navbar-expand-md navbar-light bg-white p-0"> <a class="navbar-brand mr-4" href="index.php?page=welcome"><strong>Xchange</strong></a> <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MyAccount<span class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=shopping">
                                        <div class="fa-icon text-center"> <span class="fa fa-shopping-bag"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Shopping</h6> <small class="text-muted">Find something to buy</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=cart">
                                        <div class="fa-icon text-center"> <span class="fa fa-shopping-cart"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Cart</h6> <small class="text-muted">View my cart</small>
                                            </div> </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=publish">
                                        <div class="fa-icon text-center"> <span class="fa fa-plus-circle"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Publish</h6> <small class="text-muted">Upload something to sell</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"> <a class="dropdown-item" href="index.php?page=personal">
                                        <div class="fa-icon text-center"> <span class="fa fa-user"></span> </div>
                                        <div class="d-flex flex-column">
                                                <h6 class="mb-0">My Space</h6> <small class="text-muted">View my personal information</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=changePassword&todo=changePassword">
                                        <div class="fa-icon text-center"> <span class="fa fa-key"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Security</h6> <small class="text-muted">Change my password</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=deleteGoods">
                                        <div class="fa-icon text-center"> <span class="fa fa-window-close"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">View my goods</h6> <small class="text-muted">Manage my goods uploaded</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customers<span class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu2" aria-labelledby="navbarDropdown2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=login">
                                        <div class="fa-icon text-center"> <span class="fa fa-sign-in"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">LogIn</h6> <small class="text-muted">Log in or change user account</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?todo=logout">
                                        <div class="fa-icon text-center"> <span class="fa fa-sign-out"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">LogOut</h6> <small class="text-muted">Log out</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=register&todo=register">
                                        <div class="fa-icon text-center"> <span class="fa fa-registered"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Register</h6> <small class="text-muted">Creat a new account</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=deleteUser&todo=deleteUser">
                                        <div class="fa-icon text-center"> <span class="fa fa-trash"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">LeaveUs</h6> <small class="text-muted">Delete my account</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More<span class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu3" aria-labelledby="navbarDropdown3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=contacts">
                                        <div class="fa-icon text-center"> <span class="fa fa-feed"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Contacts</h6> <small class="text-muted">Contact us</small>
                                            </div> </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=navigation">
                                        <div class="fa-icon text-center"> <span class="fa fa-question"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Navigation</h6> <small class="text-muted">How to navigate our site</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>   
chaine;
    } else if ($user_type == "admin"){
        echo <<<chaine
        <div class="container-fluid px-0">
    <nav class="navbar navbar-expand-md navbar-light bg-white p-0"> <a class="navbar-brand mr-4" href="index.php?page=welcome"><strong>Xchange</strong></a> <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MyAccount<span class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=publish">
                                        <div class="fa-icon text-center"> <span class="fa fa-plus-circle"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Publish</h6> <small class="text-muted">Upload something to sell</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=deleteGoods">
                                        <div class="fa-icon text-center"> <span class="fa fa-window-close"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Management</h6> <small class="text-muted">Delete an article</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=register&todo=register">
                                        <div class="fa-icon text-center"> <span class="fa fa-registered"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Create</h6> <small class="text-muted">Create a new account</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=deleteUser&todo=deleteUser">
                                        <div class="fa-icon text-center"> <span class="fa fa-trash"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">Deletion</h6> <small class="text-muted">Delete an account</small>
                                            </div> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customers<span class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu2" aria-labelledby="navbarDropdown2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?page=login">
                                        <div class="fa-icon text-center"> <span class="fa fa-sign-in"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">LogIn</h6> <small class="text-muted">Log in or change user account</small>
                                             </div> </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab"><a class="dropdown-item" href="index.php?todo=logout">
                                        <div class="fa-icon text-center"> <span class="fa fa-sign-out"></span> </div>
                                        <div class="d-flex flex-column"> 
                                                <h6 class="mb-0">LogOut</h6> <small class="text-muted">Log out</small>
                                             </div> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
       <div class="col-md-2 nav-item">Welcome <a href="index.php?page=personal">$lastName $name</a></div>
    </nav>
</div>   
chaine;
    }
}

$type_list = array(
    array(
        "name" => "Daily necessities",
        "title" => "DailyNecessities"),
    array(
        "name" => "Electronic devices",
        "title" => "ElectronicDevices"),
    array(
        "name" => "Food",
        "title" => "Food"),
    array(
        "name" => "Kitchenware",
        "title" => "Kitchenware"),
    array(
        "name" => "School supplies",
        "title" => "SchoolSupplies")
);

function generateSideMenu() {
    global $type_list;
    foreach ($type_list as $type) {
        echo '<div class="d-flex justify-content-between mt-2">';
        echo '<a href="index.php?page=shopping&type=' . $type['title'] . '"><div style="color: black; font-weight:bold;">' . $type['name'] . '</div></a>';
        echo '</div>';
    }
    echo <<<chaine
                <div class="d-flex justify-content-between mt-2">
                    <a href="index.php?page=shopping"><div style="color: black; font-weight:bold;">All the goods</div></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row g-2">
chaine;
}

function generateShoppingHeader() {
    echo <<<chaine
<div class="container-fluid mt-5 mb-5">
    <div class="row g-2">
        <div class="col-md-3">
            <div class="type p-2 mb-2">
                <div class="heading d-flex justify-content-between align-items-center">
                    <h6 class="text-uppercase">Type</h6>
                </div>
chaine;
}

function findTypeName($typechosen) {
    global $type_list;
    foreach ($type_list as $type) {
        if ($type['title'] == $typechosen) {
            return $type['name'];
        }
    }
    return;
}

function generateArticlePage($article_list) {
    if (isset($_SESSION["loggedIn"]) && $_SESSION['loggedIn']) {
        $login = $_SESSION['login'];
    } else {
        $login = "null";
    }
    foreach ($article_list as $article) {
        $article_id = $article->ID;
        $article_name = $article->name;
        $article_price = $article->price_uni;
        $article_image = $article->img_path;
        $login_user_article = $article->login_utilisateur;
        echo <<<chaine
                    <div class="col-md-4">
                    <div class="product py-4">
                        <div class="text-center"> <a href="index.php?page=article&article=$article_id"> <img src="$article_image" width="200" height="200" alt="$article_name"> </a> </div>
                        <div class="about text-center">
                            <h5>$article_name</h5> <span>$article_price €</span>
                        </div>
                        <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <span class="btn btn-primary text-uppercase addToCart" data-article-id=$article_id data-login-user-article=$login_user_article data-login=$login>Add to cart</span>
                        </div>
                    </div>
                </div>
chaine;
    }
}

/*
  function generateGoodsPage($article_list) {
  foreach ($list_article as $article) {
  $login = $_SESSION['login'];
  $article_id = $article->ID;
  $article_name = $article->name;
  $article_type = $article->type;
  $article_price = $article->price_uni;
  $article_image = $article->img_path;
  echo <<<chaine
  <div class="row border-top border-bottom" id=$article_id>
  <div class="row main align-items-center">
  <div class="col-2"><img class="img-fluid" src=$article_image></div>
  <div class="col">
  <div class="row text-muted">$article_type</div>
  <div class="row">$article_name</div>
  </div>
  <div class="col">$article_price &euro;<span class="close deleteGoods" article_id=$article_id login=$login >&#10005;</span></div>
  </div>
  </div>
  chaine;
  }
  } */

function generateShoppingFooter() {
    echo <<<chaine
                
            </div>
        </div>
    </div>
</div>
chaine;
}

function generateCartHeader($size) {
    echo <<<chaine
    <div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Shopping Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted">$size items</div>
                </div>
            </div>
chaine;
}

function generateCartPage($list_article) {
    foreach ($list_article as $article) {
        $login = $_SESSION['login'];
        $article_id = $article->ID;
        $article_name = $article->name;
        $article_type = $article->type;
        $article_price = $article->price_uni;
        $article_image = $article->img_path;
        echo <<<chaine
            <div class="row border-top border-bottom" id="$article_id">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="$article_image" alt="$article_name"></div>
                    <div class="col">
                        <div class="row text-muted">$article_type</div>
                        <div class="row">$article_name</div>
                    </div>
                    <div class="col">$article_price &euro;<span class="close deleteFromCart" data-article-id="$article_id" data-login="$login" >&#10005;</span></div>
                </div>
            </div>
chaine;
    }
}

function generateCartFooter($total_price) {
    echo <<<chaine
    <div class="back-to-shop"><a href="index.php?page=shopping">&leftarrow;<span class="text-muted">Back to shop</span></a></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Summary</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">TOTAL PRICE</div>
                <div class="col text-right">$total_price &euro;</div>
            </div>
        </div>
    </div>
</div>
chaine;
}

function generateArticlesPublishedHeader($title, $size) {
    echo <<<chaine
    <div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>$title</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted">$size items</div>
                </div>
            </div>
chaine;
}

function generateArticlesPublishedPage($list_article) {
    foreach ($list_article as $article) {
        $article_id = $article->ID;
        $article_name = $article->name;
        $article_type = $article->type;
        $article_price = $article->price_uni;
        $article_image = $article->img_path;
        echo <<<chaine
            <div class="row border-top border-bottom" id=$article_id>
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src=$article_image alt="$article_name"></div>
                    <div class="col">
                        <div class="row text-muted">$article_type</div>
                        <div class="row">$article_name</div>
                    </div>
                    <div class="col">$article_price &euro;<span class="close deleteArticles" data-article-id=$article_id data-image-path=$article_image >&#10005;</span></div>
                </div>
            </div>
chaine;
    }
}

function secure($tab) {
    foreach ($tab as $cle => $valeur) {
        $tab[$cle] = htmlspecialchars($valeur);
    }
    return $tab;
}
?>
  