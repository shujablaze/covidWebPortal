<?php
session_start();
include "../components/navbar.php";
include "../components/connectdb.php";
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';

$err_code=0;
$u=0;
$email='';
$adhaar='';
?>

<section class="sidebar">
    <div class="sidebar__heading ">UPDATE INFORMATION</div>
    <ul class="sidebar__list">
        <li>Please Enter the Details Carefully</li>
        <li class="darken">It is a Punishable Offence to Sse Someone Else's Credentials</li>
        <li>Your Information will be verified at the center </li>
        <li class="darken">Only Change the Fields You Want to Update</li>
    </ul>
    
</section>


<section class="main">
<?php
$title = "update info";
include "../components/form.php";
if(isset($_POST['formSubmit'])){
    
    $adhaar=mysqli_real_escape_String($conn,$_POST["adhaar_no"]);
    $email=mysqli_real_escape_String($conn,$_POST["email"]);
    $query  =   "SELECT Patients.* , V_Centre.Name FROM Patients LEFT JOIN V_Centre ON Patients.VC_ID = V_Centre.VC_ID WHERE AadharNO = '$adhaar' and emailID='$email' AND Vac_Date is NULL";
    $_SESSION['adhaar_no'] = $adhaar;
    $result = mysqli_query($conn,$query);
    $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($user){
        $u=1;
    echo"<script>console.log($('.main').remove())</script>";    
    }
    else{
         echo"<script>console.log($('.main2'))</script>";

        echo"<script>alert('NO APPOINTMENT FOUND')</script>";
           }
    //$u=1;
}
?>
<script>
    function erase(){
        console.log("works")
    }
</script>
</section>
<?php if($u==1): ?>
<section class="main2">
<h1>patient info</h1>
<form method="POST" action="updateinfo.php">
<div class="field darken">
    <div class="field__title ">Aadhar no</div>
    <div class="field__text" ><?php echo htmlspecialchars($user["AadharNO"]); ?></div>
</div>
<div class="field">
    <div class="field__title">name</div>
    <input class="form__input" name="name" value="<?php echo htmlspecialchars($user["FirstName"] ." ". $user["LastName"]) ?>">
</div>
<div class="field darken">
    <div class="field__title">dob</div>
    <input class="form__input" type="dob" name="birth" value="<?php echo htmlspecialchars($user["DOB"]); ?>">
</div>
<div class="field">
    <div class="field__title">sex</div>
    <input class="form__input" type="text" name="g" value="<?php echo htmlspecialchars($user["Sex"]); ?>">
</div>

<div class="field darken">
    <div class="field__title">email</div>
    <input class="form__input" type="email" name="email" value="<?php echo htmlspecialchars($user["emailID"]); ?>">
</div>
<div class="field ">
    <div class="field__title">address</div>
    <textarea class="form__input" name="add"><?php echo htmlspecialchars($user["Address"]); ?></textarea>
</div>
<div class="field darken">
    <div class="field__title">mobile</div>
    <input class="form__input" type="number" name="mob" value="<?php echo htmlspecialchars($user["MobileNO"]); ?>">
</div>
<div class="form__block pull_right">
        <input type="submit" value="submit" class="btn btn-submit" name="submit">
    </div>
    </form>
</section>
<?php endif; ?>
<?php 
if(isset($_POST['submit'])){
    echo"";
    $name = $_POST["name"];
    $n  =  explode(" ",$name);
    //$lastname = trim($_POST["l_name"]);
    $mobile = trim($_POST["mob"]);
    $sex = trim($_POST["g"]);
    $dob = trim($_POST["birth"]);
    $email = trim($_POST["email"]);
    $address = trim($_POST["add"]);
    $aa = $_SESSION['adhaar_no'];
    //Verifying mobile no
    if(strlen($mobile)!=10 || strlen($mobile)>13 )
    {
        echo "<script>alert('Failed : Please Enter a Valid Mobile Number')</script>";
        $err_code=1;
    }

    //Verifying Email
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) echo "<script>alert('Failed : Please Enter a Valid Email')</script>";

    //Verifying Dob
    $year=explode("-",$dob);
    if($year[0]<1920||$year[0]>2021) echo "<script>alert('Failed : Please Enter a Valid DOB')</script>";

    if($err_code===0){
        $query = "UPDATE Patients SET FirstName= '$n[0]',LastName='$n[1]',Sex='$sex',DOB='$dob',MobileNO='$mobile',emailID='$email',Address='$address' WHERE AadharNO = '$aa'";
         if(mysqli_query($conn,$query)){
        
            echo"<script>alert('Profile Updated')</script>";
        }
        else{
           echo"<script>alert('Failed : Try Again After sometime')</script>";
        
        }
    }
}
?>

<?php
include "../components/footer.php";
?>