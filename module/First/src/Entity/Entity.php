<?php

namespace First\Entity;


abstract class Entity
{
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function setData($data)
    {
        foreach ($data as $name=>$value){
            $this->$name = $value;
        }
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}