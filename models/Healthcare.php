<?php
class Healthcare
{
    public function __construct(array $properties = array())
    {
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }
    public $healthcare_id;
    public $healthcare_name;
    public $price;
    public $description;
}
