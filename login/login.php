<?php
include "../session.php";
include "../connect.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $query = mysqli_query($connect, "select * from 21_d4_it_a where email = '$email' and password = '$password'");
    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['email'] = $email;
        //Membuaat session dari semua isi tabel di database
        $query = mysqli_query($connect, "select * from 21_d4_it_a where email = '$email'");
        $data = mysqli_fetch_array($query);
        $_SESSION['name'] = $data['name'];
        $_SESSION['nrp'] = $data['nrp'];
        $_SESSION['no_telp'] = $data['no_telp'];
        $_SESSION['email_work'] = $data['email_work'];
        $_SESSION['github'] = $data['github'];
        $_SESSION['trello'] = $data['trello'];
        $_SESSION['file'] = $data['file'];

        echo "<script>alert('Login Success');</script>";
        echo "<script>location.href='../home/home.php';</script>";
    }
    else{
        echo "<script>alert('Login Failed');</script>";
        echo "<script>location.href='form_login.php';</script>";
    }
}
?>