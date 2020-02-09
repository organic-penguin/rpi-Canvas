#!/bin/bash

picturePath=$1

sudo killall fbi

sudo fbi -noverbose -a -T 2 $1

echo Input received -$1- | wall
