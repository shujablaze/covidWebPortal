<?php
include "../components/navbar.php";
include "../components/main-sidebar.php";
?>



<section class="main main-hero">
    <a href="findcentre.php" class="card card1">
        <img src="../public/img/know.svg" alt="know-your-center">
        <div class="card__text">Find Nearest Center</div>
    </a>

    <a href="searchroll.php" class="card card2">
        <img src="../public/img/mag-glass.svg" alt="find-name">
        <div class="card__text">Search in Vaccination Roll</div>
    </a>

    <a href="updateinfo.php" class="card card3">
        <img src="../public/img/update.svg" alt="update">
        <div class="card__text">Update your Information</div>
    </a>

    <a href="cancelappt.php" class="card card4">
        <img src="../public/img/cancel.svg" alt="cancel">
        <div class="card__text">Cancel Appointment</div>
    </a>

    <a href="vaccines.php" class="card card5">
        <img src="../public/img/vaccines.svg" alt="vaccine">
        <div class="card__text">About Vaccines</div>
    </a>
    
    <a href="faq.php" class="card card6">
        <img src="../public/img/faq.svg" alt="faq">
        <div class="card__text">FAQ</div>
    </a>
</section>

<?php
include "../components/footer.php";
?>
