<?php

namespace App\Client;

use App\Models\School;
use App\Models\Venue;
use App\Services\MapService\MapServiceInterface;
use App\Services\MapService\MapBox\MapBoxService;

class DirectionsClient
{
    private const MAP_BOX = 'mapbox';

    public function getDistanceAndDuration(string $service, Venue $venue, School $school): array
    {
        return $this->getMapService($service)->getDistanceAndDuration($venue, $school);
    }

    public function getMapService(string $service): MapServiceInterface
    {
        switch ($service) {
            case self::MAP_BOX:
            default:
                return new MapBoxService();
        }
    }
}
