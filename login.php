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
    <div class="pageWrap">
        <section id="signupForm">
            <form method="POST" action="login.php">
            <?php
                include('errors.php');
            ?>
                <fieldset>
                    <legend>Login</legend>
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="username" placeholder="Required" name="username" required>
                    </div>
                    <div>
                        <label for="confirmed_password">Password:</label>
                        <input type="password" id="confirmed_password" placeholder="Required" name="confirmed_password" required>
                    </div>
                    <button type="submit" name="login_user">Login</button>
                    <p>Not yet a user? <a href="register.php">Register</a></p>
                </fieldset>
            </form>
        </section>
        <article id="homeQuote">
            <blockquote cite=""><p>"Daily quote will go here"</p></blockquote>
            <cite>– Bob, Bobs Greatest Hits</cite>
        </article>
    </div>
    </main>
    <footer>
        <div class="pageWrap">
        <span>Bradley Murchison &copy;2018</span>
        </div>
    </footer>
</body>
</html>