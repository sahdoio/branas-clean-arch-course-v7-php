<?php

use App\VersionOne\FareCalculation;

test('Should calculate the value of a normal ride', function() {
    $rideList = [['distance' => 10, 'rideTime' => new DateTime('2022-07-20T12:00:00')]];
    $fareCalculation = new FareCalculation;
    $result = $fareCalculation->exec($rideList);
    expect($result)->toBe((float)21);
});

test('Should calculate the value of a overnight ride on a week day', function() {
    $rideList = [['distance' => 10, 'rideTime' => new DateTime('2022-07-20T23:00:00')]];
    $fareCalculation = new FareCalculation;
    $result = $fareCalculation->exec($rideList);
    expect($result)->toBe((float)39);
});