<?php

namespace Tests\FFMpeg\Functional;

use FFMpeg\FFMpeg;
<<<<<<< HEAD
<<<<<<< HEAD
use Tests\FFMpeg\BaseTestCase;

abstract class FunctionalTestCase extends BaseTestCase
=======
use PHPUnit\Framework\TestCase;

abstract class FunctionalTestCase extends TestCase
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
use PHPUnit\Framework\TestCase;

abstract class FunctionalTestCase extends TestCase
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
{
    /**
     * @return FFMpeg
     */
    public function getFFMpeg()
    {
        return FFMpeg::create(array('timeout' => 300));
    }
}
