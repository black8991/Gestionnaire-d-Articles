function deleteArticle(articleId) {
    if (confirm("Are you sure you want to delete this article?")) {
        document.getElementById('articleForm').action = 'index.php';
        document.getElementById('articleForm').querySelector('input[name="action"]').value = 'delete';
        document.getElementById('articleForm').querySelector('input[name="article_id"]').value = articleId;
        document.getElementById('articleForm').submit();
    }
}