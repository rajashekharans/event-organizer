<?php
namespace App\Services\MapService;

use App\Models\Venue;
use App\Models\School;

interface MapServiceInterface
{
    public function getDistanceAndDuration(Venue $venue, School $school): array;
}
