<?php
include "../components/navbar.php";
include "../components/main-sidebar.php";
?>

<?php 

$errors = array();
$error_response=$response="";

if(isset($_POST["submit"]))
{
    include "../components/connectdb.php";

    //Getting Post values
    $adharno = trim($_POST["adhaar_no"]);
    $firstname = trim($_POST["f_name"]);
    $lastname = trim($_POST["l_name"]);
    $mobile = trim($_POST["mob_no"]);
    $sex = trim($_POST["sex"]);
    $dob = trim($_POST["dob"]);
    $email = trim($_POST["email"]);
    $address = trim($_POST["address"]);
    $vacc_center = trim($_POST["vacc_center"]);


    //Verifying Adhaar Card number
    if(strlen($_POST["adhaar_no"])!=12)
    {
        array_push($errors,"Please Enter a Valid 12 digit Adhaar No."); 
    }
    
    //Verifying mobile no
    if(strlen($_POST["mob_no"])!=10 || strlen($_POST["mob_no"])>13 )
    {
        array_push($errors,"Please Enter a Valid Mobile Number");
    }

    //Verifying Email
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) array_push($errors,"Please Enter a Valid Email");

    //Verifying Dob
    $year=explode("-",$dob);
    if($year[0]<1920||$year[0]>2021) array_push($errors,"Please Enter a Valid DOB ");

    //Checking for Errors
if(count($errors)===0)
{
    //Prepping for database entry
    $adharno = mysqli_real_escape_String($conn,$adharno);
    $firstname = mysqli_real_escape_String($conn,$firstname);
    $lastname = mysqli_real_escape_String($conn,$lastname);
    $mobile = mysqli_real_escape_String($conn,$mobile);
    $sex = mysqli_real_escape_String($conn,$sex);
    $dob = mysqli_real_escape_String($conn,$dob);
    $email = mysqli_real_escape_String($conn,$email);
    $address = mysqli_real_escape_String($conn,$address);
    $vacc_center = mysqli_real_escape_String($conn,$vacc_center);

    $query = "INSERT INTO Patients(AadharNO,FirstName,LastName,Sex,DOB,MobileNO,emailID,Address,VC_ID) VALUES ('$adharno','$firstname','$lastname','$sex','$dob','$mobile','$email','$address','$vacc_center')";

    if(mysqli_query($conn,$query)){
        $response = "You have been registered for the vaccine";
    }
    else{
        if(strstr(mysqli_error($conn),"Duplicate"))
        {
            
            if(strstr(mysqli_error($conn),"PRIMARY")){
            $error_response = "Appointment With Given Aadhar Number Already Exists";
            }
            elseif(strstr(mysqli_error($conn),"emailID")){
            $error_response = "Appointment With Given Email Already Exists";
            }
        }
        else{
        $error_response = "Failed Please Try Again Later or Call the Helpline Numbers";
        }
    }
}
}

?>

<section class="main">
<h1>REGISTRATION FORM</h1>

<form action="register.php" method="POST" class="form">
    <div class="form__block">
        <label for="adharNo" class="form__label">Adhaar Number </label>
        <input type="text" id="adharNo" class="form__input" name="adhaar_no" required>
    </div>

    <div class="form__block">
        <label for="f_name" class="form__label">First Name </label>
        <input type="text" id="f_name" class="form__input" name="f_name" required>
    </div>

    <div class="form__block">
        <label for="l_name" class="form__label">Last Name</label>
        <input type="text" id="l_name" class="form__input" name="l_name" required>
    </div>

    <div class="form__block">
        <label for="mob_no" class="form__label">Mobile</label>
        <input type="number" id="mob_no" class="form__input" name="mob_no" required>
    </div>

    <div class="form__block">
        <label for="sex" class="form__label">Sex</label>
        <select id="sex" class="form__select" name="sex">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>

    <div class="form__block">
        <label for="dob" class="form__label">Date of Birth</label>
        <input type="date" id="dob" class="form__select" name="dob" required>
    </div>
    
    <div class="form__block">
        <label for="email" class="form__label">Email</label>
        <input type="email" id="email" class="form__input" name="email" required>
    </div>
    
    <div class="form__block">
        <label for="Address" class="form__label">Address</label>
        <input type="text" id="Address" class="form__input" name="address" required>
    </div>

    <div class="form__block">
        <label for="division" class="form__label">Division</label>
        <select id="division" class="form__select" onclick="center()" name="division">
            <option value="D100">South Delhi</option>
            <option value="D200">North & NewDelhi</option>
            <option value="D300">East Delhi</option>
            <option value="D400">West & Central Delhi</option>
        </select>
    </div>

    <div class="form__block">
        <label for="vacc_center" class="form__label">Vaccination Center</label>
        <select id="vacc_center" class="form__select" name="vacc_center" required>
            
        </select>
    </div>

    <div class="form__block form__response">
        <div class="success-text"><?php echo $response; ?></div>
        <div class="error-text">
            <?php 
                echo "$error_response"; 
                foreach($errors as $error){
                    echo "$error <br>";
                }
            ?>
        </div>
    </div>

    <div class="form__block">
        <input type="submit" value="submit" name="submit" class="btn btn-submit">
    </div>

    
    <?php 
    if($response!="") : ?>
        <script>
            const subbtn = document.querySelector('.btn-submit');
            subbtn.style.display="none";
            
        </script>
    <?php endif; ?>
    
    

</form>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const regbtn = document.querySelector('.btn-primary');
    regbtn.style.display="none";
    function center(){
        var z = $("#division").val();
        //console.log("works",$("#division").val());
        $.ajax({
                    type: 'post',
                    url: 'cen.php',
                    data: {'division': z},
                    cache:false,
                    success: function(data)
                    {
                       // alert(data);
                         //console.log(data)
                    $("#vacc_center").empty();     
                    $("#vacc_center").append(data);
                    }
                });
    }
</script>

<?php
include "../components/footer.php";
?>
