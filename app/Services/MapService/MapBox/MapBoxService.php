<?php
/**
 * Created by PhpStorm.
 * User: rushinaidu
 * Date: 16/9/20
 * Time: 11:13 PM
 */

namespace App\Services\MapService\MapBox;

use App\Models\Venue;
use App\Models\School;
use App\Services\MapService\MapBox\Responses\GetDistanceAndDurationResponse;
use App\Services\MapService\MapServiceInterface;
use Illuminate\Support\Facades\Http;

class MapBoxService implements MapServiceInterface
{
    public function getDistanceAndDuration(Venue $venue, School $school): array
    {
        $mapBoxURL = config('mapbox.url');
        $directionsEndpoint = config('mapbox.directions');
        $apiKey = config('mapbox.api_key');

        $endpoint = sprintf('%s/%s/%s;%s?access_token=%s',
            $mapBoxURL,
            $directionsEndpoint,
            $venue->coordinates,
            $school->coordinates,
            $apiKey
        );

        $response = Http::get($endpoint);

        return (new GetDistanceAndDurationResponse($response))->toArray();
    }
}
