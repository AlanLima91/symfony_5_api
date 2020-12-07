<?php

declare(strict_types=1);

Namespace App\Entity;

use DateTimeInterface;

trait EntityHistory
{
  private DateTimeInterface $createdAt;

  private DateTimeInterface $updatedAt;
  
  public function getCreatedAt(): DateTimeInterface
  {
    return $this->createdAt;
  }

  public function setCreatedAt(DateTimeInterface $createdAt): SELF
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  public function getUpdatedAt(): DateTimeInterface
  {
    return $this->updatedAt;
  }

  public function setUpdatedAt(DateTimeInterface $updatedAt): SELF
  {
    $this->updatedAt = $updatedAt;

    return $this;
  }
}
