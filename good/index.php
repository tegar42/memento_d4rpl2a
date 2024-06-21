<?php
include_once("game_player.php");
include_once("game_save_system.php");

$player = new GamePlayer();
$saveSystem = new GameSaveSystem();


$player->setState(1, 100);
$memento1 = $player->createMemento();
$saveSystem->addMemento($memento1);


$player->setState(2, 200);
$memento2 = $player->createMemento();
$saveSystem->addMemento($memento2);

$player->setState(2, 600);
$memento3 = $player->createMemento();
$saveSystem->addMemento($memento3);

$player->setState(3, 1000);
$memento4 = $player->createMemento();
$saveSystem->addMemento($memento4);




echo "<b>Initial Data :</b></br>" . $player->getState();

$saveSystem->displaySaveData();

$restoredMemento = $saveSystem->getMemento(1);
$player->restoreMemento($restoredMemento);

echo "<b>Setelah Restore: </b></br>" . $player->getState();


$memento = $saveSystem->getMemento(1);
$memento['level'] = 10;
$memento['score'] = 500;

$player->restoreMemento($memento);

echo $player->getState();
