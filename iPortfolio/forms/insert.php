<?php
$server="localhost";
    $user="root";
    $pass="";
    $dbname="details";
    $con =mysqli_connect($server,$user,$pass,$dbname);
    if(!$con)
    {
        die("Error : :  ".mysqli_connect_error());}
if(isset($_POST['name']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$email=$_POST['email'];

$phno=$_POST['phone'];
$query = "INSERT INTO registration1 VALUES ('$uname', '$pass', '$email', '$phno')";
$res = mysqli_query($con,$query);
if($res)
{
$script = "<script>alert('User Registration Successful');";
$script .= "document.writeln('<center><h4><u>User Details</u></h1>');";
$script .= "document.writeln('Your username is:<b> $uname</b><br/>');";
$script .= "document.writeln('Your password is:<b> $pass</b></center>');</script>";
echo $script;
}
else
echo "<script>alert('User Registration Failed');
 window.location = 'registration.html';
</script>"; 
} 
?>

