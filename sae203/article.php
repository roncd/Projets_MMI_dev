<?php
$couleur_bulle_classe = "rose";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');
$idArticle = $_GET["id"];



$listeArticleCommand = $clientMySQL->prepare('SELECT
ar.id,
ar.titre AS titre,
ar.chapo AS chapo, 
ar.contenu AS contenu, 
ar.image AS image, 
ar.lien_yt AS lien_yt,
ar.date_creation AS date_creation,
ar.auteur_id AS auteur_id,
CONCAT(auteur.nom, " ", auteur.prenom) AS auteur
FROM article AS ar
LEFT JOIN auteur
ON ar.auteur_id = auteur.id
WHERE ar.id = :id');
$listeArticleCommand->bindParam(':id', $idArticle); // Code pour avoir 1 page / 1 article
$listeArticleCommand->execute();
$listeArticle = $listeArticleCommand->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo getenv('CHEMIN_BASE') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - SAÉ 203</title>

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/accueil.css">
    <link rel="stylesheet" href="ressources/css/article.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <section>
        <?php require_once('./ressources/includes/header.php'); ?>
        <?php
        // A supprimer si vous n'en avez pas besoin.
        // Mettre une couleur dédiée pour cette bulle si vous gardez la bulle
        require_once('./ressources/includes/bulle.php');
        ?>


        <main class="conteneur-principal conteneur-1280">

         <?php foreach ($listeArticle as $article): ?>
        <!-- article -->
        
        <div class="block">
            <span class='textes'> Article publié le <?php echo $article["date_creation"]; ?></span>
            <span class='textes'>, écrit par <?php echo $article["auteur"]; ?> </span>
        </div>
        <div class="block">
            <h1 class="titre-page"><?php echo $article["titre"]; ?></h1>
        </div>

        <div class="block">
            <h2 class='titre'><?php echo $article["chapo"]; ?> </h2>
        </div>
        
        <div class="block">
            <img class="image flex justify-center items-center mb-10 mt-10 object-contain" src="<?php echo $article["image"]; ?>" alt="L'image de l'article">
        </div>

       
        <p class='textes'> <?php echo $article["contenu"]; ?> </p>

        <?php endforeach; ?>
        </main>

        <?php require_once('./ressources/includes/footer.php'); ?>
    </section>
</body>

</html>