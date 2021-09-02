<?php
    require 'app/tools/config.php';
   
    if(is_connected()){
?>
        <!-- sidebare menu -->
        <?php include 'app/front/includes/sidebar.php'; ?>
        <!-- end sidebar menu  -->
        <!-- header  -->
        <?php include 'app/front/includes/header.php'; ?>
        <!-- end header -->             
        <!-- debut main  -->
        <div class="container px-6 mx-auto grid">

        <!-- end main  -->
        <!-- footer  -->
        <?php include 'app/front/includes/footer.php'; ?>
        <!-- end footer -->
<?php
    }else{
        header('Location: ' . URL.'/home/login');
    }
    
?>