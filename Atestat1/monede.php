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
    text-align: left;
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
    width: 900px;
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
 <div style="position: absolute; top: 28%; right:18%;">
 <?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"schimbvalutar");
//ziua curenta

$q = "SELECT Denumire,Sold, Sold_Final
      FROM valuta ";
$result = mysqli_query($link,$q);

echo '<table border = "1" width = "700">';
echo '<tr><th>'."Denumire".'</th>';
	 echo '<th>'."Sold".'</th>';
	 echo '<th>'."Sold final".'</th></tr>';
while($row=mysqli_fetch_array($result))
{

    
     
 
	 echo '<tr>';
     echo '<td>'.$row['Denumire'].'</td>';
     echo "<td>".$row['Sold']."</td>";
     echo "<td>".$row['Sold_Final']."</td>";
     echo '</tr>';
     

}
echo "</table>";

?>
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
