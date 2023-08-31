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
}

?>
