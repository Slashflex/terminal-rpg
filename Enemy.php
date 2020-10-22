<?php
class Enemy extends Person
{
  public function __construct($name, $hp)
  {
    parent::__construct($name, $hp);

    $this->bonus_damage = 0;
  }

  public function infoMob()
  {
    if ($this->name == 'Balrog') {
      return $this->hp . '/420';
    } elseif ($this->name == 'Goblin') {
      return $this->hp . '/90';
    } elseif ($this->name == 'Skull') {
      return $this->hp . '/185';
    } 
  }

  public function enemyDamage()
  {
    if ($this->name === 'Balrog') {
      return rand(0, 30);
    } else if ($this->name === 'Goblin') {
      return rand(0, 17);
    } else if ($this->name === 'Skull') {
      return rand(0, 11);
    }
  }

  public function attackPlayer($target)
  {
    echo $this->name . ' dash towards ' . $target->name . ' !' . PHP_EOL;
    $damageDealt = $this->enemyDamage();
    $target->attackedFor($damageDealt);
  }
}
