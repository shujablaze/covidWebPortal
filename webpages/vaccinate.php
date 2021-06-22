<?php
include "../components/admin-navbar.php";
session_start();
if(!isset($_SESSION["login"])) header("Location:login.php");

$response="";
$adhaar="";

if($_POST)
{
include "../components/connectdb.php";
 
 $adhaar = trim($_POST["adhaar_no"]);

 $adhaar= mysqli_real_escape_String($conn,$adhaar);

 $query = "SELECT * FROM Patients WHERE AadharNO = '$adhaar' AND Vac_Date IS NULL;";

 $result = mysqli_query($conn,$query);
 $user = mysqli_fetch_all($result,MYSQLI_ASSOC);

 if(!$user) $response = "NO APPOINTMENTS FOUND";
 else
 {
    $query = "UPDATE Patients SET Vac_Date = CURRENT_TIMESTAMP Where AadharNO = '$adhaar'";

    if (mysqli_query($conn,$query))
    {
     $response = "Record updated successfully";
    }
    else
    {
       $response= "Error updating record: " . mysqli_error($conn);
    }
 }
}
?>

<section class="sidebar">
    <div class="sidebar__heading update">Information</div>
    <ul class="sidebar__list">
        <li>Govt is trying its best to provide adequate number of vaccines.</li>
        <li class="darken_yellow">All people Above 18 Years of Age are Eligible for vaccines.</li>
        <li>In Case of Any Mistake Contact Your Center Manager.</li>
        <li class="darken_yellow">Do not Leave the Station Unattended.</li>
    </ul>

</section>

<section class="main">

<?php
 include "../components/connectdb.php"; 
 $query = "SELECT COUNT('*') as 'C' FROM Patients WHERE Vac_Date IS NULL;";
 $result=mysqli_query($conn,$query);
 $count = mysqli_fetch_array($result,MYSQLI_ASSOC);
 $query = "SELECT COUNT('*') as 'C' FROM Patients;";
 $result=mysqli_query($conn,$query);
 $Tot_count = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div style="margin-bottom:22px;display:flex;justify-content:space-around">
    <div class="success-text " style="font-size:1.6rem">Registered Patients: <?php echo $count["C"]; ?></div>
    <div class="success-text " style="font-size:1.6rem">Vaccinated Patients: <?php echo $Tot_count["C"]-$count["C"]; ?></div>
</div>

<h1>Vaccinate Patient</h1>

<form action="" method="POST">
    <div class="form__block">
        <label for="adharNo" class="form__label">Adhaar Number </label>
        <input type="text" id="adharNo" class="form__input" name="adhaar_no" value="<?php echo "$adhaar"; ?>" required>
    </div>
    <div class="form__block">
        <input type="submit" value="submit" class="btn btn-submit" name="formSubmit">
    </div>
</form>

</section>

<?php
if($_POST) echo "<script>window.onload = function(){alert('$response');}</script>";
include "../components/footer.php";
?>