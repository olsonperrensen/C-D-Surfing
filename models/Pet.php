<?php
class Pet
{
    public function __construct(array $properties = array())
    {
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }
    public $pet_id;
    public $owner_id;
    public $breed_id;
    public $name;
    public $gender;
    public $age;
    public $size;
    public $color;
    public $story;
    public $diet;
    public $register_date;
    public $healthcare_id;
}
