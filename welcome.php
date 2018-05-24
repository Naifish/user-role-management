<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-14
 * Time: 11:34 AM
 */


require 'includes/connection.php';
$firstName="";

session_start();

if (isset($_GET['logout']) && $_GET['logout']==true){
    unset($_SESSION["email"]);
    session_destroy();
}

if(!isset($_SESSION) || empty($_SESSION['email'])){
    header('location:index.php');
}else{
    try {
        $connect = new PDO("mysql:host=$servername;dbname=playit", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*try{
            $checkStatement= $connect->prepare("SELECT * FROM users WHERE email= :email");
            $checkStatement->execute(array(
                "email"=>$_SESSION['email']
            ));
            while($user=$checkStatement->fetch(PDO::FETCH_OBJ)) {
                $firstName=$user->firstName;
            }
        }
        catch (Exception $ex){
            die("Error in execution of query:" .$ex);
        }*/
        try{
            $email=$_SESSION["email"];
            $data = $connect->query("SELECT * FROM users WHERE email='$email'");
            while ($record = $data->fetch())
            {
                $firstName = $record['firstName'];
            }
        }
        catch (Exception $ex){
            echo "Error occurred in query execution: " . $ex->getMessage()."<br>";
        }
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage()."<br>";
    }
}

?>
<!DOCTYPE html>
<?php require 'includes/head.php'?>
<body>
<div class="welcome-main">
    <?php include 'includes/header.php'?>
    <section class="welcome-sec">
        <h1>Welcome <?php echo $firstName; ?></h1>
    </section>
</div>
<?php include 'includes/footer.php'?>
</body>
</html>
