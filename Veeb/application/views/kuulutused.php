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
/* INCLUSION OF LIBRARY FILEs*/
	require_once( 'Facebook/FacebookSession.php');
	require_once( 'Facebook/FacebookRequest.php' );
	require_once( 'Facebook/FacebookResponse.php' );
	require_once( 'Facebook/FacebookSDKException.php' );
	require_once( 'Facebook/FacebookRequestException.php' );
	require_once( 'Facebook/FacebookRedirectLoginHelper.php');
	require_once( 'Facebook/FacebookAuthorizationException.php' );
	require_once( 'Facebook/GraphObject.php' );
	require_once( 'Facebook/GraphUser.php' );
	require_once( 'Facebook/GraphSessionInfo.php' );
	require_once( 'Facebook/Entities/AccessToken.php');
	require_once( 'Facebook/HttpClients/FacebookCurl.php' );
	require_once( 'Facebook/HttpClients/FacebookHttpable.php');
	require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php');
/* USE NAMESPACES */
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;
					
if(isset($sess)){
			$_SESSION['fb_token']=$sess->getToken();
	 		//create request object,execute and capture response
		$request = new FacebookRequest($sess, 'GET', '/me');
		// from response get graph object
		$response = $request->execute();
		$graph = $response->getGraphObject(GraphUser::className());
		// use graph object methods to get user details
		$id = $graph->getId(); 
		$name= $graph->getName();
		//$image='https://graph.facebook.com/'.$id.'/picture?width=300';
		             // To Get Facebook ID
 	    	$fbuname = $graph->getProperty('username');  // To Get Facebook Username
 	    	$fbfullname = $graph->getProperty('name'); // To Get Facebook full name
	   	 $femail = $graph->getProperty('email');    // To Get Facebook email ID
		echo "hi $name <br>";
		echo "email: $femail <br>";
		echo "Full name: $fbfullname <br>";
		//echo "Image: $image <br>";
		
			


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
$id = $graph->getId();
$autor = "SELECT UID FROM users WHERE users.fuid=$id";
$result=mysql_query($autor);
$value=mysql_fetch_array($result);
$vastus=$value[0];
$pealkiri = $_POST['pealkiri'];
$algus = $_POST['algus'];
$lopp = $_POST['lopp'];
$lahtekoht = $_POST['lahtekoht'];
$sihtkoht = $_POST['sihtkoht'];
$transport = $_POST['transport'];
$info = $_POST['info'];

$sql = "INSERT INTO kuulutus (pealkiri, autor, algus, lopp, lahtekoht, sihtkoht, transport, info)
VALUES ('$pealkiri', '$vastus', '$algus', '$lopp', '$lahtekoht', '$sihtkoht', '$transport','$info')";

if (mysqli_query($conn, $sql)) {
    echo "Andmed said edukalt lisatud!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

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

$id = $graph->getId(); 
$sql1 = "SELECT COUNT(*) as kokku FROM kuulutus,users WHERE kuulutus.autor=users.UID AND users.fuid=$id GROUP BY kuulutus.autor";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
	echo 'Sinu kuulutuste arv: ';
	  while($row = $result1->fetch_assoc()) {
	echo $row["kokku"]. "<br>"; }}

?> 
 <button onclick="vaata('reka');">Vaata oma kuulutusi</button>

<div id="reka" class="reka">
<?php	

$sql = "SELECT kuulutus.pealkiri, kuulutus.algus, kuulutus.lopp, kuulutus.lahtekoht, kuulutus.sihtkoht, kuulutus.transport, kuulutus.info, 
CONCAT(users.ffname ,'\n', users.femail) as 'andmed' FROM kuulutus JOIN users WHERE kuulutus.autor=users.UID AND 
users.fuid=$id";
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
}}


$conn->close(); 
?>  </div>


<?php
}else {
     echo "Kuulutusi saavad lisada ainult sisse loginud kasutajad.";
}
?>
 </section>
					</div>
				</div>
				</div>


<?php
include('footer.php');
?>