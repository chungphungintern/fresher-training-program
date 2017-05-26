<?php

class Unit
{
    public $name;
    public $health;
    public $damage_base;
    public $defense_base;

    public $name_weapon;
    public $damage_weapon;
    public $critical;

    public $name_armor;
    public $defense_armor;
    public $block;

    public function __construct(array $arr)
    {
        $this->name = $arr[0];
        $this->health = $arr[1];
        $this->damage_base = $arr[2];
        $this->defense_base = $arr[3];

        //Weapon
        $this->name_weapon = $arr[4];
        $this->damage_weapon = $arr[5];
        $this->critical = $arr[6];

        //Armor
        $this->name_armor = $arr[7];
        $this->defense_armor = $arr[8];
        $this->block = $arr[9];
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function totalDamage()
    {
        return $total = $this->damage_base + $this->damage_weapon;
    }

    public function totalDefense()
    {
        return $total = $this->defense_base + $this->defense_armor;
    }

    public function isCritical()
    {
        $flag = "";
        $number_random = random_int(1, 100);
        if ($this->critical >= $number_random) {
            $flag = true;
        }
        return $flag;
    }

    public function isBlock()
    {
        $flag = "";
        $number_random = random_int(1, 100);
        if ($this->block >= $number_random) {
            $flag = true;
        }
        return $flag;
    }

}