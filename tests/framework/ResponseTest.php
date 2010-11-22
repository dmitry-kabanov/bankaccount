<?php
class ResponseTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Response::getHeaders
     */
    public function testNoHeadersAreInitiallySet()
    {
        $response = new Response;
        $this->assertEmpty($response->getHeaders());

        return $response;
    }

    /**
     * @covers  Response::addHeader
     * @depends testNoHeadersAreInitiallySet
     */
    public function testAddingHeadersWorks(Response $response)
    {
        $response->addHeader('HTTP/1.0 404 Not Found');

        $this->assertContains(
          'HTTP/1.0 404 Not Found', $response->getHeaders()
        );
    }

    /**
     * @covers Response::getData
     */
    public function testNoDataIsInitiallySet()
    {
        $response = new Response;
        $this->assertEmpty($response->getData());

        return $response;
    }

    /**
     * @covers  Response::setData
     * @depends testNoDataIsInitiallySet
     */
    public function testSettingDataWorks(Response $response)
    {
        $response->setData('foo', 'bar');

        $data = $response->getData();

        $this->assertEquals('bar', $data['foo']);
    }
}
