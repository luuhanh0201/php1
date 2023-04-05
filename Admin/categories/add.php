<?php
include '../../connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $err = "";
    if (!isset($_POST['submit'])) {
        if (($name == "")) {
            $err = "không được bỏ trống trường này";
            die;
        }
    }
    $sql = "INSERT INTO category (name) values('$name')";

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


    <form style="width: 500px; margin: 24px auto;" class="form" action="add.php" method="post">
        <div>
            <h1 style="text-align: center;">ADD CATEGORY</h1>
            <!-- <input type="hidden" name="id"> -->
        </div>

        <div>
            <label class="col-sm-2 col-form-label">ID: </label>
            <input class="form-control" type='text' name="id" value="AUTO" disabled />
        </div>
        <div>
            <label class="col-sm-2 col-form-label">Name: </label>
            <input class="form-control" type='text' name="name" />
            <span style="color: red; font-size: 12px;">
                <?php echo $err ?? "" ?>
            </span>
        </div>
        <div><button class="btn btn-success" type='submit'>Add</button></div>
        <div><button class="btn btn-primary" type='submit'><a class="btn btn-primary" href="./show.php">List category</a></button></div>

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