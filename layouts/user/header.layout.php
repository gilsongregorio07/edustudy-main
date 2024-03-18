<?php 
    if(session_status() != 2){
        session_start();
    }

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to index.php if not logged in
        header("Location: $BASE_DIR/index.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../../modules/includes/header.inc.php"; ?> 
</head>
<body class="layout-boxed">

    <?php require_once "../../modules/includes/navbar.inc.php"; ?> 

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>
         <!--  BEGIN SIDEBAR  -->
        <?php require_once "../../modules/includes/sidebar.inc.php"; ?> 
        <!--  END SIDEBAR  -->
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <!--  BEGIN FEATURE AREA  -->
            <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

        