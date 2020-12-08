<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    private const ENTITY_CLASS = User::class;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, self::ENTITY_CLASS);
    }

    public function save(User $user): void
    {
        if ($user->isNew()) {
            $this->getEntityManager()->persist($user);
        }
        $this->getEntityManager()->flush();
    }
}
