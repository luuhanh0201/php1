<?php
include_once '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $image = $_POST['image_'];
    $name = $_POST['name'];
    $quantify = $_POST['quantify'];
    $price = $_POST['price'];
    $sold = $_POST['sold'];
    $description = $_POST['description'];

    $file = $_FILES['image'];
    $file_name = $file['name'];

    var_dump($image);
    if ($file['size'] > 0) {
        if ($file['size'] < 100000000) {
            $img = ['jpg', 'jpeg', 'png', 'gif'];
            // Lấy ra phần mở rộng file
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if (in_array($file_ext, $img)) {
                // Di chuyển vào thư mục website
                move_uploaded_file($file['tmp_name'], '../assets/images/' . $file_name);
                $msg = "UPLOAD thành công";
            } else {
                $msg = "UPLOAD thất bại vui lòng kiểm tra lại đường dẫn";
            }
        } else {
            $msg = "File phải nhỏ hơn 1mb";
        }
    }else{
        $file_name = $image;
    }
    

    try {
        $sql = "UPDATE products SET name='$name',image='$file_name', quantify='$quantify', price='$price', sold = '$sold', description='$description' where id=$id";
        $conn->exec($sql);
        $mess = 'Update success';
        // header("location: ./showProduct.php?mess=$mess");
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

$id = $_GET['id'];
// Edit 
$sql = "SELECT * FROM products where id=$id";
$stmt = $conn->prepare($sql);
// Thực thi
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($product);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

</head>

<body>
    <header class="header">
        <img src="../assets/images/LOGO4 1.png" alt="" />
        <div>
            <button style="background-color: transparent; border: none; margin-right: 24px;" type='submit'><a class="btn btn-danger" href="../logout.php">LOG OUT</a></button>
        </div>
    </header>


    <form style="width: 500px; margin: 24px auto;" class="form" action="update.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
        <div>
            <h1 style="text-align: center;">UPDATE PRODUCT</h1>
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
        </div>

        <div>
            <label class="col-sm-2 col-form-label">ID: </label>
            <input class="form-control" type='text' value="<?= $product['id'] ?>" disabled />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Name: </label>
            <input class="form-control" type='text' name="name" value="<?= $product['name'] ?>" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Image: </label>
            <img width="100px" height="100px" src="../assets/images/<?=$product['image']?>" name ="image_" />
            <input class="form-control" type='file' name="image" value="<?= $file_name ?>" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Quantify: </label>
            <input class="form-control" type='text' name="quantify" value="<?= $product['quantify'] ?>" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Price: </label>
            <input class="form-control" type='text' name="price" value="<?= $product['price'] ?>" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Sold: </label>
            <input class="form-control" type='text' name="sold" value="<?= $product['sold'] ?>" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Description: </label>
            <input class="form-control" type='text' name="description" value="<?= $product['description'] ?>" />
        </div>
        <div><button class="btn btn-success" type='submit'>UPDATE</button></div>
        <div><button class="btn btn-primary"><a class="btn btn-primary" href="./showProduct.php">List Product</a></button></div>
    </form>
    <style>
        .header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 12px;
            box-shadow: 1px 1px 4px 0px #ccc;
            padding-bottom: 6px;
            justify-content: space-between;
        }

        button {
            width: 100%;
            margin-top: 6px;
        }
    </style>
</body>

</html>