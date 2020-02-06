#!/bin/bash
ROTATINGSTATUS="$(jq -r '.rotating' /var/www/html/settings.json)"

echo $ROTATINGSTATUS

if [ $ROTATINGSTATUS = true ]; then
	echo "The value is true"
else
	echo "The value is not true"
fi
