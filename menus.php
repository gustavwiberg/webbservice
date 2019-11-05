<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menytest webbtjänst</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./menu.js"></script>
</head>
<body>
Välkommen för att se vår meny. Vi heter Restaurang X.
   <div id="menuboard"></div> 
   <form>
   <input type="button" value="Skicka" onclick="get_menu();">
   </form>
</body>
</html>