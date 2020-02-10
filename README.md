# rpi-Canvas
Digital photo frame repository for Raspberry Pi based upon fbi, Apache2, and HAP-NodeJS

# Prerequisites

The following are required for Canvas to operate. The installation's make file will install each of these individually if they are not already pre-installed.

* `Apache2`

* `php`

* `node v8.2.1`

* `fbi`

* `HAP-NodeJS`

# Raspberry Pi Canvas 

The Canvas web application enabled you to use a Raspberry Pi's HDMI output to display images that are controlled by a web app optimized for use on mobile phones.

Control of the Canvas being on/off is controllable through Apple's Siri and Amazon's Alexa

# Installation Instructions

* `git clone https://github.com/organic-penguin/rpi-Canvas.git`

* `cd rpi-Canvas`

* `make`


# Configuration

**Configuring Homekit Accessory**

Use your favorite text editor to view 

```/home/pi/rpi-Canvas/support_frameworks/HAP-NodeJS/accessories/Outlet_accessory.js```


# Credits
[HAP-NodeJS](https://github.com/KhaosT/HAP-NodeJS) by KhaosT
[QuickPi](https://www.youtube.com/watch?v=3RmuXn8eS9s&t=21s)
[FIM: fbi](https://www.nongnu.org/fbi-improved/)
[Apache Software Foundation](https://httpd.apache.org/)

