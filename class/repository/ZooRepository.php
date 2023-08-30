<?php

class ZooRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }
    
    /**
     * Get db.
     *
     * @return db.
     */
    public function getDb():PDO
    {
        return $this->db;
    }
    
    /**
     * Set db.
     *
     * @param db the value to set.
     */
    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    public function find(int $id):Zoo
    {
        $zoo;

        $sql = 'SELECT * FROM zoo WHERE id_zoo = :id';
        $request = $this->getDb()->prepare($sql);

        $request->execute([':id' => $id]);

        $zooDatas = $request->fetch(PDO::FETCH_ASSOC);

        if ($zooDatas) $zoo = new Zoo($zooDatas);

        return $zoo;
    }

    public function update(int $id):bool
    {
        $sql = 'UPDATE zoo SET name_zoo = :name WHERE id_zoo = :id';
        $request = $this->getDb()->prepare($sql);

        return $request->execute([
            ':name' => htmlspecialchars($_POST['name']),
            ':id' => $id
        ]);
    }
}

?>
