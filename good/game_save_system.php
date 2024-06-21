<?php
// Caretaker: Sistem Save Game
class GameSaveSystem
{
    private array $mementos = [];

    public function addMemento(GameMemento $memento)
    {
        $this->mementos[] = $memento;
    }

    public function getMemento($index)
    {
        return $this->mementos[$index];
    }

    public function displaySaveData()
    {
        foreach ($this->mementos as $index => $memento) {
            echo "<b>Save Data " . ($index + 1) . "</b><br> Level: " . $memento->getLevel() . ", Score: " . $memento->getScore() . ", Time: " . $memento->getTime() . "<br><br>";
        }
    }
}
