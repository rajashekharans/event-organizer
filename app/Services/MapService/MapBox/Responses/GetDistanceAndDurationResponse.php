<?php
namespace App\Services\MapService\MapBox\Responses;

use Illuminate\Http\Client\Response;

class GetDistanceAndDurationResponse
{
    private $data;

    public function __construct(Response $response)
    {
        $this->data = $response;
    }

    public function toArray()
    {
        return [
            'distance' => $this->data->object()->routes[0]->distance,
            'duration' => $this->data->object()->routes[0]->duration
        ];
    }
}
