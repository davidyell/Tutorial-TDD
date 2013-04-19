<?php
/**
 * Description of Electronics
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace ToyCar\CarInterface;

use ToyCar\CarInterface\Lights;

class Electronics
{
    public function __construct()
    {
        require_once 'Lights.php';
    }

    public function turnOn(Lights $lights)
    {

    }

    public function accelerate()
    {
        return true;
    }

    public function pushBrakes($brakingPower)
    {

    }
}
