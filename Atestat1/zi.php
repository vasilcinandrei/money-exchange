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
  <span align = "center" class="w3-bar-item w3-left-side" >Ziua curenta</span>
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
    <a href="cdata.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar-plus-o"></i>  Cautare dupa data</a>
    <a href="cdn.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Cautare dupa CNP sau nume</a>
 
    <a href="sterge.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-close"style="font-size:24px"></i> Stergerea unei tranzactii</a>
	<a href="index.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  Acasa</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
<center>
   <!DOCTYPE html>
<html>
<style>
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
  
  <?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "schimbvalutar");
//ziua curenta

$q = "SELECT Nume, CNP, Data, Tip, id_valuta, Suma
	  FROM client
	  WHERE Data = Date(NOW())";
$result = mysqli_query($link,$q);
echo '<table border = "2">';
echo '<tr>';
echo '<th>Nume</th>';
    echo '<th>CNP</th>';
    echo '<th>Data</th>';
    echo '<th>Tip</th>';
    echo '<th>Valuta</th>';
    echo '<th>Suma</th></tr>';
while($row= mysqli_fetch_array($result))
{
    	echo '<tr>';
	
	echo '<td>'.$row['Nume'].'</td>';
	echo '<td>'.$row['CNP'].'</td>';
	echo'<td>'.$row['Data'].'</td>';
    echo '<td>'.$row['Tip'].'</td>';
    echo '<td>'.$row['id_valuta'].'</td>';
    echo '<td>'.$row['Suma'].'</td></tr>';
  
}
?>
  </center>
 </table>;
  
  
  
  
  
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
