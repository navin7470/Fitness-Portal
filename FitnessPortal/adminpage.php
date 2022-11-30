<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_style.css">
    <title>Admin Page</title>
</head>
<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <ul>
                <li><a href="login_admin.php">Log-out</a></li>

                <!-- <li>
                    <form method="post" action="">
                        <input type="submit" name="submit" value="log-out" style="background-color: transparent; color: yellow;">
                    </form>
                </li> -->
                <?php
                    if(isset($_POST['submit'])){
                        session_destroy();
                        header("Location: http://localhost/Navin212123033/FitnessPortal/login_admin.php");
                    }
                    
                ?>
                
                
            </ul>
        </div>
        <div class="content">
            <h1>Welcome Admin !!</h1>
            <div>
                <a href = "admin_department.php"> <button type="button"><span></span>Department</button> </a>
                <a href="admin_staff.php"> <button type="button"> <span></span>Staff</button> </a>
            </div>
        </div>
    </div>

</body>
</html>