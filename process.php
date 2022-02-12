<?php
$mysqli= new mysqli('localhost', 'root','','crud') or die(mysqli_error($mysqli));

//save to database
    if (isset($_POST['save'])){ 

        $fname= $_POST['firstname'];
        $lname=$_POST['lastname'];
        $date=$_POST['dob'];

        $query = "INSERT into data (firstname,lastname,dob) VALUES ('$fname','$lname','$date')";
        $saved = $mysqli->query($query);
        header("Location: index.php");
        exit();
    }
//end save


