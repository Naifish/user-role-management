<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-11
 * Time: 11:06 AM
 */
session_start();
/*if(isset($_SESSION) && !empty($_SESSION['email'])){ header('location:welcome.php');}*/
?>
<!DOCTYPE html >
<html lang="en">
<?php require 'includes/head.php'?>
    <body>
    <div class="main">
<?php include 'includes/header.php'?>
    </div>
    <section class="main-plan">
        <h1>New Plan</h1>
        <section class="plan stu-plan">
            <div class="plan-title">
                <h2>Student Plan</h2>
            </div>
            <div class="plan-info">
                <span>$3.99</span>
                <ul>
                    <li>100 song per day</li>
                    <li>Access online and off line</li>
                    <li>Sync With all devices</li>
                    <li>No share with other devices</li>
                    <li>No personal play list</li>
                    <li>Limited customization</li>
                </ul>
                <a href="registration.php">Try it free*</a>
            </div>
            <div class="plan-working">
                <h4>How plan works!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit Sed malesuada magna a odio dictum ultricies. Curabitur euismod at risus at suscipit. Aenean sed rhoncus mauris, et vulputate tellus. Nunc vitae mattis metus....<a href="#" class="read-more">Read more</a></p>
            </div>
            <div class="cb"></div>
        </section>
        <section class="plan indiv-plan">
            <div class="plan-title">
                <h2>Individual Plan</h2>
            </div>
            <div class="plan-info">
                <span>$7.99</span>
                <ul>
                    <li>500+ song per day</li>
                    <li>Access online and off line</li>
                    <li>Sync With all devices</li>
                    <li>share with other devices</li>
                    <li>Personal play list</li>
                    <li>Full customization</li>
                </ul>
                <a href="registration.php">Try it free*</a>
            </div>
            <div class="plan-working">
                <h4>How plan works!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit Sed malesuada magna a odio dictum ultricies. Curabitur euismod at risus at suscipit. Aenean sed rhoncus mauris, et vulputate tellus. Nunc vitae mattis metus....<a href="#" class="read-more">Read more</a></p>
            </div>
            <div class="cb"></div>
        </section>
        <section class="plan fam-plan">
            <div class="plan-title">
                <h2>Family Plan</h2>
            </div>
            <div class="plan-info">
                <span>$13.99</span>
                <ul>
                    <li>Unlimited song per day</li>
                    <li>Access online and off line</li>
                    <li>Sync With all devices</li>
                    <li>Share with other devices</li>
                    <li>Unlimited personal play list</li>
                    <li>Full customization</li>
                </ul>
                <a href="registration.php">Try it free*</a>
            </div>
            <div class="plan-working">
                <h4>How plan works!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit Sed malesuada magna a odio dictum ultricies. Curabitur euismod at risus at suscipit. Aenean sed rhoncus mauris, et vulputate tellus. Nunc vitae mattis metus....<a href="#" class="read-more">Read more</a></p>
            </div>
            <div class="cb"></div>
        </section>
        <section class="plan stu-plan">
            <div class="plan-title">
                <h2>New Student Plan</h2>
            </div>
            <div class="plan-info">
                <span>$3.99</span>
                <ul>
                    <li>100 song per day</li>
                    <li>Access online and off line</li>
                    <li>Sync With all devices</li>
                    <li>No share with other devices</li>
                    <li>No personal play list</li>
                    <li>Limited customization</li>
                </ul>
                <a href="registration.php">Try it free*</a>
            </div>
            <div class="plan-working">
                <h4>How plan works!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit Sed malesuada magna a odio dictum ultricies. Curabitur euismod at risus at suscipit. Aenean sed rhoncus mauris, et vulputate tellus. Nunc vitae mattis metus....<a href="#" class="read-more">Read more</a></p>
            </div>
            <div class="cb"></div>
        </section>
        <section class="plan indiv-plan">
            <div class="plan-title">
                <h2>New Individual Plan</h2>
            </div>
            <div class="plan-info">
                <span>$7.99</span>
                <ul>
                    <li>500+ song per day</li>
                    <li>Access online and off line</li>
                    <li>Sync With all devices</li>
                    <li>share with other devices</li>
                    <li>Personal play list</li>
                    <li>Full customization</li>
                </ul>
                <a href="registration.php">Try it free*</a>
            </div>
            <div class="plan-working">
                <h4>How plan works!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit Sed malesuada magna a odio dictum ultricies. Curabitur euismod at risus at suscipit. Aenean sed rhoncus mauris, et vulputate tellus. Nunc vitae mattis metus....<a href="#" class="read-more">Read more</a></p>
            </div>
            <div class="cb"></div>
        </section>
        <section class="plan fam-plan">
            <div class="plan-title">
                <h2>New Family Plan</h2>
            </div>
            <div class="plan-info">
                <span>$13.99</span>
                <ul>
                    <li>Unlimited song per day</li>
                    <li>Access online and off line</li>
                    <li>Sync With all devices</li>
                    <li>Share with other devices</li>
                    <li>Unlimited personal play list</li>
                    <li>Full customization</li>
                </ul>
                <a href="registration.php">Try it free*</a>
            </div>
            <div class="plan-working">
                <h4>How plan works!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit Sed malesuada magna a odio dictum ultricies. Curabitur euismod at risus at suscipit. Aenean sed rhoncus mauris, et vulputate tellus. Nunc vitae mattis metus....<a href="#" class="read-more">Read more</a></p>
            </div>
            <div class="cb"></div>
        </section>
        <div class="cb"></div>
    </section>
<?php include 'includes/footer.php'?>
    </body>
</html>
