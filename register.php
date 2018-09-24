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
            <form action="register.php" method="POST">
            <?php
                include('errors.php');
            ?>
                <fieldset>
                    <legend>Register</legend>
                    <div>
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" placeholder="Required" name="first_name" value="<?php echo $first_name; ?>">
                    </div>
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="username" placeholder="Required" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div>
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" placeholder="Required" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div>
                        <label for="password1">Password:</label>
                        <input type="password" id="password1" placeholder="Required" name="password1">
                    </div>
                    <div>
                        <label for="confirmed_password">Confirm Password:</label>
                        <input type="password" id="confirmed_password" placeholder="Required" name="confirmed_password">
                    </div>
                    <button type="submit" name="reg_user">Register</button>
                    <p>Already a user? <a href="login.php">Login</a></p>
                </fieldset>
            </form>
        </div>
        <div class="flex-center">
            <article id="homeQuote">
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