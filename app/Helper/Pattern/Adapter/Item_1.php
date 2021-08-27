<?php


namespace App\Helper\Pattern\Adapter;


class Item_1 implements Item_1_Interface
{

    public function view()
    {
        var_dump('In Class (Item 1) In Method View');
    }

    public function bind()
    {
        var_dump('In Class (Item 1) In Method Bind');
    }
}
