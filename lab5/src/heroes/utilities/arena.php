<?php
namespace heroes\utilities;
class arena
{
    var $type;
    function __construct()
    {
        $this->type = 'zoning';
    }
    public function printType() {
        echo("<b>".$this->type."</b>");
    }
}
