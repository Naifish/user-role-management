<?php $url=$_SERVER['REQUEST_URI']; ?>
<header class="<?php if(strpos($url, '/registration.php') == true){ echo 'registration-header';} ?>">
    <div class="head">
        <a class="logo" href="#">play IT</a>
        <nav>
            <ul>
                <li>
                    <a href="index.php">HOME</a>
                </li>
                <li>
                    <a href="index.php">LOGIN</a>
                </li>
                <li>
                    <a href="registration.php">REGISTRATION</a>
                </li>

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