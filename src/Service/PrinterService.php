<?php
declare(strict_types=1);

namespace App\Service;
use App\Entity\Personne;

final class PrinterService
{
    public function printLabels(array $personnes): void
    {
        foreach ($personnes as $p) {
            if (!$p instanceof Personne) {
                throw new \InvalidArgumentException("obligatoire de mettre dans le tableau des elements de type personne .");
            }
            echo $p->getLabel() . PHP_EOL;
        }
    }
}