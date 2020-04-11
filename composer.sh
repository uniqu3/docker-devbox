#!/bin/bash

args="$@"
command="composer $args"
echo "Running $command"
docker exec -it -u www-data devbox-php /bin/sh -c "$command"
