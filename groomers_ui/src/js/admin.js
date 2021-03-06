if ($('#fichier').length > 0) {

    // Sur changement de fichier de couverture (input de type file)
    $('#fichier').on('change', function (e) {

        // on récupère les informations du fichier choisi
        let fichier = e.target.files[0];
        // on créé un lecteur de fichier
        let reader = new FileReader();
        //on lit le fichier choisi comme une ressource web
        reader.readAsDataURL(fichier);
        // Une fois lu, on vient modifier l'attribut src avec le résultat de la lecture
        reader.onload = function (event) {
            $('#preview').attr('src', event.target.result);
            $('#datapreview').attr('value',event.target.result);
        }
    });
}

if(window.location.toString().includes("groomers_Coffee")) {
    document.querySelector(":root").classList.add("coffee");
    $(".logo").attr("src","../../../../groomers_ui/src/img/logo_black.webp");
}


