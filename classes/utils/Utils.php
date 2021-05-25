<?php 
class Utils{
	public static function confirmationMdp($mdp1, $mdp2) // vérifier au moment de l'inscription, s'il n'y a pas d'erruer dans le mdp
    {
        if($mdp1 === $mdp2){
            return true;
    	}else{
    		return false;
    	}
	}

	public static function verificationMdp($mdp1, $mdp2) // vérifier au moment du login si le mdp utilisateur correspond au mdp hashé en dbb
    {
        if(password_verify($mdp1,$mdp2)){
            return true;
    	}else{
    		return false;
    	}
	}

	public static function validation($str, $type)
    {
        $valide = false;
        //https://www.php.net/manual/fr/regexp.reference.unicode.php
        $tabRegex = [
            "non" => "//",
            "test" => '/[\w]123/',
            "nom" => "/^[\p{L}\s]{2,}$/u",
            "prenom" => "/^[\p{L}\s]{2,}$/u",
            "tel" => "/^[+]?[0-9]{8,}$/",
            # "pass" => "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{3,15})$/",
            "pass" => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{3,15}$/",
            "photo" => "/^[\w\s-.]{1,}(.jpg|.jpeg|.png|.gif)$/",
            "id" => "/[\d]+/"

        ];

        $str = trim(strip_tags((string)$str));

        //https://www.php.net/manual/fr/filter.filters.validate.php
        switch ($type) {
            case "mail":
                if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
                    $valide = true;
                }
                break;
            case "url":
                if (filter_var($str, FILTER_VALIDATE_URL)) {
                    $valide = true;
                }
                break;
            case "non":
                $valide = true;
            default:
                if (preg_match($tabRegex[$type], $str)) {
                    $valide = true;
                }
        }

        $valide === true ? $message = "" : $message = "Le champ $type n'est pas au format demandé.<br/>";

        $errorsTab = [$str, $message];
        return $errorsTab;
    }

	public static function valider($donnees, $types)
    {
        $erreurs = "";
        $donneesValides = []; // donnee = str apres nettoyage 
        for ($i = 0; $i < count($donnees); $i++) {
            $tab = Utils::validation($donnees[$i], $types[$i]);
            if ($tab[1]) {
                $erreurs .= $tab[1];
            }
            $donneesValides[$types[$i]] = $tab[0];
        }
        if ($erreurs) {
            ViewTemplate::alert($erreurs, "danger", null);
            return false;
        }
        return $donneesValides;
    }
}