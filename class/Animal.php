<?php

abstract class Animal
{

    private int $id;
    private string $name;
    private string $species;
    private int $age;
    private float $weight;
    private float $size;

    private bool $isHungry;
    private bool $isSleeping;
    private bool $isSick;

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
      * Get species.
      *
      * @return species.
      */
     public function getSpecies():string
     {
         return $this->species;
     }
     
     /**
      * Set species.
      *
      * @param species the value to set.
      */
     public function setSpecies($species)
     {
         $this->species = $species;
     }
    
    /**
     * Get age.
     *
     * @return age.
     */
    public function getAge():int
    {
        return $this->age;
    }
    
    /**
     * Set age.
     *
     * @param age the value to set.
     */
    public function setAge($age)
    {
        $this->age = $age;
    }
    
    /**
     * Get weight.
     *
     * @return weight.
     */
    public function getWeight():float
    {
        return $this->weight;
    }
    
    /**
     * Set weight.
     *
     * @param weight the value to set.
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    
    /**
     * Get size.
     *
     * @return size.
     */
    public function getSize():float
    {
        return $this->size;
    }
    
    /**
     * Set size.
     *
     * @param size the value to set.
     */
    public function setSize($size)
    {
        $this->size = $size;
    }
    
    /**
     * Get isHungry.
     *
     * @return isHungry.
     */
    public function getIsHungry():bool
    {
        return $this->isHungry;
    }
    
    /**
     * Set isHungry.
     *
     * @param isHungry the value to set.
     */
    public function setIsHungry($isHungry)
    {
        $this->isHungry = $isHungry;
    }
    
    /**
     * Get isSleeping.
     *
     * @return isSleeping.
     */
    public function getIsSleeping():bool
    {
        return $this->isSleeping;
    }
    
    /**
     * Set isSleeping.
     *
     * @param isSleeping the value to set.
     */
    public function setIsSleeping($isSleeping)
    {
        $this->isSleeping = $isSleeping;
    }
    
    /**
     * Get isSick.
     *
     * @return isSick.
     */
    public function getIsSick():bool
    {
        return $this->isSick;
    }
    
    /**
     * Set isSick.
     *
     * @param isSick the value to set.
     */
    public function setIsSick($isSick)
    {
        $this->isSick = $isSick;
    }

    public function hydrate(array $datas)
    {
        if (isset($datas['id_animal'])) $this->setId($datas['id_animal']);
        if (isset($datas['name_animal'])) $this->setName($datas['name_animal']);
        if (isset($datas['species'])) $this->setSpecies($datas['species']);
        if (isset($datas['age'])) $this->setAge($datas['age']);
        if (isset($datas['weight'])) $this->setWeight($datas['weight']);
        if (isset($datas['size'])) $this->setSize($datas['size']);
        if (isset($datas['is_hungry'])) $this->setIsHungry($datas['is_hungry']);
        if (isset($datas['is_sleeping'])) $this->setIsSleeping($datas['is_sleeping']);
        if (isset($datas['is_sick'])) $this->setIsSick($datas['is_sick']);
    }

    public function eat(string $food):string
    {
        return 'Je mange [' . $food . ']';
    }

    public function communicate():string
    {
        return 'J\'essai de communiquer';
    }

    public function toBeTreated():string
    {
        return 'Merci de m\'avoir soigner';
    }

    public function sleep():string
    {
        return 'Je m\'endors';
    }

    public function wakeUp():string
    {
        return 'Je me réveille';
    }

    public function getStatus():array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'species' => $this->getSpecies(),
            'age' => $this->getAge(),
            'weight' => $this->getWeight(),
            'size' => $this->getSize(),
            'hungry' => $this->getIsHungry(),
            'sleep' => $this->getIsSleeping(),
            'sick' => $this->getIsSick()
        ];
    }

}

?>
