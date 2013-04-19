<?php
/**
 * Description of SpyingStatusPanel
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace ToyCar\Tests\Spies;

use ToyCar\CarInterface\StatusPanel;

require_once 'CarInterface/StatusPanel.php';

class SpyingStatusPanel extends StatusPanel
{
    /**
     * Place to store the speed of the car
     *
     * @var int
     */
    private $speedWasRequested = false;

    /**
     *
     * @var int
     */
    private $currentSpeed = 1;

    /**
     * Return if the speed was requested
     */
    public function getSpeed()
    {
        if ($this->speedWasRequested) {
            $this->currentSpeed = 0;
        }
        $this->speedWasRequested = true;

        return $this->currentSpeed;
    }

    /**
     * Tell something if speed was requested
     */
    public function getSpeedWasRequested()
    {
        return $this->speedWasRequested;
    }

    public function spyOnSpeed()
    {
        return $this->currentSpeed;
    }
}
