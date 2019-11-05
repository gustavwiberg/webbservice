<?php
$success = false;
if (isset($_POST['username']) && isset($_POST['surname'])) {
    $success = true;  
    $data_id = 44;    
    $apikey = uniqid($data_id.'.',true);  
    $hashed_apikey = password_hash($apikey, PASSWORD_BCRYPT);
    /*Store new user in the database! (Example below)

    apikey: {value of $hashed_apikey}
    username: {value of username}
    surname: {value of surname}

    */
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registera användare</title>
</head>
<body>
    <?php
    if ($success) {
        echo '<h1>Tack för din registrering!</h1><br>';        
        echo 'API-nyckel: ' . $apikey . '<br>';
        echo 'HASHED value API-nyckel: ' . $hashed_apikey;
        echo '<br><br><strong>Spara denna nyckel</strong> då nyckeln inte kan visas av vår webbtjänst vid senare tillfälle av säkerhetsskäl!!!<br>';
    }
    else {
        echo 'Något gick snett. Försök igen.';
    }
    ?>
</body>
</html>