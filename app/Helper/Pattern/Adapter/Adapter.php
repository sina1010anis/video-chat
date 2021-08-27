<?php


namespace App\Helper\Pattern\Adapter;


class Adapter implements Item_1_Interface
{
    protected $item_2_interface;
    protected const PRICE = 50;
    public function __construct(Item_2_Interface $item_2_interface)
    {
        $this->item_2_interface = $item_2_interface;
    }


    public function view()
    {
        $this->item_2_interface->show();
    }

    public function bind()
    {
        $this->item_2_interface->set();
    }
}
