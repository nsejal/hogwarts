    <?php
    $connect = mysqli_connect("localhost", "root", "", "hogwarts_regi");

    if ($connect) {
        echo "";
    } else {

        echo " error";
    }


    // adding details 
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gen'];
    $age = $_POST['age'];
    $password = $_POST['userpassword'];

    // preventing frpm sql injection
    $firstname = mysqli_real_escape_string($connect, $firstname);
    $lastname = mysqli_real_escape_string($connect, $lastname);
    $email = mysqli_real_escape_string($connect, $email);
    $gender = mysqli_real_escape_string($connect, $gender);
    $age = mysqli_real_escape_string($connect, $age);
    $password = mysqli_real_escape_string($connect, $password);

    // query
    $query = "SELECT * FROM register WHERE fname = '$firstname' && lname = '$lastname' && email = '$email' && gender = '$gender' && age ='$age' && pswrd = '$password'";

    $execute = mysqli_query($connect, $query);

    $check_row = mysqli_num_rows($execute);

    if ($check_row == 1) {
        echo  " Record is Present";
        echo "<script> 
            alert('ALREDY REGISTERD !');
            location.href='login.html';     
            </script>";
    } else {
        // inserting
        $insert = "INSERT INTO `register`(`fname`, `lname`, `email`, `gender`, `age`, `pswrd`) VALUES ('$firstname','$lastname','$email','$gender','$age','$password')";
        mysqli_query($connect, $insert);
        echo "<script> 
            alert('You are registered!');
            location.href='login.html'; 
            </script>";
    }

    ?>
