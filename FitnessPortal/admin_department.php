<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_department.css">
    <title>Departments Page</title>
</head>
<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="adminpage.php">Admin Page</a></li>
            </ul>
            <ul>
                  <li><a href="login_admin.php">Log-out</a></li>
              </ul>
        </div>
        <div class="content">
            <h1>Welcome To Department Page !!</h1>
            <div>
                <form style="text-align: center" action="" method="post">
                <br><br><br>
                <h4>choose Operation</h4><br>
                <input type = "radio" value = "show" name = "query"> show Department list</input> 
                <input type = "radio" value = "add" name = "query"> add Department</input>
                <!-- <input type = "radio" value = "delete" name = "query"> delete </input>  -->
                <input type = "radio" value = "update" name = "query"> update Department fee </input> 
                <input type = "radio" value = "facility" name = "query"> Department Facility </input> 
                <br><br>
                <input type = "submit" value = "submit" name = "submit"/> <br><br>
                </form>
            </div>
            <!-- <h2 style="color:white;"> Player information </h2> -->
        </div>
        <?php
            if(isset($_POST['submit'])){
                $query = $_POST['query'];
                if($query == "show"){
                    //echo "showing";
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
                    try {
                      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      // set the PDO error mode to exception
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                      // begin the transaction
                      $conn->beginTransaction();
                      
                      //----------------------------------------
                      $stmt = $conn->query("SELECT Did,Dname,Fee FROM FitnessPortal.Department");
    
                        echo '<table border="1" id="table">',"\n";
                        echo "<tr> <th style='width:20%;'> Did </th><th style='width:35%;'> Dname </th> <th style='width:45%;'>Fee/Month</th> </tr>";
                        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr> <td>";
                            echo $row['Did'];
                            echo "</td><td>";
                            echo $row['Dname'];
                            echo "</td><td>";
                            echo $row['Fee'];
                            echo "</td></tr>";
                        }
                        echo    "</table>";
                        // commit the transaction
                        $conn->commit();
          
                    }
                    catch(PDOException $e) {
                      // roll back the transaction if something failed
                      $conn->rollback();
                      echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                }

                //-------------------------------------------------TO DELETE DATA-------------------------------------------------------

                if($query == "add"){
                    
                    header("Location: http://localhost/ak/FitnessPortal/add_department.php");
                }
                if($query == "delete"){
                    
                    header("Location: http://localhost/ak/FitnessPortal/delete_department.php");
                }
                if($query == "update"){
                    
                    header("Location: http://localhost/ak/FitnessPortal/update_department.php");
                }
                if($query == "facility"){
                    
                    header("Location: http://localhost/ak/FitnessPortal/add_facility.php");
                }

            }

        ?>

    </div>
</body>
</html>
