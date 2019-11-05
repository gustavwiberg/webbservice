function get_menu() { 
    obj = {};
    obj.api_key = '44.5dc141c4181341.69350831'; 

    $.ajax({
        url: "./menuservice.php",
        data: { credentials : obj },
        dataType: 'json',
        method: 'POST',
        success: function( result ) {
            if ( result.status.length > 0) {
                $('#menuboard').html(result.status);
            }
            else {
                $('#menuboard').html('Login failed');
            }
        },
        error: function( result ) {        
            alert('error occured at request');               
        }
    });
}