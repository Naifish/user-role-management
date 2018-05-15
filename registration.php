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
                    <span>First Name</span><br><input type="text" name="firstName" placeholder="First Name" required pattern="^[A-Za-z]+$" title="Only letters accepted">
                    <span>Last Name</span><br><input type="text" name="lastName" placeholder="Last Name" required required pattern="^[a-z '-]+$" title="Only letters, space, hyphen and apostrophe are accepted ">
                    <!-- regex for email address is taken from https://www.w3schools.com/tags/att_input_pattern.asp -->
                    <span>Email</span><br><input type="email" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Valid email address is required">
                    <span>Password</span><br><input type="password" id="pass" name="pass" placeholder="Password" required pattern=".{8,}" title="Eight or more characters are required">
                    <span>Confirm Password</span><br><input type="password" id="conf-pass" name="conf-pass" placeholder="Confirm Password" required>
                    <span>Street Address</span><br><input type="text" name="street" placeholder="Street Address" pattern="^\d+\s[A-z, \d]+" title=" eg: 245 Harlington street Halifax, NS B3M 1RC, Canada">
                    <span>Postal Code</span><br><input type="text" name="postal" placeholder="Postal Code" pattern="^[A-z, \d]{3}\s[A-z, \d]{3}$" title="Numbers and letters accepted only with one space. eg: XXX XXX">
                    <br><input type="submit" name="btn-submit" value="Create my account">
                    <p>Already a member? <a href="login.php">Sign In</a> </p>
                </form>
            </section>
        </div>
        <?php include 'includes/footer.php'?>
        <!-- Reference: https://codepen.io/diegoleme/pen/surIK -->
        <script type="text/javascript">
            var pass = document.getElementById("pass")
                , confPass = document.getElementById("conf-pass");
            function matchPassword(){
                if(pass.value != confPass.value) {
                    confPass.setCustomValidity("Passwords Don't Match");
                } else {
                    confPass.setCustomValidity('');
                }
            }
            pass.onchange = matchPassword;
            confPass.onkeyup = matchPassword;
        </script>
    </body>
</html>


