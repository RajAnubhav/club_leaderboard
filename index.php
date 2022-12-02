<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminar | SARK</title>
    <link rel="shortcut icon" href="https://sitsark.in/assets/img/favicon.ico" type="image/x-icon">

    <style>
        /* common */
        .common {
            display: flex;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            gap: 100px;
            margin: 100px 100px 100px 100px;
            border: 3px dashed black;
            border-radius: 10px;

            box-shadow: 5px 2px 4px rgb(115, 111, 111);
        }

        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        img {
            border-radius: 15px;
        }

        .container {
            background-color: rgb(208, 228, 246);
            padding: 0px 0px 10px 0px;
        }

        /* CSS Section for navbar */
        .nav {
            margin: 0px;
            position: sticky;
            top: 0px;
            padding: 15px;
            background-color: rgb(221, 133, 200);
            display: flex;
            justify-content: center;
            box-shadow: 5px 2px 4px rgb(115, 111, 111);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        a {
            text-decoration: none;
            color: white;
            margin: 15px;
            font-size: 20px;
            font-weight: 600;
        }

        a:hover {
            color: black;
            transition-duration: 1s;
            border-bottom: solid black 3px;
        }

        /* for hero */
        .top_notify{
            text-align: center;
            padding: 20px 0px 0px 0px;
        }

        .hero {
            display: flex;
            justify-content: center;
            padding: 100px;
            gap: 100px;
            margin: 100px 100px 100px 100px;
            background-color: wheat;
            color: rgb(52, 46, 46);
        }

        #button {
            margin: 250px 0px 0px 100px;
            padding: 15px 30px 15px 30px;
            border-radius: 25px;
            font-weight: 500;
            font-size: 18px;
            background-color: black;
            border: 2px solid black;
        }

        #button:hover {
            background-color: rgb(37, 96, 114);
            color: white;
            border: 2px solid white;
        }

        /* about us page */
        .about {
            display: grid;
            text-align: center;
            padding: 50px 100px 100px 100px;
            background-color: #e5a2bab0;
            font-size: 20px;
        }

        .top {
            font-size: 35px;
            font-weight: 700;
        }

        .bottom {
            display: flex;
            gap: 50px;
        }

        .left {
            padding-left: 100px;
        }

        /* contacts section */
        .contacts {
            padding: 100px;
            background-color: rgb(203, 241, 170);
        }

        .form {
            margin-top: 35px;
            background: #9464c4;
            border-radius: 15px;
            padding: 20px;
            border: 2px dashed black;
        }

        .box {
            padding: 5px;
            font-size: 25px;
        }

        input {
            width: 250px;
            border-radius: 10px;
            padding-left: 10px;
            height: 30px;
        }

        .btn {
            margin-left: 6px;
            background-color: antiquewhite;
            transition-duration: 2s;
        }

        .btn:hover {
            background-color: rgb(63, 121, 172);
            transition-duration: 2s;
            color: white;
            border: white 2px solid;
        }

        
    </style>
</head>

<body>
    <div class="container">
        <!-- navbar section -->
        <div class="nav" id="nav">
            <table>
                <th>
                    <td><a href="#">Home</a></td>
                    <td><a href="#about">About Us</a></td>
                    <td><a href="#contacts">Contacts</a></td>
                    <td><a href="./login.php">Sign in</a></td>
                </th>
            </table>
        </div>


        <!-- After the navbar, Welcome freshers!! -->
        <div class="top_notify">
            <h1>Welcome to the seminar!</h1>
        </div>

        <!-- hero section -->
        <div class="hero common" style="margin: 25px 100px 100px 100px;" id="hero_copy">
            <div class="left">
                <h1>
                    Hello guys! My name is Anubhav.
                </h1>
                <br>
                <h1 style="padding-left: 30px;margin: -19px 0px 36px 15px;">
                    Stay hungry, stay foolish
                </h1>
                <br>
                <a href="#about" id="button">Get Started</a>
            </div>
            <div class="right">
                <img src="./resouces/hero.png" alt="image">
            </div>
        </div>

        <!-- about section -->
        <div id="about" style="padding-bottom: 2px;"></div>
        <div class="about common">
            <div class="top">About Us</div>
            <div class="bottom">
                <div class="left">
                    <img src="./resouces/about.png" alt="image">
                </div>
                <div class="right">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam facere commodi
                    tenetur, officiis voluptas vitae impedit delectus nobis ad quod! Consequuntur id cum architecto
                    recusandae
                    voluptates itaque excepturi. Aperiam ipsa harum perferendis pariatur magnam et?
                    <br>
                    <br>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo nisi sapiente, aut quod maxime
                    unde similique mollitia blanditiis commodi dolore, culpa dicta omnis vero provident?
                </div>
            </div>
        </div>

        <!-- contacts -->
        <div id="contacts">
            <br>
        </div>
        <div class="contacts common">
            <div class="form">
                <form action="" class="form" method="sample.txt">
                    <div class="box">
                        <input type="text" placeholder="Name">
                    </div>
                    <div class="box">
                        <input type="text" placeholder="Contact Number">
                    </div>
                    <div class="box">
                        <input type="submit" class="btn" placeholder="Submit">
                    </div>
                </form>
            </div>
            <div class="left">
                <h1>Contact Me</h1>
                <img src="./resouces/contact.png" alt="">
            </div>
        </div>
        
    </div>
    
</body>

</html>