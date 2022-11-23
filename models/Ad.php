<?php
class Ad
{
    public function __construct(array $properties = array())
    {
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }
    public $pet_id;
    public $bname;
    public $isFeline;
    public $gender;
    public $age;
    public $name;
    public $story;
    public $diet;
    public $zipcode;
    public $days;
}
