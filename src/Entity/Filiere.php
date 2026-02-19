<?php
declare(strict_types=1);

namespace App\Entity;

final class Filiere
{
    private ?int $id;
    private string $code;
    private string $libelle;
    private ?string $description;

    public function __construct(?int $id, string $code, string $libelle, ?string $description = null)
    {
        $this->id = $id;
        $this->code = strtoupper(trim($code));
        $this->libelle = trim($libelle);
        $this->description = $description;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function __toString(): string
    {
        return "{$this->code} - {$this->libelle}";
    }
}