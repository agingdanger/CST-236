<?php
class Product{
       
    private $PID;
    private $PName;
    private $PDescription;
    private $PPrice;
    
    public function __construct($pi, $pn, $pd, $pp){
        $this->PID = $pi;
        $this->PName = $pn;
        $this->PDescription = $pd;
        $this->PPrice = $pp;
    }
    
    /**
     * @return mixed
     */
    public function getPID()
    {
        return $this->PID;
    }

    /**
     * @return mixed
     */
    public function getPName()
    {
        return $this->PName;
    }

    /**
     * @return mixed
     */
    public function getPDescription()
    {
        return $this->PDescription;
    }

    /**
     * @return mixed
     */
    public function getPPrice()
    {
        return $this->PPrice;
    }

    /**
     * @param mixed $PID
     */
    public function setPID($PID)
    {
        $this->PID = $PID;
    }

    /**
     * @param mixed $PName
     */
    public function setPName($PName)
    {
        $this->PName = $PName;
    }

    /**
     * @param mixed $PDescription
     */
    public function setPDescription($PDescription)
    {
        $this->PDescription = $PDescription;
    }

    /**
     * @param mixed $PPrice
     */
    public function setPPrice($PPrice)
    {
        $this->PPrice = $PPrice;
    }

    
    
   
    
}

?>