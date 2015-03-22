<?php
include('header.php');
?>
<?php
//session_start();
// added in v4.0.0
require_once 'fbautoload.php';

 require_once( 'Facebook/FacebookSession.php' );
    require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
    require_once( 'Facebook/FacebookRequest.php' );
    require_once( 'Facebook/FacebookResponse.php' );
    require_once( 'Facebook/FacebookSDKException.php' );
    require_once( 'Facebook/FacebookRequestException.php' );
    require_once( 'Facebook/FacebookAuthorizationException.php' );
    require_once( 'Facebook/GraphObject.php' );
	require_once('Facebook/Entities/AccessToken.php');
	require_once('Facebook/HttpClients/FacebookHttpable.php');
	require_once( 'Facebook/HttpClients/FacebookCurl.php' );
	require_once('Facebook/HttpClients/FacebookCurlHttpClient.php');
	



    use Facebook\FacebookSession;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookRequest;
    use Facebook\FacebookResponse;
    use Facebook\FacebookSDKException;
    use Facebook\FacebookRequestException;
    use Facebook\FacebookAuthorizationException;
    use Facebook\GraphObject;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;


// start session

// init app with app id and secret
FacebookSession::setDefaultApplication('1463194253970485', '6540067fcf7c014be0cb396f0cbfe8c1');

// login helper with redirect_uri

    $helper = new FacebookRedirectLoginHelper('http://transporttech.cs.ut.ee/index.php/main/n6uded' );

try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}

// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();

		$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbuname = $graphObject->getProperty('username');  // To Get Facebook Username
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
	    $_SESSION['USERNAME'] = $fbuname;
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
    echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';
} else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
}

?>

<?php
require 'dbconfig.php';
function checkuser($fuid,$ffname,$femail){
    	$check = mysql_query("select * from users where fuid='$fuid'");
	$check = mysql_num_rows($check);
	if (empty($check)) { // if new user . Insert a new record		
	$query = "INSERT INTO users (fuid,ffname,femail) VALUES ('$fuid','$ffname','$femail')";
	mysql_query($query);	
	} else {   // If Returned user . update the user record		
	$query = "UPDATE users SET ffname='$ffname', femail='$femail' where fuid='$fuid'";
	mysql_query($query);
	}
}?>



 <?php if ($_SESSION['FBID']): ?>
		<div class="container" id="welcome">
			<div class="hero-unit">
				<div class="row">
					<div class="12u skel-cell-important">
						<section class="content">





  <h1>Hello <?php echo $_SESSION['USERNAME']; ?></h1>
    
<div class="span4">
 <ul class="nav nav-list">
<li class="nav-header">Image</li>
	<li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
<li class="nav-header">Facebook ID</li>
<li><?php echo  $_SESSION['FBID']; ?></li>
<li class="nav-header">Facebook fullname</li>
<li><?php echo $_SESSION['FULLNAME']; ?></li>
<li class="nav-header">Facebook Email</li>
<li><?php echo $_SESSION['EMAIL']; ?></li>
<div><a href="/logout.php">Logout</a></div>
</ul></section></div></div>

<?php else: ?>     <!-- Before login --> 
<div class="container" id="welcome">
			<div class="hero-unit">
				<div class="row">
					<div class="12u skel-cell-important">
						<section class="content">

<h1>Login with Facebook</h1>
           Not Connected
<div>
     <a href="/fbconfig.php">Login with Facebook</a>	
      </div>
    <?php endif ?>



        </section>
					</div>
				</div>
				</div>
<?php
include('footer.php');
?>