<!DOCTYPE html>
<html>
<title>SCHIMB VALUTAR</title>
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
  <span align = "center" class="w3-bar-item w3-left-side" >Monede</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div>
      <img src="graph-logo.jpg" style="width:250px" >
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Tablou de comanda</h5>
  </div>
  <div class="w3-bar-block">
    
    <a href="elimina.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-minus-square fa-fw"></i> Eliminare moneda</a>
    <a href="adauga.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plus-square fa-fw"></i>  Adaugare moneda</a>
    <a href="modcurs.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-line-chart fa-fw"></i>  Modificare curs valutar</a>
    <a href="alirem.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-exchange fa-fw"></i>  Alimentari/Remiteri</a>
	<a href="index.html"class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  Acasa</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}


th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
 <!-- Header -->

 <!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 300px;
	height: 300px;
}


th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>


 <div style="position: absolute; top: 20%; left:25%;">
<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"schimbvalutar");
?>
<html>
  <center><h2 style="color:green">Alimentare:</h2></center>
  <form action = "alimentare.php" method = "POST">
<table border = "1">

 <tr>
    <th>Suma</th></tr>
	<tr>
	<td><input type = "number" min="0" step=".01" name= "val"></td></tr>
	<tr>
	<th>Data:</th></tr>
	<tr>
   <td><input type = "date" name ="Data"></td></tr>
   <tr>
   <th>Moneda:</th></tr>
   <tr>
   <td><select name = "denumire">
    <?php
$q = "SELECT Denumire FROM valuta";
$result = mysqli_query($link,$q);
while($row = mysqli_fetch_array($result))
	echo '<option>'.$row['Denumire'].'</option>';
?>
   </td></tr>
</table>
<center><br><input type = "submit" value = "Trimite!"></center>
</form>
</html>


</div>
 
  <div style="position: absolute; top: 20%; left:75%;">
<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"schimbvalutar");
?>
<html>
  <center><h2 style="color:red">Remitere:</h2></center>
  <form action = "remitere.php" method = "POST">
<table border = "1">

 <tr>
    <th>Suma</th></tr>
	<tr>
	<td><input type = "number" min="0" step=".01" name= "val"></td></tr>
	<tr>
	<th>Data:</th></tr>
	<tr>
   <td><input type = "date" name ="Data"></td></tr>
   <tr>
   <th>Moneda:</th></tr>
   <tr>
   <td><select name = "denumire">
    <?php
$q = "SELECT Denumire FROM valuta";
$result = mysqli_query($link,$q);
while($row = mysqli_fetch_array($result))
	echo '<option>'.$row['Denumire'].'</option>';
?>
   </td></tr>
</table>
<center><br><input type = "submit" value = "Trimite!"></center>
</form>
</html>


</div>
 
 
  <!-- Footer 
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>
-->
  <!-- End page content -->
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
