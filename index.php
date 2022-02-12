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
                        <tr>
                            <td scope="row">
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
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