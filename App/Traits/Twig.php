<?php

namespace App\Traits;

trait Twig
{
    /**
     * @param mixed $twig
     */
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }
}