<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-14
 * Time: 7:53 AM
 */
?>
<!DOCTYPE html>
    <?php require 'includes/head.php'?>
    <body>
        <div class="registration-main">
            <?php include 'includes/header.php'?>
            <section class="registration-form-sec">
                <h1>Sign Up</h1>
                <form action="#" method="post">
                    <span>First Name</span><br><input type="text" name="firstName" placeholder="First Name" required>
                    <span>Last Name</span><br><input type="text" name="lastName" placeholder="Last Name" required>
                    <span>Email</span><br><input type="email" name="email" placeholder="Email" required>
                    <span>Password</span><br><input type="password" name="password" placeholder="Password" required>
                    <span>Confirm Password</span><br><input type="password" name="confrm-password" placeholder="Confirm Password" required>
                    <span>Street Address</span><br><input type="text" name="street" placeholder="Street Address" required>
                    <span>Postal Code</span><br><input type="text" name="postal" placeholder="Postal Code" required>
                    <br><input type="submit" name="btn-submit" value="Create my account">
                    <p>Already a member? <a href="#">Sign In</a> </p>
                </form>
            </section>
        </div>
        <?php include 'includes/footer.php'?>
    </body>
</html>


