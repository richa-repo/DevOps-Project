<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <script src="../js/password_validation.js" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Aleo|Slabo+27px" rel="stylesheet">
    <link rel="stylesheet" href="../css/pwd_validation.css">

</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='../registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required /><br>
        <input type="text" class="login-input" name="email" placeholder="Email Address"><br>
        <input type="password" id="password" class="login-input" name="password" placeholder="Password" onInput="check()"/>
        <input type="submit" name="submit" value="Register" class="login-button"><p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>

        <h2>Password Validation</h2>
        
        
       <br>
         <div id="set" >
        <div id="count">Length : 0</div>
        <i id="see" onclick="see()" class="far fa-eye"></i>
         </div>
           <div id="check0" style="margin-top:0.0002px">
                <i class="far fa-check-circle"></i>  <span> Length more than 5.</span>
           </div>
           <div id="check1" style="margin-top:.1em">
                <i class="far fa-check-circle"></i>  <span> Length less than 10.</span>
           </div>
           <div id="check2" style="margin-top:.1em">
                <i class="far fa-check-circle"></i>  <span> Contains numerical character.</span>
           </div>
           <div id="check3" style="margin-top:.2px">
                <i class="far fa-check-circle"></i>   <span>Contains special character.</span>
           </div>
           <div id="check4" style="margin-top:.2px">
                <i class="far fa-check-circle"></i>  <span>Shouldn't contain spaces.</span>
           </div>
</body>
</html>