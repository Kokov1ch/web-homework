<?php
namespace heroes;
class mars
{
    var $atribute;
    function __construct()
    {
        $this->atribute = 'strength';
    }
    public function printAtr() {
        echo("<b>".$this->atribute."<b>");
    }

}
