<?php include "../components/navbar.php"; 

if($_GET){
    include "../components/connectdb.php";

    $VC_ID=$_GET["VC_ID"];

    $VC_ID=mysqli_real_escape_String($conn,$VC_ID);

    //Getting info about center 
    $query = "SELECT * FROM V_Centre WHERE VC_ID='$VC_ID';";

    $result = mysqli_query($conn,$query);

    $center = mysqli_fetch_array($result,MYSQLI_ASSOC);

    //Getting info about Division 
    $div_id= $center["Div_ID"];
    
    $query = "SELECT Division.Name as 'div', DivManager.* FROM Division JOIN DivManager ON DivManager.M_ID = Division.DivMgr_ID WHERE Division.D_ID = '$div_id';";

    $result = mysqli_query($conn,$query);

    $division = mysqli_fetch_array($result,MYSQLI_ASSOC);

    //Getting info about Center Manager
    $Mgr_ID = $center["Mgr_ID"];

    $query = "Select Name FROM Staff WHERE S_ID = '$Mgr_ID';";

    $result = mysqli_query($conn,$query);

    $manager = mysqli_fetch_array($result,MYSQLI_ASSOC);

    //Getting all employees
    $query = "SELECT * FROM Staff WHERE VC_ID = '$VC_ID';";

    $result = mysqli_query($conn,$query);

    $staffs = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
}


?>

<section class="sidebar">
    <div class="sidebar__heading findvc">Find Vaccination Centre</div>
    <ul class="sidebar__list">
        <li>Bring your Adhaar Card For Verification</li>
        <li class="darken_green">Select any vaccination centre as per convenience</li>
        <li>Wear Face Masks at All Times</li>
        <li class="darken_green">Maintain Social Distancing at Centres</li>
    </ul>
    <div class="sidebar__btns">
        <a href="about.php" class="btn btn-secondary">learn more</a>
        <a href="register.php" class="btn btn-primary">Register</a>
    </div>
</section>

<section class="main">
<h1><?php echo $center["Name"]; ?></h1>

<div class="field">
    <div class="field__title">division</div>
    <div class="field__text"><?php echo $division["div"]; ?></div>
</div>

<div class="field">
    <div class="field__title">division head</div>
    <div class="field__text"><?php echo $division["Name"]." (Contact - ".$division["ContactNo"].")"; ?></div>
</div>

<div class="field">
    <div class="field__title">center ID</div>
    <div class="field__text"><?php echo $center["VC_ID"]; ?></div>
</div>

<div class="field">
<div class="field__title">manager</div>
    <div class="field__text"><?php echo $manager["Name"] ?></div>
</div>

<div class="field">
    <div class="field__title">address</div>
    <div class="field__text"><?php echo $center["Address"]; ?></div>
</div>


<div class="field__sub-heading">EMPLOYEES</div>
<ul class="center__employees">

<?php foreach($staffs as $employee): ?>
    <li class="center__emp"><?php echo $employee["Name"]." (".$employee["Designation"]." , Contact: ".$employee["ContactNo"].")";?></li>
<?php endforeach; ?>

</ul>
</section>


<?php include "../components/footer.php" ?>
