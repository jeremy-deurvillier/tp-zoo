<?php

abstract class Enclosure
{
    const MAX_ANIMALS = 6;

    // Propreté
    const CLEAN = 'bon';
    const CORRECT = 'correct';
    const DIRTY = 'mauvais';

    private int $id;
    private string $name;
    private string $cleanness;
    private array $animals;
    private string $type; // Type d'enclos (terrestre, aquarium, aerien)

    public function __construct(array $datas)
    {
        $this->setAnimals([]);
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
      * Get cleanness.
      *
      * @return cleanness.
      */
     public function getCleanness():string
     {
         return $this->cleanness;
     }
     
     /**
      * Set cleanness.
      *
      * @param cleanness the value to set.
      */
     public function setCleanness($cleanness)
     {
         $this->cleanness = $cleanness;
     }
     
     /**
      * Get animals.
      *
      * @return animals.
      */
     public function getAnimals():array
     {
         return $this->animals;
     }
     
     /**
      * Set animals.
      *
      * @param animals the value to set.
      */
     public function setAnimals($animals)
     {
         $this->animals = $animals;
     }

     /**
      * Get type.
      *
      * @return type.
      */
     public function getType():string
     {
         return $this->type;
     }
     
     /**
      * Set type.
      *
      * @param type the value to set.
      */
     public function setType($type)
     {
         $this->type = $type;
     }

     public function hydrate($datas)
     {
         if (isset($datas['id_enclosure'])) $this->setId($datas['id_enclosure']);
         if (isset($datas['name_enclosure'])) $this->setName($datas['name_enclosure']);
         if (isset($datas['cleanness'])) $this->setCleanness($datas['cleanness']);
         //if (isset($datas['animals'])) $this->set($datas['animals']);
         if (isset($datas['type'])) $this->setType($datas['type']);
     }

     public function counter():int
     {
         return count($this->getAnimals());
     }

     public function add(Animal $animal):int
     {
         if (count($this->getAnimals()) < self::MAX_ANIMALS) {
             if ($this->counter() > 0) {
                 if (get_class($this->animals[0]) === get_class($animal)) {
                    $this->animals[] = $animal;

                    return count($this->getAnimals());
                 } else {
                     return -1;
                 }
             } else {
                $this->animals[] = $animal;

                return count($this->getAnimals());
             }
         }

         return -1;
     }

     public function remove(Animal $animal):int
     {
         $index = array_search($animal, $this->animals, true);

         if ($index !== false) array_splice($this->animals, $index, 1);

         return count($this->getAnimals());
     }

     public function getStatus():array
     {
         return [
             'id' => $this->getId(),
             'name' => $this->getName(),
             'cleanness' => $this->getCleanness(),
             'type' => $this->getType(),
             'animals' => $this->getAnimalsStatus()
         ];
     }

     public function getAnimalsStatus():array
     {
         $list = [];

         foreach($this->getAnimals() as $animal)
         {
             $list[] = $animal->getStatus();
         }

         return $list;
     }

}

?>
