<?php
/**
 * Description of CarControllerTest
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace ToyCar\Tests;

use ToyCar\CarController;
use ToyCar\CarInterface\Electronics;
use ToyCar\CarInterface\Engine;
use ToyCar\CarInterface\Gearbox;
use ToyCar\CarInterface\Lights;

class CarControllerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Construct the class and load the classes that we want to use
     */
    public function __construct()
    {
        require_once 'CarController.php';
        require_once 'CarInterface/Engine.php';
        require_once 'CarInterface/Gearbox.php';
        require_once 'CarInterface/Electronics.php';
        require_once 'CarInterface/Lights.php';

        $this->CarController = new CarController();
        $this->Engine = new Engine();
        $this->Gearbox = new Gearbox();
        $this->Electronics = new Electronics();
    }

    /**
     * Can we get the car ready to go?
     */
    public function testItCanGetReadyTheCar()
    {
        $dummyLights = $this->getMock('ToyCar\\CarInterface\\Lights');

        $this->assertTrue($this->CarController->getReadyToGo($this->Engine, $this->Gearbox, $this->Electronics, $dummyLights));
    }

    /**
     * Is the car capable of acceleration?
     */
    public function testItCanAccelerate()
    {
        $stubStatusPanel = $this->getMock('ToyCar\\CarInterface\\StatusPanel');

        $stubStatusPanel->expects($this->any())
            ->method('thereIsEnoughFuel')
            ->will($this->returnValue(true));

        $stubStatusPanel->expects($this->any())
            ->method('engineIsRunning')
            ->will($this->returnValue(true));

        $this->CarController->goForward($this->Electronics, $stubStatusPanel);
    }
}
