<?php
  $conn=mysqli_connect("localhost","root","","eduversity");
  if($conn->connect_error){
  	die("connection failed:".$conn->connect_error);
  }
  $f_name=$_REQUEST['fname'];
  $l_name=$_REQUEST['lname'];
  $email_id=$_REQUEST['email'];
  $mobile_no=$_REQUEST['mob'];
  $password=$_REQUEST['pass'];

  $sql_u="SELECT * from registration_master WHERE email_id='$email_id'";
  $res_u=mysqli_query($conn,$sql_u);

  if(mysqli_num_rows($res_u)>0){
   
     echo '<script>
         alert("sorry...username already exist.");
         location.href="http://localhost/SE/eduversity/web/index.html";
      </script>';
  }
  else{

  $sql="INSERT INTO registration_master VALUES ('$f_name','$l_name','$email_id',
  	'$mobile_no','$password')";

  if(mysqli_query($conn,$sql)){
  	
     echo '<script>
         alert("Your data stored successfully.");
         location.href="http://localhost/SE/eduversity/web/course.html";
      </script>';
  }
  else{
  	echo "ERROR: Hush !sorry $sql.".mysqli_error($conn);
  }
}
  mysqli_close($conn);

?>

