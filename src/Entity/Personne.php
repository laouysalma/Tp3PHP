<?php
declare(strict_types=1);

namespace App\Entity;

use App\Contract\IdentifiableInterface;

abstract class Personne implements IdentifiableInterface
{
    protected ?int $id;
    protected string $name;
    protected string $email;

    public function __construct(?int $id, string $nom, string $email)
    {
        $this->setId($id);
        $this->setName($nom);
        $this->setEmail($email);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        if ($id !== null && $id <= 0) {
            throw new \InvalidArgumentException("Id saisie est invalide l id doit etre positive ");
        }
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $nom): void
    {
        $nom = trim($nom);
        if ($nom === '') {
            throw new \InvalidArgumentException("Le nom est obiligatoire !");
        }
        $this->name = $nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $email = trim($email);
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(" attention l'email  est invalide  .");
        }
        $this->email = $email;
    }

    abstract public function getRole(): string;

    public function getLabel(): string
    {
        return  $this->name . $this->getRole() . "  " ." <" . $this->email . ">";
    }
}