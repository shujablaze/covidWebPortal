<?php
session_start();
include "../components/navbar.php";
 include "../components/connectdb.php";

$centers="";
?>


<section class="sidebar">
    <div class="sidebar__heading findvc">Find Vaccination Centre</div>
    <ul class="sidebar__list">
        <li>Enter the Division of Delhi You want to Get Vaccinated In</li>
        <li class="darken_green">Select any vaccination centre as per convenience</li>
        <li>Wear Face Masks at All Times</li>
        <li class="darken_green">Maintain Social Distancing at Centres</li>
        <li>Bring your Adhaar Card For Verification</li>
        
    </ul>
    <div class="sidebar__btns">
        <a href="about.php" class="btn btn-secondary">learn more</a>
        <a href="register.php" class="btn btn-primary">Register</a>
    </div>
</section>

<section class="main">
    <h1>find vaccination center</h1>
    <form action="findcentre.php" method="POST">
        <div class="form__block">
            <label for="division" class="form__label">Division</label>
            <select id="division" class="form__select" name="division">
                <option></option>
                <option value="D100">South Delhi</option>
                <option value="D200">North & NewDelhi</option>
                <option value="D300">East Delhi</option>
                <option value="D400">West & Central Delhi</option>
            </select>
        </div>
        <div class="form__block">
            <input type="submit" value="submit" class="btn btn-submit" name="findcenterbtn">
        </div>
    </form>
    
     <?php  if(isset($_POST['findcenterbtn'])){  $division=$_POST["division"];
    $division=mysqli_real_escape_String($conn,$division);
    
    $query= "SELECT * FROM V_Centre WHERE Div_ID='$division';";

    $result = mysqli_query($conn,$query);

    $centers = mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($centers as $center) : ?>
        <div class="centers">
        <a href="center.php?VC_ID=<?php echo $center["VC_ID"] ?>"class="center__field"><?php echo $center["Name"].", ".$center["Address"]; ?></a>
        </div>
    <?php endforeach; } ?>
    
</section>

<?php
include "../components/footer.php"
?>