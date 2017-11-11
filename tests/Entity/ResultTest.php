<?php   // tests/Entity/ResultTest.php

namespace MiW\Results\Tests\Entity;

use MiW\Results\Entity\Result;
use MiW\Results\Entity\User;

/**
 * Class ResultTest
 *
 * @package MiW\Results\Tests\Entity
 */
class ResultTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var User $user
     */
    protected $user;

    /**
     * @var Result $result
     */
    protected $result;

    const USERNAME = 'uSeR ñ¿?Ñ';
    const POINTS = 2017;
    /**
     * @var \DateTime $_time
     */
    private $_time;


    /**
     * Sets up the fixture.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->user = new User();
        $this->user->setUsername(self::USERNAME);
        $this->_time = new \DateTime('now');
        $this->result = new Result(
            self::POINTS,
            $this->user,
            $this->_time
        );
    }

    /**
     * Implement testConstructor
     *
     * @covers \MiW\Results\Entity\Result::__construct()
     * @covers \MiW\Results\Entity\Result::getId()
     * @covers \MiW\Results\Entity\Result::getResult()
     * @covers \MiW\Results\Entity\Result::getUser()
     * @covers \MiW\Results\Entity\Result::getTime()
     *
     * @return void
     */
    public function testConstructor()
    {
        $this->assertSame(self::USERNAME, $this->result->getUser()->getUsername());
    }

    /**
     * Implement testGet_Id().
     *
     * @covers \MiW\Results\Entity\Result::getId()
     * @return void
     */
    public function testGet_Id()
    {
        $this->assertEquals(0, $this->result->getId());
    }

    /**
     * Implement testUsername().
     *
     * @covers \MiW\Results\Entity\Result::setResult
     * @covers \MiW\Results\Entity\Result::getResult
     * @return void
     */
    public function testResult()
    {

        $this->assertEquals(self::POINTS,$this->result->getResult());

        $this->result->setResult(100);
        $this->assertEquals(100,$this->result->getResult());

    }

    /**
     * Implement testUser().
     *
     * @covers \MiW\Results\Entity\Result::setUser()
     * @covers \MiW\Results\Entity\Result::getUser()
     * @return void
     */
    public function testUser()
    {
        $this->assertSame(self::USERNAME,$this->result->getUser()->getUsername());

        $user2 = new User();
        $user2->setUsername("PACO");
        $this->result->setUser($user2);
        $this->assertSame("PACO",$this->result->getUser()->getUsername());
    }

    /**
     * Implement testTime().
     *
     * @covers \MiW\Results\Entity\Result::setTime
     * @covers \MiW\Results\Entity\Result::getTime
     * @return void
     */
    public function testTime()
    {
        $this->assertEquals($this->_time,$this->result->getTime());

        $_newTime = new \DateTime('now');

        $this->result->setTime($_newTime);
        $this->assertEquals($_newTime,$this->result->getTime());
    }

    /**
     * Implement testTo_String().
     *
     * @covers \MiW\Results\Entity\Result::__toString
     * @return void
     */
    public function testTo_String()
    {

    }

    /**
     * Implement testJson_Serialize().
     *
     * @covers \MiW\Results\Entity\Result::jsonSerialize
     * @return void
     */
    public function testJson_Serialize()
    {

        $result2 = new Result($this->result->getResult(),$this->result->getUser(),$this->result->getTime());

        $jsonUser = $this->result->jsonSerialize();
        $jsonUser2 = $result2 ->jsonSerialize();

        $resultado = array_diff($jsonUser,$jsonUser2);
        echo print_r($resultado);

        $this->assertEquals(0,count($resultado));
    }
}
