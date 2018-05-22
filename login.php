<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-14
 * Time: 10:43 AM
 */

session_start();
session_regenerate_id(true);
if(isset($_SESSION) && !empty($_SESSION['email'])){ header('location:welcome.php');}

$email;$pass;$errors;$arrLength=0;
require 'includes/connection.php';

if (isset($_POST['btn-login'])){
    $errors=array();

   if (empty($_POST['email'])){
        $errors[]="Email is required";
    }elseif (!(preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/',$_POST['email']))){
        $errors[]="Invalid email address: Valid email address is required";
    }else{ $email=checkInput($_POST['email']); }

    if (empty($_POST['pass'])){
        $errors[]="Password is required";
    }elseif (!(preg_match('/.{8,}/',$_POST['pass']))){
        $errors[]="Invalid password: Eight or more characters are required";
    }else{ $pass=checkInput($_POST['pass']); }

    $arrLength=count($errors);

    if ($arrLength==0){
        $checkStatement;
        try {
            $connect = new PDO("mysql:host=$servername;dbname=playit", $username, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try{
                $checkStatement= $connect->prepare("SELECT * FROM users WHERE email=:email");
                $checkStatement->execute(array(
                    "email"=>$email
                ));

                $result = $checkStatement->fetch(PDO::FETCH_ASSOC);
                if(password_verify($pass, $result['pass'])) {

                    /* Reference: https://www.youtube.com/watch?v=KnX0p2Ey3Ek */
                    session_set_cookie_params(time()+700,'/','localhost',false,true);
                    /* End Reference */

                    session_start();
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['email'] = $email;

                    header('location:welcome.php');
                }else{
                    $errors[]="Email address or password is incorrect";
                    $arrLength=count($errors);
                }
            }
            catch (Exception $ex){
                die("Error in execution of query:" .$ex);
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
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
