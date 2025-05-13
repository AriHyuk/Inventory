<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $fullname  = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username  = mysqli_real_escape_string($conn, $_POST['username']);
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $position  = mysqli_real_escape_string($conn, $_POST['position']);

    $cek_email = mysqli_query($conn, "SELECT * FROM tb_user WHERE email='$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>
                alert('Email sudah digunakan!');
                window.location.href = 'register.php';
              </script>";
    } else {
        $query = "INSERT INTO tb_user (fullname, username, email, password, position) 
                  VALUES ('$fullname', '$username', '$email', '$password', '$position')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Registrasi berhasil, silakan login!');
                    window.location.href = 'login.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal mendaftar. Coba lagi!');
                    window.location.href = 'register.php';
                  </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuatari Olshop - Register</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(dist/assets/img/bg-login.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: sans-serif;
        }

        .input {
            position: fixed;
            top: 50%;
            left: 600px;
            transform: translate(-30%, -50%);
            background: rgba(21, 26, 24, 0.9);
            padding: 50px;
            width: 320px;
            box-shadow: 0px 0px 25px 10px black;
            border-radius: 15px;
        }

        .input h1 {
            text-align: center;
            color: white;
            font-size: 30px;
            letter-spacing: 3px;
            margin-top: -20px;
        }

        .box-input {
            position: relative;
            margin: 10px 0;
            border-bottom: 2px solid white;
        }

        .box-input i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            font-size: 20px;
            color: white;
        }

        .box-input input,
        .box-input select {
            width: 100%;
            padding: 8px 8px 8px 36px;
            background: none;
            border: none;
            outline: none;
            color: gray;
            font-size: 18px;
        }

        .box-input select {
            background-color: rgba(50, 50, 50, 0.8);
            border-radius: 5px;
            appearance: none;
        }

        .box-input select option[disabled][selected] {
            color: gray;
        }

        .btn-input {
            margin: 20px 0;
            background: none;
            border: 1px solid white;
            width: 100%;
            padding: 10px;
            color: white;
            font-size: 18px;
            letter-spacing: 3px;
            cursor: pointer;
            transition: all .2s;
            border-radius: 10px;
        }

        .btn-input:hover {
            background: black;
        }

        .bottom {
            text-align: center;
            margin-top: 10px;
        }

        .bottom p {
            color: white;
            font-size: 15px;
        }

        .bottom a {
            color: lightgreen;
            font-size: 15px;
            text-decoration: none;
        }

        .bottom a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="input">
        <h1>REGISTER</h1>
        <form method="POST">
            <div class="box-input">
                <i class="fas fa-user"></i>
                <input type="text" name="fullname" placeholder="Full Name" required>
            </div>

            <div class="box-input">
                <i class="fas fa-address-book"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="box-input">
                <i class="fas fa-user-tag"></i>
                <select name="position" required>
                    <option value="" disabled selected>Position</option>
                    <option value="owner">Owner</option>
                    <option value="kasir">Kasir</option>
                    <option value="admin">Admin</option>
                    <option value="staff-gudang">Staff Gudang</option>
                </select>
            </div>

            <button type="submit" name="register" class="btn-input">Register</button>

            <div class="bottom">
                <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
            </div>
        </form>
    </div>
</body>
</html>
