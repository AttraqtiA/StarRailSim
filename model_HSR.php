<?php 
//saya memilih untuk coba explore relation dengan array 2D, tanpa class relation
class character {
    public $name;
    public $hp;
    public $attack;
    public $def;
    public $spd;
    public $path;
    public $rarity;
    public $region;
    public $element;

    function getName() {
        return $this->name;
    }
    function setName($name) {
        $this->name = $name;
    }
    function getHp($hp) {
        return $this->hp;
    }
    function setHp($hp) {
        $this->hp = $hp;
    }

}

class relic {
    public $type;
    public $set;
    public $mainstat;
    public $substat = array();
    public $rarity;
    public $chara;
}

?>