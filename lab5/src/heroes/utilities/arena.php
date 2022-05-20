<?php

class pos3
{
    var $role;
    var $line;
    function __construct()
    {
        $this->role = 'tank';
        $this->line = 'offlane';
    }
    public function printRole() {
        echo("<b>".$this->role."<b>");
    }
     public function printLine() {
        echo("<b>".$this->line."<b>");
    }
}
