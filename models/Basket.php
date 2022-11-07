<?php
class Basket
{
    public function __construct(array $properties = array())
    {
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }
    public $cart_id;
    public $pet_id;
    public $date_added;
}
