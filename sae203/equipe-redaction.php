<?php
$couleur_bulle_classe = "rose";
$page_active = "equipe";

require_once('./ressources/includes/connexion-bdd.php');

// Vos requêtes SQL
$listeAuteurCommand = $clientMySQL->prepare('SELECT * FROM auteur');
$listeAuteurCommand->execute();
$listeAuteur = $listeAuteurCommand->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo getenv('CHEMIN_BASE') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="ressources/images/favicon.png">
    
    <title>Équipe de rédaction-SAÉ 203</title>

    <meta charset="UTF-8">
  <title>Notre équipe de rédaction</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/equipe-redaction.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/equipe-redaction.css">
</head>

<body>
    <section>
        <?php require_once('./ressources/includes/header.php'); ?>
        <?php require_once('./ressources/includes/bulle.php');  ?>
      <main>
        <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4 text-black">Notre équipe de rédaction</h1>
        <div class="text-base mb-4">Nous sommes quatre étudiantes en BUT MMI à CYU Sarcelles, passionnées par le design, le développement web et la création de contenus multimédias. Nous mettons notre créativité et nos compétences au service de projets innovants et captivants.</div>

        <div class="flex justify-center flex-wrap -mx-4 mt-14">

         <?php foreach ($listeAuteur as $auteur) { ?>

         <a href="equipe-redaction.php?id=<?php echo $auteur["id"]; ?>" class=''>

         <a href='<?php echo $auteur["lien_twitter"]; ?>' target="_blank" class="author-link mx-4 mb-4">
        
          <figure class="author">
          <img src="<?php echo $auteur["lien_avatar"]; ?>" alt="avatar" class="author-img w-32 h-32 rounded-full transition-transform duration-300">

          <figcaption>
            <span class="name font-bold text-lg text-pink-700"><?php echo $auteur["nom"]; ?></span>
            <span class="text font-bold text-pink-700"><?php echo $auteur["prenom"]; ?> </span>
            <p class="mini-description text-center">1ère année BUT MMI</p>
          </figcaption>
          </figure>
          <?php } ?>
        </div>
    

      <a href="https://twitter.com/UniversiteCergy" target="_blank" class="twitter-button inline-block px-8 py-2 bg-blue-500 text-white rounded-full mt-8 transition-colors duration-300 hover:bg-blue-700">Twitter CY Cergy Paris Université</a>

    
        </div>
       
      </main>
      <?php require_once('./ressources/includes/footer.php'); ?>
    </section>
  </body>
</html>