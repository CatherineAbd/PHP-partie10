<?php

function crTabCountries(){
  $tbCountries[0] = "Allemagne";
  $tbCountries[1] = "France";
  $tbCountries[2] = "Italie";

  return $tbCountries;
}

function crTabMsgErr ($tabCountries, &$showForm) {

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
      $month = substr($birthDate, 3, 2) ;
      $day = substr($birthDate, 0, 2);
      $year = substr($birthDate, 6, 4);
      $showForm = false;

      // control fields
      // lastname
      if (!preg_match("#^[a-zA-Z-]+$#", $_POST["lastname"])){
        $tabMsgErr["lastname"] = "Le nom n'est pas bien saisi";
        $showForm = true;
      }
      // firstname
      if (!preg_match("#^[a-zA-Z-]+$#", $_POST["firstname"])){
        $tabMsgErr ["firstname"] = "Le prénom n'est pas bien saisi";
        $showForm = true;
      }
      // birthday
      if (!preg_match("#^([0-9]{2}/){2}([1][9][0-9]{2}|[2][0][0-1][0-9])$#", $birthDate) || !checkdate($month, $day, $year)){
        $tabMsgErr["birthDate"] = "La date anniversaire est incorrecte";
        $showForm = true;
      }
      // Tel number 0xyyyyyyyy
      if (!preg_match("#^[0][1-8]([-./ ]?[0-9]{2}){4}$#", $_POST["tel"])){
        $tabMsgErr["tel"] = "le n° de tél n'est pas bien saisi";
        $showForm = true;
      }
      // email
      if (!preg_match("#^[a-z0-9.-_]+@[a-z]{2,}\.[a-z]{2,4}$#", $_POST["email"])){
        $tabMsgErr["email"] = "le mél est incorrect";
        $showForm = true;
      }
      // number of badges
      if (!preg_match("#^[0-9]$#", $_POST["numberBadge"])){
        $tabMsgErr["numberBadge"] = "le nbre de badge doit être <10";
        $showForm = true;
      }
      var_dump($_POST["country"]);
      // country's control
      if (in_array($_POST["country"], $tabCountries())){
        $tabMsgErr["country"] = "Choisissez le pays dans la liste";
        $showForm = true;
      }
      
    }
  return $tabMsgErr;
}
?>