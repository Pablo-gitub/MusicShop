$(document).ready(function() {

    $("[name=up]").click(function() {

        let tot = $(`#quantity${this.value}`).val();
        let max = $(`#quantity${this.value}`).attr('max');
        if (tot == max) return;

        $.ajax({
            type: 'POST',
            url: './checkout.php',
            data: {"AlbumId":this.value, "Quantità":1},    
        })
        .done( function( data ) {
            console.log('upped');
            window.location.reload();
        })        
        .fail( function( data ) {
            console.log('failed upping');
        });

    });

    $("[name=down]").click(function() {

        let tot = $(`#quantity${this.value}`).val();
        if (tot == 1) return;

        $.ajax({
            type: 'POST',
            url: './checkout.php',
            data: {"AlbumId":this.value, "Quantità":-1},    
        })
        .done( function( data ) {
            console.log('upped');
            window.location.reload();
        })        
        .fail( function( data ) {
            console.log('failed upping');
        });
    });

    $("[name=tocart]").click(function() {
        
        let quantity = $(`#tot${this.value}`).val();

        $.ajax({
            type: 'POST',
            url: './checkout.php',
            data: {"AlbumId":this.value, "Quantità":quantity},
        })
        .done( function( data ) {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Added to cart";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            setTimeout(() => (window.location.reload()), 1100);
        })
        .fail( function( data ) {
            console.log('failed addition');
        });
    });

    $("[name=deleteitem]").click(function() {

        let username = $('img').attr("name");
        console.log(this.title);
        $.ajax({
            type: 'POST',
            url: './checkout.php',
            data: {"Username": username, "AlbumId": this.title},
        })
        .done( function( data ) {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Removed";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            setTimeout(() => (window.location.reload()), 1100);                        
        })
        .fail( function( data ) {
            console.log('failed delete');
        });
    });

    $('#logout').click(function() {

        let token = 1;
        $.ajax({
            type: 'POST',
            url: './index.php',
            data: {"Token": token},
        })
        .done( function( data ) {
            console.log('logged out');
            window.location.replace("index.php");
        })
        .fail( function( data ) {
            console.log('failed logout');
        });
    });
});