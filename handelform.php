<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["action"] === "add") {
        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
        $user_id =1; //$_SESSION['user_id'];
        $article->addArticle($titre, $contenu, $user_id);
    } elseif ($_POST["action"] === "edit") {

        $article_id = $_POST["article_id"];
        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
       $user_id = 1;  // $_SESSION['user_id'];
        $article->editArticle($article_id, $titre, $contenu, $user_id);

    } elseif ($_POST["action"] === "delete") {
        $article_id = $_POST["article_id"];
        $article->deleteArticle($article_id);
    }
}
