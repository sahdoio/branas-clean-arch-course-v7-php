# install composer 
    sudo apt install composer

# diagnose to check composer

    composer diagnose

# start composer.json

    composer init

# install php

    sudo apt-install php8.1

# install phpunit

    sudo apt install phpunit

# install pest

    composer require pestphp/pest --dev --with-all-dependencies

# On other projects, create a tests folder and run the pest --init command:

    ./vendor/bin/pest --init
    
# Finally, you can run Pest directly from the command line:

    ./vendor/bin/pest

# Coverage

    sudo apt install php8.1-xdebug

# php.ini

    xdebug.coverage_enable = On
    xdebug.mode=develop,debug,coverage

# run test coverage

    




