#!/bin/bash

TERMINAL="$(jq -r '.terminal' /var/www/html/settings.json)"


picturePath=$1

sudo killall fbi

sudo fbi -noverbose -a -T $TERMINAL $1

echo Input received -$1- | wall
