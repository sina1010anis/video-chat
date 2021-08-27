<?php


namespace App\Helper\Pattern\Adapter;


class Item_2 implements Item_2_Interface
{

    public function show()
    {
        var_dump('In Class (Item 2) In Method Show');
    }

    public function set()
    {
        var_dump('In Class (Item 2) In Method Set');
    }
}
