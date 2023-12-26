
<?php
include 'articl.php';
$db = new Db('localhost', 'youcra', 'root', '');
$article = new Article('localhost', 'youcra', 'root', '');
include 'handelform.php';
$articles = $article->getArticles();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YourCrafting Web App</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">YourCrafting Web App</h1>


    <form method="post" action="index.php" id="articleForm" class="mb-4">
        <label for="titre" class="block font-medium text-sm text-gray-600">Title:</label>
        <input type="text" id="titre" name="titre" required
               class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300">

        <label for="contenu" class="block mt-2 font-medium text-sm text-gray-600">Content:</label>
        <textarea id="contenu" name="contenu" required
                  class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300"></textarea>

        <input type="hidden" name="action" value="add">
        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md">Add Article</button>
    </form>

    <ul id="articleList" class="space-y-4">
        <?php foreach ($articles as $article) : ?>
            <li class="bg-white p-4 shadow-md rounded-md">
                <strong class="text-lg font-semibold"><?= $article['titre']; ?></strong>
                <p class="mt-2"><?= $article['contenu']; ?></p>


                <form method="post" action="index.php" class="mt-4">
                    <input type="hidden" name="article_id" value="<?= $article['Id']; ?>">
                    <label for="newTitle" class="block font-medium text-sm text-gray-600">New Title:</label>
                    <input type="text" name="titre" required
                           class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300">
                    <label for="newContent" class="block mt-2 font-medium text-sm text-gray-600">New Content:</label>
                    <textarea name="contenu" required
                              class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    <input type="hidden" name="action" value="edit">
                    <button type="submit" class="mt-2 bg-green-500 text-white py-2 px-4 rounded-md">Edit Article</button>
                </form>


                <form method="post" action="index.php" class="mt-2">
                    <input type="hidden" name="article_id" value="<?=$article['Id']; ?>">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md" onclick="deleteArticle(<?= $article['Id']; ?>)">Delete Article</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<script src="JS.js"></script>
</body>
</html>

