$(document).ready(function() {

    let band;
    let genre;
    let year;

    $(":radio").prop("checked", false);

    $("[name=band]").change(function() {

        if (this.checked) band = this.id;
    });

    $("[name=genre]").change(function() {

        if (this.checked) genre = this.id;
    });

    $("[name=year]").change(function() {

        if (this.checked) year = this.id;
    });

    $("#clear1").click(function() {

        $("[name=band]").prop("checked", false);
        band = undefined;


        $.ajax({
            type: 'POST',
            url: './index.php',
            data: {"Genre": genre, "Year": year},
        })
        .done( function( data ) {
            $("#albumlist").replaceWith($("#albumlist", data));
            $("[name=tocart]").on("click", function() {
        
                let quantity = $(`#tot${this.value}`).val();
        
                $.ajax({
                    type: 'POST',
                    url: './checkout.php',
                    data: {"AlbumId":this.value, "Quantità":quantity},
                })
                .done( function( data ) {
                    console.log('added');
                })
                .fail( function( data ) {
                    console.log('failed addition');
                })
            });
        })
        .fail( function( data ) {
            console.log('not filtered');
        });
    })
    
    $("#clear2").click(function() {

        $("[name=genre]").prop("checked", false);
        genre = undefined;

        $.ajax({
            type: 'POST',
            url: './index.php',
            data: {"Band": band, "Year": year},
        })
        .done( function( data ) {
            $("#albumlist").replaceWith($("#albumlist", data));
            $("[name=tocart]").on("click", function() {
        
                let quantity = $(`#tot${this.value}`).val();
        
                $.ajax({
                    type: 'POST',
                    url: './checkout.php',
                    data: {"AlbumId":this.value, "Quantità":quantity},
                })
                .done( function( data ) {
                    console.log('added');
                })
                .fail( function( data ) {
                    console.log('failed addition');
                })
            });
        })
        .fail( function( data ) {
            console.log('not filtered');
        }); 
    })

    $("#clear3").click(function() {

        $("[name=year]").prop("checked", false);
        year = undefined;

        $.ajax({
            type: 'POST',
            url: './index.php',
            data: {"Band": band, "Genre": genre},
        })
        .done( function( data ) {
            $("#albumlist").replaceWith($("#albumlist", data));
            $("[name=tocart]").on("click", function() {
        
                let quantity = $(`#tot${this.value}`).val();
        
                $.ajax({
                    type: 'POST',
                    url: './checkout.php',
                    data: {"AlbumId":this.value, "Quantità":quantity},
                })
                .done( function( data ) {
                    console.log('added');
                })
                .fail( function( data ) {
                    console.log('failed addition');
                })
            });
        })
        .fail( function( data ) {
            console.log('not filtered');
        }); 
    })

    $(":radio").change(function() {

        $.ajax({
            type: 'POST',
            url: './index.php',
            data: {"Band": band, "Genre": genre, "Year": year},
        })
        .done( function( data ) {
            console.log(data);
            $("#albumlist").replaceWith($("#albumlist", data));

            // event binding restore
            $("[name=tocart]").on("click", function() {
        
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
                })
            });

            $('#logout').on("click", function() {

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
            })

        })
        .fail( function( data ) {
            console.log('not filtered');
        });
    
    });
});