<?php

/**
 * Description of WrapperTest
 *
 * @author David Yell <neon1024@gmail.com>
 */
namespace Tests;

class WrapperTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        require_once dirname(__FILE__) . '/../Classes/Wrapper.php';
    }

    /**
     *
     * @var Wrapper An instance of the Wrapper class
     */
    private $Wrapper;

    /**
     * Initialize the test
     */
    protected function setUp()
    {
        parent::setUp();

        $this->Wrapper = new \Classes\Wrapper();
    }

    public function testCanCreateAWrapper()
    {
        $this->assertInstanceOf('Classes\Wrapper', $this->Wrapper, "Creation should create a new Wrapper() class");
    }

    public function testItShouldWrapAnEmptyString()
    {
        $this->assertEquals('', $this->Wrapper->wrap('', 0), "Empty string should return empty string");
    }

    public function testItDoesNotWrapAShortEnoughWord()
    {
        $textToBeParsed = 'word';
        $maxLineLength = 5;
        $this->assertEquals(
            $textToBeParsed,
            $this->Wrapper->wrap($textToBeParsed, $maxLineLength),
            "Should not wrap a word smaller than the line length"
        );
    }

    public function testItWrapsAWordLongerThanLineLength()
    {
        $textToBeParsed = 'alongword';
        $maxLineLength = 5;
        $this->assertEquals(
            "along\nword",
            $this->Wrapper->wrap($textToBeParsed, $maxLineLength),
            "Should wrap a word longer than the line length"
        );
    }

    public function testItWrapsAWordSeveralTimesIfItsTooLong()
    {
        $textToBeParsed = 'averyverylongword';
        $maxLineLength = 5;
        $this->assertEquals(
            "avery\nveryl\nongwo\nrd",
            $this->Wrapper->wrap($textToBeParsed, $maxLineLength),
            "Should wrap a very long word onto multiple lines"
        );
    }

    public function testItWrapsTwoWordsWhenSpaceAtTheEndOfLine()
    {
        $textToBeParsed = 'word word';
        $maxLineLength = 5;
        $this->assertEquals(
            "word\nword",
            $this->Wrapper->wrap($textToBeParsed, $maxLineLength),
            "Should wrap words if line length character is a space"
        );
    }

    public function testItWrapsTwoWordsWhenLineEndIsAfterFirstWord()
    {
        $textToBeParsed = 'word word';
        $maxLineLength = 7;
        $this->assertEquals(
            "word\nword",
            $this->Wrapper->wrap($textToBeParsed, $maxLineLength)
        );
    }

    public function testItWraps3WordsOn2Lines()
    {
        $textToBeParsed = 'word word word';
        $maxLineLength = 12;
        $this->assertEquals(
            "word word\nword",
            $this->Wrapper->wrap($textToBeParsed, $maxLineLength)
        );
    }

    public function testItWraps2WordsOn3Lines()
    {
        $textToBeParsed = 'word word';
        $maxLineLength = 3;
        $this->assertEquals(
            "wor\nd\nwor\nd",
            $this->Wrapper->wrap($textToBeParsed, $maxLineLength)
        );
    }

    public function testItWraps2WordsAtBoundry()
    {
        $textToBeParsed = 'word word';
        $maxLineLength = 4;
        $this->assertEquals(
            "word\nword",
            $this->Wrapper->wrap($textToBeParsed, $maxLineLength)
        );
    }
}
