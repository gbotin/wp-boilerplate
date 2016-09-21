#!/bin/sh

function usage () {
  echo "Usage: $0 [-c <app_container_name>] [-t <title>] [-u <user>] [-p <password>] [-e <email>]" 1>&2;
  exit 1;
}

while getopts ":c:t:u:p:e:" o; do
    case "${o}" in
        c)
            c=${OPTARG}
            ;;
        t)
            t=${OPTARG}
            ;;
        u)
            u=${OPTARG}
            ;;
        p)
            p=${OPTARG}
            ;;
        e)
            e=${OPTARG}
            ;;
        *)
            usage
            ;;
    esac
done
shift $((OPTIND-1))

if [ -z "${c}" ] || [ -z "${t}" ] || [ -z "${u}" ] || [ -z "${p}" ] || [ -z "${e}" ]; then
    usage
fi

rm -f wp-config.php
docker exec -t ${c} wp core config --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=db --skip-check
docker exec -t ${c} wp core install --url=localhost --title=${t} --admin_user=${u} --admin_password=${p} --admin_email=${e}
docker exec -t ${c} wp core update
docker exec -t ${c} wp core update-db
docker exec -t ${c} wp plugin update --all
docker exec -t ${c} wp theme activate template

exit 0
