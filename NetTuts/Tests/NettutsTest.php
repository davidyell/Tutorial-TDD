<?php
/**
 * Description of NettutsTest
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace NetTuts\Tests;

use NetTuts\Classes\Nettuts;

require_once 'NetTuts/Classes/Nettuts.php';

class NettutsTest extends \PHPUnit_Framework_TestCase
{

    protected $object;

    protected function setUp()
    {
        $this->object = new Nettuts();
    }

    protected function tearDown()
    {

    }

    /**
     * A dummy test which we know will pass
     *
     * @return void
     */
    public function testDummyTest()
    {
        $this->assertTrue(true);
    }
}
