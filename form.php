<?php
include "top_p10.php";
require "controller.php";
?>

<p class="topicTitle">énoncé</p>
<p class="topic">Faire une page pour enregistrer un futur apprenant. On devra pouvoir saisir les informations suivantes :<br>
<div class="colTopic">
  <p>• Nom</p>
  <p>• Prénom</p>
  <p>• Date de naissance</p>
  <p>• Pays de naissance</p>
  <p>• Nationalité</p>
  <p>• Adresse</p>
  <p>• Email</p>
  <p>• Téléphone</p>
  <p>• Diplôme (sans, Bac, Bac+2, Bac+3 ou supérieur)</p>
  <p>• Numéro pôle emploi</p>
  <p>• Nombre de badge</p>
  <p>• Liens codecademy</p>
  <p>• Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ?</p>
  <p>• Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</p>
  <p>• Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</p>
  <p> A la validation de ces informations, il faudra les afficher dans la même page à la place du formulaire.</p>
</div>

<hr>
<a href="form.php"> Page construction formulaire</a>
<hr>

<?php
$showForm = true;
$tabCountries = crTabCountries();
$tabDiploma = crTabDiploma();
$tabMsgErr = crTabMsgErr($tabCountries, $tabDiploma, $showForm);

if ($showForm) { ?>
  <div class="titleFormRow">
    <div class="titleFormCol">
      <h2 class="titleForm">Formulaire</h2>
    </div>
  </div>
  <form action="" method="post" novalidate>
    <div class="divForm1">

      <div class="inputRow">
        <div class="formLastname inputCol">
          <span class="iconField"><i class="far fa-user"></i></span>
          <input type="text" id="lastname" name="lastname" placeholder="nom" value="<?= $_POST['lastname'] ?? '' ?>" class=" eltInput <?= isset($tabMsgErr['lastname']) ? 'falseElt' : 'rightElt' ?>" required>
        </div>
        <div class="formFirstname inputCol">
          <span class="iconField"><i class="far fa-user"></i></span>
          <input type="text" id="firstname" name="firstname" placeholder="prénom" value="<?= $_POST['firstname'] ?? '' ?>" class="eltInput <?= isset($tabMsgErr['firstname']) ? 'falseElt' : 'rightElt' ?>" required>
        </div>
      </div>
      <div class="inputRow">
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['lastname'] ?? '' ?></p>
        </div>
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['firstname'] ?? '' ?></p>
        </div>
      </div>

      <div class="inputRow">
        <div class="formEmail inputCol">
          <span class="iconField"><i class="fas fa-at"></i></i></span>
          <input type="email" id="email" name="email" placeholder="adresse mail" value="<?= $_POST['email'] ?? '' ?>" class="eltInput <?= isset($tabMsgErr['email']) ? 'falseElt' : 'rightElt' ?>" required>
        </div>
        <div class="formTel inputCol">
          <span class="iconField"><i class="fas fa-phone-square-alt"></i></i></span>
          <input type="text" id="tel" name="tel" placeholder="n° de tél"  value="<?= $_POST['tel'] ?? '' ?>" class="eltInput <?= isset($tabMsgErr['tel']) ? 'falseElt' : 'rightElt' ?>" required>
        </div>
      </div>
      <div class="inputRow">
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['email'] ?? '' ?></p>
        </div>
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['tel'] ?? '' ?></p>
        </div>
      </div>
    
      <div class="inputRow">
        <div class="formBirthDate inputCol">
          <span class="iconField"><i class="fas fa-birthday-cake"></i></span>
          <input type="date" id="birthDate" name="birthDate" value="<?= $_POST['birthDate'] ?? '' ?>" class="eltInput <?= isset($tabMsgErr['birthdate']) ? 'falseElt' : 'rightElt' ?>" required>
        </div>
        <div class="formNumberEmploy inputcol">
          <span class="iconField"><i class="fas fa-tag"></i></span>
          <input type="text" id="numberEmploy" name="numberEmploy" placeholder="1234567Z" value="<?= $_POST['numberEmploy'] ?? '' ?>" class="eltInput <?= isset($tabMsgErr['numberEmploy']) ? 'falseElt' : 'rightElt' ?>" required>
        </div>
      </div>
      <div class="inputRow">
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['birthDate'] ?? '' ?></p>
        </div>
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['numberEmploy'] ?? '' ?></p>
        </div>
      </div>
      
      <div class="inputRow">
        <div class="formCountry inputCol">
          <span class="iconField"><i class="fas fa-globe"></i></span>
          <select class="eltInput" name="country" id="country">
            <option class="eltInput" selected disabled>Choisissez un pays</option>
            <?php
            foreach ($tabCountries as $country) { ?>
              <option value="<?= $country ?>" <?= (isset($_POST['country']) && $_POST['country'] == $country) ? 'selected' : '' ?> class="eltInput"><?= $country ?></option>
              <?php } ?>
          </select>
        </div>
        <div class="formNationality inputCol">
          <span class="iconField"><i class="fas fa-globe"></i></span>
          <input type="text" id="nationality" name="nationality" placeholder="nationality" class="eltInput" required>
        </div>
      </div>
      <div class="inputRow">
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['country'] ?? '' ?></p>
        </div>
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['nationality'] ?? '' ?></p>
        </div>
      </div>
        
      <div class="inputRow">
        <div class="formDegree radioCol">
          <p>Diplôme</p>
          <?php
          foreach ($tabDiploma as $diploma) { ?>
          <input type="radio" name="degree" value="<?= $diploma ?>" id="<?= $diploma ?>" <?= (isset($_POST['degree']) && $_POST['degree'] == $diploma) ? 'checked' : '' ?> class="eltRadio" required>
          <label for="<?= $diploma ?>"><?= $diploma ?></label><br>
          <?php } ?>
        </div>
        <div class="formAddress inputCol">
          <span class="iconField"><i class="fas fa-envelope"></i></span>
          <input type="text" id="address" name="address" placeholder="adresse" class="eltInput" required>
        </div>
      </div>
      <div class="inputRow">
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['degree'] ?? '' ?></p>
        </div>
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['address'] ?? '' ?></p>
        </div>
      </div>
        
      <div class="inputRow">
        <div class="formNumberBadge inputCol">
        <span class="iconField"><i class="fas fa-calculator"></i></span>
              <input type="number" id="numberBadge" name="numberBadge" placeholder="Nb de badges" value="<?= $_POST['numberBadge'] ?? '' ?>" class="eltInput <?= isset($tabMsgErr['numberBadge']) ? 'falseElt' : 'rightElt' ?>" required>
              <span><?= $tabMsgErr['numberBadge'] ?? ''  ?></span>
        </div>
      </div>
      <div class="inputRow">
        <div class="inputCol">
          <p class="txtMsgErr"><?= $tabMsgErr['numberBadge'] ?? '' ?></p>
        </div>
        <div class="inputRow">
          <div class="formBtn divFormElt">
            <input type="submit" value="Valider" name="btnSubmit" class="btn">
          </div>
        </div>
      </div>

      <!--<div class="formLinkCodecademy divFormElt"><label class="shortLabel" for="linkCodecademy">Liens Codecademy</label><textarea id="linkCodecademy" name="linkCodecademy" rows="10" cols="50" required></textarea></div>
      <div class="formSuperHeros divFormElt"><label for="superHeros">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi</label><textarea id="superHeros" name="superheros" rows="10" cols="50" required></textarea></div>
      <div class="formHack divFormElt"><label for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</label><textarea name="hack" id="hack" cols="30" rows="10" required></textarea></div>
      <div class="formComputerExp divFormElt">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?
        <input type="radio" id="computerExpYes" name="computerExp" value="yes"><label for="computerExp" required>oui</label>
        <input type="radio" id="computerExpNo" name="computerExp" value="no"><label for="computerExp" required>non</label>
      </div>
    </div>
  </form>
<?php
  // fin if $showForm
} else { ?>
  <!-- Affichage des données du formulaire -->
  <!-- <?= var_dump($_POST); ?> -->
  <p>Nom : <?= $_POST["lastname"] ?></p>
  <p>Prénom : <?= $_POST["firstname"] ?></p>
  <p>Date anniversaire : <?= $_POST["birthDate"] ?></p>
  <p>Pays de naissance : <?= $_POST["country"] ?></p>
  <p>Email : <?= $_POST["email"] ?></p>
  <p>Téléphone : <?= $_POST["tel"] ?></p>
  <p>Diplôme : <?= $_POST["degree"] ?> </p>
  <p>N° pôle emploi : <?= $_POST["numberEmploy"] ?> </p>
  <p>Nb de badges : <?= $_POST["numberBadge"] ?></p>

  <form action="" method="post">
    <div class="formBtn divFormElt"><input type="submit" value="Retour au formulaire" name="btnRazForm"></div>
  </form>
<?php
}
include "..\bottom_html.php";
?>