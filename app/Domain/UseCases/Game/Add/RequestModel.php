<?php

namespace App\Domain\UseCases\Game\Add;

class RequestModel
{
    private string $name;
    private int $numberOfPlayers;

    /**
     * @param string $name
     * @param int $numberOfPlayers
     */
    public function __construct(string $name, int $numberOfPlayers)
    {
        $this->name = $name;
        $this->numberOfPlayers = $numberOfPlayers;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getNumberOfPlayers(): int
    {
        return $this->numberOfPlayers;
    }


}
