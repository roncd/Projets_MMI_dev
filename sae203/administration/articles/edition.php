<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "articles";

$formulaire_soumis = !empty($_POST);
$entree_mise_a_jour = array_key_exists("id", $_GET);

$article = null;
if ($entree_mise_a_jour) {
    // On cherche l'article à éditer
    $chercherArticleCommande = $clientMySQL->  prepare ('SELECT * FROM article WHERE id = :id');

    $chercherArticleCommande->execute([
        'id' => (int) $_GET['id'],
    ]);

    $article =  $chercherArticleCommande->fetch();
}

if ($formulaire_soumis) {
    // On crée une nouvelle entrée
    $majArticlecommande = $clientMySQL->prepare("
        UPDATE article
        SET titre = :titre, chapo = :chapo, contenu = :contenu, image = :image, date_creation = :date_creation , auteur_id = :auteur_id
        WHERE id = :id
    ");

    $majArticlecommande->execute([
        "titre" => $_POST["titre"],
        "chapo" => $_POST["chapo"],
        "contenu" => $_POST["contenu"],
        "image" => $_POST["image"],
        "date_creation" => $_POST["date_creation"],
        "auteur_id" => $_POST["auteur_id"],
        "id" => $_POST["id"]
    ]);

// L'utilisateur retourne à la liste des éléments.
// Par exemple : 
// Je crée un article. Je soumets le formulaire. Je suis redirigé vers la liste d'articles grâce au code suivant.
$racineURL = pathinfo($_SERVER['REQUEST_URI']);
$pageCourante = $racineURL['dirname'];
header("Location: $pageCourante");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Editer article - Administration</title>
</head>

<body>
<?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Editer l'article </h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <input type="hidden" value="<?php echo $article['id']; ?>" name="id">
                       
                        <div class="col-span-12">
                            <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                            <input type="text" name="titre"  value="<?php echo $article['titre']; ?>"  id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="titre">
                        </div>

                        <div class="col-span-12"> 
                            <label  for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                            <textarea type="text" name="chapo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="chapo"><?php echo $article['chapo']; ?></textarea>
                        </div>

                        <div class="col-span-12">
                            <label  for="contenu" class="block text-lg font-medium text-gray-700">Contenu article</label>
                            <textarea type="text" name="contenu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="contenu"><?php echo $article['contenu']; ?></textarea>
                        </div>
                        <div class="col-span-12">
                                <label for="image" class="block text-lg font-medium text-gray-700">Image</label>
                                <input type="url" value="<?php echo $article['image']; ?>" name="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="image">
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
                            <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Éditer </button>
                        </div>

                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>

</body>

</html>