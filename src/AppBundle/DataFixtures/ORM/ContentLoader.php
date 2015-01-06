<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class ContentLoader extends DataFixtureLoader implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        return  [
            __DIR__ . '/../Fixtures/users.yml',
            __DIR__ . '/../Fixtures/projects.yml',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
