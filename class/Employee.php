<?php

class Employee
{

    private int $id;
    private string $name;
    private string $sex;
    private string $dateOfBirth;
    private string $createdAt;

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
      * Get sex.
      *
      * @return sex.
      */
     public function getSex():string
     {
         return $this->sex;
     }
     
     /**
      * Set sex.
      *
      * @param sex the value to set.
      */
     public function setSex($sex)
     {
         $this->sex = $sex;
     }
     
     /**
      * Get dateOfBirth.
      *
      * @return dateOfBirth.
      */
     public function getDateOfBirth():string
     {
         return $this->dateOfBirth;
     }
     
     /**
      * Set dateOfBirth.
      *
      * @param dateOfBirth the value to set.
      */
     public function setDateOfBirth($dateOfBirth)
     {
         $this->dateOfBirth = $dateOfBirth;
     }
     
     /**
      * Get createdAt.
      *
      * @return createdAt.
      */
     public function getCreatedAt():string
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
         if (isset($datas['id_employee'])) $this->setId($datas['id_employee']);
         if (isset($datas['name_employee'])) $this->setName($datas['name_employee']);
         if (isset($datas['sex_employee'])) $this->setSex($datas['sex_employee']);
         if (isset($datas['date_of_birth'])) $this->setDateOfBirth($datas['date_of_birth']);
         if (isset($datas['created_at'])) $this->setCreatedAt($datas['created_at']);
     }
}

?>
