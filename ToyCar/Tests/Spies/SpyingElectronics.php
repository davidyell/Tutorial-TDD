<?php
/**
 * Description of SpyElectronics
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace ToyCar\Tests\Spies;

use ToyCar\CarInterface\Electronics;

require_once 'CarInterface/Electronics.php';

class SpyingElectronics extends Electronics
{
    /**
     * Store the breaking
     *
     * @var int Between 0 and 100
     */
    private $brakingPower;

    /**
     * Apply the brakes to slow the car
     *
     * @param int $brakingPower Between 0 and 100
     */
    public function pushBrakes($brakingPower)
    {
        $this->brakingPower = $brakingPower;
    }

    /**
     * What amount of braking force was allied?
     *
     * @return int
     */
    public function getBrakingPower()
    {
        return $this->brakingPower;
    }
}
