 <?php
require_once '../connection.php';
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/shop.css">
</head>
<body>
  
    <div class="wrapper__shop">
        <div class="inner__shop">
            <div class="nav-bar__shop">
                <ul class="list__nav-bar">
                    <li class="title__nav-bar">CATEGORIES</li>
                    <li class="item__nav-bar">ALL</li>
                    <li class="item__nav-bar">CAT FOOD</li>
                    <li class="item__nav-bar">CAT FURNITURE</li>
                    <li class="item__nav-bar">CAT PROOF HOME</li>
                </ul>
            </div>
            <div class="list__products">
                <?php foreach ($products as $product) : ?>
                    <div class="product__item">
                        <div class="product__image" style="background-image: url('../Admin/assets/images/<?=$product['image']?>')" alt ="../Admin/assets/imagesbackgroundlogin.png">
                        </div>

                        <h4 class="product__name"><a href="#"><?=$product['name']?></a></h4>
                        <div class="product__sale">
                            <span class="price"><?=$product['price']?></span>
                            <span class="sold"><?=$product['sold']?></span>
                        </div>
                        <button class="button__product">BUY</button>
                    </div>

                <?php endforeach ?>


              <!-- <div class="product__item">
                    <div class="product__image" style="background-image: url('./assets/images/LOGO4\ 1.png')" alt ="../Admin/assets/imagesbackgroundlogin.png">
                    </div>

                    <h4 class="product__name"><a href="#">Silicone Waterproof Pet Mat</a></h4>
                    <div class="product__sale">
                        <span class="price">999 $</span>
                        <span class="sold">999</span>
                    </div>
                    <button class="button__product">BUY</button>
                </div>  -->

            </div>
        </div>
    </div>
</body>

</html>