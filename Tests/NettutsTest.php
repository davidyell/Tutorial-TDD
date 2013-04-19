<?php
/**
 * Description of NettutsTest
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace Tests;

class NettutsTest extends \PHPUnit_Framework_TestCase
{

    protected $object;

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        require_once dirname(__FILE__) . '/../Classes/Nettuts.php';
    }

    protected function setUp()
    {
        $this->object = new Nettuts;
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
