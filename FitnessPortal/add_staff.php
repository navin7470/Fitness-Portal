<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_department.css">
    <title>Adding Staff</title>
</head>
<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="adminpage.php">Admin Page</a></li>
                <li><a href="admin_staff.php">Staff Page</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>Enter Following Information for Adding staff!!</h2>
            <div>
                <form style="text-align: center" action="" method="post">
                  <br>
                Enter Staff id : <input type = "text" name = "sid" placeholder="SF01"required></input> <br>
                Enter First name : <input type = "text" name = "fname" placeholder="first name" required></input> <br>
                Enter Last name : <input type = "text" name = "lname" placeholder="last name" required></input> <br>
                Gender : <select name="gender" placeholder="cars">
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                </select><br>
                Enter Staff salary : <input type = "text" name = "salary" placeholder="000000" required></input> <br>
                Enter Mobile no : <input type="text" name="mob" placeholder="contact number" required="required"> <br>
                Enter Department : <select name="did" placeholder="cars">
                  <option value=1>Gym</option>
                  <option value=2>Yoga</option>
                  <option value=3>Diet</option>
                </select><br> <br>
                <input type = "submit" value = "add staff" name = "submit"/>
                <input type = "reset" value = "reset" name = "reset"/> 
            </div>
            <!-- <h2 style="color:white;"> Player information </h2> -->
        </div>
        <?php
          class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
              parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
              return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
            }

            function beginChildren() {
              echo "<tr>";
            }

            function endChildren() {
              echo "</tr>" . "\n";
            }
          } 
          // echo "<h1>$email</h1>";

          $servername = "localhost";
          $port_no = 3306; // Port number for Windows 
          $username = "ayush";
          $password = "kumar";
          $dbname = "FitnessPortal";
          if(isset($_POST['submit'])){
            $sid = $_POST['sid'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $salary = $_POST['salary'];
            $mob = $_POST['mob'];
            $did = $_POST['did'];
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // begin the transaction
              $conn->beginTransaction();
              $str =  "INSERT INTO FitnessPortal.Staff  VALUES ('$sid','$fname','$lname','$gender','$salary','$mob','$did')";
              $conn->exec($str);
              
              // commit the transaction
              $conn->commit();
              echo "</br> </br> Added successfully";
            }
            catch(PDOException $e) {
              // roll back the transaction if something failed
              $conn->rollback();
              echo "Error: " . $e->getMessage();
            }

            $conn = null;

          }

        ?>

    </div>
</body>
</html>
