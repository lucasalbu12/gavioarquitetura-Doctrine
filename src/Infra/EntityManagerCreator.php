<?php

namespace Projects\Gavio\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager() :EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = false;

        $dbParams = array(
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'arquiteturagavio',
            'user' => 'root',
            'password' => ''
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        return EntityManager::create($dbParams, $config);
    }
}