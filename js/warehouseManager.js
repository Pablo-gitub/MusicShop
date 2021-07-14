$(document).ready(function() {

    $('#tolist').click(function() {

        let img = $("[name=img]").val();

        if (img == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            console.log('a');
            return;
        }

        let title = $("[name=title]").val();

        if (title == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        let band = $("[name=band]").val();

        if (band == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        let desc = $("[name=desc]").val();

        if (desc == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        let year = $("[name=year]").val();

        if (year == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        let genre = $("[name=genre]").val();

        if (genre == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        let quantity = $("[name=quantity]").val();

        if (quantity == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        let price = $("[name=price]").val();

        if (price == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        
        $.ajax({
            type: 'POST',
            url: './index-admin.php',
            data: {"add":1, "title":title, "band":band, "img":img, "desc":desc, "genre":genre, "price":price, "quantity":quantity, "year":year},    
        })
        .done( function( data ) {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Added";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            setTimeout(() => (window.location.reload()), 1100);
            
        })        
        .fail( function( data ) {
            console.log('Failed insertions');
        });
    });

    $("[name=updatelist]").click(function() {

        let img = $(`#img${this.value}`).val();
        let title = $(`#title${this.value}`).val();
        let band = $(`#band${this.value}`).val();
        let desc = $(`#desc${this.value}`).val();
        let year = $(`#year${this.value}`).val();
        let genre = $(`#genre${this.value}`).val();
        let quantity = $(`#quantity${this.value}`).val();
        let price = $(`#price${this.value}`).val();

        if (img == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        if (title == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        if (band == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        if (desc == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        if (year == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        if (genre == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        if (quantity == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }

        if (price == "") {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Please insert a proper value";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            return;
        }


        $.ajax({
            type: 'POST',
            url: './index-admin.php',
            data: {"id":this.value, "title":title, "band":band, "img":img, "desc":desc, "genre":genre, "price":price, "quantity":quantity, "year":year},    
        })
        .done( function( data ) {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Updated";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            setTimeout(() => (window.location.reload()), 1100);
        })        
        .fail( function( data ) {
            console.log('Failed update');
        });
    });

    $("[name=deleteItem").click(function() {

        let id = $(this).attr("title");

        $.ajax({
            type: 'POST',
            url: './index-admin.php',
            data: {"delete":1, "item":id},    
        })
        .done( function( data ) {
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Removed";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            setTimeout(() => (window.location.reload()), 1100);
        })        
        .fail( function( data ) {
            console.log('Failed deletion');
        });
    });
});