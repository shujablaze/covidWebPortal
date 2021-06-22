<?php include "../components/navbar.php" ?>


<?php
    include "../components/connectdb.php";

    $adhaar=mysqli_real_escape_String($conn,$_GET["adhaar"]);

    $query  =   "SELECT Patients.* , V_Centre.Name FROM Patients LEFT JOIN V_Centre ON Patients.VC_ID = V_Centre.VC_ID WHERE AadharNO = '$adhaar';";
    
    $result = mysqli_query($conn,$query);
    $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
?>

<section class="sidebar">
    <div class="sidebar__heading update">hi <?php echo htmlspecialchars($user["FirstName"]) ?></div>
    <ul class="sidebar__list">
        <li>Date and Time of Appointment Will be Sent to Your Email</li>
        <li class="darken_yellow">Bring your Adhaar Card For Verification</li>
        <li>Do Not Believe in News From Unverified Sources</li>
        <li class="darken_yellow">Maintain Social Distancing at Centres</li>
    </ul>

</section>

<section class="main">
<h1>patient info</h1>
<div class="field darken">
    <div class="field__title ">Aadhar no</div>
    <div class="field__text "><?php echo htmlspecialchars($user["AadharNO"]); ?></div>
</div>
<div class="field">
    <div class="field__title">name</div>
    <div class="field__text"><?php echo htmlspecialchars($user["FirstName"] ." ". $user["LastName"]) ?></div>
</div>
<div class="field darken">
    <div class="field__title">dob</div>
    <div class="field__text"><?php echo htmlspecialchars($user["DOB"]); ?></div>
</div>
<div class="field">
    <div class="field__title">sex</div>
    <div class="field__text"><?php echo htmlspecialchars($user["Sex"]); ?></div>
</div>
<div class="field darken">
    <div class="field__title">center</div>
    <div class="field__text"><?php echo htmlspecialchars($user["Name"]); ?></div>
</div>
<div class="field">
    <div class="field__title">email</div>
    <div class="field__text"><?php echo htmlspecialchars($user["emailID"]); ?></div>
</div>
<div class="field darken">
    <div class="field__title">address</div>
    <div class="field__text"><?php echo htmlspecialchars($user["Address"]); ?></div>
</div>
<div class="field">
    <div class="field__title">mobile</div>
    <div class="field__text"><?php echo htmlspecialchars($user["MobileNO"]); ?></div>
</div>
<div class="field darken">
    <div class="field__title">Registered On</div>
    <div class="field__text"><?php echo htmlspecialchars($user["Reg_Date"]); ?></div>
</div>
<div class="field">
    <div class="field__title">Vaccinated On</div>
    <div class="field__text"><?php echo htmlspecialchars($user["Vac_Date"]); ?></div>
</div>

</section>

<?php include "../components/footer.php" ?>