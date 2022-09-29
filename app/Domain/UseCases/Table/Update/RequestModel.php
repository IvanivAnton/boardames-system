<?php

namespace App\Domain\UseCases\Table\Update;

class RequestModel
{
    private int $id;
    private ?int $gameId;
    private ?bool $gameWithDLC;
    private ?bool $ownsABox;
    private ?int $numberOfPlayers;
    private ?string $startTime;

    public function __construct(array $validatedFields)
    {
        $this->id = $validatedFields['id'];
        $this->gameId = $validatedFields['game_id'] ?? null;
        $this->gameWithDLC = $validatedFields['game_with_dlc']  ?? null;
        $this->ownsABox = $validatedFields['owns_a_box'] ?? null;
        $this->numberOfPlayers = $validatedFields['number_of_players'] ?? null;
        $this->startTime = $validatedFields['start_time'] ?? null;
    }

    /**
     * @return int
     */
    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * @return bool
     */
    public function isGameWithDLC(): bool
    {
        return $this->gameWithDLC;
    }

    /**
     * @return bool
     */
    public function isOwnsABox(): bool
    {
        return $this->ownsABox;
    }

    /**
     * @return int
     */
    public function getNumberOfPlayers(): int
    {
        return $this->numberOfPlayers;
    }

    /**
     * @return string
     */
    public function getStartTime(): string
    {
        return $this->startTime;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}
