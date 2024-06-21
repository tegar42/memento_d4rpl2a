<?php
// Memento: File Save Game
class GameMemento
{
    private int $level;
    private int $score;
    private string $time;

    public function __construct($level, $score, $time)
    {
        $this->level = $level;
        $this->score = $score;
        $this->time = $time;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getTime(): string
    {
        return $this->time;
    }
}
