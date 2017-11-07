<!DOCTYPE html>
<html>

<head>

    <title>TechCrowd</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo ASSETS . 'images/favicon.ico'?>">
    
    <!-- Font Awesome Icon Library - for rating widget -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--    falback font awesome-->
    <link rel="stylesheet" href="<?php echo ASSETS . 'css/font awesome/css/font-awesome.min.css'; ?>">

    <!-- link to the main css -->
    <link type="text/css" rel="stylesheet" href="<?php echo ASSETS . 'css/main.css'?>" />
<!--    <link type="text/css" rel="stylesheet" href="../../../assets/css/main.css" />-->
    <!-- jquery plugin -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--    fallback jquery -->
    <script src="<?php echo ASSETS . 'js/vendor/jquery-3.2.1.min.js'?>"></script>
    <!-- custom font plugin -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- chart.js cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.js"></script>
<!--    <!--    fallback chart.js -->
<!--    <script src="--><?php //echo ASSETS . 'js/chart.min.js'?><!--"></script>-->
    
    <style>
        header {
            background: rgba(255, 255, 255, 0.8);
        }

        table {
            padding-top: 0em;
            width: 100%;
            height: auto;
            text-align: center;
        }

    </style>

</head>

<body>

<script>
    function errors(error) {
        var errors = document.getElementById("error");
        var errorsmess = document.getElementById("errormess");
        errors.style.display = "block";
        errorsmess.innerHTML = error;
    }

    function info(info) {
//        $('#cartbutton').html('<center><img src="<?php //echo ASSETS . '/images/dolphin.gif'; ?>//"/></center>');
        var infos = document.getElementById("info");
        var infosmess = document.getElementById("infomess");
        infos.style.display = "block";
        infosmess.innerHTML = info;

    }

//    var errorspan = document.getElementById("errorspan");
//    var error = document.getElementById("error");
//    var infospan = document.getElementById("infospan");
//    var info1 = document.getElementById("info");
//
//    errorspan.onclick = function() {
//        error.style.display = "none";
//    };
//    infospan.onclick = function() {
//        info1.style.display = "none";
//    };
</script>