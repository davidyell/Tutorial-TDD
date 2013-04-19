<?php
/**
 * Description of StatusPanel
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace ToyCar\CarInterface;

class StatusPanel
{
    public function engineIsRunning()
    {
        return true;
    }

    public function thereIsEnoughFuel()
    {
        return true;
    }
}
