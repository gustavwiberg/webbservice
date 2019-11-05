<?php
/*
    Your misson:
    One user has one restaurant
    Get menu from a specific restaurant
*/
$status = array();
$pa = $_POST;
if (!isset($pa)) $status[] = 'Fel metodtyp används.';

//One item in array that contains an array
if (count($pa) != 1) $status[] = 'Felaktiga parametrar eller icke värden.';

//Check so all expected fields are sent here
$credentials = null;
if (isset($pa['credentials'])) $credentials = $pa['credentials'];
if (count($credentials) == 1) {
    if (!isset($credentials['api_key'])) {
        $status[] = '404 Not authorized';
    }

    if (isset($credentials['api_key'])) {        
        //Check for validity of api key
        //Checked for the HASHED value of 5dc096fd3581a8.20850493

        $getid = explode('.',$credentials['api_key']);
        $db_rowid = $getid[0];

        //Example: $2y$10$kzTqvrFpDp9Cs2p3C5Xt1.Ng9QHbqlAOcULw09BYz3NKo2KbLZCFW        
        //Above is a hashed value of api-key: 5dc09921169521.57117746
        $apikey = $credentials['api_key']; //5dc09921169521.57117746 in this example
        
        //This is fetched from db based on username:
        $hashed_apikey = '$2y$10$kzTqvrFpDp9Cs2p3C5Xt1.Ng9QHbqlAOcULw09BYz3NKo2KbLZCFW';


        $status[] = 'Testar med API-nyckel: ' . $apikey . '<br>';
        if (password_verify($apikey, $hashed_apikey)) {
            $status[] = 'Din API-nyckel är korrekt';
            $status[] = 'Användare rad id:' . $db_rowid;
            //TODO: Show menu for this user

        } else {
            $status[] = 'Din apinyckel är felaktig.';
        }        
    }
    else {
        $status[] = 'Login failure';
    }
}


$result = array();
$result['status'] = implode('<br>', $status);
echo json_encode($result);
