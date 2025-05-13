<?php
// login.php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Cari user berdasarkan email
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email='$email'");
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Berhasil login: set session dan redirect
            $_SESSION['id']   = $user['id'];
            $_SESSION['username']  = $user['username'];
            $_SESSION['position']  = $user['position'];
            $_SESSION['email'] = $user['email']; // tambahkan ini
            header('Location: dist/pages/index3.php');
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak terdaftar!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Ayuatari Olshop</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <style>
    body {
      margin: 0; padding: 0;
      background: url(dist/assets/img/bg-login.jpg) no-repeat center/cover fixed;
      font-family: sans-serif;
    }
    .input {
      position: fixed; top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(21,26,24,0.9);
      padding: 50px; width: 320px;
      box-shadow: 0 0 25px 10px black;
      border-radius: 15px;
    }
    .input h1 {
      color: white; text-align: center;
      font-size: 30px; letter-spacing: 3px;
      margin: -20px 0 20px;
    }
    .box-input {
      display: flex; align-items: center;
      margin: 10px 0;
      border-bottom: 2px solid white;
      padding-bottom: 8px;
    }
    .box-input i {
      color: white; font-size: 20px;
      margin-right: 10px;
    }
    .box-input input {
      flex: 1;
      background: none; border: none;
      outline: none; color: white;
      font-size: 18px;
    }
    .box-input input::placeholder { color: white; }
    .btn-input {
      width: 100%; margin: 20px 0;
      padding: 10px;
      background: none; border: 1px solid white;
      color: white; font-size: 18px; letter-spacing: 3px;
      cursor: pointer; border-radius: 10px;
      transition: background .2s;
    }
    .btn-input:hover { background: black; }
    .error {
      color: #ff6b6b; text-align: center;
      margin-top: 10px;
    }
    .bottom {
      text-align: center; margin-top: 10px;
      color: white;
    }
    .bottom a {
      color: lightgreen; text-decoration: none;
    }
    .bottom a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="input">
    <h1>LOGIN</h1>
    <form method="POST" action="">
      <div class="box-input">
        <i class="fas fa-envelope-open-text"></i>
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="box-input">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" name="login" class="btn-input">Login</button>
      <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <div class="bottom">
        Belum punya akun? <a href="register.php">Register di sini</a>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
