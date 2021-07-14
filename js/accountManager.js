$(document).ready(function() {

    $( "#pdata" ).on( "submit", function( event ) {
        event.preventDefault();

        let data = $( this ).serializeArray();
        let quit = false;

        data.forEach(obj => {

            if (obj['value'] == "" || obj['value'].length > 30) {
                quit = true;
                let snackbar = document.getElementById("snackbar");
                snackbar.textContent = "Please insert a proper value";
                snackbar.className = "show";
                setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            }
            else if (obj['name'] == 'zip' && obj['value'].toString().length != 5) {
                quit = true;
                let snackbar = document.getElementById("snackbar");
                snackbar.textContent = "Please insert a proper value";
                snackbar.className = "show";
                setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            }
        });
        if (quit) return;

        $.post('./account.php', $( this ).serialize(), function() {
            
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Data Updated";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            setTimeout(() => (window.location.reload()), 1100);
        });  
    });

    $( "#ccdata" ).on( "submit", function( event ) {
        event.preventDefault();

        let data = $( this ).serializeArray();
        let quit = false;

        data.forEach(obj => {

            if (obj['value'] == "") {
                quit = true;
                let snackbar = document.getElementById("snackbar");
                snackbar.textContent = "Please insert a proper value";
                snackbar.className = "show";
                setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            }
            else if (obj['name'] == 'ccnumber' && (obj['value'].toString().length > 16 || obj['value'].toString().length < 11)) {
                quit = true;
                let snackbar = document.getElementById("snackbar");
                snackbar.textContent = "Please insert a proper value";
                snackbar.className = "show";
                setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            }
            else if (obj['name'] == 'cccvv' && obj['value'].toString().length != 3) {
                quit = true;
                let snackbar = document.getElementById("snackbar");
                snackbar.textContent = "Please insert a proper value";
                snackbar.className = "show";
                setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            }
        });
        if (quit) return;


        $.post('./account.php', $( this ).serialize(), function() {
            
            let snackbar = document.getElementById("snackbar");
            snackbar.textContent = "Data Updated";
            snackbar.className = "show";
            setTimeout(() => (snackbar.className = snackbar.className.replace("show", "")), 1000);
            setTimeout(() => (window.location.reload()), 1100);
        });  
    });

});