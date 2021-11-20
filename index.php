<!DOCTYPE html>
<html>
    <?php
    include './Config.php';
     if(isset($_POST['search'])){
     $First = $_POST['searcha'];
        $sql = "SELECT * from tbl_student where FirstNames like '%$First%'";
    }else
        $sql = "SELECT * from tbl_student order by studentid ASC";
        $resultas = mysqli_query($con,$sql);
        ?>
    <?php 
    $sqls = mysqli_query($con,"select count(studentid) as total from tbl_student");
    $rows = mysqli_fetch_assoc($sqls);      
    $count = $rows["total"];
    ?>
    <?php
//    $Sel = "select * from tbl_student";
//    $qa = mysqli_query($con, $Sel);
//    
//    while ($rows= mysqli_fetch_assoc($qa)){
//        echo $rows["FirstNames"];
//    }

    ?>
    <style>
        .container{
            text-align: center;	
        }
        h1{
            text-align: center;
            font-family: serif;
        }
        .manage{
           float: right;
           margin-top: -10px;
           
        }
        .search{
       margin-left: -0px;
       margin-top: 40px;
       width: 100px;
       height: 25px;
        }
        btns{
        background-color: black;
        margin-left:   1000px;
        }
/*         .btn-danger{
           margin-left: -60px; 
        }
         .btn-outline-info{
          margin-left: -40px;
        }
        .table-responsive{
            margin-top: -10px;
        }
            
        }*/
        .btn-danger{
        margin-left: -75px;
        
        }

    </style>
    <head>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </head>
    <body>
       
        <!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert new</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
        <fieldset>
            <form method="post" >      
      <div class="modal-body">
                Student ID:<br>
                <input class="bts" value="<?php  echo $studentid ?>"  type="text" name="first_name" >
        <br>
        Last name:<br>
        <input type="text" value="<?php  echo $firstname  ?>" name="last_name">
        <br>
        City name:<br>
        <input type="text" value="<?php  echo $lastname ?>" name="city_name">
        <br>
        Email Id:<br>
        <input type="text" value="<?php  echo $adress  ?>" name="email">
         
      </div>
             
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input   class="btn btn-primary" type="submit" name="save" value="submit">
        <input   class="btn btn-primary" type="submit"  name="Update" value="Update">
      </div>
    </div>
  </div>
</div>    
    <div class="container">
       <div class="row" style="margin-top: 10px;">
            <div class="col-md-10" >
             <button data-toggle="modal" data-target="#add"  class="btn btn-primary" type="button"  value="Add New">Add New</button>   
            </div>
           <div class="col-md-2">
               <input type="submit" class="btn btn-danger"   name="logout" style="float: right"  value="Logout"> 
            </div>     
           </div>
        <div class="row" style="margin-top: 10px;" >
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <input class="btn btn-outline-success"   name="searcha"    placeholder="Search">
            <input    class="btn btn-danger"  type="submit" name="search" value="Search">
            </div>
          </div>
        </form> 
        <div class="table-responsive">
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>FirstNames</th>
            <th>LastNames</th>
            <th>City</th>
            <th>Alter</th>
            <th>Photo</th>
        </tr>
                <?php while($row = mysqli_fetch_assoc($resultas)){?>
        <tr bgcolor="#FFC0CB">
    <td scope="row"><?php echo $row["StudentID"];?></td>
    <td><?php echo $row["FirstNames"];?></td>
    <td><?php echo $row["LastName"];?></td> 
     <td><?php echo $row["Adress"];?></td> 
      <td><a  class="btn btn-outline-primary" href="config.php?edits=<?php echo $row["StudentID"]; ?> data-toggle="modal" data-target="#add" ">EDIT</a>
      <a  class="btn btn-outline-danger" href="config.php?delete=<?php echo $row["StudentID"]; ?>">DELETE</a>
      </td> 
<!--    <form method="post" action="delete.php">
     <td><input  type="hidden" name="sub" value="<?php echo $row["StudentID"];?>">
         <input class="btn btn-primary" type="submit" name="delete"  value="delete"></a>      
     </td>
    </form>-->
<td><img src="<?php echo $row['photo'];?>"height="95px" width="100px"></td>
        </tr>   
      <?php } ?>
    <tfoot>
        <tr>
            <th colspan="13"><?php echo 'Total Student ='.$count;?></th>
        </tr>
      </tfoot>    
        </div>
    </thead>   
     
        
  <?php
  function myfunction(){
  }
  ?>
    <?php
if(isset($_POST['logout'])){
     echo "<script > document.location ='logout.php'; </script>";
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
    }else{
        echo "<script>alert('Error');</script>";
    }
}
if (isset($_POST['save'])) {
   $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city_name = $_POST['city_name'];
    $email = $_POST['email'];
   
//$con = mysqli_connect("localhost:3306", "root", "123456", "studentdb");
$sql = "INSERT INTO tbl_student VALUES ('$first_name','$last_name','$city_name','$email','')";
if ($con->query($sql) === TRUE) {
      echo "<script > document.location ='index.php'; </script>";  
//      $result = mysqli_query($link, $sqi);
//    while($row = mysqli_fetch_assoc($result)){
} else {
echo '<script language="javascript">';
echo 'alert("Error Please Check ID <br> IN CASE URGE CONTACT 0938413438")';
echo '</script>';
}
}
//    $con->close();
// output data of each row
?>
    </body>
</html>
