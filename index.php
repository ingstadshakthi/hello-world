
<?php
class script{

public $con;

public function __construct(){

$server = "lab6.cjubyifhvfit.ap-south-1.rds.amazonaws.com";
$user = "lab6";
$pass = "lab123456";
$db = "veena";

$this->con = mysqli_connect($server,$user,$pass,$db) or die("unable to connect");

}


public function add($name, $price){

$server = "lab6.cjubyifhvfit.ap-south-1.rds.amazonaws.com";
$user = "lab6";
$pass = "lab123456";
$db = "veena";

$this->con = mysqli_connect($server,$user,$pass,$db) or die("unable to connect");

$sql = "insert into books(bookname, price) values('".urlencode($name)."', '".urlencode($price)."')";
$res = mysqli_query($this->con, $sql) or die("unable to insert");

if($res){
echo "insert successful!";
}else{
echo "insert unsuccessful";
}

}

public function getdata() {

$server = "lab6.cjubyifhvfit.ap-south-1.rds.amazonaws.com";
$user = "lab6";
$pass = "lab123456";
$db = "veena";

$this->con = mysqli_connect($server,$user,$pass,$db) or die("unable to connect");

$sql = "select * from books";
$res = mysqli_query($this->con, $sql) or die("unable to fetch");
$cp = mysqli_fetch_assoc($res);

if(count($cp)){
echo'
<table>
  <tr>
    <th>Book name</th>
    <th>Price</th>
  </tr>
';
while($row = mysqli_fetch_array($res)){
echo'
<tr>
    <td>'.urlencode($row['bookname']).'</td>
    <td>'.urlencode($row['price']).'</td>
</tr>
';
}

echo'
<table>';
}else{
echo "No data found!";
}

}

}
?>


<html>
<body style="background-color:powderblue;" >

<form method = "post">
Name: <input type = "text" name = "bname"><br><br>
Price : <input type = "text" name = "bprice"><br><br>
<input type = "submit" name = "sub">
</form>

<?php

$script = new script();
if(isset($_POST['sub'])){
$script->add($_POST['bname'], $_POST['bprice']);
}

$script->getdata();

?>

</body>
</html>
