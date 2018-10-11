<?php
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST")
{
	$server = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b798786b8aa714";
    $password = "2e0e0451";
    $db = "heroku_ce52199dd4f50e1";
    $conn = new mysqli($server, $username, $password, $db);
	mysqli_query($conn, "SET NAMES utf8");
	
	$number = $_POST["number"];
	$office = $_POST["office"];
	$docnumber = $_POST["docnumber"];
	$docdate = $_POST["docdate"];
	$listtest = $_POST["listtest"];
	$testsuccess = $_POST["testsuccess"];
	$successdate= $_POST["successdate"];
	$listtestsuccess = $_POST["listtestsuccess"];
	//echo $number." ".$office." ".$docnumber;
	$sql = "INSERT INTO inserttesting(number,office,docnumber,docdate,docnumber,listtest,testsuccess,successdate,listtestsuccess) VALUES('$number','$office','$docnumber','$listtest','$testsuccess','$successdate','$listtestsuccess')";
	$result = mysqli_query($conn, $sql) or trigger_error($conn->erro,office,docnumberr."[$sql]");
	echo '<script type="text/javascript">';
	echo 'window.location.href="inserttesting.php";';
	echo '</script>';
}
else
{
	echo "Method Not Allow!!!!";
}
?>