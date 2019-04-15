<?php
class Card{
    
    private $CardNumber;
    private $FName;
    private $MInitial;
    private $LName;
    private $Expiration;
    private $CardCompany;
    private $DebOCred;
    private $CVVNumber;
    private $amount;
    
    public function __construct($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am){
        $this->CardNumber = $cn;
        $this->FName = $fn;
        $this->MInitial = $mi;
        $this->LName = $ln;
        $this->Expiration = $ex;
        $this->CardCompany = $cc;
        $this->DebOCred = $dc;
        $this->CVVNumber = $cv;
        $this->amount = $am;
    }
    /**
     * @return mixed
     */
    public function getCardNumber()
    {
        return $this->CardNumber;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->FName;
    }

    /**
     * @return mixed
     */
    public function getMInitial()
    {
        return $this->MInitial;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->LName;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->Expiration;
    }

    /**
     * @return mixed
     */
    public function getCardCompany()
    {
        return $this->CardCompany;
    }

    /**
     * @return mixed
     */
    public function getDebOCred()
    {
        return $this->DebOCred;
    }

    /**
     * @return mixed
     */
    public function getCVVNumber()
    {
        return $this->CVVNumber;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $CardNumber
     */
    public function setCardNumber($CardNumber)
    {
        $this->CardNumber = $CardNumber;
    }

    /**
     * @param mixed $FName
     */
    public function setFName($FName)
    {
        $this->FName = $FName;
    }

    /**
     * @param mixed $MInitial
     */
    public function setMInitial($MInitial)
    {
        $this->MInitial = $MInitial;
    }

    /**
     * @param mixed $LName
     */
    public function setLName($LName)
    {
        $this->LName = $LName;
    }

    /**
     * @param mixed $Expiration
     */
    public function setExpiration($Expiration)
    {
        $this->Expiration = $Expiration;
    }

    /**
     * @param mixed $CardCompany
     */
    public function setCardCompany($CardCompany)
    {
        $this->CardCompany = $CardCompany;
    }

    /**
     * @param mixed $DebOCred
     */
    public function setDebOCred($DebOCred)
    {
        $this->DebOCred = $DebOCred;
    }

    /**
     * @param mixed $CVVNumber
     */
    public function setCVVNumber($CVVNumber)
    {
        $this->CVVNumber = $CVVNumber;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    
   
    
    
    
    
    
}

?>