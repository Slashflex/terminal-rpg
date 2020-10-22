<?php
class Hero extends Person
{
  public function __construct($name, $hp)
  {
    parent::__construct($name, $hp);

    $this->bonus_damage = 0;
  }

  public function damage()
  {
    // $rand = rand(0, 40);
    // $rand2 =  rand(0, 22);

    return rand(0, 40);
  }

  public function heal()
  {
    $heal = rand(20, 100);
    $this->hp += $heal;
    if ($this->hp > 300) {
      $this->hp = 300;
    }

    echo $this->name . ' heal himself for ' . $heal . ' hp, he now have ' . $this->hp . '/300 hp.' . PHP_EOL;
  }

  public function upgrade_damage()
  {
    $this->bonus_damage += 25;
    echo $this->name . ' increases his damage by ' . $this->bonus_damage . ' pts for his next attack' . PHP_EOL;
  }
}
