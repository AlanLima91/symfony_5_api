<?php

declare(strict_types=1);

namespace App\Entity;

#[ORM\Entity]
Class User
{
  #[ORM\Id]
  #[ORM\Column("int")]
  #[ORM\GeneratedValue]
  private int $id;

  private string $username;

  private string $password;
  
  public function getId(): ?int
  {
    return $this->id;
  }

  public function isSaved(): bool
  {
    return null === $this->getId();
  }
}