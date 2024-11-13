<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $confirm_email = $_POST['confirm_email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate that email and confirm email match
    if ($email != $confirm_email) {
        echo "<div class='error'>Emails do not match!</div>";
    } 
    // Validate that password and confirm password match
    elseif ($password != $confirm_password) {
        echo "<div class='error'>Passwords do not match!</div>";
    } 
    // Proceed with registration if both validations pass
    else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, first_name, last_name, email, password) 
                VALUES ('$username', '$first_name', '$last_name', '$email', '$hashed_password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='success'>Registration successful!</div>";
            sleep(1);
            header('Location: login.php');
        } else {
            echo "<div class='error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <link rel="icon" type="image/x-icon" href="images/Fungle_logo.png">
</head>
<body>
    <div class="register-container">
        <form action="register.php" method="POST" class="register-form">
            <h2>Register</h2>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="text" name="first_name" placeholder="First Name" required><br>
            <input type="text" name="last_name" placeholder="Last Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="email" name="confirm_email" placeholder="Confirm Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
            <button type="submit">Register</button>
            <div class="login-link">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </form>
    </div>

    <script>
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const email = document.querySelector('input[name="email"]').value;
            const confirmEmail = document.querySelector('input[name="confirm_email"]').value;
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

            if (email !== confirmEmail) {
                alert('Emails do not match!');
                e.preventDefault();
            } else if (password !== confirmPassword) {
                alert('Passwords do not match!');
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
