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
            <span>Email</span><br><input type="email" name="email" placeholder="Email" required>
            <span>Password</span><br><input type="password" name="password" placeholder="Password" required>
            <br><input type="submit" name="btn-login" value="Login"><p><a href="registration.php">Create Account</a> | <a href="#">Forgot Password</a> </p>
        </form>
    </section>
</div>
<?php include 'includes/footer.php'?>
</body>
</html>
