<?php
include_once '../../connection.php';

$sql = "SELECT * from category";

$stmt = $conn->prepare($sql);
$stmt->execute();

$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <img src="../assets//images/LOGO4 1.png" alt="" />
        <div>

            <button style="background-color: transparent; border: none; margin-right: 24px;" type='submit'><a class="btn btn-danger" href="../logout.php">LOG OUT</a></button>
        </div>
    </header>
    <div style="width: 100%; display: flex; justify-content: center; margin-top: 6px;">
        <div style="width: 100%; display: flex; justify-content: center; margin-top: 6px;">
            <button type="submit"><a href="../product/showProduct.php">Product</a></button>
            <button type="submit"><a href="./show.php">Category</a></button>
        </div>
    </div>
    <table class="table table-striped">
        <tr style="text-align: center;">
            <th>ID</th>
            <th>NAME</th>
            <th><a class="btn btn-primary" href="add.php">ADD</a></th>
        </tr>

        <?php foreach ($categories as $cate) : ?>
            <tr>
                <td style="text-align: center;"><?= $cate['id'] ?></td>
                <td style="text-align: center;"><?= $cate['name'] ?></td>

                <td style="text-align: center;width:100px">
                    <a style="width:100px; margin-bottom:6px" class="btn btn-success" href="update.php?id=<?= $cate['id'] ?>">UPDATE</a>
                    <a style="width:100px" class="btn btn-warning" href="delete.php?id=<?= $cate['id'] ?>" onclick="return confirm('Do you want to delete?')">DELETE</a>
                </td>
            </tr>
        <?php endforeach ?>

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
        </style>
</body>

</html>