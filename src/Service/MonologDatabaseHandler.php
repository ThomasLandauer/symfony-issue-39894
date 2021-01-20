<?php declare(strict_types = 1);
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\AbstractProcessingHandler;
use App\Entity\Log;

/**
 * https://nehalist.io/logging-events-to-database-in-symfony/
 */
class MonologDatabaseHandler extends AbstractProcessingHandler
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function write(array $record)
    {
        // https://github.com/Seldaek/monolog/blob/master/doc/message-structure.md
        $log = new Log($record['message'], $record['context'], $record['datetime']);

        $this->entityManager->persist($log);
        $this->entityManager->flush();
    }
}
