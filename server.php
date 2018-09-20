<?php 

// call the open and read session save handlers (built-in save handler provided by default).
// creates a session or resumes the current one based on a session identifier passed via a GET or POST
// request, or passed via a cookie.
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', 'root', 'to_do_registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $confirmed_password = mysqli_real_escape_string($db, $_POST['confirmed_password']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password1)) { array_push($errors, "Password is required"); }
    if ($password1 != $confirmed_password) {
    array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
        array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = password_hash($confirmed_password, PASSWORD_BCRYPT);//encrypt the password before saving in the database
        $query = "INSERT INTO users (username, email, password) 
                    VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}
    
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $confirmed_password = mysqli_real_escape_string($db, $_POST['confirmed_password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($confirmed_password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = password_hash($confirmed_password, PASSWORD_BCRYPT);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>