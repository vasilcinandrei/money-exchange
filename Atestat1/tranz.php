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
  <span align = "center" class="w3-bar-item w3-left-side" >Tranzactie...</span>
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
<body>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">


  <!-- Header -->
<div style="position: absolute; top: 3%; right:33%;">
  <h3> Curs valutar oferit de casa de schimb (RON)  </h3>
  </div>
<div style="position: absolute; top: 10%; right:30%;">
<center><h5>Cumparare</h5></center>
<?php

 $link = mysqli_connect("localhost", "root", "");
 mysqli_select_db($link, "schimbvalutar");

 $q = "SELECT Denumire, Cumparare
		FROM curs";
$result = mysqli_query($link,$q);
while($row=mysqli_fetch_array($result))
	

{
    echo '<table border = "2">';
     
     echo "<tr>";
     echo "<th>".$row['Denumire']."</th>";
     echo "<td>".$row['Cumparare']."</td>";
      echo "</tr>";
     echo "</table>";

}
?>
</div>
<div style="position: absolute; top: 10%; left:40%;">
<center><h5>Vanzare</h5><center>
<?php

 $link = mysqli_connect("localhost", "root", "");
 mysqli_select_db($link, "schimbvalutar");
 $q = "SELECT Denumire, Vanzare
		FROM curs";
$result = mysqli_query($link,$q);
while($row=mysqli_fetch_array($result))
{
    echo '<table border = "2">';
  echo '<tr>';
    echo '<th>'.$row['Denumire'].'</th>';
    echo '<td>'.$row['Vanzare'].'</td></tr>';
    echo '</table>';
}
?>

</div>
<div style="position: absolute; top: 40%; left:17%;">
<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "schimbvalutar");
?>
<html>
  <h2>Tranzactie:</h2>
  <form action = "tranzactie.php" method = "POST">
<table border = "2">
<!--
   <th>ID</th>
   <td><input type = "textbox" name = "ID"></td> -->
    <th>Nume</th>
	<br><td><input type = "textbox" name ="NUME" pattern="[A-Za-z]"></td>
    <th>CNP</th>
	<td><input type = "textbox" name= "CNP" pattern="[0-9]{13}"></td>
	<th>Data:</th>
   <td><input type = "date" name ="Data"></td>
   <th>Tip:</th>
   <td>
   <input type="checkbox" name="TIP" value= "Cumparare" >Cumparare</td>
   <td><input type="checkbox" name="TIP" value=" Vanzare" > Vanzare</td>
   <th>ID Valuta:</th>
   <td><select name = "ID_V">
    <?php
	$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "schimbvalutar");
$q = "SELECT Denumire FROM curs";
$result = mysqli_query($link,$q);
while($row = mysqli_fetch_array($result))
	echo '<option>'.$row['Denumire'].'</option>';
?>
   </td>
   <th>Suma:</th>
   <td><input type = "textbox" name ="SUMA" pattern="[0-9]"></td>
</table>
<br><input type = "submit" value = "Trimite!">
</form>
</html>


<br><fieldset>
<legend>Convertor</legend>
<form action = "convertor.php" method = "POST">

Suma:<input type = "textbox" name ="SUMA"><br>
Valuta <input type="checkbox" name="TIP" value= "Cumparare" ><br>
Lei <input type="checkbox" name="TIP" value=" Vanzare" > <br>
 ID Valuta:<select name = "ID_V">
 <?php
$q = "SELECT Denumire, id_valuta FROM valuta";
$result = mysqli_query($q);
while($row = mysqli_fetch_array($result))
	echo '<option>'.$row['Denumire'].'</option>';
?>
</select>
<input type="submit" value = "Trimite!">
</form>
</fieldset>


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