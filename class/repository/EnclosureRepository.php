<?php

class EnclosureRepository {

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
    public function getDb()
    {
        return $this->db;
    }
    
    /**
     * Set db.
     *
     * @param db the value to set.
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    public function add(Enclosure $enclosure):bool
    {
        $sql = 'INSERT INTO enclosure(name_enclosure, cleanness, type, id_zoo) VALUES(:name, :state, :type, 1);';

        $request = $this->getDb()->prepare($sql);

        return $request->execute([
            ':name' => $enclosure->getName(),
            ':state' => 'bon',
            ':type' => $enclosure->getType()
        ]);
    }

    public function findAll():array
    {
        $enclosures = [];
        $sql = 'SELECT * FROM enclosure WHERE id_zoo = 1;';

        $request = $this->getDb()->prepare($sql);
        $request->execute();

        $datas = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach($datas as $enclosure) {
            switch ($enclosure['type']) {
                case 'land':
                    $enclosures[] = new LandPark($enclosure);
                    break;
                case 'water':
                    $enclosures[] = new WaterPark($enclosure);
                    break;
                case 'aviary':
                    $enclosures[] = new AviaryPark($enclosure);
                    break;
            }
        }

        return $enclosures;
    }
}

?>
