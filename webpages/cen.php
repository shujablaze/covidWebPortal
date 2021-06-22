<?php
 include "../components/connectdb.php";

if(isset($_POST['division'])){
$d = $_POST['division'];
$query= "SELECT * FROM V_Centre WHERE Div_ID='$d';";

    $result = mysqli_query($conn,$query);

    $centers = mysqli_fetch_all($result,MYSQLI_ASSOC);
    //$_SESSION['center'] = $centers;
    $str="";
    
    foreach($centers as $cent) {
    $str=$str.'<option value="'.$cent["VC_ID"].'">'.$cent['Name'].'</option>';
    }

echo $str;
}
?>