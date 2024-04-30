<?php
session_start();
require 'config.php';
$koneksi = mysqli_connect("localhost", "root", "", "tugas_php");

if (isset($_POST['username'])) {
    $username = $_POST["username"];
    $password = password_hash($_POST["password1"], PASSWORD_DEFAULT);

    if ($password) {
        $query = "INSERT INTO users VALUES('','$username','$password')";
        $result = mysqli_query($koneksi, $query); //jika gagal maka nilainya 0 dan jika berhasil nilainya 1
        $_SESSION["username"] = $username;
        if ($result == 1) {
            header("Location: todolist.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', serif;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('img/bg-register.jpg') no-repeat;
        }

        .wrapper {
            border: 1px solid rgba(255, 255, 255, .2);
            background: rgba(0, 0, 0, .1);
            backdrop-filter: blur(10px);
            width: 450px;
            border-radius: 20px;
            padding: 30px 40px;
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
        }

        .wrapper .input-box {
            width: 100%;
            height: 50px;
            margin: 10px 0 10px;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border-radius: 40px;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            font-size: 16px;
            color: white;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: white;
        }

        .wrapper .remember-forgot {
            display: flex;
            justify-content: space-between;
            margin: 20px 0 40px;
        }

        .wrapper .remember-forgot label {
            color: white;
            margin-left: 3px;
        }

        .wrapper .remember-forgot a {
            text-decoration: none;
            color: white;
        }

        .wrapper .remember-forgot label input {
            margin-right: 7px;
        }

        .wrapper .remember-forgot a:hover {
            text-decoration: underline;
        }

        .btn {
            cursor: pointer;
            color: black;
            font-weight: bold;
            background: white;
            border: none;
            border-radius: 40px;
            outline: none;
            width: 100%;
            height: 50px;
        }

        .btn:hover {
            box-shadow: 0 0 10px rgba(255, 255, 255, .4);
        }

        .wrapper .register-link {
            text-align: center;
            padding-top: 30px;
            padding-bottom: 10px;
            color: white;
        }

        .wrapper .register-link a {
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .wrapper .register-link a:hover {
            text-decoration: underline;
        }

        .wrapper h1 {
            color: white;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" required>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="password1" required>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Konfirmasi Password" name="password2" required>
            </div>


            <button type="submit" class="btn">Register</button>

            <div class="register-link">
                <p>Have an account? <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>
</body>

<script>

</script>

</html>