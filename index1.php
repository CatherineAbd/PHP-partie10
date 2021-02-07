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

<?php
$showForm = true;
$tabCountries = crTabCountries();
$tabDiploma = crTabDiploma();
$tabMsgErr = crTabMsgErr($tabCountries, $tabDiploma, $showForm);

if ($showForm) { ?>
  <form action="" method="post" novalidate>
    <div class="divForm">

      <div class="formLastname divFormElt">
        <label class="shortLabel" for="lastname">Nom</label>
        <input type="text" id="lastname" name="lastname" value="<?= $_POST['lastname'] ?? '' ?>" class="<?= isset($tabMsgErr['lastname']) ? 'falseElt' : 'rightElt' ?>" required>
        <span><?= $tabMsgErr['lastname'] ?? '' ?></span>
      </div>

      <div class="formFirstname divFormElt">
        <label class="shortLabel" for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname" value="<?= $_POST['firstname'] ?? '' ?>" class="<?= isset($tabMsgErr['firstname']) ? 'falseElt' : 'rightElt' ?>" required>
        <span><?= $tabMsgErr['firstname'] ?? '' ?></span>
      </div>

      <div class="formBirthDate divFormElt">
        <label class="shortLabel" for="birthDate">Date de naissance</label>
        <input type="date" id="birthDate" name="birthDate" value="<?= $_POST['birthDate'] ?? '' ?>" class="<?= isset($tabMsgErr['birthdate']) ? 'falseElt' : 'rightElt' ?>" required>
        <span><?= $tabMsgErr['birthDate'] ?? '' ?></span>
      </div>

      <div class="formCountry divFormElt">
        <label class="shortLabel" for="country">Pays de naissance</label>
        <select name="country" id="country">
          <option selected disabled>Choisissez un pays</option>
          <?php
          foreach ($tabCountries as $country) { ?>
            <option value="<?= $country ?>" <?= (isset($_POST['country']) && $_POST['country'] == $country) ? 'selected' : '' ?>><?= $country ?></option>
          <?php } ?>
        </select>
        <span><?= $tabMsgErr['country'] ?? '' ?></span>
      </div>

      <div class="formNationality divFormElt"><label class="shortLabel" for="nationality">Nationalité</label><input type="text" id="nationality" name="nationality" required></div>
      <div class="formAddress divFormElt"><label class="shortLabel" for="address">Adresse</label><input type="text" id="address" name="address" required></div>

      <div class="formEmail divFormElt">
        <label class="shortLabel" for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" class="<?= isset($tabMsgErr['email']) ? 'falseElt' : 'rightElt' ?>" required>
        <span><?= $tabMsgErr['email'] ?? ''  ?></span>
      </div>

      <div class="formTel divFormElt">
        <label class="shortLabel" for="tel">Tel</label>
        <input type="text" id="tel" name="tel" value="<?= $_POST['tel'] ?? '' ?>" class="<?= isset($tabMsgErr['tel']) ? 'falseElt' : 'rightElt' ?>" required>
        <span><?= $tabMsgErr['tel'] ?? ''  ?></span>
      </div>

      <div class="formDegree divFormElt">
        <p>Diplôme</p>
        <?php
        foreach ($tabDiploma as $diploma) { ?>
          <input type="radio" name="degree" value="<?= $diploma ?>" id="<?= $diploma ?>" <?= (isset($_POST['degree']) && $_POST['degree'] == $diploma) ? 'checked' : '' ?> required>
          <label for="<?= $diploma ?>"><?= $diploma ?></label><br>
        <?php } ?>
        <span><?= $tabMsgErr['degree'] ?? ''  ?></span>
      </div>

      <div class="formNumberEmploy divFormElt">
        <label class="shortLabel" for="numberEmploy">Numéro pôle emploi</label>
        <input type="text" id="numberEmploy" name="numberEmploy" placeholder="1234567Z" value="<?= $_POST['numberEmploy'] ?? '' ?>" class="<?= isset($tabMsgErr['numberEmploy']) ? 'falseElt' : 'rightElt' ?>" required>
        <span><?= $tabMsgErr['numberEmploy'] ?? ''  ?></span>
      </div>

      <div class="formNumberBadge divFormElt">
        <label class="shortLabel" for="numberBadge">Nombre de badge (<10) </label>
            <input type="number" id="numberBadge" name="numberBadge" value="<?= $_POST['numberBadge'] ?? '' ?>" class="<?= isset($tabMsgErr['numberBadge']) ? 'falseElt' : 'rightElt' ?>" required>
            <span><?= $tabMsgErr['numberBadge'] ?? ''  ?></span>
      </div>

      <div class="formLinkCodecademy divFormElt"><label class="shortLabel" for="linkCodecademy">Liens Codecademy</label><textarea id="linkCodecademy" name="linkCodecademy" rows="10" cols="50" required></textarea></div>
      <div class="formSuperHeros divFormElt"><label for="superHeros">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi</label><textarea id="superHeros" name="superheros" rows="10" cols="50" required></textarea></div>
      <div class="formHack divFormElt"><label for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</label><textarea name="hack" id="hack" cols="30" rows="10" required></textarea></div>
      <div class="formComputerExp divFormElt">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?
        <input type="radio" id="computerExpYes" name="computerExp" value="yes"><label for="computerExp" required>oui</label>
        <input type="radio" id="computerExpNo" name="computerExp" value="no"><label for="computerExp" required>non</label>
      </div>
      <div class="formBtn divFormElt"><input type="submit" value="Valider" name="btnSubmit"></div>
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