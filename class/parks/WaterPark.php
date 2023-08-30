<?php

class WaterPark extends Enclosure
{
    const MIN_RATE = 33.5;
    const MAX_RATE = 36.5;

    const GOOD_RATE = 'bon';
    const BAD_RATE = 'mauvais';

    private float $salinity; // Mesure en g/L.
    
    /**
     * Get salinity.
     *
     * @return salinity.
     */
    public function getSalinity():float
    {
        return $this->salinity;
    }
    
    /**
     * Set salinity.
     *
     * @param salinity the value to set.
     */
    public function setSalinity($salinity)
    {
        $this->salinity = $salinity;
    }

    public function verifySalinity():string
    {
        if ($this->getSalinity() >= self::MIN_RATE && $this->getSalinity() <= self::MAX_RATE)
        {
            return self::GOOD_RATE;
        }

        return self::BAD_RATE;
    }

}

?>
