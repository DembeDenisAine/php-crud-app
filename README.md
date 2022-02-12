# php-crud-app

php-crud-app - Operations using PHP, Bootstrap and MySQL
Step 1 – Create Database.
Step 2 – Create a New Table.
Step 3 - Create an HTML page with forms and table for retrieval of data
Step 4 – Create a js and CSS file.
Step 5 – Database Connection File (Provide valid credentials).
Step 6 – Add form data into database.
Step 7 – Retrieve and Display List.
Step 8 – Update form data into database.
Step 9 – Delete data from the database.


#DATABASE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `data` (`id`, `firstname`, `lastname`, `dob`) VALUES
(2, 'gwendo', 'jonah', '1996-02-12'),
(3, 'tare', 'benja', '1996-02-12'),
(4, 'nendala', 'elly', '2022-02-01'),
(6, 'brian', 'kagwa', '2022-02-10'),
(7, 'mutger', 'ellyd', '2022-02-03');

ALTER TABLE `data` ADD PRIMARY KEY (`id`);
  
ALTER TABLE `data` 
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;



#DB PROCESSING (process.php) +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

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

//edit a record in the database
if (isset($_POST['edit'])){

    $fname= $_POST['firstname'];
    $lname=$_POST['lastname'];
    $date=$_POST['dob'];
    $id=$_POST['id'];

    $query = "UPDATE data SET firstname='$fname', lastname='$lname',dob='$date' WHERE id='$id'";
    $saved = $mysqli->query($query);
    header("Location: index.php");
    exit();
}
//end edit


//delete a record from the database table
if (isset($_POST['delete'])){

    $id=$_POST['id'];

    $query = "DELETE FROM data WHERE id='$id'";
    $saved = $mysqli->query($query);
    header("Location: index.php");
    exit();
}
//end delete



