<?php

declare(strict_types=1);

Namespace App\Entity;

use DateTimeImmutable;

trait EntityHistoryTrait
{
  private DateTimeImmutable $createdAt;

  private DateTimeImmutable $updatedAt;
  
  public function getCreatedAt(): DateTimeImmutable
  {
    return $this->createdAt;
  }

  public function setCreatedAt(DateTimeImmutable $createdAt): SELF
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  public function getUpdatedAt(): DateTimeImmutable
  {
    return $this->updatedAt;
  }

  public function setUpdatedAt(DateTimeImmutable $updatedAt): SELF
  {
    $this->updatedAt = $updatedAt;

    return $this;
  }
}
