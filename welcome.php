<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-14
 * Time: 11:34 AM
 */

session_start();

if (isset($_GET['logout']) && $_GET['logout']==true){
    unset($_SESSION["email"]);
    session_destroy();
}

if(!isset($_SESSION) || empty($_SESSION['email'])){
    header('location:index.php');
}

?>
<!DOCTYPE html>
<?php require 'includes/head.php'?>
<body>
<div class="welcome-main">
    <?php include 'includes/header.php'?>
    <section class="welcome-sec">
        <h1>Hello User(User Name)</h1>
        <h1>Welcome Back :)</h1>
    </section>
</div>
<?php include 'includes/footer.php'?>
</body>
</html>
