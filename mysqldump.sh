#!/bin/bash

PWD="password"
DB="database"

usage()
{
    echo "Use named parameters to dump your database"
    echo ""
    echo "./mysqldump.sh"
    echo -e "\t-h --help"
    echo -e "\t-p --pwd=$PWD Your root password for mysqldump command"
    echo -e "\t-d --db=$DB Database to dump"
    echo ""
}

while [ "$1" != "" ]; do
    PARAM=`echo $1 | awk -F= '{print $1}'`
    VALUE=`echo $1 | awk -F= '{print $2}'`
    case $PARAM in
        -h | --help)
            usage
            exit
            ;;
        -p | --pwd)
            PWD=$VALUE
            ;;
        -d | --db)
            DB=$VALUE
            ;;
        *)
            echo "ERROR: unknown parameter \"$PARAM\""
            usage
            exit 1
            ;;
    esac
    shift
done

docker exec -it devbox-mysql /bin/sh -c "mysqldump -p$PWD --databases $DB > /var/backups/$DB.sql"
