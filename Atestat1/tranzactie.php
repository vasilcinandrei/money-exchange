
<!DOCTYPE html>
<html>
<title>Evidenta</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Meniu</button>
  <span align = "center" class="w3-bar-item w3-left-side" >Tranzactie reusita!</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="graph-logo.jpg" class="w3-circle w3-right-side" style="width:300px" >
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Tablou de comanda</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
     <a href="tranz.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-handshake-o fa-fw"></i>  Tranzactii</a>
    <a href="zi.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Ziua curenta</a>
    <a href="monede.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>  Monede</a>
    <a href="profit.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Profit</a>
	<a href="index.html"class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  Acasa</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
<center>
<h1>
<div style="position: absolute; top: 40%; left:46%;">
<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "schimbvalutar");
$var= $_POST['TIP'];
$sum = $_POST['SUMA'];
$idv = $_POST['ID_V'];
//VANZARE
if($_POST['TIP'] != "Cumparare")
{
	//extragere curs
$j ="SELECT Vanzare
	   FROM curs
	   WHERE Denumire ='".$_POST['ID_V']."'";
$rezulta = mysqli_query($link,$j);
$r=mysqli_fetch_array($rezulta);

$vinde = ($_POST['SUMA']/($r['Vanzare']));

//update valuta
$m = "UPDATE valuta
SET Sold_Final = (Sold_Final- $vinde)
WHERE Denumire = '".$_POST['ID_V']."'";
mysqli_query($link,$m);

// update lei
$c = "UPDATE valuta
SET Sold_Final = (Sold_Final + '".$_POST['SUMA']."')
WHERE id_valuta = 6";
mysqli_query($link,$c);


$m = "SELECT Denumire
      FROM valuta
	  WHERE '".$_POST['ID_V']."' = Denumire";
$s = mysqli_query($link,$m);
$f = mysqli_fetch_array($s);
$z = $f['Denumire'];


echo '<span style="color:green;text-align:center;">De primit: </span>';
echo $_POST['SUMA']." ";
echo " RON <br>";


echo '<span style="color:red;text-align:center;">De dat: </span>';
echo " ".round($vinde,2);
echo " ".$z;

}
// verificare tranzactie
//CUMPARARE
if($_POST['TIP'] == "Cumparare")
{
	
	//extragere curs
$v ="SELECT Cumparare
	   FROM curs
	   WHERE Denumire ='".$_POST['ID_V']."'";
$result = mysqli_query($link,$v);
$row=mysqli_fetch_array($result);


$cump = ($_POST['SUMA'] * $row['Cumparare']);
//update valuta
$q1 = "UPDATE valuta
SET Sold_Final = (Sold_Final + '".$_POST['SUMA']."')
WHERE '".$_POST['ID_V']."' = Denumire";
mysqli_query($link,$q1);

// update lei
$q2 = "UPDATE valuta
SET Sold_Final = (Sold_Final - $cump)
WHERE id_valuta = 6";
mysqli_query($link,$q2);

$h = "SELECT Denumire
      FROM valuta
	  WHERE '".$_POST['ID_V']."' = Denumire";
$o = mysqli_query($link,$h);
$p = mysqli_fetch_array($o);
$u = $p['Denumire'];

echo '<span style="color:green;text-align:center;">De primit: </span>';
echo $_POST['SUMA']." ";
echo $u."<br>";


echo '<span style="color:red;text-align:center;">De dat: </span>';
echo round($cump,2);
echo " RON";



}

$x = "SELECT max(id_client)
	  AS mxim
	  FROM client";
$e = mysqli_query($link,$x);
$w = mysqli_fetch_array($e);
$i = $w['mxim']+1;

$y = "SELECT max(id_tranzactie)
	  AS maxi
	  FROM tranzactie";
$l = mysqli_query($link,$y);
$t = mysqli_fetch_array($l);
$k = $t['maxi']+1;


$qt="INSERT INTO tranzactie
     VALUES(".$k.",".$i.",'".$_POST['TIP']."','".$_POST['Data']."','".$_POST['ID_V']."','".$_POST['SUMA']."')";
mysqli_query($link,$qt);


$q="INSERT INTO client
     VALUES(".$i.",'".$_POST['NUME']."','".$_POST['CNP']."','".$_POST['Data']."','".$_POST['TIP']."','".$_POST['ID_V']."','".$_POST['SUMA']."')";
mysqli_query($link,$q);


  ?>
  </center>

  <!-- End page content -->
</div>
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>







