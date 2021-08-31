<?php
    require 'back/config.php';
   
    if(is_connected()){
?>
        <!-- sidebare menu -->
        <?php include"includes/sidebar.php"; ?>
        <!-- end sidebar menu  -->
        <!-- header  -->
        <?php include"includes/header.php"; ?>
        <!-- end header -->
                
        <!-- title page  -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Forms</h2>
         <?= print_r($_SESSION); ?>
        <!-- <a href="index.php"> log out</a> -->
        <!-- footer  -->
        <?php include 'includes/footer.php'; ?>
        <!-- end footer -->
<?php
    }else{
        header('Location: index.php');
    }
    
?>