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

**Start Services Upon Boot-Up**

* `sudo nano /etc/rc.local`

* Add `sudo sh /home/pi/rpi-Canvas/rpiStartup.sh` just before the final line `'exit 0'`


# Configuration

**Configuring Homekit Accessory**

Use your favorite text editor to make adjustments. The name of the device can also be changed once added to Homekit, from the 'Home' app

```/home/pi/rpi-Canvas/support_frameworks/HAP-NodeJS/accessories/Outlet_accessory.js```

**Install Web App (iPhone)**

Install the web application to your iPhone homescreen to quickly access your Raspberry Pi

* Navigate to your Raspberry Pi through `IP address` or `'hostname'.local`

* Hit the *Share* button and select to 'Add to Home Screen'

* Name the App or leave default

* Select *Add*


# Troubleshooting

**Images Not Appearing When Selected**

The fbi framework that is used to publish images to the HDMI output requires a 'Terminal' to be selected. This is defaulted to 2 and has worked correctly on a Raspberry Pi Model 3b+ and Raspberry Pi Model Zero W. If your device has selected a different 'Terminal' as the HDMI output run ```sudo nano /var/www/html/settings.json ``` where "terminal":2 is replaced with a number between 1 and 5 until your images are displayed

# To-Do

* Add Alexa Control

* Add Google Assistant Control

* Correct minor UI Element Issues

# Credits
[HAP-NodeJS](https://github.com/KhaosT/HAP-NodeJS) by KhaosT

[QuickPi](https://www.youtube.com/watch?v=3RmuXn8eS9s&t=21s)

[FIM: fbi](https://www.nongnu.org/fbi-improved/)

[Apache Software Foundation](https://httpd.apache.org/)

[Croppie](https://github.com/foliotek/croppie) by Foliotek


