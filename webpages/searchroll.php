<?php
include "../components/navbar.php"
?>

<section class="sidebar">
    <div class="sidebar__heading update">Search Rolls</div>
    <ul class="sidebar__list">
        <li>Enter Your Details To Search the Roll</li>
        <li class="darken_yellow">Bring your Adhaar Card For Verification</li>
        <li>Do Not Believe in News From Unverified Sources</li>
        <li class="darken_yellow">Maintain Social Distancing at Centres</li>
    </ul>

</section>

<section class="main">
<?php
    $email="";
    $adhaar="";
    $result="";

if($_POST)
{
    include "../components/connectdb.php";

    $adhaar =   trim($_POST["adhaar_no"]);
    $email  =   trim($_POST["email"]);

    $adhaar =   mysqli_real_escape_String($conn,$adhaar);
    $email  =   mysqli_real_escape_String($conn,$email);

    $query  =   "SELECT * FROM Patients WHERE AadharNO = '$adhaar' and emailID = '$email';";
    
    $result = mysqli_query($conn,$query);
    $user = mysqli_fetch_all($result,MYSQLI_ASSOC);

    if(count($user)===0) $result = "NO RECORDS FOUND.";
    else header("Location: userinfo.php?adhaar=$adhaar");
}

$title = "Search rolls";
include "../components/form.php";
echo $result;
?>

</section>
<?php
include "../components/footer.php";
?>