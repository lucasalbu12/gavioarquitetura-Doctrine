<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Projects\Gavio\Infra\EntityManagerCreator;

// replace with file to your own project bootstrap
require_once __DIR__ . '/vendor/autoload.php';

$entityManagerCreator = new EntityManagerCreator();
$entityManager = $entityManagerCreator->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
