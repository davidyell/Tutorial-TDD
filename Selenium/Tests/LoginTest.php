<?php
/**
 * Description of TestLogin
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace Selenium\Tests;

class TestLogin extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://ukwm157/Tutorial-TDD/Selenium');
    }

    public function testHasLoginForm()
    {
        $this->url('index.php');
        $username = $this->byName('username');
        $password = $this->byName('password');

        $this->assertEquals('', $username->value());
        $this->assertEquals('', $password->value());
    }

    public function testLoginFormSubmitsToAdmin()
    {
        $this->url('index.php');
        $form = $this->byCssSelector('form');
        $action = $form->attribute('action');

        $this->assertContains('admin.php', $action);

        $this->byName('username')->value('dyell');
        $this->byName('password')->value('1234');

        $form->submit();

        $welcome = $this->byCssSelector('h1')->text();
        $this->assertRegExp('/dyell/i', $welcome);
    }

    public function testSignupLinkExists()
    {
        $this->url('index.php');
        $this->assertRegExp('/Sign ?up/i', $this->source());
    }
}
