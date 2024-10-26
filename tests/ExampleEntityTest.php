<?php

namespace App\Tests;

use App\Entity\ExampleEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Uid\Uuid;

class ExampleEntityTest extends KernelTestCase
{
    public function testIdInitializedBeforePersist(): void
    {
        $expectedId = Uuid::v4();

        $exampleEntity = new ExampleEntity();
        $exampleEntity->id = $expectedId;

        self::getEntityManager()->persist($exampleEntity);

        self::assertEquals($expectedId, $exampleEntity->id); // Failure. Doctrine generate new id.
    }

    public static function getEntityManager(): EntityManagerInterface
    {
        $entityManager = self::getContainer()->get(EntityManagerInterface::class);

        self::assertInstanceOf(EntityManagerInterface::class, $entityManager);

        return $entityManager;
    }
}
