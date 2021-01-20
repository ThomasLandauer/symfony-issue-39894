<?php declare(strict_types = 1);
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Foo;

class FooCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:foo';

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $foo = new Foo();
        $this->entityManager->persist($foo);
        $this->entityManager->flush();

        $foo->setMessage('foo');
        $this->entityManager->persist($foo);
        $this->entityManager->flush();

        return 0;
    }
}
