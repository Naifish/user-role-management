<?php $url=$_SERVER['REQUEST_URI']; ?>
<header class="<?php if(strpos($url, '/registration.php') == true || strpos($url, '/login.php') == true || strpos($url, '/welcome.php') == true){ echo 'dark-header';} ?>">
    <div class="head">
        <a class="logo" href="index.php">play IT</a>
        <nav>
            <ul>
                <li>
                    <a href="index.php">HOME</a>
                </li>
                <li>
                    <?php if(!isset($_SESSION) || empty($_SESSION['email'])){ ?>
                    <a href="login.php">LOGIN</a>
                    <?php } else{ ?>
                    <a href="welcome.php?logout=true">Logout</a>
                    <?php } ?>
                </li>
                <?php if(!isset($_SESSION) || empty($_SESSION['email'])){ ?>
                <li>
                    <a href="registration.php">REGISTRATION</a>
                </li>
                <?php } ?>
            </ul>
            <div class="cb"></div>
        </nav>
    </div>
</header>

<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-13
 * Time: 5:37 PM
 */
?>