<?php

namespace App\Domain\UseCases\Game\Update;

class RequestModel
{
    private string $name;
    private int $numberOfPlayers;
    private int $id;

    /**
     * @param string $name
     * @param int $numberOfPlayers
     * @param int $id
     */
    public function __construct(string $name, int $numberOfPlayers, int $id)
    {
        $this->name = $name;
        $this->numberOfPlayers = $numberOfPlayers;
        $this->id = $id;
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}
