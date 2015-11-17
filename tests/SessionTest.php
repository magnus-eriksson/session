<?php

/**
 * @coversDefaultClass \Maer\Session\Session
 */
class SessionTest extends PHPUnit_Framework_TestCase
{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 

    /**
    * @covers ::set/get
    **/
    public function testSetGet()
    {
        $session = new Maer\Session\Session();

        $session->set('test_session', '123test');
        $this->assertEquals("123test", $session->get('test_session'), "Test if session is set");
    }
 

    /**
    * @covers ::has
    **/
    public function testSessionHas()
    {
        $session = new Maer\Session\Session();

        $session->set('test_session', '123test');
        $this->assertTrue($session->has('test_session'), "Test if session exists");
        $this->assertFalse($session->has('test_session2'), "Test if session has not");
    }


    /**
     * @covers ::forget
     */
    public function testForget()
    {
        $session = new Maer\Session\Session();

        $session->set('test_session', '123test');
        $this->assertEquals("123test", $session->get('test_session'), "Test if session is set (forget)");

        $session->forget('test_session');
        $this->assertEquals(null, $session->get('test_session'), "Test if session is forgotten (forget)");
    }


    /**
     * @covers ::destroy
     */
    public function testDestroy()
    {
        $session = new Maer\Session\Session();

        $session->set('test_session', '123test');
        $this->assertEquals("123test", $session->get('test_session'), "Test if session is set (destroy)");

        $session->destroy();
        $this->assertEquals(null, $session->get('test_session'), "Test if session is destroyed (forget)");
    }
}