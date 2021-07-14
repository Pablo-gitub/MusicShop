$(document).ready(function() {


    $('select').each(function() {

        switch ($(this).attr('data-status')) 
        {
            case '1':
                $(this).children('option[value=1]').prop('selected', true);
                break;
            case '2':
                $(this).children('option[value=2]').prop('selected', true);    
                break;
            case '3':
                $(this).children('option[value=3]').prop('selected', true);
                break;
            case '4':
                $(this).children('option[value=4]').prop('selected', true);
                break;
        }
    });

    $('select').change(function() {

        let status = this.value;
        let id = $(this).attr('name');
        console.log("status " + status + " id " + id);

        $.ajax({
            type: 'POST',
            url: './index-admin.php',
            data: {"st":status, "ord":id},    
        })
        .done( function( data ) {
            console.log(data);
            window.location.reload();
        })        
        .fail( function( data ) {
            console.log('failed status update');
        });

    })

});