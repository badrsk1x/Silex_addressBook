# CRUD REST API based on siled

#### How to run it?

from the root folder of the project, run the following commands to install the php dependencies, import some data, and run a local php server.

    composer install
    sqlite3 app.db < resources/sql/schema.sql
    php -S 0:9005 -t web/

Your api is now available at http://localhost:9005/api/v1.

#### Run tests

All CRUD operations are fully tested.

From the root folder run the following command to run tests.

vendor/bin/phpunit

#### What you will get

The api will respond to

    GET  ->   http://localhost:9005/api/v1/address
    GET  ->   http://localhost:9005/api/v1/address/{id}
    POST ->   http://localhost:9005/api/v1/address
    PUT ->   http://localhost:9005/api/v1/address/{id}
    DELETE -> http://localhost:9005/api/v1/address/{id}

Your request should have 'Content-Type: application/json' header.
