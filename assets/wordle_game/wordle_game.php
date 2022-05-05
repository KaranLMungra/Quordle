<?php
include_once("wordle_check\wordle_check.php");
include_once("wordle_gen\wordle_gen.php");

class WordleGame
{
    private $id;
    private $solution;
    private $played = 6;

    public function __construct(string $solution = null)
    {
        $date = new DateTime();
        $this->id = $date->getTimestamp();
        $this->solution = $solution ?? get_random_word();
    }

    public function play(string $guess)
    {
        if ($this->played === 0) {
            return [];
        }
        return wordle_check_2($guess, $this->solution);
    }
    public function get_solution(): string
    {
        return $this->solution;
    }

    public function get_id(): int
    {
        return $this->id;
    }
}
