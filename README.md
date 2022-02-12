# php-crud-app

php-crud-app - Operations using PHP, Bootstrap and MySQL
Step 1 – Create Database.
Step 2 – Create a New Table.
Step 3 - Create an HTML page with forms and table for retrieval of data
Step 4 – Create a js and CSS file.
Step 5 – Database Connection File (Provide valid credentials).
Step 6 – Add form data into database.
Step 7 – Update form data into database.
Step 8 – Retrieve and Display List.
Step 9 – Delete data into database.


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


#HTML (index.php) +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="files/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous">

    <title>Ainedembe Denis, PHP crud App!</title>

    <style>
        .body-bg{
            background-color: #e8eaeb!important;
        }
        .white-bg{
            background-color: #ffff!important;
        }
        .light-blue-bg{
            background-color: lightblue!important;
        }
    </style>
  </head>
  <body class="body-bg" >
    <?php 
        $mysqli= new mysqli('localhost', 'root','','crud') or die(mysqli_error($mysqli));
        $res = $mysqli->query("select * FROM data") or die(mysqli_error($mysqli->error));
    ?>
    <div>
        <br>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4 white-bg" >
            <h5>My PHP Crud Application</h5>
            <br>
            <span > Create New User </span>
        </div>
        <div class="col-md-4 light-blue-bg">
            Users List
        </div>
        <div class="col-md-2" ></div>
    </div>
    <div class="row" >
        <div class="col-md-2" ></div>
        <div class="col-md-3 white-bg">
            <form method="POST" action="process.php">
                <div class="form-group">
                <br>
                    <input type= "text" name ="firstname" class="form-control" placeholder= "first name"> 
                </div>
                <div class="form-group">
                    <br>
                    <input type= "text" name ="lastname" class="form-control" placeholder= "last name">
                </div>
                <div class="form-group">
                <br>
                    <input type="date" name ="dob" class="form-control datepicker" placeholder="date of birth">
                </div>
                <div class="form-group">
                <br>
                    <input type="submit" name="save" class="btn btn-primary" value="Save Data"> 
                </div>
            </form>
        </div>
        <div class="col-md-5 light-blue-bg">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = $res->fetch_assoc()): ?>
                        <tr>
                        <td scope="row">
                                <?php echo $user['id']; ?>
                            </td>
                            <td>
                                <?php echo $user['firstname']; ?>
                            </td>
                            <td>
                                <?php echo $user['lastname']; ?>
                            </td>
                            <td>
                                <?php echo $user['dob'];  ?>
                            </td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?php echo $user['id']; ?>"
                                  class="btn btn-sm btn-primary">Edit</button>  | 

                                <button data-toggle="modal" data-target="#delete<?php echo $user['id']; ?>"
                                  class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>

                        <!-- Edit User Modal ---> 
                        <div class="modal" tabindex="-1" role="dialog" id="edit<?php echo $user['id']; ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit: <u><?php echo $user['firstname']." ".$user['lastname']; ?></u></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="process.php">
                                    <div class="modal-body">
                                            <div class="form-group">
                                            <br>
                                                <input type= "text" name ="firstname" class="form-control" 
                                                value= "<?php echo $user['firstname']; ?>"> 
                                                <input type="hidden" name="id" value= "<?php echo $user['id']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <br>
                                                <input type= "text" name ="lastname" class="form-control" 
                                                value= "<?php echo $user['lastname']; ?>">
                                            </div>
                                            <div class="form-group">
                                            <br>
                                                <input type="date" name ="dob" class="form-control datepicker" 
                                                value="<?php echo $user['dob']; ?>">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-sm btn-primary" 
                                        name="edit" value="Save changes">
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- //End Edit User Modal ---> 

                        <!-- Delete user Modal ---> 
                        <div class="modal" tabindex="-1" role="dialog" id="delete<?php echo $user['id']; ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Deleting User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="process.php">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            You are about to Delete <u><?php echo $user['firstname']." ".$user['lastname']; ?></u> from the system!
                                            <br> Are you sure you want to perfom this Action?

                                            <input type="hidden" name="id" value= "<?php echo $user['id']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-sm btn-danger" 
                                        name="delete" value="Yes, Delete">
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- //End Delete User Modal --->

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>

    </div>


    <!-- Option  Bootstrap Bundle, bootstrap, jquery, with Popper -->
    <script src="files/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
     crossorigin="anonymous"></script>
    <script src="files/jquery.min.js"></script>
    <script src="files/popper.min.js"></script>
    <script src="files/bootstrap.min.js"></script>
  </body>
</html>

#HTML ends +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


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



