
<?php
include('header.php');
?>


<div class="container" id="welcome">
				<div class="row">
					<div class="12u skel-cell-important">
						<section class="content">							
<?php
// Set session variables
$_SESSION["page"] = $_SERVER['REQUEST_URI'];
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

$sql = "SELECT kuulutus.pealkiri, kuulutus.algus, kuulutus.lopp, kuulutus.lahtekoht, kuulutus.sihtkoht, 
kuulutus.transport, kuulutus.info, CONCAT(users.ffname ,'\n', users.femail) as 'andmed' 
FROM kuulutus JOIN users WHERE kuulutus.autor=users.UID";
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
	
                            <div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
        </section>
					</div>
				</div>
				</div>
<?php
include('footer.php');
?>