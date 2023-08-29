<?php

class Aviary extends Enclosure
{
    private float $height;
    
    /**
     * Get height.
     *
     * @return height.
     */
    public function getHeight():float
    {
        return $this->height;
    }
    
    /**
     * Set height.
     *
     * @param height the value to set.
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function checkCleanliness():string
    {
        return $this->getCleanness();
    }
}

?>
