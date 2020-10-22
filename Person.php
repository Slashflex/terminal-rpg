<?php
class Person
{
  public function __construct($name, $hp)
  {
    $this->name = $name;
    $this->hp = $hp;
    $this->alive = true;
  }

  public function info()
  {
    return $this->alive ? $this->name . ' (' . Enemy::infoMob() . ')' : $this->name . '(dead)';
  }

  public function attack($target, $bonus)
  {
    echo $this->name . ' dash towards ' . $target->name . ' !' . PHP_EOL;
    $damageDealt = Hero::damage() + $bonus;
    $target->attackedFor($damageDealt);
  }

  public function attackedFor($damageReceived)
  {
    $this->hp -= $damageReceived;

    if ($this->hp <= 0) {
      echo "$this->name is dead !" . PHP_EOL;
      $this->alive = false;
    } else {
      if ($damageReceived == 0) {
        $damageReceived = $this->name . ' completely missed his attack' . PHP_EOL;
        echo $damageReceived;
      } elseif ($damageReceived >= 30) {
        $damageReceived = $this->name . ' receive a critical hit for ' . $damageReceived . ' damage points !' . PHP_EOL;
        echo $damageReceived;
      } else {
        echo $this->name . ' receive ' . $damageReceived . ' damage points' . PHP_EOL;
      }
    }
  }
}
