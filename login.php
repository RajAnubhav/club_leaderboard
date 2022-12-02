<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if($_SESSION){
    echo"
            <script>
                window.location='sample.php';
            </script>
        ";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("include/connection.php");
    $username = $_POST["username"];
    $email = $_POST["email"];
    $usn = $_POST["usn"];
    $dept = $_POST["dept"];
    $score = 0;
    $exists = true;
    
    // $search_query = "SELECT `username` FROM `leaderboard`";
    $search_query = "SELECT usn FROM leaderboard WHERE usn LIKE '$usn'";
    
    if($search_query==null){
        echo "<script>
            alert('User already exists');   
        </script>";
    }else {
        $sql_query = "INSERT INTO `leaderboard` (`username`, `email`, `usn`, `dept`, `score`) VALUES ('$username', '$email', '$usn', '$dept', '$score')";
        $result = mysqli_query($connect, $sql_query);
        $_SESSION['name']=$username; // setting the session for the user
        echo "
            <script>
                alert(`$username! Successfully registered for the event`);
                window.location='./sample.php';
            </script>
        ";
    } 
}


?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liquid Drop Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #eff0f4;
        }

        .container {
            position: relative;
            left: -80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container .drop {
            position: relative;
            width: 450px;
            height: 450px;
            box-shadow: inset 20px 20px 20px rgba(0, 0, 0, 0.05), 25px 35px 20px rgba(0, 0, 0, 0.05), 25px 30px 30px rgba(0, 0, 0, 0.05),
                inset -20px -20px 25px rgba(255, 255, 255, 0.9);
            transition: 0.5s;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 62% 38% 24% 76% / 59% 60% 40% 41%;
        }

        .container .drop:hover {
            border-radius: 50%;
        }

        .container .drop::before {
            content: '';
            position: absolute;
            /* top: 50px;
            left: 85px;
            width: 35px; */
            top: 52px;
            left: 125px;
            width: 38px;
            height: 35px;
            border-radius: 50%;
            background: #fff;
            opacity: 0.9;
        }

        .container .drop::after {
            content: '';
            position: absolute;
            top: 88px;
            left: 146px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: #fff;
            opacity: 0.9;
        }

        .container .drop .content {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            padding: 40px;
            gap: 15px;
        }

        .container .drop .content h2 {
            position: relative;
            color: #333;
            font-size: 1.5em;
        }

        .container .drop .content form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            justify-content: center;
            align-items: center;
        }

        .container .drop .content form .input-box {
            position: relative;
            width: 225px;
            box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.1),
                inset -2px -5px 10px rgba(255, 255, 255, 1), 15px 15px 10px rgba(0, 0, 0, 0.05), 15px 10px 15px rgba(0, 0, 0, 0.025);
            border-radius: 25px;
        }

        .container .drop .content form .input-box::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 65%;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 5px;
        }

        .container .drop .content form .input-box input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
            font-size: 1em;
            padding: 10px 15px;
        }

        .container .drop .content form .input-box input[type='submit'] {
            color: #fff;
            text-transform: uppercase;
            font-size: 1em;
            cursor: pointer;
            letter-spacing: 0.1em;
            font-weight: 500;
        }

        .container .drop .content form .input-box:last-child {
            width: 120px;
            background: #3a86ff;
            box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.1),
                15px 15px 10px rgba(0, 0, 0, 0.05), 15px 10px 15px rgba(0, 0, 0, 0.025);
            transition: 0.5s;
        }

        .container .drop .content form .input-box:last-child:hover {
            width: 150px;
        }

        .btn {
            position: absolute;
            right: -120px;
            bottom: 0;
            width: 120px;
            height: 120px;
            background: #00b4d8;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            line-height: 1.2em;
            letter-spacing: 0.1em;
            font-size: 0.8em;
            transition: 0.25s;
            text-align: center;
            box-shadow: inset 10px 10px 10px rgba(0, 180, 216, 0.05), 15px 25px 10px rgba(0, 180, 216, 0.1), 15px 20px 20px rgba(0, 180, 216, 0.1),
                inset -10px -10px 15px rgba(255, 255, 255, 0.5);
            border-radius: 44% 56% 65% 35% / 57% 58% 42% 43%;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 30px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #fff;
            opacity: 0.45;
        }

        .btn.signup {
            bottom: 150px;
            right: -140px;
            width: 80px;
            height: 80px;
            border-radius: 49% 51% 52% 48% / 63% 59% 41% 37%;
            background: #f77f00;
            box-shadow: inset 10px 10px 10px rgba(247, 127, 0, 0.05), 15px 25px 10px rgba(247, 127, 0, 0.1), 15px 20px 20px rgba(247, 127, 0, 0.1),
                inset -10px -10px 15px rgba(255, 255, 255, 0.5);

        }

        .btn.signup::before {
            left: 20px;
            width: 15px;
            height: 15px;
        }

        .btn:hover {
            border-radius: 50%;
        }

        .outer {
            background-color: #cacacadc;
            border-radius: 15px;
            padding: 100px 0px 100px 160px;
            box-shadow: inset 10px 10px 10px rgba(0, 180, 216, 0.05), 15px 25px 10px rgba(0, 180, 216, 0.1), 15px 20px 20px rgba(0, 180, 216, 0.1),
                inset -10px -10px 15px rgba(255, 255, 255, 0.5);
            border-radius: 44% 56% 65% 35% / 57% 58% 42% 43%;
        }
    </style>
</head>

<body style="background-color: rgba(206, 230, 255, 0.501);">

    <div class="outer">
        <div class="container">
            <div class="drop">
                <div class="content">
                    <h2 class='animate__heartBeat'>Log in</h2>
                    <form method="post" action="login.php">
                        <div class="input-box">
                            <input type="text" name="username" placeholder="Username" required='true'>
                        </div>
                        <div class="input-box">
                            <input type="email" name="email" placeholder="Email" required='true'>
                        </div>
                        <div class="input-box">
                            <input type="text" name="usn" placeholder="usn" required='true'>
                        </div>
                        <div class="input-box">
                            <input type="text" name="dept" placeholder="Department" required='true'>
                        </div>
                        <?php
                        echo '
                            <div class="input-box">
                                <input type="submit" value="Submit" href="">
                            </div>';
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>