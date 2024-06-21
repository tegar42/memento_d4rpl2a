<?php
include_once("game_memento.php");

// Originator: game player
class GamePlayer
{
    private int $level;
    private int $score;

    public function setState($level, $score)
    {
        $this->level = $level;
        $this->score = $score;
    }

    public function getState(): string
    {
        return "Level: " . $this->level . ", Score: " . $this->score . "<br><br>";
    }

    public function createMemento(): GameMemento
    {
        $timeZone = new DateTimeZone('Asia/Jakarta');
        $dateTime = new DateTime('now', $timeZone);
        $time = $dateTime->format('Y-m-d H:i:s');
        return new GameMemento($this->level, $this->score, $time);
    }

    public function restoreMemento(GameMemento $memento)
    {
        $this->level = $memento->getLevel();
        $this->score = $memento->getScore();
    }
}
