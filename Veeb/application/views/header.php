<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_SESSION['page']) && isset($_GET['code'])) {
   $url = $_SESSION['page']; // holds url for last page visited.
	unset($_SESSION['page']);
	header("Location: http://transporttech.cs.ut.ee$url");
}
?>
<!DOCTYPE HTML>
<?php
if(isset($_SERVER['REQUEST_URI'])&& $_SERVER['REQUEST_URI']=='/index.php/main/kontakt'){
 echo '<html manifest="/manifest.manifest">';
}
else{
echo '<html>';}
?>
<head>
		<meta charset="utf-8">
	<title>Veoteenused</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="/kujundus.css" />
			<script src="/pilt.js" type="text/javascript"></script>
                       			<script src="/JS.js" type="text/javascript"></script>

			</head>
<body>
<br>
			<div class="container">
				<div id="header">

                                    <?php
/*	FACEBOOK LOGIN BASIC - PHP SDK V4.0
 *	file 			- index.php
 * 	Developer 		- Krishna Teja G S
 *	Website			- http://packetcode.com/apps/fblogin-basic/
 *	Date 			- 27th Sept 2014
 *	license			- GNU General Public License version 2 or later
*/
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
/*PROCESS*/
if(isset($_SERVER['REQUEST_URI'])&& $_SERVER['REQUEST_URI']!='/index.php/main/kontakt'){
	if(isset($_REQUEST['logout']))
	{
	unset($_SESSION['fb_token']);
	}
	//2.Use app id,secret and redirect url
	 $app_id = '1463194253970485';
	 $app_secret = '6540067fcf7c014be0cb396f0cbfe8c1';
	$redirect_url= 'http://transporttech.cs.ut.ee/';	 
	 //3.Initialize application, create helper object and get fb sess
	 FacebookSession::setDefaultApplication($app_id,$app_secret);
	 $helper = new FacebookRedirectLoginHelper($redirect_url);
	 $sess = $helper->getSessionFromRedirect();

	if(isset($_SESSION['fb_token'])){
	$sess= new FacebookSession($_SESSION['fb_token']);	
}
	$logout= 'http://transporttech.cs.ut.ee/index.php/?logout=true';
	//4. if fb sess exists echo name 
	 	if(isset($sess)){
			$_SESSION['fb_token']=$sess->getToken();
	 		//create request object,execute and capture response
		$request = new FacebookRequest($sess, 'GET', '/me');
		// from response get graph object
		$response = $request->execute();
		$graph = $response->getGraphObject(GraphUser::className());
		$id = $graph->getId(); 
		$name= $graph->getName();
 	    	$fbuname = $graph->getProperty('username');  // To Get Facebook Username
 	    	$fbfullname = $graph->getProperty('name'); // To Get Facebook full name
	   	$femail = $graph->getProperty('email');    // To Get Facebook email 
		echo "Tere $name!<br>";
		// echo "Image: $image <br>";
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
		$query = mysql_query("SELECT * FROM users WHERE fuid='$id'");
		if(mysql_num_rows($query) > 0){
    			echo "Tere tulemast tagasi!<br>";
		}
		else{
		$sql = "INSERT INTO users (fuid, ffname, femail)
		VALUES ('$id', '$fbfullname', '$femail')";

		if (mysqli_query($conn, $sql)) {
    		echo "Andmed said edukalt lisatud andmebaasi!";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
		}
	
	echo "<a href='".$logout."'><img src=http://www.plantdays.com/img/fb-logout.png alt='Logi v�lja' ></a>";
	}else{?>
				
		<a href="<?php echo htmlspecialchars($helper->getLoginUrl()); ?>"><img src="/fb_button.png" alt="Logi sisse Facebookiga"></a>
		<?php
	}}
?>
					<div id="logo">
						<h1><a href="<?php echo site_url('/main/home');?>">Veoteenused</a></h1>	
					</div>
					<nav id="nav"> 
						<ul>
							<li><a href="<?php echo site_url('/main/home');?>" title="Avaleht">Avaleht</a></li>
							<li><a href="<?php echo site_url('/main/kuulutused');?>" title="Minu kuulutused">Minu kuulutused</a></li>
							<li><a href="<?php echo site_url('/main/hinnakiri');?>" title="Hinnakiri">Hinnakiri</a></li>
							<li><a href="<?php echo site_url('/main/reklaam');?>" title="Reklaam">Reklaam</a></li>
                                                 <li><a href="<?php echo site_url('/main/n6uded');?>" title="Nõuded">Nõuded</a></li>
                                                 <li><a href="<?php echo site_url('/main/kontakt');?>" title="Kontakt">Kontakt</a></li>
						</ul>
					</nav>
				</div>
			</div>