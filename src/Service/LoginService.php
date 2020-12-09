<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;

class LoginService
{
    public function __construct(
        public User $entity,
        public UserRepository $userRepository,
    ) {}

    public function retrieveUserFromUsername(string $username): ?User
    {
        return $this->userRepository->findBy(['username' => $username]);
    }
}