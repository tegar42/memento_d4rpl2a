<?php
class GamePlayer
{
    private int $level;
    private int $score;
    private array $mementos = []; // Pelanggaran prinsip ketersendirian Memento

    public function setState(int $level, int $score)
    {
        $this->level = $level;
        $this->score = $score;
    }

    public function getState(): string
    {
        return "Level: " . $this->level . ", Score: " . $this->score . "<br><br>";
    }

    public function createMemento(): array // Pelanggaran prinsip imutabilitas Memento
    {
        return ['level' => $this->level, 'score' => $this->score];
    }

    public function restoreMemento(array $memento) // Pelanggaran prinsip ketersendirian Memento
    {
        $this->level = $memento['level'];
        $this->score = $memento['score'];
    }

    public function addMemento(array $memento) // Pelanggaran prinsip pemisahan tanggung jawab
    {
        $this->mementos[] = $memento;
    }

    public function getMemento(int $index): array // Pelanggaran prinsip ketersendirian Memento
    {
        return $this->mementos[$index];
    }

    public function displaySaveData() // Pelanggaran prinsip pemisahan tanggung jawab
    {
        foreach ($this->mementos as $index => $memento) {
            echo "<b>Save Data " . ($index + 1) . "</b><br> Level: " . $memento['level'] . ", Score: " . $memento['score'] . "<br><br>";
        }
    }
}

// Penggunaan kelas GamePlayer
$player = new GamePlayer();

$player->setState(1, 100);
$memento1 = $player->createMemento();
$player->addMemento($memento1);

$player->setState(2, 200);
$memento2 = $player->createMemento();
$player->addMemento($memento2);

$player->setState(3, 300);
$memento3 = $player->createMemento();
$player->addMemento($memento3);

echo $player->getState(); // Output: Level: 3, Score: 300

// Modifikasi Memento secara langsung
$memento = $player->getMemento(1);
$memento['level'] = 10;
$memento['score'] = 500;

$player->restoreMemento($memento);

echo $player->getState(); // Output: Level: 10, Score: 500 (Pelanggaran imutabilitas)
