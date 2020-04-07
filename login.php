<?php
$connect = mysqli_connect("localhost", "root", "", "hogwarts_regi");

if ($connect) {
    echo "";
} else {

    echo " error";
}

#variables
$email = $_POST['email'];
$password = $_POST['userpassword'];


#injection prevemtion
$email = mysqli_real_escape_string($connect, $email);
$password = mysqli_real_escape_string($connect, $password);

#query to check wether the nterd email & password a

$query_check = "SELECT * from  register WHERE email = '$email' && pswrd = '$password' "; # query checkin the email and pass from db

$result = mysqli_query($connect, $query_check);
$check = mysqli_num_rows($result); # this fetch the db and check if it contian the true msg else flase as per in  if loop


if ($check == 1) {
    //echo " sucessful Login";
    echo "<script> 
    alert('Login Sucessful !');
    location.href='hogwarts.html';     
    </script>";
} else {
    // echo " invalid email or password";
    echo "<script> 
    alert('Login Failed !');
    location.href='registration.html';     
    </script>";
}
