<!DOCTYPE html>
<html>
<head>
	<title>Home Page php</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body onload="slider()">
<div class="banner" >
  <div class="slider" >
      <img src="images/Gym1.jpg" id="slideImg">
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
        <li class="nav-item active">
          <a class="nav-link " aria-current="page" href="registration.php"> <button class="btn btn2" id = "Registration">sign-up / sign-in</button></a>
        </li>

      </ul>
    </div>
  </div>
</nav>
</div>
    <div id="logo">
        <img src="images/logo3.jpg" style="height: 233px; width: 250px; border-radius : 50%;">
    </div>
    <div class="content">
            <h1 id="PortalName"> IIT-G FITNESS PORTAL</h1>
            <p class="describe">At IIT-G FITNESS PORTAL we understand what is important,<br> to you and your goals. as a member you’ll experience the journey with us where we <br>focus on community, fitness, diet,customer service and care.</p>
    </div>
  </div>
  <!-- Overlay khatam -->
  </div>
  <br>
  <div><h1 style="color: #999fff;">More About Us</h1> </div>
  <br><br>
  <div class="content2">
    
    <div>
        <h5>START YOUR Fitness JOURNEY with a 7-day trial.</h5>
        <p class="describe" style="padding: 20px;color:#04656f;">We want everybody to start their IIT-G Fitness journey with our 30-day trial.<br> It’s your chance to experience our approach to fitness and membership. Let us show you how we can train you in our group setting, you’ll get to know us and understand how we work before you make a longer commitment. <br><br>
        In your initial start up phase you will go through a full evaluation and a coaching session, this allows us to best place you into our training packages.<br><br>
        No commitment and a schedule to suit your life.</p>
    </div>
    <div>
        <h4 >Take Free Trial now<br><br></h4>

        <form style="text-align: center; font-size: 13px;" method="post">
          Enter Your Customer-ID <input type = "text" name = "cid" placeholder = "C01" required> </input> <br><br>
          Enter Your Email-ID : <input type = "email" name = "email" placeholder = "example@com" required>  </input> <br><br>
          Enter Your Password : <input type = "password" name = "password" required> </input> <br><br>
          Select Department : <select name="did" placeholder="Departments" required>
            <option value=1>Gym</option>
            <option value=2>Yoga</option>
            <option value=3>Diet</option>
          </select><br> <br>
          Select Joining Date : <input type = "Date" name="date" required>  </input> <br><br>
          <input type = "submit" value = "submit" class="formbtn" name="submit" />
          <input type = "reset" value = "reset" class="formbtn" name="reset" />
          <br><br>
        </form>
        <?php
          include ('connect.php');
          if(isset($_POST['submit'])){
             $cid = $_POST['cid'];
             $did = $_POST['did'];
             $date = $_POST['date'];
             $email = $_POST['email'];
             $password = $_POST['password'];
             // echo "$cid   $did   $email   $password";
              $sql = "SELECT * from FitnessPortal.Customer where Cid = :e";
              // $password = md5($_POST['pswd']);
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":e",$cid);
              $stmt->execute();
              //----------------------------------------
              if($stmt->rowCount() == 0){
                  echo '<p style = "color : red; font-size : 23%;"> You are not Registered yet ! <br> First Register Yourself </p>';
                  echo '<p style="color: black; margin-top: -2%; font-size:28%;">For Sign-Up
                        <a href="registration.php" class="sign">Click Here</a> </p>';
              }
              else {
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                $getting = $row['pswd'];
                $r_email = $row['Log_id'];
                // echo "$getting";
                if($getting == $password && $r_email == $email){
                    $sql = "SELECT * from FitnessPortal.Trial where cid = :e and did = '$did'";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":e",$cid);
                    $stmt->execute();
                    //----------------------------------------       
                    if($stmt->rowCount() > 0){
                      echo '<p style="color:red;font-size : 23%;"> Your have already taken trial membership for this department </p>';
                    }
                    else{
                      $query = "INSERT INTO FitnessPortal.Trial (did,start_date,cid) VALUES ('$did','$date','$cid')";
                      $stmt = $conn->prepare($query);
                      $stmt->execute();
                      echo "<p style='color: green;font-size : 23%;'>taken sucessfully</p>";
                    }
                }
                else{
                    echo '<p style = "color : red; font-size : 23%;"> email and password are not matching !!</p>';
                }
              }
              
          }
        ?>
    </div>
            
  </div>
</div>
<script >
var slideImg = document.getElementById("slideImg");

var image = [
    "images/Gym1.jpg","images/food1.jpg","images/Yoga1.jpg",
    "images/Gym2.jpg","images/food2.jpg","images/Yoga2.jpg",
    "images/Gym3.jpg","images/food3.jpg","images/Yoga3.jpg"
];
var len = image.length;
var i = 0;
function  slider(){
    if(i > len-1){
      i = 0;
    }
    slideImg.src = image[i];
    i++;
    setTimeout('slider()',4000);
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>