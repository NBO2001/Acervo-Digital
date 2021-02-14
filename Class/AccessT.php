<?php
class AccessT
{
    private $tdname;
    private $id;
    private $ipus;
    private $laccess;
    private $dateac;
    private $situation;
    private $foreignkey;

    //Special methods

    function AccessT()
    {
        $this->setTdname("access");
        $this->setId("sessionnumber");
        $this->setIpus("ipaccess");
        $this->setLaccess("levleaccess");
        $this->setDateac("dateaccess");
        $this->setSituation("sessionstatus");
        $this->setForeignkey("iduser");
    }
    function setTdname($tdname)
    {
        $this->tdname = $tdname;
    }
    function getTdname()
    {
        return $this->tdname;
    }
    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }
    function setIpus($ipus)
    {
        $this->ipus = $ipus;
    }
    function getIpus()
    {
        return $this->ipus;
    }
    function setLaccess($laccess)
    {
        $this->laccess = $laccess;
    }
    function getLaccess()
    {
        return $this->laccess;
    }
    function setDateac($date)
    {
        $this->dateac = $date;
    }
    function getDateac()
    {
        return $this->dateac;
    }
    function setSituation($situation)
    {
        $this->situation = $situation;
    }
    function getSituation()
    {
        return $this->situation;
    }
    function setForeignkey($key)
    {
        $this->foreignkey = $key;
    }
    function getForeignkey()
    {
        return $this->foreignkey;
    }
}