<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-14
 * Time: 10:43 AM
 */
?>

<!DOCTYPE html>
<?php require 'includes/head.php'?>
<body>
<div class="login-main">
    <?php include 'includes/header.php'?>
    <section class="login-form-sec">
        <h1>Sign In</h1>
        <form action="#" method="post">
            <!-- regex for email address is taken from https://www.w3schools.com/tags/att_input_pattern.asp -->
            <span>Email</span><br><input type="email" name="email" placeholder="Email" required required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Valid email address is required">
            <span>Password</span><br><input type="password" name="password" placeholder="Password" required required pattern=".{8,}" title="Eight or more characters are required">
            <br><input type="submit" name="btn-login" value="Login"><p><a href="registration.php">Create Account</a> | <a href="#">Forgot Password</a> </p>
        </form>
    </section>
</div>
<?php include 'includes/footer.php'?>
</body>
</html>
