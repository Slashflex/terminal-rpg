<?php
class Game
{
  public function actions($world, $player)
  {
    echo '------------------' . PHP_EOL;
    echo 'ACTIONS POSSIBLES' . PHP_EOL;
    echo '------------------' . PHP_EOL;
    echo '0 - Se soigner' . PHP_EOL;
    echo '1 - Améliorer son attaque' . PHP_EOL;

    $i = 2;

    foreach ($world->enemies as $enemy) {
      echo "$i - Attack " . $enemy->info()  .  PHP_EOL;
      $i += 1;
    }

    echo '99 - Quitter' . PHP_EOL;

    echo '------------------' . PHP_EOL;

    // $player = new Hero('Jean-michel Paladin', 300);

    $damageAndBonus = $player->damage() + $player->bonus_damage;
    echo $player->name . " have " . $player->hp . " hp, his next attack will inflict " . $damageAndBonus . " damage points." . PHP_EOL;

    echo '------------------' . PHP_EOL;
  }

  public function gameOver($player, $world)
  {
    if ($player->alive === false || ($world->enemies[0]->alive === false && $world->enemies[1]->alive === false && $world->enemies[2]->alive === false)) {
      return true;
    }
  }
}
