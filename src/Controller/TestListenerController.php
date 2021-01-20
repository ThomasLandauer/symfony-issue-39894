<?php declare(strict_types = 1);
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use App\Entity\Foo;

class TestListenerController extends AbstractController
{
    /**
     * @Route("/test-listener", methods={"GET"})
     */
    public function index(Request $request, LoggerInterface $appLogger, EntityManagerInterface $entityManager): Response
    {
        $appLogger->debug('Test');

        $foo = new Foo();
        $entityManager->persist($foo);
        $entityManager->flush();

        $foo->setMessage('foo');
        $entityManager->persist($foo);
        $entityManager->flush();

        return new Response('<html><body>OK</body></html>');
    }
}
