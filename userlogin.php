<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="./style.css", rel="stylesheet">

</head>

<body>
    <?php
        // include(dirname(__DIR__).'/login.php');
        // include(dirname(__DIR__).'/register.php');
        $errors = array (
            1 => "Incorrect Username/Password",
            2 => "Username Taken",
            3 => "Passwords do not match"
        );
        $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
        if ($error_id != 0 && array_key_exists($error_id, $errors)) {
            echo $errors[$error_id];
        }
    ?>
    <h1 class="center2">Conway's Game of Life</h1>
    <div class="landing">
        <div class="login">
            <h1>Login</h1>
            <form action="./login.php" method="post">
                <label for="uname">Username:</label><br>
                <input type="text" id="uname" name="uname" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><br><br>
                <label for="pword1">Password:</label><br>
                <input type="password" id="pword1" name="pword1" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><br><br>
                <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["remember"])) { echo "checked"; } ?>/>
                <label for="remember">Remember Me</label><br><br>

                <input type="submit" value="Submit" name="login">
            </form>
            <br>
            <hr class="divider">
            <h1>Create An Account</h1>
            <form action="./register.php" method="post">
                <label for="uname">Username:</label><br>
                <input type="text" id="uname" name="uname" value=""><br><br>
                <label for="pword1">Password:</label><br>
                <input type="password" id="pword1" name="pword1" value=""><br><br>
                <label for="pword2">Confirm Password:</label><br>
                <input type="password" id="pword2" name="pword2" value=""><br><br>
                <input type="checkbox" name="remember" id="remember"/>
                <label for="remember">Remember Me</label><br><br>
                <input type="submit" value="Submit" name="login">
            </form>
            <br>
        </div>
    </div>
    


</body>

</html>