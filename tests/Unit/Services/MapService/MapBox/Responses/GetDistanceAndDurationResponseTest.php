<?php

namespace Tests\Unit\Services\MapService\MapBox\Responses;

use Illuminate\Http\Client\Response;
use App\Services\MapService\MapBox\Responses\GetDistanceAndDurationResponse;
use PHPUnit\Framework\TestCase;
use Mockery;

class GetDistanceAndDurationResponseTest extends TestCase
{
    public function testToArrayReturnsArray()
    {
        $responseObject = (object)[
            'routes' => [
                (object) [
                    'distance' => 123.12,
                    'duration' => 345.12,
                ]
            ]
        ];
        $responseMock = Mockery::mock(Response::class);
        $responseMock->shouldReceive('object')
            ->withAnyArgs()
            ->times(2)
            ->andReturns($responseObject);

        $getDistanceAndDurationResponse = new GetDistanceAndDurationResponse($responseMock);
        $actual = $getDistanceAndDurationResponse->toArray();

        $this->assertEquals(123.12, $actual['distance']);
        $this->assertEquals(345.12, $actual['duration']);
    }
}
