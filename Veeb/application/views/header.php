
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<head>
		<meta charset="utf-8">
	<title>Veoteenused</title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css" />
		
		
			<link rel="stylesheet" href="/kujundus.css" />
                        <script src="/cufon-yui.js" type="text/javascript"></script>
                    <script src="/ChunkFive_400.font.js" type="text/javascript"></script>
                    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
                    <script src="/22r.js" type="text/javascript"></script>
			</head>
   <script src="/facebook.js" type="text/javascript"></script>
   <script src="/facebook2.js" type="text/javascript"></script>
                     
			
		
	
	
		
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
		// use graph object methods to get user details
		$id = $graph->getId(); 
		$name= $graph->getName();
		// $image='https://graph.facebook.com/'.$id.'/picture?width=300';
		             // To Get Facebook ID
 	    	$fbuname = $graph->getProperty('username');  // To Get Facebook Username
 	    	$fbfullname = $graph->getProperty('name'); // To Get Facebook full name
	   	$femail = $graph->getProperty('email');    // To Get Facebook email ID
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

			
	echo "<a href='".$logout."'><img src=http://www.plantdays.com/img/fb-logout.png ></a>";
    
	}else{?>
				
		<a href="<?php echo htmlspecialchars($helper->getLoginUrl()); ?>"><img src=http://www.oefitness.com/images/fb_button.png alt="Logi sisse Facebookiga"></a>
		<?php
	}
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
		
		
			