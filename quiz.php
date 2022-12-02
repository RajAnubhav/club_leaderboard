 <?php
 include './include/connection.php';

session_start();
if (!$_SESSION['name']) {
    echo "
            <script>
                window.location='login.php';
            </script>
        ";
      

}else{
    $username = $_SESSION['name'];
      
    $result = mysqli_query($connect, "SELECT * FROM leaderboard WHERE username='$username' and status=1");
    $status = mysqli_num_rows($result);
    if($status==1){
        echo "
        <script>
        alert('You have already filled the form');
        window.location='login.php';
        </script>
    ";
    exit;
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Feedback | SARK</title>
    <link rel="shortcut icon" href="https://sitsark.in/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resources_sark/style.css">
</head>
<body>
    <div class="quiz-container" id="quiz">
        <div class="quiz-header">
            <h2 id="question">Question Text</h2>
            <ul>
                <li>
                    <input type="radio" name="answer" id="a" class="answer">
                    <label for="a" id="a_text">Answer</label>
                </li>
                <li>
                    <input type="radio" name="answer" id="b" class="answer">
                    <label for="b" id="b_text">Answer</label>
                </li>
                <li>
                    <input type="radio" name="answer" id="c" class="answer">
                    <label for="c" id="c_text">Answer</label>
                </li>
                <li>
                    <input type="radio" name="answer" id="d" class="answer">
                    <label for="d" id="d_text">Answer</label>
                </li>
            </ul>
        </div>
        <button id="submit">Submit</button>
    </div>


    
    <script src="./resources_sark/script.js"></script>
</body>
</html>