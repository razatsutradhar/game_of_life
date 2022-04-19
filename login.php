<?php
    // include(dirname(__DIR__).'/myBoard.php');
    // include(dirname(__DIR__).'/userlogin.php');
    $username = $_POST['uname'];
    $password = $_POST['pword1'];
    $txtFile = fopen('./users.txt','r');
    $allUsers = array();
    while ($line = fgets($txtFile)) {
        $entry = explode(",", $line);
        $allUsers[$entry[0]] = $entry[1];
    }
    fclose($txtFile);

    if(array_key_exists($username, $allUsers) && strcmp(trim($allUsers[$username]), trim($password)) == 0){
        session_start();
        if(!empty($_POST["remember"])) {
            setcookie ("remember",$_POST["uname"],time()+ 3600);
            setcookie ("username",$_POST["uname"],time()+ 3600);
            setcookie ("password",$_POST["pword1"],time()+ 3600);

        } else {
            setcookie("username","");
            setcookie("password","");
            setcookie ("remember","");

        }
        $_SESSION["user"] = $username;
        header("location: ./myboard.php");
    }else{
        header("location: ./userlogin.php?err=1");
    }
