<?php
include "../components/navbar.php";
$email='';
$adhaar='';
$response='';

if($_POST){
    include "../components/connectdb.php";
    $email=mysqli_real_escape_String($conn,$_POST["email"]);
    $adhaar=mysqli_real_escape_String($conn,$_POST["adhaar_no"]);
    
    $query="SELECT * FROM Patients WHERE AadharNO='$adhaar' AND emailID='$email' AND Vac_Date IS NULL;";
    $result= mysqli_query($conn,$query);
    $user = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if($user)
    {
        $query="DELETE FROM Patients WHERE AadharNO='$adhaar';";
        if(mysqli_query($conn,$query))
        {
            $response="Appointment cancelled successfully";
        }
        else{
            $response="Error Cancelling Appointment:".mysqli_error();
        }
        
    }else{
        $response="No Pending Appointment Found.";
    }
}
?>

<section class="sidebar">
    <div class="sidebar__heading cancel">Cancel Appointment</div>
    <ul class="sidebar__list">
        <li>Warning! You Wont Get the Vaccine if You Choose to Proceed</li>
        <li class="darken_red">Vaccines are completely safe and thoroughly tested</li>
        <li>Do Not Believe in News From Unverified Sources</li>
        <li class="darken_red">Getting Vaccine is Necessary to End the Pandemic</li>
    </ul>
</section>



<section class="main">
    
<?php
$title = "cancellation";
include "../components/form.php";
?>
<div class="error-text"><?php echo $response; ?></div>
</section>

<?php
include "../components/footer.php";
?>