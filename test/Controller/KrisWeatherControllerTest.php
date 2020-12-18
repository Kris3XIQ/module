<?php

namespace Kris3XIQ\Controller;

use Anax\Response\ResponseUtility;
use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Kris3XIQ\Service\APIService;
use Kris3XIQ\Weather\Weather;

/**
 * Test the SampleController.
 */
class KrisWeatherControllerTest extends TestCase
{

    protected $di;

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        // $this->di = new DIFactoryConfig();
        // $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        // $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");
        // $this->di = $di;
        // $di = new DIMagic();
        // var_dump($di);
        // $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        // $di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");
        // $di = $this->di;
        // var_dump($di);
        $di = new DIFactoryConfig();
        // $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        // Use a different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        $this->di = $di;
        // Controller setup
        // $_SESSION["weatherHistoryJSON"] = null;
        // $this->controller = new KrisWeatherController();
        // $this->service = $di->get("api-service");
        // $this->controller->setDI($this->di);
    }

    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $controller = new KrisWeatherController();
        $service = $this->di->get("api-service");
        $controller->setDI($this->di);

        $res = $controller->indexAction();
        $body = $res->getBody();
        $this->assertStringContainsString("Weather service", $body);
        // $res = $this->controller->indexAction();
        // $body = $res->getBody();
        // $this->assertStringContainsString("Weather service", $body);
    }

    /**
     * Test the redirect for ActionPost with an empty input.
     */
    public function testRedirectPost()
    {
        $controller = new KrisWeatherController();
        $service = $this->di->get("api-service");
        $controller->setDI($this->di);

        $res = $controller->indexActionPost();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        // $res = $this->controller->indexActionPost();
        // $this->assertInstanceOf("Anax\Response\Response", $res);
        // $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }

    /**
     * Make sure we get the right result back after putting
     * in a correct location as input.
     */
    public function testWeatherCorrectLocationInput()
    {
        $controller = new KrisWeatherController();
        $service = $this->di->get("api-service");
        $controller->setDI($this->di);

        $this->di->get("request")->setPost("input", "Stockholm,SE");
        $res = $controller->indexActionPost();
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        // $this->di->get("request")->setPost("input", "Stockholm,SE");
        // $res = $this->controller->indexActionPost();
        // $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }

    /**
     * Make sure we get the right result back after putting
     * in a correct IP-address
     */
    public function testWeatherCorrectIpInput()
    {
        $controller = new KrisWeatherController();
        $service = $this->di->get("api-service");
        $controller->setDI($this->di);

        $this->di->get("request")->setPost("input", "194.47.150.2");
        $res = $controller->indexActionPost();
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        // $this->di->get("request")->setPost("input", "194.47.150.2");
        // $res = $this->controller->indexActionPost();
        // $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }

    /**
     * Make sure we get the right response back after putting
     * in an incorrect input value.
     */
    public function testWeatherIncorrectLocationInput()
    {
        $controller = new KrisWeatherController();
        $service = $this->di->get("api-service");
        $controller->setDI($this->di);

        $this->di->get("request")->setPost("input", "Someplace that doesnt exist");
        $res = $controller->indexActionPost();
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        // $this->di->get("request")->setPost("input", "Someplace that doesnt exist");
        // $res = $this->controller->indexActionPost();
        // $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }

    /**
     * Test weatherHistoryJSON
     */
    public function testWeatherHistoryJSON()
    {
        $controller = new KrisWeatherController();
        $service = $this->di->get("api-service");
        $controller->setDI($this->di);

        $_SESSION["weatherHistoryJSON"] = [
            "cod" => 200,
            "past_days" => [
                "past_01" => "{}",
                "past_02" => "{}",
                "past_03" => "{}",
                "past_04" => "{}",
                "past_05" => "{}"
            ],
        ];
        
        $res = $controller->indexAction();
        $body = $res->getBody();
        $this->assertStringContainsString("Weather service", $body);

        $_SESSION["weatherHistoryJSON"] = null;
    }
}
