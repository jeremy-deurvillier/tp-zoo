<?php

class Zoo
{
    const MAX_ENCLOSURES = 22;

    private int $id;
    private string $name;
    private string $createdAt;
    private array $employees;
    private array $enclosures;

    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }
    
    /**
     * Get id.
     *
     * @return id.
     */
    public function getId():int
    {
        return $this->id;
    }
    
    /**
     * Set id.
     *
     * @param id the value to set.
     */
    public function setId($id)
    {
        $this->id = $id;
    }
     
     /**
      * Get name.
      *
      * @return name.
      */
     public function getName():string
     {
         return $this->name;
     }
     
     /**
      * Set name.
      *
      * @param name the value to set.
      */
     public function setName($name)
     {
         $this->name = $name;
     }
     
     /**
      * Get employees.
      *
      * @return employees.
      */
     public function getEmployees():array
     {
         return $this->employees;
     }
     
     /**
      * Set employees.
      *
      * @param employees the value to set.
      */
     public function setEmployees($employees)
     {
         $this->employees = $employees;
     }
     
     /**
      * Get enclosures.
      *
      * @return enclosures.
      */
     public function getEnclosures():array
     {
         return $this->enclosures;
     }
     
     /**
      * Set enclosures.
      *
      * @param enclosures the value to set.
      */
     public function setEnclosures($enclosures)
     {
         $this->enclosures = $enclosures;
     }
    
     /**
      * Get createdAt.
      *
      * @return createdAt.
      */
     public function getCreatedAt()
     {
         return $this->createdAt;
     }
     
     /**
      * Set createdAt.
      *
      * @param createdAt the value to set.
      */
     public function setCreatedAt($createdAt)
     {
         $this->createdAt = $createdAt;
     }

     public function hydrate(array $datas)
     {
         if (isset($datas['id_zoo'])) $this->setId($datas['id_zoo']);
         if (isset($datas['name_zoo'])) $this->setName($datas['name_zoo']);
         if (isset($datas['created_at'])) $this->setCreatedAt($datas['created_at']);
     }

     public function totalAnimals():int
     {
         $total = 0;

         foreach($this->enclosures as $enclosure) {
             $total += $enclosure->counter();
         }

         return $total;
     }

     public function getStatus():array
     {
         $infos = [];

         foreach($this->enclosures as $enclosure) {
             $infos[] = $enclosure->getAnimalsStatus();
         }

         return $infos;
     }

     public function main()
     {
         return 'main';
     }
 
}

?>
