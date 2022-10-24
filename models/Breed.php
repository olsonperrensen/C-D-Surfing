<?php
class Breed
{
    public function __construct(array $properties = array())
    {
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }
    public $breed_id;
    public $isFeline;
    public $image_link;
    public $length;
    public $good_with_children;
    public $good_with_dogs;
    public $shedding;
    public $grooming;
    public $drooling;
    public $coat_length;
    public $good_with_strangers;
    public $playfulness;
    public $protectiveness;
    public $trainability;
    public $energy;
    public $vocal_communication;
    public $min_life_expectancy;
    public $max_life_expectancy;
    public $max_height_male;
    public $max_height_female;
    public $max_weight_male;
    public $max_weight_female;
    public $min_height_male;
    public $min_height_female;
    public $min_weight_male;
    public $min_weight_female;
    public $name;
    public $origin;
    public $intelligence;
    public $other_pets_friendly;
    public $family_friendly;
    public $general_health;
}
