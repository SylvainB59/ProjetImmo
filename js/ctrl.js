function validation(str, type) {
    let typesTab = {
        id: /^[0-9]+$/,
        nom: /^[a-zA-z\s\p{L}]{2,}$/u,
        prenom: /^[a-zA-z\s\p{L}]{2,}$/u,
        libelle: /^[a-zA-z\s\p{L}]{2,}$/u,
        tel: /^[0-9]{8,}$/,
        photo: /^[\w]{2,}(.jpg|.jpeg|.png|.gif)$/,
        test: /^[a-zA-Z]+$/,
    };
    let valide = false;
    if (typesTab[type].test(str)) {
        valide = true;
    }
    valide === true
        ? (message = "")
        : (message = "Le champ " + type + " n'est pas au format demandé.<br/>");
    errorsTab = [valide, message];
    return errorsTab;
}

function valider(donnees, types, e) {
    let erreurs = "";

    for (i = 0; i < donnees.length; i++) {
        tab = validation(donnees[i], types[i]);
        if (!tab[0]) {
            erreurs += tab[1];
        }
    }
    if (erreurs) {
        const html ='<div class="alert alert-danger" role="alert"> ' + erreurs + "</div>";
        $("#erreurs").html(html);
        e.preventDefault();
    }
}

$("#addUser").submit(function (e) {
    let donnees = [$("#nom").val(), $("#prenom").val(), $("#tel").val()];
    let types = [   "nom",            "prenom",           "tel"];
    valider(donnees, types, e);
});