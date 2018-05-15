<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-14
 * Time: 10:43 AM
 */

$email;$pass;$errors;$arrLength=0;

if (isset($_POST['btn-login'])){
    $errors=array();

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

    $arrLength=count($errors);

    if ($arrLength==0){
        //Check for user acc, login user and redirect...
    }

}

?>

<!DOCTYPE html>
<?php require 'includes/head.php'?>
<body>
<div class="login-main">
    <?php include 'includes/header.php'?>
    <section class="login-form-sec">
        <h1>Sign In</h1>
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
            <!-- regex for email address is taken from https://www.w3schools.com/tags/att_input_pattern.asp -->
            <span>Email</span><br><input type="email" name="email" placeholder="Email" required required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Valid email address is required">
            <span>Password</span><br><input type="password" name="pass" placeholder="Password" required required pattern=".{8,}" title="Eight or more characters are required">
            <br><input type="submit" name="btn-login" value="Login"><p><a href="registration.php">Create Account</a> | <a href="#">Forgot Password</a> </p>
        </form>
    </section>
</div>
<?php include 'includes/footer.php'?>
</body>
</html>
