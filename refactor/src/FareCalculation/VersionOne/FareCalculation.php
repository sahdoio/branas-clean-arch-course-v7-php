<?php

namespace App\FareCalculation\VersionOne;

use DateTime;
use Exception;

class FareCalculation
{
    public function exec(array $rideList): float
    {
        $fare = 0;
        foreach ($rideList as $ride) {
            $distance = $ride['distance'];
            $rideTime = $ride['rideTime'];

            if (!$this->isValidDistance($distance) || !$this->isValidTime($rideTime)) {
                throw new Exception('invalid ride');
            }

            if ($this->isOverNight($rideTime)) {
                if (!$this->isSunday($rideTime)) {
                    $fare += $distance * 3.90;
                } else {
                    $fare += $distance * 5;
                }
            } else {
                if ($this->isSunday($rideTime)) {
                    $fare += $distance * 2.9;
                } else {
                    $fare += $distance * 2.10;
                }
            }
        }

        if ($fare < 10) {
            return 10;
        }

        return $fare;
    }

    private function isValidDistance(float $distance): bool
    {
        return ($distance > 0);
    }

    private function isValidTime(DateTime $rideTime): bool
    {
        return ($rideTime  && $rideTime instanceof DateTime);
    }

    private function isOverNight(DateTime $rideTime): bool
    {
        $hour = intval($rideTime->format('H'));
        return ($hour >= 22 || $hour <= 6);
    }

    private function isSunday(DateTime $rideTime): bool
    {
        $day = intval($rideTime->format('D'));
        return $day === 'Sun';
    }
}
