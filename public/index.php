<?php
declare(strict_types=1);

use App\Entity\Filiere;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use App\Service\PrinterService; 

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/'; 
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
        $relative_class = substr($class, $len);
    
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
}

);


$Info = new Filiere(1,"BD", "Big Data","Formation en analyse de données massives");
$f2 = new Filiere(2,"INFO", "Informatique","Formation en développement logiciel");

$e1 = new Etudiant(null, "Salma", "salma@gmail.com", $Info);
$e2 = new Etudiant(null, "Hind", "hind@gmail.com", $f2);

$en1 = new Enseignant(null, "Laouy", "laouy@gmail.com", "prof enseignant");

$personnes = [$e1, $e2, $en1];

$printer = new PrinterService();
$printer->printLabels($personnes);

echo PHP_EOL . "tableau export :" . PHP_EOL."<br>";
echo "Étudiant :\n";
print_r($e1->toArray());
echo "<br>"."\nEnseignant :\n";
print_r($en1->toArray());
