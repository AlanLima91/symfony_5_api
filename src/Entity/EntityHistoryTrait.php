<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

trait EntityHistoryTrait
{
    private DateTimeImmutable $createdAt;

    private DateTimeImmutable $updatedAt;
  
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
