<?php 

require_once 'classes/Article.php';
require_once 'classes/Administrateurs.php';
require_once 'classes/Database.php';
class utilisateurs extends Personns {
    private $id;
    private $person;

    public function __construct(Personns $person) {
        $this->person = $person;
    }

    public function saveToDatabase(Database $db) {
        $sql = "INSERT INTO utilisateurs (id_personne) VALUES (?)";
        $params = [$this->person->getId()];
        $db->query($sql, $params);
        $this->id = $db->getLastInsertId();
    }

    public static function getById(Database $db, $id) {
        $sql = "SELECT * FROM utilisateurs WHERE id = ?";
        $result = $db->query($sql, [$id])->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $person = Personns::getById($db, $result['id_personne']);
            return new self($person);
        }

        return null;
    }



    public function deleteFromDatabase(Database $db) {
        $sql = "DELETE FROM utilisateurs WHERE id = ?";
        $db->query($sql, [$this->id]);
    }

    public function getPerson() {
        return $this->person;
    }
}


?>