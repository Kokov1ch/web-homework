<?php
spl_autoload_register(function ($className) {
    $path = dirname(__DIR__ ) . '/src/' . str_replace("\\", "/", $className) . '.php';
    //echo $path. "<br>";
    require_once $path;
});
use pos3;
use heroes\mars;
use heroes\utilities\arena;
$offlane = new mars();
$ult = new pos3();
$arena = new arena();
echo ("<b>Марс - герой с атрибутом </b>");
$offlane->printAtr();
echo "<br>";
echo ("<b>Ходит на   </b>");
$ult ->printLine();
echo ("<b>, роль - </b>");
$ult ->printRole();
echo "<br>";
echo ("<b> Ульта осуществляет </b>");
$arena->printType();
