<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Keep Calm and List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="scss/base/normalize.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>
<body>
    <header>
    <div class="pageWrap">
        <nav>
            <span>LOGO</span>
            <ul>
                <li><a href="">Contact Us</a></li>
                <li><a href="">Login</a></li>
            </ul>
        </nav>
    </div>
    </header>
    <main>
    <div class="pageWrap flex-center">
        <div class="flex-center signupForm">
            <form method="POST" action="login.php">
                <?php
                    include('errors.php');
                ?>
                <fieldset>
                    <legend>Login</legend>
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="username" placeholder="Required" name="username">
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" id="password" placeholder="Required" name="password">
                    </div>
                    <button type="submit" name="login_user">Login</button>
                    <p>Not yet a user? <a href="register.php">Register</a></p>
                </fieldset>
            </form>
        </div>
        <div class="flex-center">
            <article class="blockQuote">
                <blockquote cite=""><p>"Daily quote will go here"</p></blockquote>
                <cite>– Bob, Bobs Greatest Hits</cite>
            </article>
        </div>
    </div>
    </main>
    <footer>
        <div class="pageWrap">
            <span>&copy;2018</span>
        </div>
    </footer>
</body>
</html>