<?php

namespace Tests\Unit\Client;

use App\Client\DirectionsClient;
use App\Services\MapService\MapBox\MapBoxService;
use PHPUnit\Framework\TestCase;

class DirectionsClientTest extends TestCase
{
    /**
     * @dataProvider getMapServiceDataProvider
     */
    public function testgetMapServiceSuccess(string $mapService, string $class)
    {
        $directionsClient = new DirectionsClient();
        $actual = $directionsClient->getMapService($mapService);

        $this->assertInstanceOf($class, $actual);
    }

    public function getMapServiceDataProvider(): array
    {
        return [
            ['mapbox', MapBoxService::class],
            ['random', MapBoxService::class]
        ];
    }
}
