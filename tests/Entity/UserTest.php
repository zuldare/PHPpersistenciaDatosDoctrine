<?php   // tests/Entity/UserTest.php

namespace MiW\Results\Tests\Entity;

use MiW\Results\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 *
 * @package MiW\Results\Tests\Entity
 * @group   users
 */
class UserTest extends TestCase
{
    /**
     * @var User $user
     */
    protected $user;

    /**
     * Sets up the fixture.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->user = new User("Jaime", "jaime@mail.com", "pass",false, false);
    }

    /**
     * @covers \MiW\Results\Entity\User::__construct()
     */
    public function testConstructor()
    {
        $this->assertSame("Jaime", $this->user->getUsername());
        $this->assertSame("jaime@mail.com", $this->user->getEmail());
        $this->assertNotNull($this->user->getPassword());
        $this->assertEquals(false, $this->user->isEnabled());
        $this->assertEquals(false, $this->user->isAdmin());

    }

    /**
     * @covers \MiW\Results\Entity\User::getId()
     */
    public function testGetId()
    {
        $this->assertEquals(0,$this->user->getId());
    }

    /**
     * @covers \MiW\Results\Entity\User::setUsername()
     * @covers \MiW\Results\Entity\User::getUsername()
     */
    public function testGetSetUsername()
    {
        $this->assertSame("Jaime",$this->user->getUsername());

        $this->user->setUsername("Juan");
        $this->assertSame("Juan", $this->user->getUsername());
    }

    /**
     * @covers \MiW\Results\Entity\User::getEmail()
     * @covers \MiW\Results\Entity\User::setEmail()
     */
    public function testGetSetEmail()
    {
        $this->assertSame("jaime@mail.com",$this->user->getEmail());

        $this->user->setEmail("juan@mail.com");
        $this->assertSame("juan@mail.com", $this->user->getEmail());
    }

    /**
     * @covers \MiW\Results\Entity\User::setEnabled()
     * @covers \MiW\Results\Entity\User::isEnabled()
     */
    public function testIsSetEnabled()
    {
        $this->assertEquals(false,$this->user->isEnabled());

        $this->user->setEnabled(true);
        $this->assertEquals(true,$this->user->isEnabled());
    }

    /**
     * @covers \MiW\Results\Entity\User::setAdmin()
     * @covers \MiW\Results\Entity\User::isAdmin()
     */
    public function testIsSetAdmin()
    {
        $this->assertEquals(false,$this->user->isAdmin());

        $this->user->setIsAdmin(true);
        $this->assertEquals(true,$this->user->isAdmin());
    }

    /**
     * @covers \MiW\Results\Entity\User::getPassword()
     * @covers \MiW\Results\Entity\User::setPassword()
     * @covers \MiW\Results\Entity\User::validatePassword()
     */
    public function testGetSetPassword()
    {
        self::markTestIncomplete(
            'This test has not been implemented yet.'
        );


    }

    /**
     * @covers \MiW\Results\Entity\User::__toString()
     */
    public function testToString()
    {
        $user2 = new User();
        $user2->setUsername("PEPE");
        echo $user2;
        $this->assertSame("PEPE", $user2);
    }

    /**
     * @covers \MiW\Results\Entity\User::jsonSerialize()
     */
    public function testJsonSerialize()
    {

        $user2 =  new User("Jaime", "jaime@mail.com", "pass",false, false);
        $jsonUser = $this->user->jsonSerialize();

        $jsonUser2 = $user2 ->jsonSerialize();

        $resultado = array_diff($jsonUser,$jsonUser2);
        echo print_r($resultado);

        $this->assertEquals(0,count($resultado));


    }
}
