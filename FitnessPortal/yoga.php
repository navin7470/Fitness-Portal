<!DOCTYPE html>
<html>
<head>
	<title>Yoga Department</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body onload="slider()">
<div class="banner" >
  <div class="slider" >
      <img src="images/Yoga2.jpg" id="slideImg">
  </div>
  <div class="overlay"> 
    <div id="navdiv">
    <nav class="navbar navbar-expand-lg bg-transparent" id="navbar">
  <div class="container-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link " aria-current="page" href="index.php"> <button class="btn">Home</button></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="#">
            <button class="btn">Our Team</button>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="#">
            <button class="btn">Gallery</button>
          </a>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
            <button class="btn">Department</button>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item " href="gym.php">Gym</a></li>
            <li><a class="dropdown-item " href="yoga.php">Yoga</a></li>
            <li><a class="dropdown-item " href="diet.php">Diet</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
</div>
    <div style="display: flex;margin: 4%;">
  	<div style="margin-right: 20%;">
  		<h2 style="color:white;">About YOGA STUDIO </h2>
	  	<p style="color:white;">
	  		We have a spacious indoor yoga studio with beautiful<br> flooring and a mirror wall for alignment self-checks.
	  		<br>
		Bolsters, blocks, and belts are used in some classes. Props are beneficial to improve balance,<br> flexibility, and to re-educate the mind. <br>Props are a useful tool to assist all practitioners since all bodies have <br>different points of joint compression and muscle tensile strength.
		<br><br>
		Props are also great for restorative yoga where poses are held for longer periods while the body relaxes.
	  	</p>
  	</div>
  	<div id="logo" style="margin-top:0%;">
        <img src="images/logo3.jpg" style="height: 233px; width: 250px; border-radius : 50%;">
    </div>
  </div>
  <br><br><br>
  <?php
  	echo '
  	<form style="text-align: center; color:white;" action="" method="post">
	    <input type = "radio" value = "fee" name = "query"> Show Fee Structure </input> 
	    <input type = "radio" value = "facility" name = "query"> Show Facilities </input> 
	    <br><br>
	    <input type = "submit" value = "submit" name = "submit"/> <br><br>
    </form>';
    if(isset($_POST['submit'])){
        $query = $_POST['query'];
        if($query == "fee"){
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
              $stmt = $conn->query("SELECT fee FROM FitnessPortal.Department where did = 2");
              $row=$stmt->fetch(PDO::FETCH_ASSOC);
              $fee =  $row['fee'];
              echo $fee;
              echo '<table border="1" id="table">',"\n";
            	echo "<tr> <th style='width:20%;'> SNo </th><th style='width:35%;'> Fee </th> <th style='width:45%;'>Month</th> </tr>";
            	$count=1;
               for($i=1; $i<=12;) {
                    echo "<tr> <td>";
                    echo $count;
                    echo "</td><td>";
                    $cuf = $fee*$i;
                    if($i == 3){
                    	$cuf -= 500;
                    }
                    else if ($i == 6) {
                    	$cuf -= 2000; 
                    }
                    else if ($i == 12) {
                    	$cuf -= 5000;
                    }
                    echo $cuf;
                    echo "</td><td>";
                    echo "$i-Months ";
                    echo "</td></tr>";
                    $count++;
                    if($i==1){
                    	$i =$i*3;
                    }else{
                    	$i = $i*2;
                    }
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
    	if($query == "facility"){
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
              $stmt = $conn->query("SELECT * FROM FitnessPortal.Facility where did = 2");
              
             
              echo '<table border="1" id="table">',"\n";
            	echo "<tr> <th style='width:20%;'> Fid </th><th style='width:35%;'> Facility </th> </tr>";
		        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		            echo "<tr> <td>";
		            echo $row['fid'];
		            echo "</td><td>";
		            echo $row['facility'];
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
    }
  ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>