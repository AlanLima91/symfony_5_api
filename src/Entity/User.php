<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class User implements EntityHistoryInterface
{
    use EntityHistoryTrait;

    #[ORM\Id]
    #[ORM\Column("int")]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column("string")]
    private string $username;

    private string $password;
  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function isNew(): bool
    {
        return null === $this->getId();
    }
}
