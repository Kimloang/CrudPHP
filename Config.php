<header>
    
</header>
<?php
session_start();
//$con = mysqli_connect("localhost:3306","studentdb","123456","studentdb");
$con = mysqli_connect("localhost:3307","studentdb","123456","studentdb");
$studentid = '';
$firstname = '';
$lastname = '';
$adress ='';
if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $con->query("Delete  from tbl_student where StudentID=$id");
   header("location:index.php");
}
if(isset($_GET['edits'])){
    $name = $_GET['edits'];
    $First = "SELECT *FROM tbl_student where studentID='$name'";
    $result = $con->query($First);
             if($result->num_rows>0){
               while($row =$result->fetch_assoc()){
             $studentid=  $row["StudentID"];     
             $firstname= $row['FirstNames'];  
             $lastname= $row['LastName'];
             $adress= $row['Adress'];
             ?>
<form method="post">
    
    <fieldset class="scheduler-border">    
    <legend class="scheduler-border">Update Buttom</legend>
        Student IDS:<br>
        <input class="bts" value="<?php  echo $studentid ?>"  type="text" name="first_name" readonly="">
        <br>
        Last name:<br>
        <input type="text" value="<?php  echo $firstname ?>" name="last_name">
        <br>
        City name:<br>
        <input type="text" value="<?php  echo $lastname ?>" name="city_name">
        <br>
        Email Id:<br>
        <input "type="text" value="<?php  echo $adress  ?>" name="email">
        
        <br><br>
        
        <input  class="btn-outline-primary" type="submit" name="Update" value="Update">
        </form>
                </fieldset>

      <?php
             }
    if(isset($_POST['Update'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city_name = $_POST['city_name'];
    $email = $_POST['email'];
    
    $UPDATE= "UPDATE tbl_student SET `FirstNames` = '$last_name', "
            . "`LastName` = '$city_name', `Adress` = '$email' WHERE (`StudentID` = '$first_name');";
//    $sql = "UPDATE tbl_student SET FirstNames='$last_name',LastName='$city_name',adress='$email'
//            . "where tbl_student = $first_name";
    $result = $con->query($UPDATE);
    if($result==true){
         echo "<script>alert('You have successfully update the data');</script>";   
     echo "<script > document.location ='index.php'; </script>";   
    }
}          
             }
             
}
?>
