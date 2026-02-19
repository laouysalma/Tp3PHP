<?php
declare(strict_types=1);

namespace App\Entity;
use App\Contract\ExportableInterface;


final class Enseignant extends Personne    implements ExportableInterface
{
    private string $grade;

    public function __construct(?int $id, string $nom, string $email, string $grade)
    {
        parent::__construct($id, $nom, $email);
        $this->setGrade($grade);
    }
    public function getGrade(): string
    {
        return $this->grade;
    }
    public function setGrade(string $grade): void
    {
        $grade = trim($grade);
        if ($grade === '') {
            throw new \InvalidArgumentException("attention le grade est obligatoire ");
        }
        $this->grade = $grade;
    }
    public function getRole(): string
    {
        return " C est un enseignant" ."<br>";
    }
        public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'role' => $this->getRole(),
            'nom' => $this->getName(),
            'email' => $this->getEmail(),
            'grade' => $this->grade
        ];
    }
}