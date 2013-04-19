<?php
/**
 * Description of CarController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace ToyCar;

use ToyCar\CarInterface\Engine;
use ToyCar\CarInterface\Gearbox;
use ToyCar\CarInterface\Electronics;
use ToyCar\CarInterface\Lights;
use ToyCar\CarInterface\StatusPanel;

class CarController
{

    /**
     * Construct the class and include classes that we want to use
     */
    public function __construct()
    {
        require_once 'CarInterface/StatusPanel.php';
    }

    /**
     * Prepare the car for takeoff!
     *
     * @param \ToyCar\CarInterface\Engine $engine
     * @param \ToyCar\CarInterface\Gearbox $gearbox
     * @param \ToyCar\CarInterface\Electronics $electronics
     * @param \ToyCar\CarInterface\Lights $lights
     *
     * @return boolean
     */
    public function getReadyToGo(Engine $engine, Gearbox $gearbox, Electronics $electronics, Lights $lights)
    {
        $engine->start();
        $gearbox->shift('N');

        $electronics->turnOn($lights);

        return true;
    }

    /**
     * Make the car go forwards
     *
     * @param \ToyCar\CarInterface\Electronics $electronics
     * @param \ToyCar\CarInterface\StatusPanel $statusPanel
     */
    public function goForward(Electronics $electronics, StatusPanel $statusPanel = null)
    {
        if (!$statusPanel) {
            $statusPanel = new StatusPanel();
        }

        if ($statusPanel->engineIsRunning() && $statusPanel->thereIsEnoughFuel()) {
            $electronics->accelerate();
        }
    }

    /**
     * Slow the car down
     *
     * @param int $brakingPower Amount of brake being applied between 0 and 100
     * @param \ToyCar\CarInterface\Electronics $electronics
     */
    public function stop($brakingPower, Electronics $electronics, StatusPanel $statusPanel = null)
    {
        if (!$statusPanel) {
            $statusPanel = new StatusPanel();
        }

        $electronics->pushBrakes($brakingPower);

        // Have we stopped yet?
        if ($statusPanel->getSpeed()) {
            $this->stop($brakingPower, $electronics, $statusPanel);
        }
    }
}
