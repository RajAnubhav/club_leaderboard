<?php
 include('./include/connection.php');

session_start();
if (!$_SESSION['name']) {
    echo "
            <script>
                window.location='login.php';
            </script>
        ";
}
if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['score']) {
    $score = $_POST['score'];
    $username = $_SESSION['name'];
    $result = mysqli_query($connect, "UPDATE leaderboard SET score='$score' , status=1 WHERE username='$username' ");
   
    echo "
    <script>
        window.location='./sample.php';
    </script>
";

    exit;
    
}
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./resources_sark/main.css">
    
    <title>Leaderboard | SARK</title>
    <link rel="stylesheet" href="https://sitsark.in/assets/img/favicon.ico" type="image/x-icon">
    <style>
        /* footer */
        .footer_text {
            display: flex;
            justify-content: center;
            background-color: rgb(221, 133, 200);
            padding: 15px;
            box-shadow: 0px -5px 5px rgba(0, 0, 0, 0.629);
        }

        .quiz_btn {
            background-color: #d0e4f6;
            padding: 15px 20px 15px 20px;
            color: black;
            font-weight: 700;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-radius: 15px;
            border: 2px solid black;
        }

        .quiz_btn:hover {
            background-color: rgb(85, 135, 146);
            color: white;
            border: 2px solid white;
            transition-duration: 700ms;
        }

        /* end of footer */
    </style>
</head>

<body class="page-leaderboard">
    <div id="contain-all" class=" slideout-panel">
        <div class="navbar">
            <ul class="nav-1">
                <li><a href="index.php">Home</a></li>
                <li><a href="https://www.sitsark.in/index#about" target="_blank">About Team Sark</a></li>
                <li><a href="https://www.sitsark.in/our-alumni" target="_blank">Contacts</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <header class="header">
            <div class="header__navbar">
            </div>
        </header>
        <section class="hero hero--inverse">
        </section>
        <section class="leaderboard-progress">
            <div class="contain text-center">
                <img alt="Android Basics Leaderboard" class="mb-2"
                    src="https://d125fmws0bore1.cloudfront.net/assets/svgs/icon_trophy_leaderboard-3442a4b2312e6cdd02aa9870e636dc082890277a6267c4ed986a750fef7cbb35.svg">
                <h2>Sark Leaderboard</h2>
                <p class="lead">Welcome to the SARK team personalized leaderboard.
                    <br>
                    <a id="ga-6ef033" class="name" target="_blank" data-analytics-name="Link Clicked"
                        data-analytics-category="Nanodegree CTA" data-analytics-label="Nanodegree CTA - AND"
                        data-analytics-type="CTA" data-analytics-payload="{&quot;cta_type&quot;:&quot;link&quot;}"
                        data-target="_blank" href="https://github.com/RajAnubhav">Developed by Anubhav!
                    </a>
                    <br>
                    Here is the list of Students.
                </p>
            </div>
        </section>
        <section class="ranking">
            <div class="contain">
                <div class="ranking-table">
                    <div class="ranking-table-header-row">
                        <div class="ranking-table-header-data h6">Rank</div>
                        <div class="ranking-table-header-data h6">Name</div>
                        <div class="ranking-table-header-data h6">Score</div>
                    </div>
                    <?php

                    /* Connection Variable ("Servername",
                    "username","password","database") */


                    // reading the data from the xlsx file
                    // require_once "Classes/PHPExcel.php";
                    // $path = "./resources_sark/marks.xlsx";
                    // $reader = PHPExcel_IOFactory::createReaderForFile($path);
                    // $excel_obj = $reader->load($path);

                    // $worksheet=$excel_obj->getSheet('0');


                    /* Mysqli query to fetch rows
                    in descending order of marks */
                    $result = mysqli_query($connect, "SELECT username, score FROM leaderboard ORDER BY score DESC");

                    /* First rank will be 1 and
                    second be 2 and so on */
                    $ranking = 1;

                    /* Fetch Rows from the SQL query */
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($ranking == 1) {
                                echo "
                        <div class='ranking-table-row-leader-1'>
                            <div class='ranking-table-data-leader-1'>
                                <div class='medal-gold'></div>
                            </div>
                            <div class='ranking-table-data'>
                                {$row['username']}
                            </div>
                            <div class='ranking-table-data'>
                                {$row['score']}
                            </div>
                        </div>
                            "
                                    ;
                                $ranking++;
                            } else if ($ranking == 2) {
                                echo "
                            <div class='ranking-table-row-leader-2'>
                                <div class='ranking-table-data-leader-2'>
                                    <div class='medal-silver'></div>
                                </div>
                                <div class='ranking-table-data'>
                                    {$row['username']}
                                </div>
                                <div class='ranking-table-data'>
                                    {$row['score']}
                                </div>
                            </div>
                            ";
                                $ranking++;
                            } else if ($ranking == 3) {
                                echo "
                            <div class='ranking-table-row-leader-3'>
                                <div class='ranking-table-data-leader-3'>
                                    <div class='medal-bronze'></div>
                                </div>
                                <div class='ranking-table-data'>
                                    {$row['username']}
                                </div>
                                <div class='ranking-table-data'>
                                    {$row['score']}
                                </div>
                            </div>
                            ";
                                $ranking++;
                            } else {
                                echo "
                            <div class='ranking-table-body'>
                                <div class='ranking-table-row'>
                                    <div class='ranking-table-data'>
                                        {$ranking}
                                    </div>
                                    <div class='ranking-table-data'>
                                        {$row['username']}
                                    </div>
                                    <div class='ranking-table-data padding-4'>
                                        {$row['score']}
                                    </div>
                                </div>
                            </div>
                            ";
                                $ranking++;
                            }
                        }
                    }
                    echo "<br>";
                    ?>
                </div>

        </section>
    </div>
    <div class="footer_text" style="
    position: static;
    bottom: 0px;
    width: 100%;
">
        <a href="./quiz.php" style="text-decoration:none;">
            <button class="quiz_btn">Start quiz</button>
        </a>
    </div>

</body>

</html>