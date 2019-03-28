<?php

/**
 * Abiturient
 */

class Abiturient 
{
    public $id;
    public $name;
    public $middleName;
    public $surname;
    public $sex;
    public $groupNumber;
    public $mark;
    public $birthDate;
    public $hostel;
    public $email;
    public $password;
    
    /**
    * Sets abiturient attributes
    *
    * @param array $attributes data from post
    * @return null
    */
    public function setAttributes($attributes)
    {
        foreach ($attributes as $name => $attribute)
        {
            if (property_exists('Abiturient', $name))
            {
                $this->$name = $attribute;
            }
        }
    }
}
