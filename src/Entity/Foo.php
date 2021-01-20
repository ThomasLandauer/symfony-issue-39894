<?php declare(strict_types=1);
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\EventListener\FooListener;

/**
 * @ORM\EntityListeners({FooListener::class})
 * @ORM\Entity()
 */
class Foo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $message;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getMessage(): ?string
    {
        return $this->message;
    }
    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }
}
