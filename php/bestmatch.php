
<!Doctype html>

<html>
<head>
      <title>show career options  </title>
      <link rel="stylesheet"  type="text/css" href="designs/second.css" >
 
</head>

<body>



<div class="container2">  
     
<?php

session_start();
$name=$_POST['fullname'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$a=array();

echo "<h1>You select following skillsets </h1>";

foreach($_POST['skill'] as $i){
   echo "<h2> $i </h2>";
   $a[]=$i; 
}

// database


$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'divyanshca2');

//$q=" select careerOptions, Group by (count(skillsets)) (select careerOptions from jobportal where skillsets in ($a[0],$a[1],$a[2],$a[3],$a[4]))  ";
$q="select DISTINCT careerOptions from jobportal where skillsets in ('$a[0]','$a[1]','$a[2]','$a[3]','$a[4]')";
$result=mysqli_query($con,$q);

$num=mysqli_num_rows($result);
echo "<h1> You can choose following career options</h1>";
for($i=1; $i<=$num;$i++){
    $row=mysqli_fetch_array($result);
    echo $row['careerOptions']." "; 
    
    
}



?>
</div>
</body>
</html>





