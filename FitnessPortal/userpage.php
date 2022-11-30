<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_style.css">
    <title>User Page</title>
</head>
<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <ul>
                <li><a href="login_user.php">Log-out</a></li>
            </ul>
        </div>
        <div class="content">
            <?php
              include 'connect.php';
              session_start();

              $mail = $_SESSION['email'];
              $sql = "SELECT * from FitnessPortal.Customer where Log_id = :e";
              // $password = md5($_POST['password']);
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":e",$mail);
              $stmt->execute();
              //----------------------------------------
              $row=$stmt->fetch(PDO::FETCH_ASSOC);
              $Fname = $row['Fname'];   
              $cid = $row['Cid'];
              echo "<h1 style='margin-top:-8%; font-size: 243%'>Welcome  $Fname !!</h1>";
              
            ?>
            <br><br>
            <div>
                <div style="display: flex; margin-left:37%;">
                    <div style="padding-right: 8%;">
                        <form method="post">
                            <input type = "submit" value = "My membership" name = "submit" />
                        </form>
                    </div>
                    <div>
                        <h3> New Membership </h3>
                        <form method="post">
                            <input type="date" name="date" placeholder="joining date" required/><br>
                            <select name="did" placeholder="Departments">
                              <option value=1>Gym</option>
                              <option value=2>Yoga</option>
                              <option value=3>Diet</option>
                            </select><br> <br>
                            <input type = "submit" value = "Take membership" name = "submit2" />
                       </form>
                    </div>
                </div>
                
                
                
            </div>
        </div>
        <?php
          include 'connect.php';
          if(isset($_POST['submit'])){
              $mail = $_SESSION['email'];
              $password = $_SESSION['password'];
              //session_start()
              //--------------------------------------
              echo "  $cid      ";
              $sql = "SELECT * from FitnessPortal.Trial where cid = :e";
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":e",$cid);
              $stmt->execute();
              //----------------------------------------
                echo '<table border="1" id="table" style="margin-top: 27%">',"\n";
                echo "<tr> <th style='width:10%;'> Did </th> <th style='width:10%;'>JOIN date</th><th style='width:10%;'> Cid </th> </tr>";
                while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr> <td style='padding-left: 0%;'>";
                    echo $row['did'];
                    echo "</td><td style='padding-left: 0%;'>";
                    echo $row['start_date'];
                    echo "</td><td style='padding-left: 0%;'>";
                    echo $row['cid'];
                    echo "</td></tr>";
                }
                echo    "</table>";              
          }
          if(isset($_POST['submit2'])){
              $mail = $_SESSION['email'];
              $did = $_POST['did'];
              $date = $_POST['date'];
              //--------------------------------------------
              


              //---------------------------------------------

              $sql = "SELECT * from FitnessPortal.Trial where cid = :e and did = '$did'";
              // $password = md5($_POST['password']);
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":e",$cid);
              $stmt->execute();
              //----------------------------------------       
              if($stmt->rowCount() > 0){
                echo '<p style="color:red;"> Your have already taken trial membership for this department </p>';
              }
              else{
                $query = "INSERT INTO FitnessPortal.Trial (did,start_date,cid) VALUES ('$did','$date','$cid')";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                echo "<p style='color: green;'>taken sucessfully</p>";
              }
          }        
        ?>
    </div>
    
</body>
</html>