<section class="welcome-sec">
    <h1>Welcome <?php if(isset($_GET['status']) && $_GET['status']=='login'){ echo 'back ';} echo $firstName; ?></h1>
</section>