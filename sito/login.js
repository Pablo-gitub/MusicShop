$(document).ready(function(){

    const buttons = $("body > div > button");
    $("div.container").hide();

    $("button#loginClient").click(function(){
        $(buttons).hide();
        $("div.container").show();
    });

    $("button#loginSealer").click(function(){
        $(buttons).hide();
        $("div.container").show();
    });

    /*const pictures = $("div.slider-image > img");
    let actualPicture = 0;

    for(i=1; i<pictures.length; i++){
        $(pictures[i]).hide();
    }

    $("button.foll").click(function(){
        $(pictures[actualPicture]).hide();
        if(actualPicture===pictures.length-1){
            actualPicture=0;
            $(pictures[actualPicture]).show("slow");
        } else {
            actualPicture++;
            $(pictures[actualPicture]).show("slow");
        }
    });

    $("button#prev").click(function(){
        $(pictures[actualPicture]).hide();
        if(actualPicture===0){
            actualPicture=pictures.length-1;
            $(pictures[actualPicture]).show("slow");
        } else {
            actualPicture--;
            $(pictures[actualPicture]).show("slow");
        }
    });*/

});