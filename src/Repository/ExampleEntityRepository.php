<?php

namespace App\Repository;

use App\Entity\ExampleEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExampleEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExampleEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExampleEntity[]    findAll()
 * @method ExampleEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExampleEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExampleEntity::class);
    }

    /**
     * @param ExampleEntity $entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(ExampleEntity $entity)
    {
        if (null === $entity->getId()) {
            $this->getEntityManager()->persist($entity);
        }
        $this->getEntityManager()->flush($entity);

        return $entity;
    }
}
