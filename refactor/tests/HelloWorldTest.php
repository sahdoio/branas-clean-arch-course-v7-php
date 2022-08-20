<?php

use App\HelloWorld;

test('hello world', function () {
    $helloWord = new HelloWorld;
    $result = $helloWord->exec();
    expect($result)->toBe('hello world');
});
