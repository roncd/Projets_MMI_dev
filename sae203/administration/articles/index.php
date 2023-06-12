<?php
require_once('../../ressources/includes/connexion-bdd.php');

$listeArticleCommand = $clientMySQL->prepare('SELECT * FROM article');
$listeArticleCommand->execute();
$listeArticle = $listeArticleCommand->fetchAll();

$pageCourante = "articles";
$racineURL = $_SERVER['REQUEST_URI'];

$URLCreation = "{$racineURL}/creation.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once("../ressources/includes/head.php"); ?>
    <title>Liste articles - Administration</title>
    
</head>

<body>
    <?php require_once('../ressources/includes/menu-principal.php'); ?>
    <header class="bg-white shadow">
      
    <div class="mx-auto max-w-7xl py-6 justify-between flex">
            <h1 class="text-3xl font-bold text-gray-900">Liste articles</h1>

            <a href="<?php echo $URLCreation ?>" class="block font-bold rounded-md bg-indigo-600 py-2 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Ajouter un nouvel article</a>
        </div>

        <div class="mx-auto max-w-7xl py-6">
        <?php $nombreArticle = $clientMySQL ->query("SELECT COUNT(*) AS 'NumberOfArt' FROM article");?> 
        <p class="text-gray-500 mb-2">Nombre d'articles :  <?php echo $nombreArticle ->fetch() ["NumberOfArt"] ?> </p>
    </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6">
            <div class="py-6">
                <table class="w-full bg-white rounded-lg overflow-hidden border-collapse shadow">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="font-bold pl-8 py-5 text-left">Id</th>
                            <th class="font-bold pl-8 py-5 text-left">Titre</th>
                            <th class="font-bold pl-8 py-5 text-left">Chapô</th>
                            <th class="font-bold pl-8 py-5 text-left">Contenu</th>
                            <th class="font-bold pl-8 py-5 text-left">Date création</th>
                            <th class="font-bold pl-8 py-5 text-left">Auteur</th>
                            <th class="pl-8 py-5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contenu du tableau-->
                        <?php 
                        foreach ($listeArticle as $article) {
                            $lienEdition = "{$racineURL}/edition.php?id={$article["id"]}";

                            $dateCreation = new DateTime($article["date_creation"]);
                            $auteurArticle = $article["auteur_id"];
                            if (is_null($auteurArticle)) {
                                $auteurArticle = "/";
                            }
                        ?>
    
                            <tr class="hover:bg-gray-100 border-b-2 border-b-gray-100 last:border-b-0 first:border-t-2 first:border-t-gray-200">
                                <td class="pl-8 p-4 font-bold">
                                    <?php echo $article["id"]; ?>
                               
                                <td class="pl-8 p-4"><?php echo $article["titre"]; ?></td>
                                <td class="pl-8 p-4"><?php echo $article["chapo"]; ?></td>
                                <td class="pl-8 p-4"><?php echo $article["contenu"]; ?></td>
                                <td class="pl-8 p-4"><?php echo $dateCreation->format('d/m/Y H:i:s'); ?></td>
                                <td class="pl-8 p-4"><?php echo $auteurArticle; ?></td>
                                <td class="pl-8 p-4">
                                    <a href='<?php echo $lienEdition; ?>' class='font-bold text-blue-600'>Éditer</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>