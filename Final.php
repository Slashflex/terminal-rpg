<?php
spl_autoload_register(function ($className) {
  include_once $className . '.php';
});

class World
{
  public function __construct($enemies)
  {
    $this->enemies = $enemies;
  }
}

$world = new World([
  new Enemy('Balrog', 420),
  new Enemy('Goblin', 90),
  new Enemy('Skull', 185)
]);

$player = new Hero('John Doe', 300);

echo 'Thus begin the adventures of ' . $player->name . PHP_EOL;

$turnsNumber = 0;
$totalDamage = 0;
$totalHealing = 0;
$turn = 0;
$game = new Game();

while ($turn <= 100) {
  $turnsNumber += 1;

  $game->actions($world, $player);

  $choice = readline('What do you want to do ? ');

  if ($choice == 0) {
    $player->heal();
    $totalHealing += 100;
  } elseif ($choice == 1) {
    $player->upgrade_damage();
  } elseif ($choice == 99) {
    break;
  } else {
    $enemi_to_attack = $world->enemies[$choice - 2];
    $bonus = $player->bonus_damage;
    $player->attack($enemi_to_attack, $bonus);
    $totalDamage += $player->bonus_damage + $player->damage();
    $player->bonus_damage = 0;
  }

  if (!$game->gameOver($player, $world)) {
    echo '------------------' . PHP_EOL;
    echo 'Enemies turn !' . PHP_EOL;
    echo '------------------' . PHP_EOL;
  }

  foreach ($world->enemies as $enemy) {
    if ($enemy->alive) {
      $enemy->attackPlayer($player);
    } 
  }

  if ($game->gameOver($player, $world)) {
    echo $player->name . ' is Victorious !!'.PHP_EOL;
    break;
  }
}
