<?php
session_start();
require_once '../connection.php';

// if login success

// if (isset($_SESSION['user'])) {
//   header("location: ./product/showProduct.php");
// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE user_name='$username'";
  // chuẩn bị
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($user) {
    // Kiểm tra mật khẩu

    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      $msg = "Đăng nhập thành công";
      header("location: ./product/showProduct.php?msg=$msg");
    } else {
      $_errors['password'] = 'Sai mat khau';
    }
  } else {
    $_errors['username'] =  "Tai khoan khong dung";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
  <div class="wrapper">
    <header class="header">
      <img src="./assets/images/LOGO4 1.png" alt="" />
    </header>
    <div class="container">
      <form class="form" action="" method="post">
        <div class="mb-3">
          <h3>LOG IN</h3>
        </div>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username" name="username" />
          <?php echo $_errors['username'] ?? '' ?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password" name="password" />
          <?php echo $_errors['password'] ?? '' ?>
        </div>
        <div class="mb-3">
          <button type='submit' class="btn btn-primary">LOG IN</button>

      </form>
    </div>
  </div>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .wrapper {
      width: 100%;
    }

    .header {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-top: 12px;
      box-shadow: 1px 1px 4px 0px #ccc;
      padding-bottom: 6px;
    }

    .container {
      position: relative;
      width: 100%;
      height: 80vh;
      background-image: url("./assets/images/backgroundlogin.png");
      padding: 22%;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .form {
      position: fixed;
      width: 450px;
      height: 350px;
      background-color: #fff;
      padding: 36px 24px;
      border-radius: 12px;
      top: 0;
      bottom: 0;
      right: 0;
      left: 0;
      margin: auto;
    }

    .btn {
      width: 80%;
      margin: 0 auto;
      display: flex;
      justify-content: center;
      border-radius: 50px;
    }
  </style>
</body>

</html>