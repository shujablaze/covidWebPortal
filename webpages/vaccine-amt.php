<?php include "../components/admin-navbar.php"; 
session_start();
if(!isset($_SESSION["login"])) header("Location:login.php");
?>


<?php
    include "../components/connectdb.php";

    $query  =   "SELECT * FROM Vaccine;";
    
    $result = mysqli_query($conn,$query);
    $vaccine = mysqli_fetch_all($result,MYSQLI_ASSOC);

    if($_POST)
    {
        foreach($vaccine as $index=>$row):
            $quantity=$_POST["$index"];
            $VC_ID=$row["VC_ID"];
            $V_Name=$row["V_Name"];

            $query="UPDATE Vaccine SET Quantity = '$quantity' WHERE VC_ID ='$VC_ID' AND V_Name = '$V_Name';";
            if(!mysqli_query($conn,$query)) echo"<script> alert('Error Occurred')</script>";
        endforeach;
        
        $query  =   "SELECT * FROM Vaccine;";
    
        $result = mysqli_query($conn,$query);
        $vaccine = mysqli_fetch_all($result,MYSQLI_ASSOC);

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
<h1>Current Vaccine Supply</h1>
    <div class="field darken">
        <div class="field__title ">Center</div>
        <div class="field__title ">Vaccine</div>
        <div class="field__title " style="width:8.2rem">Doses</div>
    </div>
    <form method=POST>
<?php foreach($vaccine as $index => $row):?>
    <div class="field vacs">
        <div class="field__title "><?php echo $row["VC_ID"] ?></div>
        <div class="field__title "><?php echo $row["V_Name"] ?></div>
        <input class="input-vac" name='<?php echo $index?>' type="number" value=<?php echo $row["Quantity"] ?>>
    </div>
<?php endforeach;?>
    <div class="form__block">
        <input type="submit" value="submit" class="btn btn-submit" name="formSubmit">
    </div>
    </form>
</section>

<?php include "../components/footer.php" ?>