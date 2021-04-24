<?php

echo <<<CHAINE
<div class="container mt-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <div class="card p-4 mt-3">
                <h3 class="heading mt-5 text-center">Hi! How can we help You?</h3>
                <div class="d-flex justify-content-center px-5">
                    <div class="search"> 
CHAINE;
                        echo '<form action="index.php?page=shopping" method="POST" class="search-input">';
echo <<<CHAINE
                            <input type="text" class="search-input" placeholder="Press Enter to Search..." name="keyword"> 
                        </form>
                    </div>
                </div>
CHAINE;

echo <<<CHAINE
                <div class="row mt-4 g-1 px-4 mb-5">
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <a href="index.php?page=shopping&type=ElectronicDevices"><img src="images/electronic.png" width="50" alt="ElectronicDevices"></a>
                            <div class="text-center mg-text"> <span class="mg-text">Electronic Devices</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <a href="index.php?page=shopping&type=DailyNecessities"><img src="images/daily.png" width="50" alt="DailyNecessities"></a>
                            <div class="text-center mg-text"> <span class="mg-text">Daily Necessities</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <a href="index.php?page=shopping&type=SchoolSupplies"><img src="images/school.png" width="50" alt="SchoolSupplies"></a>
                            <div class="text-center mg-text"> <span class="mg-text">School Supplies</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <a href="index.php?page=shopping&type=Food"><img src="images/food.png" width="50" alt="Food"></a>
                            <div class="text-center mg-text"> <span class="mg-text">Food & Drink</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <a href="index.php?page=shopping&type=Kitchenware"><img src="images/kitchen.png" width="50" alt="Kitchenware"></a>
                            <div class="text-center mg-text"> <span class="mg-text">Kitchen Utensils</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <a href="index.php?page=shopping&type=AllTheGoods"> <img src="images/everything.png" width="50" alt="AllTheGoods">
                                <div class="text-center mg-text"> <span class="mg-text">All the goods</span> </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
CHAINE;
