<?php
    require 'back/config.php';
   
    if(is_connected()){
?>
        <!-- sidebare menu -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- end sidebar menu  -->
        <!-- header  -->
        <?php include 'includes/header.php'; ?>
        <!-- end header -->             
        <!-- debut main  -->
        <div class="container px-6 mx-auto grid">

        <!-- end main  -->
        <!-- footer  -->
        <?php include 'includes/footer.php'; ?>
        <!-- end footer -->
<?php
    }else{
        header('Location: ' . URL );
    }
    
?>