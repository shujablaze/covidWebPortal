<?php session_start();
if(!isset($_SESSION["login"])) header("Location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Delhi COVID Vaccine Portal</title>
</head>
<body>
    
    <nav class="navbar">
        <div class="navbar_container">
            <div class="logo">
                <div class="logo-icon">
                    <img src="../public/img/logo.png" alt="logo">
                </div>
                <div class="logo-text">
                    <span class="logo-text--hindi">दिल्ली कोविड -19 टीका पोर्टल</span>
                    <span class="logo-text--eng">DELHI COVID-19 VACCINATION PORTAL</span>
                </div>
            </div>
            <ul class="navlinks">
                <li class="navlink"><a href=adminpage.php>HOME</a></li>
                <li class="navlink"><a href=index.php>USER</a></li>
                <li class="navlink"><a href=admin.php?logout=true>LOG OUT</a></li>
            </ul>
        </div>
    </nav>
    
    <div class=container>
    
        <?php
        include "../components/main-sidebar.php";
        ?>

        <section class="main main-hero">
            <a href="vaccinate.php" class="card card6">
                <img src="../public/img/adm1.svg" alt="know-your-center">
                <div class="card__text">Vaccinate Patient</div>
            </a>

            <a href="vaccine-amt.php" class="card card3">
                <img src="../public/img/vaccines.svg" alt="find-name">
                <div class="card__text">Vaccine Distribution</div>
            </a>
        </section>

        <?php
            include "../components/footer.php";
        ?>