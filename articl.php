<?  php
session_start();
class Db
{
private $host;
private $dbname;
private $user;
private $password;

public function __construct($host, $dbname, $user, $password)
{
$this->host = $host;
$this->dbname = $dbname;
$this->user = $user;
$this->password = $password;

try {
$this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
die("Connection failed: " . $e->getMessage());
}
}
}

class Article extends Db
{
public function __construct($host, $dbname, $user, $password)
{
parent::__construct($host, $dbname, $user, $password);
}

public function addArticle($titre, $contenu, $user_id)
{
$stmt = $this->db->prepare("INSERT INTO Article (titre, contenu, user_id) VALUES (?, ?, ?)");
$stmt->execute([$titre, $contenu, $user_id]);
}

public function getArticles()
{
$stmt = $this->db->query("SELECT * FROM Article ");
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function editArticle($article_id, $titre, $contenu, $user_id)
{
$stmt = $this->db->prepare("UPDATE Article SET titre = ?, contenu = ? WHERE id = ? AND user_id = ?");
$stmt->execute([$titre, $contenu, $article_id, $user_id]);
}



public function deleteArticle($article_id)
{
try {
$stmt = $this->db->prepare("DELETE FROM Article WHERE id = ?");
$stmt->execute([$article_id]);
header('Location: index.php');
} catch (PDOException $e) {
die("Error deleting article: " . $e->getMessage());
}
}




}
