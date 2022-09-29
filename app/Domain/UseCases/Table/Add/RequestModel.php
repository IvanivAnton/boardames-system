<?php

namespace App\Domain\UseCases\Table\Add;

class RequestModel
{
    private int $gameId;
    private int $eventId;
    private bool $gameWithDLC = false;
    private bool $ownsABox = true;
    private int $numberOfPlayers;
    private string $startTime;

    public function __construct(array $validatedFields)
    {
        $this->gameId = $validatedFields['game_id'];
        $this->eventId = $validatedFields['event_id'];
        if(!empty($validatedFields['game_with_dlc'])) {
            $this->gameWithDLC = $validatedFields['game_with_dlc'];
        }
        if(!empty($validatedFields['owns_a_box'])) {
            $this->ownsABox = $validatedFields['owns_a_box'];
        }
        $this->numberOfPlayers = $validatedFields['number_of_players'];
        $this->startTime = $validatedFields['start_time'];
    }

    /**
     * @return int
     */
    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
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



}
