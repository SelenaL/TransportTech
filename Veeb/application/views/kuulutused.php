<?php
include('header.php');
?>
		<div class="container" id="welcome">
				<div class="row">
					<div class="12u skel-cell-important">
						<section class="content">	

<?php
if(isset($_POST['add']))
{
$servername = "localhost";
$username = "tt";
$password = "v66diline";
$dbname = "tt";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$pealkiri = $_POST['pealkiri'];
$algus = $_POST['algus'];
$lopp = $_POST['lopp'];
$lahtekoht = $_POST['lahtekoht'];
$sihtkoht = $_POST['sihtkoht'];
$transport = $_POST['transport'];
$info = $_POST['info'];
$sql = "INSERT INTO kuulutus (pealkiri, algus, lopp, lahtekoht, sihtkoht, transport, info)
VALUES ('$pealkiri', '$algus', '$lopp', '$lahtekoht', '$sihtkoht', '$transport','$info')";

if (mysqli_query($conn, $sql)) {
    echo "Andmed said edukalt lisatud!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
else
{
?>				
<form method="post">
<table>
<tr>
<td>Pealkiri</td>
<td><input name="pealkiri" type="text" id="pealkiri"></td>
</tr>
<tr>
<td>Algus</td>
<td><input name="algus" type="text" id="algus"></td>
</tr>
<tr>
<td>L&otilde;pp</td>
<td><input name="lopp" type="text" id="lopp"></td>
</tr>
<tr>
<td> L&auml;htekoht</td>
<td><input name="lahtekoht" type="text" id="lahtekoht"></td>
</tr>
<tr>
<td> Sihtkoht</td>
<td><input name="sihtkoht" type="text" id="sihtkoht"></td>
</tr>
<tr>
<td> Transport</td>
<td><input name="transport" type="text" id="transport"></td>
</tr>
<tr>
<td> Info</td>
<td><input name="info" type="text" id="info"></td>
</tr>
<tr>
<td> </td>
<td>
<input name="add" type="submit" id="add" value="Lisa kuulutus">
</td>
</tr>
</table>
</form>
<?php

$servername = "localhost";
$username = "tt";
$password = "v66diline";
$dbname = "tt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT kuulutus.pealkiri, kuulutus.algus, kuulutus.lopp, kuulutus.lahtekoht, kuulutus.sihtkoht, kuulutus.transport, kuulutus.info, CONCAT(user.name ,'\n', user.email ,
 '\n', user.telefon) as 'andmed' FROM kuulutus JOIN user WHERE kuulutus.autor=user.id GROUP BY kuulutus.autor, kuulutus.lopp HAVING kuulutus.autor=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
	echo '<table>';
	echo '<tr>';
	echo '<th>';
	echo 'Pealkiri';
	echo '</th>';
	echo '<th>';
	echo 'Kuulutuse kestvus';
	echo '</th>';
	echo '<th>';
	echo 'Lähtekoht';
	echo '</th>';
	echo '<th>';
	echo 'Sihtkoht';
	echo '</th>';
	echo '<th>';
	echo 'Transpordi liik';
	echo '</th>';
	echo '<th>';
	echo 'Lisainfo';
	echo '</th>';
	echo '<th>';
	echo 'Kuulutuse lisaja andmed';
	echo '</th>';
	echo '</tr>';
	 
     while($row = $result->fetch_assoc()) {
	echo "<tr>";
	 

	 echo '<td>';
          echo "<br>". $row["pealkiri"]. "";   
	echo "</td>";  
	echo  "<td>";
	 echo "<br> ". $row["algus"]. " kuni " . $row["lopp"] . "<br>";   
	
	 echo "</td>";
	echo  "<td>";
	 echo "<br>". $row["lahtekoht"]. "<br>";   
	 echo "</td>";

	echo  "<td>";
	 echo "<br>". $row["sihtkoht"]. "<br>";   
	
	 echo "</td>";
	echo  "<td>";
	 echo "<br>". $row["transport"]. "<br>";   
	
	 echo "</td>";
	
	echo  "<td>";
	 echo "<br>". $row["info"]. "<br>";   
	
	 echo "</td>";
	echo  "<td>";
	 echo "<br>". $row["andmed"]. "<br>";   
	
	 echo "</td>";
	
	

	 echo "</tr>";
	}echo "</table>";

} else {
     echo "0 results";
}

$conn->close();
?>  


<?php
}
?>
 </section>
					</div>
				</div>
				</div>


<?php
include('footer.php');
?>