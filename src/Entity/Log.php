<?php declare(strict_types = 1);
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Log
{
    // https://github.com/Seldaek/monolog/blob/master/doc/message-structure.md

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="text")
     */
    private string $message;

    /**
    * @ORM\Column(type="json")
    */
    private array $context = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $datetime;

    public function __construct(string $message, ?array $context=null, ?\DateTime $datetime = null)
    {
        $this->setMessage($message);
        if (is_array($context))
        {
            $this->setContext($context);
        }
        if ($datetime instanceof \DateTime)
        {
            $this->setDatetime($datetime);
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getMessage(): string
    {
        return $this->message;
    }
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
    public function getContext(): array
    {
        return $this->context;
    }
    public function setContext(array $context): self
    {
        $this->context = $context;
        return $this;
    }
    public function getDatetime(): \DateTime
    {
        return $this->datetime;
    }
    public function setDatetime(\DateTime $datetime): self
    {
        $this->datetime = $datetime;
        return $this;
    }
}
