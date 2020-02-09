var Accessory = require('../').Accessory;
var Service = require('../').Service;
var Characteristic = require('../').Characteristic;
var uuid = require('../').uuid;
var err = null; // in case there were any problems
var exec = require('child_process').exec;
var sleep = require('sleep');
var fs = require("fs");

// here's a fake hardware device that we'll expose to HomeKit
var FAKE_OUTLET = {
    setPowerOn: function(on) {
    console.log("Turning the %s!...", on ? "on" : "off");
    if (on) {
          FAKE_OUTLET.powerOn = true;
          if(err) { return console.log(err); }
          console.log("...%s is now on.");
	  exec('sudo /opt/vc/bin/tvservice -p');
	  sleep.sleep(1);
	  //console.log("just got past the sleep");
          exec('sudo killall fbi');
	  sleep.sleep(1);
	  exec('sudo sh /var/www/html/pictureFrame.sh');
	  fs.writeFileSync("onoff.json", JSON.stringify({onoff: 1}));

    } else {
          FAKE_OUTLET.powerOn = false;
          if(err) { return console.log(err); }
          console.log("...%s is now off.");
	  exec('sudo killall fbi');
	  sleep.msleep(500);
	  exec('sudo /opt/vc/bin/tvservice -o');
	  sleep.msleep(500);
	  exec('sudo killall fbi');
	  fs.writeFileSync("onoff.json", JSON.stringify({onoff: 0}));
    }
  },
    identify: function() {
    console.log("Identify the device.");
    }
}

// Generate a consistent UUID for our outlet Accessory that will remain the same even when
// restarting our server. We use the `uuid.generate` helper function to create a deterministic
// UUID based on an arbitrary "namespace" and the accessory name.
var outletUUID = uuid.generate('hap-nodejs:accessories:Outlet');

// This is the Accessory that we'll return to HAP-NodeJS that represents our fake light.
var outlet = exports.accessory = new Accessory('rpi-Canvas', outletUUID);
outlet.name= "rpi-Canvas";
// Add properties for publishing (in case we're using Core.js and not BridgedCore.js)
outlet.username = "1A:2B:3C:2C:2D:FF";
outlet.pincode = "867-53-099";

// set some basic properties (these values are arbitrary and setting them is optional)
outlet
  .getService(Service.AccessoryInformation)
  .setCharacteristic(Characteristic.Manufacturer, "Organic-Penguin")
  .setCharacteristic(Characteristic.Model, "Canvas V3-GIT")
  .setCharacteristic(Characteristic.SerialNumber, "CV002");

// listen for the "identify" event for this Accessory
outlet.on('identify', function(paired, callback) {
  FAKE_OUTLET.identify();
  callback(); // success
});

// Add the actual outlet Service and listen for change events from iOS.
// We can see the complete list of Services and Characteristics in `lib/gen/HomeKitTypes.js`
outlet
  .addService(Service.Outlet, "rpi-Canvas") // services exposed to the user should have "names" like "Fake Light" for us
  .getCharacteristic(Characteristic.On)
  .on('set', function(value, callback) {
    FAKE_OUTLET.setPowerOn(value);
    callback(); // Our fake Outlet is synchronous - this value has been successfully set
  });

// We want to intercept requests for our current power state so we can query the hardware itself instead of
// allowing HAP-NodeJS to return the cached Characteristic.value.
outlet
  .getService(Service.Outlet)
  .getCharacteristic(Characteristic.On)
  .on('get', function(callback) {

    // this event is emitted when you ask Siri directly whether your light is on or not. you might query
    // the light hardware itself to find this out, then call the callback. But if you take longer than a
    // few seconds to respond, Siri will give up.

    var err = null; // in case there were any problems

    if (FAKE_OUTLET.powerOn) {
      console.log("Are we on? Yes.");
	//open JSON and set the value of true as 1 and then with the other one have it write to the JSON file as false
      callback(err, true);
    }
    else {
      console.log("Are we on? No.");
      callback(err, false);
    }
  }); 
