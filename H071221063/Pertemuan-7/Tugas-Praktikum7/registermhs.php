<?php

require_once('config/helper.php');
require_once('config/connection.php');

$process = isset($_GET['process']) ? ($_GET['process']) : false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mahasiswa</title>
    <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/style.css' ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,00;0,900;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
<img src="https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" >

    <div class="content">
        <div class="card-login">
            <div class="card-main">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <?php if ($process == 'failedempty'): ?>
                        <div class="alert alert-danger"
                            style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                            Register gagal, terdapat form yang kosong
                        </div>
                    <?php endif; ?>
                    <?php if ($process == 'failedusername'): ?>
                        <div class="alert alert-danger"
                            style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                            Register gagal, username sudah terdaftar di database
                        </div>
                    <?php endif; ?>
                    <?php if ($process == 'failedpassword'): ?>
                        <div class="alert alert-danger"
                            style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                            Register gagal, password tidak sesuai
                        </div>
                    <?php endif; ?>
                    <form class="form-login" method="POST" action="<?= BASE_URL . 'controller/regmhs.php' ?>">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="namalengkap" class="form-input">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-input">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-input">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-input">
                        <label class="form-label">Re-Password</label>
                        <input type="password" name="repassword" class="form-input">
                        <button type="submit" class="btn btn-login">Register</button>
                    </form>
                    <p style="text-align: center;">Sudah punya akun?<span><a href="<?= BASE_URL . "login.php" ?>"
                                class=""> Masuk disini</a></span></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>