<?php
session_start();
$email="";
$username="";
$error=array();
    $con=mysqli_connect('localhost','root','','account');
    if ($con)
    {
        error_log("Connection succesful");
    }
    else
    {
        error_log("Connection failed");
    }

    // REGISTER CODE

    if (isset($_post['reg-user']))
    {
        $email=mysqli_real_escape_string($con, $_post['email']);
        $username=mysqli_real_escape_string($con, $_post['username']);
        $psw=mysqli_real_escape_string($con, $post['psw']);
        if (empty($email))
            {
                array_push($error, "Email is required");
            }
        if (empty($username))
            { 
                array_push($error, "Username is required");
            }
        if (empty($psw))
            {
                array_push($error, "Password is required");
            }
    }
    $user_check_query = "SELECT * FROM account WHERE email='$email' OR username='$username' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if($user)
    {
        if ($email['email']===$email)
        {
            array_push($error, "This email is already exist");
        }
        if (($user['username']=== $username))
        {
            array_push($error, "Username is already taken");
        }
    }
    if (count($error)==0) 
    {
        $password = md5($psw);//encrypt the password before saving in the database

        $query = "INSERT INTO account (email, username, password) VALUES('$email', '$username', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }

    //LOGIN CODE

    if (isset($_POST['login_user']))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        if (empty($email)) 
        {
            array_push($errors, "Email is required");
        }
        if (empty($password)) 
        {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) 
        {
            $password = md5($password);
            $query = "SELECT * FROM account WHERE email='$email' AND password='$password'";
            $results = mysqli_query($con, $query);
        if (mysqli_num_rows($results) == 1)
        {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }
        else
        {
            array_push($errors, "Wrong email or password");
        }
        }
    }
?>