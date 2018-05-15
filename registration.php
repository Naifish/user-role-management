<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-14
 * Time: 7:53 AM
 */

$firstName;$lastName;$email;$pass;$confPass;$street;$postal;$errors;$arrLength=0;

if (isset($_POST['btn-submit'])){
    $errors=array();

    if (empty($_POST['firstName'])){
        $errors[]="First Name is required";
    }elseif (!(preg_match('/^[A-Za-z]+$/',$_POST['firstName']))){
        $errors[]="Invalid first name: Only letters are accepted";
    }else{ $firstName=$_POST['firstName']; }

    if (empty($_POST['lastName'])){
        $errors[]="Last Name is required";
    }elseif (!(preg_match('/^[a-z \'-]+$/',$_POST['lastName']))){
        $errors[]="Invalid last name: Only letters, space, hyphen and apostrophe are accepted";
    }else{ $lastName=$_POST['lastName']; }

    if (empty($_POST['email'])){
        $errors[]="Email is required";
    }elseif (!(preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/',$_POST['email']))){
        $errors[]="Invalid email address: Valid email address is required";
    }else{ $email=$_POST['email']; }

    if (empty($_POST['pass'])){
        $errors[]="Password is required";
    }elseif (!(preg_match('/.{8,}/',$_POST['pass']))){
        $errors[]="Invalid password: Eight or more characters are required";
    }else{ $pass=$_POST['pass']; }

    if (empty($_POST['confPass'])){
        $errors[]="Confirmation password is required";
    }elseif ($_POST['pass']!=$_POST['confPass']){
        $errors[]="Invalid confirmation password: Passwords Don't Match";
    }else{ $confPass=$_POST['confPass']; }

    if (!empty($_POST['street']) && !(preg_match('/^\d+\s[A-z, \d]+$/',$_POST['street']))){
        $errors[]="Invalid street address: eg: 245 Harlington street Halifax, NS B3M 1RC, Canada";
    }else{ $street=$_POST['street']; }

    if (!empty($_POST['postal']) && !(preg_match('/^[A-z, \d]{3}\s[A-z, \d]{3}$/',$_POST['postal']))){
        $errors[]="Invalid postal code: Numbers and letters accepted only with one space. eg: XXX XXX";
    }else{ $postal=$_POST['postal']; }

    $arrLength=count($errors);

    if ($arrLength==0){
        //ecnrypt pass, login user and redirect...
    }

}

?>
<!DOCTYPE html>
    <?php require 'includes/head.php'?>
    <body>
        <div class="registration-main">
            <?php include 'includes/header.php'?>
            <section class="registration-form-sec">
                <h1>Sign Up</h1>
                <?php if ($arrLength>0) { ?>
                <section class="error-sec">
                    <h3>There was an error with your submission: </h3>
                    <ul>
                        <?php for ($i=0;$i<$arrLength;$i++){ ?>
                        <li><?php echo $errors[$i]; ?></li>
                        <?php } ?>
                    </ul>
                </section>
                <?php }?>
                <form action="#" method="post">
                    <span>First Name</span><br><input type="text" value="<?php if (isset($_POST['firstName'])){echo $_POST['firstName'];} ?>" name="firstName" placeholder="First Name" required pattern="^[A-Za-z]+$" title="Only letters accepted">
                    <span>Last Name</span><br><input type="text" value="<?php if (isset($_POST['lastName'])){echo $_POST['lastName'];} ?>" name="lastName" placeholder="Last Name" required required pattern="^[a-z '-]+$" title="Only letters, space, hyphen and apostrophe are accepted">
                    <!-- regex for email address is taken from https://www.w3schools.com/tags/att_input_pattern.asp -->
                    <span>Email</span><br><input type="email" value="<?php if (isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Valid email address is required">
                    <span>Password</span><br><input type="password" value="<?php if (isset($_POST['pass'])){echo $_POST['pass'];} ?>" id="pass" name="pass" placeholder="Password" required pattern=".{8,}" title="Eight or more characters are required">
                    <span>Confirm Password</span><br><input type="password" value="<?php if (isset($_POST['confPass'])){echo $_POST['confPass'];} ?>" id="conf-pass" name="confPass" placeholder="Confirm Password" required>
                    <span>Street Address</span><br><input type="text" value="<?php if (isset($_POST['street'])){echo $_POST['street'];} ?>" name="street" placeholder="Street Address" pattern="^\d+\s[A-z, \d]+" title=" eg: 245 Harlington street Halifax, NS B3M 1RC, Canada">
                    <span>Postal Code</span><br><input type="text" value="<?php if (isset($_POST['postal'])){echo $_POST['postal'];} ?>" name="postal" placeholder="Postal Code" pattern="^[A-z, \d]{3}\s[A-z, \d]{3}$" title="Numbers and letters accepted only with one space. eg: XXX XXX">
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


