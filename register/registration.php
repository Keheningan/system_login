<?php
if(isset($_POST['save'])){
    include "../connect.php";

    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $nrp = $_POST['nrp'];
    $name = $_POST['name'];
    $no_telp = $_POST['no_telp'];
    $email_work = $_POST['email_work'];
    $github = $_POST['github'];
    $trello = $_POST['trello'];

    $query = mysqli_query($connect, "select * from 21_d4_it_a where email = '$email'");
    $cek = mysqli_num_rows($query);

    if($cek > 0){
        echo "<script>alert('Email already registered');</script>";
        echo "<script>location.href='sign_up.php';</script>";
    }else{
        if($password == $cpassword){
            $password = md5($password);
            $query = mysqli_query($connect, "insert into log set email = '$email'");
            $query = mysqli_query($connect, "insert into 21_d4_it_a set
            nrp = '$nrp',
            name = '$name',
            email = '$email', 
            password = '$password', 
            no_telp = '$no_telp', 
            email_work = '$email_work', 
            github = '$github', 
            trello = '$trello'") or die(mysqli_error($connect));
            echo "<script>alert('Registration Success');</script>";
            echo "<script>location.href='../login/sign_in.php';</script>";
        }else{
            echo "<script>alert('Password not match');</script>";
            echo "<script>location.href='sign_up.php';</script>";
        }
    }
}
?>