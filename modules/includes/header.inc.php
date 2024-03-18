

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>EduStudy - Main</title>
    <link rel="icon" type="image/x-icon" href="<?php echo $BASE_DIR ?>/src/assets/img/favicon.ico"/>
    <!-- ENABLE LOADERS -->
    <link href="<?php echo $BASE_DIR ?>/layouts/horizontal-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $BASE_DIR ?>/layouts/horizontal-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo $BASE_DIR ?>/layouts/horizontal-light-menu/loader.js"></script>
    <!-- /ENABLE LOADERS -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?php echo $BASE_DIR ?>/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $BASE_DIR ?>/layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $BASE_DIR ?>/layouts/horizontal-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo $BASE_DIR ?>/src/assets/css/light/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $BASE_DIR ?>/src/assets/css/dark/elements/alert.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        body.dark .layout-px-spacing, .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }
        /* .layout-px-spacing {
            width: 100%;
            background-image: url(../../landing/images/banner-bg.png);
            height: auto;
            background-size: cover;
            padding-bottom: 90px;
        } */
    </style>
    <style>
        .bg-reverse-light-dark {
  
            fill: #181e2e;
        }
        body.dark .bg-reverse-light-dark {
  
            fill: #eaeaec;
        }
        

    </style>
    <style>
        /* Additional styling for the flip card effect */
        .carousel-flip {
            perspective: 1000px;
        }

        .carousel-inner {
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .carousel-flipped .carousel-inner {
            transform: rotateY(180deg);
        }

        .carousel-item {
            backface-visibility: hidden;
        }

        .card-flip {
            height: 50vh;
        }

        .card-inner {
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .carousel-flipped .card-inner {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-back {
            transform: rotateY(180deg);
        }

        .card-title {
            font-size: 2rem;
            text-align: center;
        }

        /* Added style to flip text only, not the entire element */
        .card-back .card-title {
            transform: scaleX(-1);
        }
    </style>