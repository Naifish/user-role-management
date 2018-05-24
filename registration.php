<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-14
 * Time: 7:53 AM
 */

require 'classes/User.php';

session_start();
session_regenerate_id(true);
if(isset($_SESSION) && !empty($_SESSION['email'])){ header('location:welcome.php');}

$errors="";$arrLength=0;
require 'includes/connection.php';

if (isset($_POST['btn-submit'])){
    $errors=array();
    $user = new User();

    if (empty($_POST['firstName'])){
        $errors[]="First Name is required";
    }elseif (!(preg_match('/^[A-Za-z]+$/',$_POST['firstName']))){
        $errors[]="Invalid first name: Only letters are accepted";
    }else{ $user->_set('firstName',checkInput($_POST['firstName'])); }

    if (empty($_POST['lastName'])){
        $errors[]="Last Name is required";
    }elseif (!(preg_match('/^[A-Za-z \'-]+$/',$_POST['lastName']))){
        $errors[]="Invalid last name: Only letters, space, hyphen and apostrophe are accepted";
    }else{ $user->_set('lastName',checkInput($_POST['lastName'])); }

    if (empty($_POST['email'])){
        $errors[]="Email is required";
        /*regex for email address is taken from https://www.w3schools.com/tags/att_input_pattern.asp*/
    }elseif (!(preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/',$_POST['email']))){
        /* end of reference */
        $errors[]="Invalid email address: Valid email address is required";
    }else{ $user->_set('email',checkInput($_POST['email'])); }

    if (empty($_POST['pass'])){
        $errors[]="Password is required";
    }elseif (!(preg_match('/.{8,}/',$_POST['pass']))){
        $errors[]="Invalid password: Eight or more characters are required";
    }else{
        $options = [
            'cost' => 12,
        ];
        $user->_set('pass',password_hash(checkInput($_POST['pass']), PASSWORD_BCRYPT, $options));
    }

    if (empty($_POST['confPass'])){
        $errors[]="Confirmation password is required";
    }elseif ($_POST['pass']!=$_POST['confPass']){
        $errors[]="Invalid confirmation password: Passwords Don't Match";
    }else{ $user->_set('confPass',checkInput($_POST['confPass'])); }

    if (!empty($_POST['street']) && !(preg_match('/^\d+\s[A-z, \d]+$/',$_POST['street']))){
        $errors[]="Invalid street address: eg: 245 Harlington street Halifax, NS B3M 1RC, Canada";
    }else{ $user->_set('street',checkInput($_POST['street'])); }

    if (!empty($_POST['postal']) && !(preg_match('/^[A-z, \d]{3}\s[A-z, \d]{3}$/',$_POST['postal']))){
        $errors[]="Invalid postal code: Numbers and letters accepted only with one space. eg: XXX XXX";
    }else{ $user->_set('postal',checkInput($_POST['postal'])); }

    $arrLength=count($errors);

    if ($arrLength==0){
        $checkStatement;
        try {
            $connect = new PDO("mysql:host=$servername;dbname=playit", $username, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try{
                $checkStatement= $connect->prepare("SELECT * FROM users WHERE email= :email");
                $checkStatement->execute(array(
                    "email"=>$user->_get('email')
                ));
            }
            catch (Exception $ex){
                die("Error in execution of query:" .$ex);
            }


            if($checkStatement->rowCount()>0){
                $errors[]="User with same email address is already registered";
                $arrLength=count($errors);
            }
            else{
                try{
                    $prepStatement= $connect->prepare("INSERT INTO users (firstName,lastName,email,pass,street,postal) VALUES(:firstName,:lastName,:email,:pass,:street,:postal)");
                    $prepStatement->execute(array(
                        "firstName" => $user->_get('firstName'),
                        "lastName"=> $user->_get('lastName'),
                        "email"=> $user->_get('email'),
                        "pass"=> $user->_get('pass'),
                        "street"=> $user->_get('street'),
                        "postal"=> $user->_get('postal')
                    ));

                    /* Reference: https://www.youtube.com/watch?v=KnX0p2Ey3Ek */
                    session_set_cookie_params(time()+700,'/','localhost',false,true);
                    /* End Reference */

                    session_start();
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['email'] = $user->_get('email');

                    header('location:welcome.php');
                }
                catch (Exception $ex){
                    die("Error in execution of query:" .$ex);
                }
            }
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage()."<br>";
        }
    }

}


/* Reference: https://www.w3schools.com/php/php_form_validation.asp */
function checkInput($val) {
    $val = trim($val);
    $val = stripslashes($val);
    $val = htmlspecialchars($val);
    return $val;
}
/* End Reference */

?>
<!DOCTYPE html>
<html lang="en">
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
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <span>First Name</span><br><input type="text" value="<?php if (isset($_POST['firstName'])){echo htmlentities($_POST['firstName']);} ?>" name="firstName" placeholder="First Name" required pattern="^[A-Za-z]+$" title="Only letters accepted">
                    <span>Last Name</span><br><input type="text" value="<?php if (isset($_POST['lastName'])){echo htmlentities($_POST['lastName']);} ?>" name="lastName" placeholder="Last Name" required pattern="^[A-Za-z '-]+$" title="Only letters, space, hyphen and apostrophe are accepted">
                    <!-- regex for email address is taken from https://www.w3schools.com/tags/att_input_pattern.asp -->
                    <span>Email</span><br><input type="email" value="<?php if (isset($_POST['email'])){echo htmlentities($_POST['email']);} ?>" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Valid email address is required">
                    <!-- end of reference -->
                    <span>Password</span><br><input type="password" value="<?php if (isset($_POST['pass'])){echo htmlentities($_POST['pass']);} ?>" id="pass" name="pass" placeholder="Password" required pattern=".{8,}" title="Eight or more characters are required">
                    <span>Confirm Password</span><br><input type="password" value="<?php if (isset($_POST['confPass'])){echo htmlentities($_POST['confPass']);} ?>" id="conf-pass" name="confPass" placeholder="Confirm Password" required>
                    <span>Street Address</span><br><input type="text" value="<?php if (isset($_POST['street'])){echo htmlentities($_POST['street']);} ?>" name="street" placeholder="Street Address" pattern="^\d+\s[A-z, \d]+" title=" eg: 245 Harlington street Halifax, NS B3M 1RC, Canada">
                    <span>Postal Code</span><br><input type="text" value="<?php if (isset($_POST['postal'])){echo htmlentities($_POST['postal']);} ?>" name="postal" placeholder="Postal Code" pattern="^[A-z, \d]{3}\s[A-z, \d]{3}$" title="Numbers and letters accepted only with one space. eg: XXX XXX">
                    <br><input type="submit" name="btn-submit" value="Create my account">
                    <p>Already a member? <a href="login.php">Sign In</a> </p>
                </form>
            </section>
        </div>
        <?php include 'includes/footer.php'?>
        <!-- Reference: https://codepen.io/diegoleme/pen/surIK -->
        <script>
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
        <!-- end of reference -->
    </body>
</html>


