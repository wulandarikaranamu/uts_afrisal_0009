<?php
    session_start();
    include 'config.php';
    if (isset($_SESSION["login"])) {
        header("Location: pendaftaran/index.php");
        
        exit;
    }

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        // cek username
        $query = mysqli_query($config, "SELECT * FROM tblusers 
                            WHERE username = '$username'");
        if ( mysqli_num_rows($query) === 1) {
            // kalo username ada, cek password
            $row = mysqli_fetch_assoc($query);
            if (password_verify($password, $row["password"]) ) {
                // set session
                $_SESSION["login"] = true;
                $_SESSION["username"] = $row["username"];
                $_SESSION["id"] = $row["id"];
                header("Location: pendaftaran/index.php");
                exit;
            } 
        } else {
            echo "<script>
                alert('Username or password wrong!');
            </script>";
            // return false;
        }
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
    body {
        background: #76b852; /* fallback for old browsers */
        background: rgb(141,194,111);
        background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;      
    }

    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }
    
    .form button:hover,.form button:active,.form button:focus {
        background: #43A047;
    }


    </style>

</head>
<body>
    <div class="login-page">
        <div class="form">
            <p>Please login to explore</p>
            <form action="" method="post" class="login-form">
                <input type="text" id="username" name="username" placeholder="username"/>
                <input type="password" id="password" name="password" placeholder="password"/>
                <button type="submit" name="login">login</button>
            </form>
        </div>
    </div>

</body>
</html>
