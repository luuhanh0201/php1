<?php
include '../../connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    // $image = $_POST['image'];
    $category = $_POST['category'];
    $quantify = $_POST['quantify'];
    $sold = $_POST['sold'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $file = $_FILES['image'];
    $file_name = $file['name'];

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
    } else {
        $msg = "Vui lòng chọn ảnh";
    }

    $sql = "INSERT INTO products (name,image,quantify,sold,price,description) values('$name','$file_name','$category''$quantify','$sold','$price','$description')";

    $conn->exec($sql);
    echo "Thêm dữ liệu thành công <br/>";
}

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


    <form style="width: 500px; margin: 24px auto;" class="form" action="add.php" method="post" enctype="multipart/form-data">
        <div>
            <label class="col-sm-2 col-form-label">ID: </label>
            <input class="form-control" type='text' name="id" value="AUTO" disabled />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Name: </label>
            <input class="form-control" type='text' name="name" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Image: </label>
            <input class="form-control" type='file' name="image" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Quantify: </label>
            <input class="form-control" type='text' name="quantify" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Quantify: </label>
            <input class="form-control" type='text' name="category" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Sold: </label>
            <input class="form-control" type='text' name="sold" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Price: </label>
            <input class="form-control" type='text' name="price" />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Description: </label>
            <input class="form-control" type='text' name="description" />
        </div>
        <div><button class="btn btn-success" type='submit'>Add</button></div>
        <div><button class="btn btn-primary" type='submit'><a class="btn btn-primary" href="../product/showProduct.php">List product</a></button></div>

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