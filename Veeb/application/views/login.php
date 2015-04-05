<?php
include('header.php');
?>
<div class="container" id="welcome">
				<div class="row">
					<div class="12u skel-cell-important">
						<section class="content">
							


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
	 $redirect_url='http://transporttech.cs.ut.ee/index.php/main/n6uded';
	 
	 //3.Initialize application, create helper object and get fb sess
	 FacebookSession::setDefaultApplication($app_id,$app_secret);
	 $helper = new FacebookRedirectLoginHelper($redirect_url);
	 $sess = $helper->getSessionFromRedirect();

	if(isset($_SESSION['fb_token'])){
	$sess= new FacebookSession($_SESSION['fb_token']);	
}
	$logout= 'http://transporttech.cs.ut.ee/index.php/main/n6uded?logout=true';
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
		//$image='https://graph.facebook.com/'.$id.'/picture?width=300';
		             // To Get Facebook ID
 	    	$fbuname = $graph->getProperty('username');  // To Get Facebook Username
 	    	$fbfullname = $graph->getProperty('name'); // To Get Facebook full name
	   	 $femail = $graph->getProperty('email');    // To Get Facebook email ID
		echo "hi $name <br>";
		echo "email: $femail <br>";
		echo "Full name: $fbfullname <br>";
		//echo "Image: $image <br>";
		
			
	echo "<a href='".$logout."'><button>Logout</button></a>";
    
	}else{
		//else echo login
		echo '<a href='.$helper->getLoginUrl().'><img src=http://www.melanidimoda.co/media/facebookfree/default/fb-login-button_small.png></a>';
	}
?>



        </section>
					</div>
				</div>
				</div>
<?php
include('footer.php');
?>