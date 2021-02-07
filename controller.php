<?php

function crTabCountries(){
  $tbCountries[0] = "Allemagne";
  $tbCountries[1] = "France";
  $tbCountries[2] = "Italie";

  return $tbCountries;
}

function crTabDiploma(){
  $tbDiploma[0] = "Sans";
  $tbDiploma[1] = "Bac";
  $tbDiploma[2] = "Bac+2";
  $tbDiploma[3] = "Bac+3 ou supérieur";

  return $tbDiploma;
}

function crTabMsgErr ($tabCountries, $tabDiploma, &$showForm) {

  $tabMsgErr = array();

    // $tabMsgErr = ["firstname" => "Le prénom n'est pas bien saisi",
    //   "lastname" => "Le nom n'est pas bien saisi",
    //   "nationality" => "La nationalité n'est pas bien saisie",
    //   "address" => "l'adresse n'est pas bien saisie",
    //   "email" => "le mél n'est pas bien saisi",
    //   "tel" => "le n° de tél n'est pas bien saisi",
    //   "nbEmploy" => "le n° pôle emploi n'est pas bien saisi",
    //   "linkCodecademy" => "les liens Codecademy ne sont pas bien saisis",
    //   "superHeros" => "le texte concernant les super héros n'est pas correct",
    //   "hack" => "le texte concernant les hacks n'est pas correct"];
    
  if (isset($_POST["btnSubmit"])) {
      $birthDate = $_POST["birthDate"];
      // if the input field is text type
      if (substr($birthDate, 2 , 1) == "/"){
        $month = (int) substr($birthDate, 3, 2) ;
        $day = (int) substr($birthDate, 0, 2);
        $year =(int)  substr($birthDate, 6, 4);
      } else {
        $month = (int) substr($birthDate, 5, 2) ;
        $day = (int) substr($birthDate, 8, 2);
        $year = (int) substr($birthDate, 0, 4);
      }
      $birthDate = $day . "/" . $month . "/" . $year;
      $showForm = false;

      // control fields
      // lastname
      if (empty($_POST["lastname"])){
        $tabMsgErr["lastname"] = "Le nom doit être saisi";
        $showForm = true;
      } elseif (!preg_match("#^[a-zA-Z-]+$#", $_POST["lastname"])){
        $tabMsgErr["lastname"] = "Le nom n'est pas bien saisi";
        $showForm = true;
      }
      // firstname
      if (empty($_POST["firstname"])){
        $tabMsgErr["firstname"] = "Le prénom doit être saisi";
        $showForm = true;
      } elseif (!preg_match("#^[a-zA-Z-]+$#", $_POST["firstname"])){
        $tabMsgErr ["firstname"] = "Le prénom n'est pas bien saisi";
        $showForm = true;
      }
      // birthday
      if (empty($_POST["birthDate"])){
        $tabMsgErr["birthDate"] = "La date anniversaire doit être saisie";
        $showForm = true;
      } elseif (!preg_match("#^([0-9]{2}\/){2}([1][9][0-9]{2}|[2][0][0-1][0-9])$#", $birthDate) || !checkdate($month, $day, $year)){
        $tabMsgErr["birthDate"] = "La date anniversaire est incorrecte";
        $showForm = true;
      }
      // Tel number 0xyyyyyyyy
      if (empty($_POST["tel"])){
        $tabMsgErr["tel"] = "Le n° de tél doit être saisi";
        $showForm = true;
      } elseif (!preg_match("#^[0][1-8]([-./ ]?[0-9]{2}){4}$#", $_POST["tel"])){
        $tabMsgErr["tel"] = "le n° de tél n'est pas bien saisi";
        $showForm = true;
      }
      // Diplôme
      if (empty($_POST["degree"])){
        $tabMsgErr["degree"] = "Choisissez votre niveau d'études";
        $showForm = true;
      } elseif (!in_array($_POST["degree"], $tabDiploma)){
        $tabMsgErr["degree"] = "Choisissez votre niveau d'études parmi les propositions";
        $showForm = true;
      }
      // email
      if (empty($_POST["email"])){
        $tabMsgErr["email"] = "Le mél doit être saisi";
        $showForm = true;
      } elseif (!preg_match("#^[a-z0-9.-_]+@[a-z]{2,}\.[a-z]{2,4}$#", $_POST["email"])){
        $tabMsgErr["email"] = "le mél est incorrect";
        $showForm = true;
      }
      // number of badges
      if (empty($_POST["numberBadge"])){
        $tabMsgErr["numberBadge"] = "Le nombre de badges doit être saisi";
        $showForm = true;
      } elseif (!preg_match("#^[0-9]$#", $_POST["numberBadge"])){
        $tabMsgErr["numberBadge"] = "le nbre de badge doit être <10";
        $showForm = true;
      }
      // country's control
      if (empty($_POST["country"])){
        $tabMsgErr["country"] = "Le pays doit être saisi";
        $showForm = true;
      } elseif (!in_array($_POST["country"], $tabCountries)){
        $tabMsgErr["country"] = "Choisissez le pays dans la liste";
        $showForm = true;
      }
      // Pole emploi's number
      if (empty($_POST["numberEmploy"])){
        $tabMsgErr["numberEmploy"] = "Le n° pôle emploi doit être saisi";
        $showForm = true;
      } elseif (!preg_match("#^[0-9]{7}[A-Z]$#", $_POST["numberEmploy"])){
        $tabMsgErr["numberEmploy"] = "le n° pôle emploi doit être 7 chiffres et 1 lettre MAJ";
        $showForm = true;
      }
      
      // if (count($tabMsgErr)<1){
      //   header("Location:index.php");
      //   exit;
      // }
    // fin if isset(btnSubmit)
    }
    // var_dump($tabMsgErr);

  return $tabMsgErr;
}

?>