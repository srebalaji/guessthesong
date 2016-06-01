<?php

session_start();
require_once( 'facebook-sdk/src/Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'facebook-sdk/src/Facebook/HttpClients/FacebookCurl.php' );
require_once( 'facebook-sdk/src/Facebook/HttpClients/FacebookCurlHttpClient.php' );
 
require_once('facebook-sdk/src/Facebook/Entities/AccessToken.php');
require_once('facebook-sdk/src/Facebook/Entities/SignedRequest.php');


require_once( 'facebook-sdk/src/Facebook/FacebookSession.php' );
require_once( 'facebook-sdk/src/Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'facebook-sdk/src/Facebook/FacebookRequest.php' );
require_once( 'facebook-sdk/src/Facebook/FacebookResponse.php' );
require_once( 'facebook-sdk/src/Facebook/FacebookSDKException.php' );
require_once( 'facebook-sdk/src/Facebook/FacebookRequestException.php' );
require_once( 'facebook-sdk/src/Facebook/FacebookOtherException.php' );
require_once( 'facebook-sdk/src/Facebook/FacebookAuthorizationException.php' );
require_once( 'facebook-sdk/src/Facebook/GraphObject.php' );
require_once( 'facebook-sdk/src/Facebook/GraphSessionInfo.php' );


use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Entities\AccessToken;
use Entites\SignedRequest;

FacebookSession::setDefaultApplication('335516619949277','9914202041043576fc439457a5573c32');

// Login Healper with reditect URI
$helper = new FacebookRedirectLoginHelper( 'http://localhost/songlovers/fbconfig.php' );

 if (isset($_SESSION) && isset($_SESSION['fb_token'])) {
    // create new session from saved access_token
    
    
    $session = new FacebookSession($_SESSION['fb_token']);
    // validate the access_token to make sure it's still valid
    try {
        if (!$session->validate())
         {
            $session = null;
        }
    } catch (Exception $e) {
        // catch any exceptions
        $session = null;
    }
    
} 

if ( !isset( $session ) || $session === null ) 
 {
    // no session exists
    try {
        $session = $helper->getSessionFromRedirect();
    
    } catch (FacebookRequestException $ex)
     {
        // When Facebook returns an error
    } catch (Exception $ex) {
        // When validation fails or other local issues
        echo $ex->message;
    }
    
}
//second

if(isset($session))
{

 $_SESSION['fb_token'] = $session->getToken();
  // create a session using saved token or the new one we generated at login
  $session = new FacebookSession( $session->getToken() );
  //third
  $request = new FacebookRequest( $session, 'GET', '/me?fields=id,name' );
   $response = $request->execute();

   $data = $response->getGraphObject()->asArray();
  
  // Print data
  
 $data2=json_encode($data,1);
 $data3=json_decode($data2);
  
   $_SESSION['FBID']=$data3->id;
    $_SESSION['FUSERNAME']=$data3->name;
  header("Location: play.php");
  
}
else
{
  // Login URL if session not found
  $permissions = array(
  
  'email',
  
  
);
  //echo '<a href="' . $helper->getLoginUrl($permissions) . '">Login</a>';
  header("Location: ".$helper->getLoginUrl($permissions));
}

?>