<?php
require 'google-api/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('938791221679-l37utprrr5c0rsjrcjqmblgrl8fh693m.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('https://tahaanpestsolutions.com');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");



if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // getting profile information
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // showing profile info
    echo "<pre>";
    print_r($google_account_info);
    echo json_encode($google_account_info);
    
    

else: 
    // Google Login Url = $client->createAuthUrl(); 
?>

    <a class="login-btn" href="<?php echo $client->createAuthUrl(); ?>">
        <img src="https://i.stack.imgur.com/VHSZf.png" alt="Google-login"/>
    </a>

<?php endif; ?>
