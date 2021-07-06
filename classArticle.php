<?php

class Article{

    private $_id;
    private $_title;
    private $_content;
    private $_date;
    private $_synopsis;

    public function hydrate(array $donnees)
    {
        foreach($donnees as $key => $value)
        {
            //On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);

            //Si le setter correspondant existe.
            if(method_exists($this, $method))
            {
                //Appel du setter.
                $this->$method($value);
            }
        }
        if (isset($donnees['id']))
        {
            $this->setId($donnees['id']);
        }
        if (isset($donnees['title']))
        {
            $this->setTitle($donnees['title']);
        }  
        if (isset($donnees['content']))
        {
            $this->setContent($donnees['content']);
        }  
        if (isset($donnees['date']))
        {
            $this->setDate($donnees['date']);
        }  
        if (isset($donnees['synopsis']))
        {
            $this->setSynopsis($donnees['synopsis']);
        }
    }

    //Liste des getters

    public function id()
    {
        return $this->_id;
    }
    public function title()
    {
        return $this->_title;
    }
    public function content()
    {
        return $this->_content;
    }
    public function date()
    {
        return $this->_date;
    }
    public function synopsis()
    {
        return $this->_synopsis;
    }
  
    // Liste des setters

    public function setId($id)
    {
        //conversion de l'argument en entier puis verifications qu'il est positif
        $id = (int) $id;

        if($id > 0){
            $this->_id = $id;
        }
    }

    public function setTitle($title)
    {
        if (is_string($title))
        {
            $this->_title = $title;
        }
    }
    public function setContent($content)
    {
        if(is_string($content))
        {
            $this->_content = $content;
        }
    }
    public function setDate($date)
    {
        if(is_numeric($date))
        {
            $this->_date = $date;
        }
     
    }
    public function setSynopsis($synopsis)
    {
        if(is_string($synopsis))
        {
            $this->_synopsis = $synopsis;
        }
    }
}