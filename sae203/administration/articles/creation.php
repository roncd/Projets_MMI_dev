<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "articles";

$formulaire_soumis = !empty($_POST);

if ($formulaire_soumis) {
    if (
        isset(
            $_POST['titre'],
            $_POST['chapo'],
            $_POST['contenu'],
            $_POST['image'],
            $_POST['date_creation'],
            $_POST['auteur_id']
        )
    ) {
        // On crée une nouvelle entrée
        $creerarticlecommande = $clientMySQL->prepare('INSERT INTO article(titre, chapo, contenu, image, date_creation, auteur_id) VALUES (:titre, :chapo, :contenu, :image, :date_creation, :auteur_id)');

        $titre = htmlentities($_POST['titre']);
        $chapo = htmlentities($_POST['chapo']);
        $contenu = htmlentities($_POST['contenu']);
        $image = htmlentities($_POST['image']);
        $date_creation = htmlentities($_POST['date_creation']);
        $auteur_id = htmlentities($_POST['auteur_id']);

        $creerarticlecommande->execute([
            'titre' => $titre,
            'chapo' => $chapo,
            'contenu' => $contenu,
            'image' => $image,
            'date_creation' => $date_creation,
            'auteur_id' => $auteur_id,
        ]);
        // L'utilisateur retourne à la liste des éléments.
       // Je crée un article. Je soumets le formulaire. Je suis redirigé vers la liste d'articles grâce au code suivant.
        $racineURL = pathinfo($_SERVER['REQUEST_URI']);
        $pageCourante = $racineURL['dirname'];
        header("Location: $pageCourante");
        exit(); 
     }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Creation articles - Administration</title>
</head>

<body>
    <?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Créer un nouvel article</h1>
        </div>
    </header>
    <main>
            <div class="py-6">
                
            <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">

                        <div class="col-span-12">
                            <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                            <input type="text" name="titre"  id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="prenom">
                        </div>

                        <div class="col-span-12">
                            <label  for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                            <textarea type="text" name="chapo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="chapo"></textarea>
                        </div>
                       
                        <div class="col-span-12">
                            <label  for="contenu" class="block text-lg font-medium text-gray-700">Contenu</label>
                            <textarea type="text" name="contenu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="contenu"></textarea>
                        </div>
                        <div class="col-span-12">
                                <label for="image" class="block text-lg font-medium text-gray-700">Image</label>
                                <input type="url" name="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="image">
                        </div>
                        <div class="col-span-12">
                            <label for="date_creation" class="block text-lg font-medium text-gray-700">Date de publication</label>
                            <input type="datetime-local" name="date_creation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="contedate_creation"></input>
                        </div>
                        <div class="col-span-12">
                             <label for="auteur_id" class="block text-lg font-medium text-gray-700">Auteur</label>
                             <select name="auteur_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="auteur_id">
                                <?php
                                // Récupérer les auteurs dans la base de données
                                $listeAuteursCommande = $clientMySQL->prepare('SELECT id, nom FROM auteur');
                                $listeAuteursCommande->execute();
                                $listeAuteurs = $listeAuteursCommande->fetchAll();

                                //Les options 
                                foreach ($listeAuteurs as $listeAuteurs) {
                                echo '<option value="' . $listeAuteurs['id'] . '">' . $listeAuteurs['nom'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Créer</button>
                        </div>

                    </section>
                </form>

            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>