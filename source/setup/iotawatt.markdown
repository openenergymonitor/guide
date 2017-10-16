---
layout: page
title: IoTaWatt
description: IotaWatt is an open-hardware multi-channel WiFi connected electric power monitor
date: '2015-10-16 12:00'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---
<!--### [&laquo; Previous step: Connect](/setup/connect/)-->

<!--### [Next step: Log Locally &raquo;](/setup/local/)-->

## IoTaWatt

IotaWatt is an open-hardware 14 channel WiFi connected electric power monitor. It's based on the ESP8266 IoT platform using MCP3208 12 bit ADCs to sample voltage and current at high sample rates.

![iotawatt](/images/setup/iotawatt-1.jpg)

Data is saved locally to the on-board SD card and (optionally) posted online to [Emoncms.org](https://emoncms.org) or another Emoncms server e.g. emonPi. On-board data storage ensures no data-loss in the event of network failure. If network is lost data logged locally will be bulk-uploaded to Emoncms when connectivity is restored.


The IotaWatt is configured via a web-interface, see online demo: [iotawatt.com](http://iotawatt.com)




### Install

<p class='note warning'>
<a href="https://learn.openenergymonitor.org/electricity-monitoring/ct-sensors/installation">Please read the CT installation guide before installing.</a>
Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated; i.e., switch off the power prior to installing your sensors and proceed slowly with care. If you have any doubts, seek professional assistance.
</p>

#### {% linkable_title 1. **CT sensor** %}

- Clip the CT sensor around either the **Live** or **Neutral** cable
- Connect 3.5mm jack plug into one of the CT inputs on the IoTaWatt
- If the power reading is negative, reverse the CT sensor orientation
- [Learn more about how CT sensors work...](https://learn.openenergymonitor.org/electricity-monitoring/voltage-sensing/measuring-voltage-with-an-acac-power-adapter)

<p class='note'>
The clip-on CT sensors must be clipped round either the live or Neutral AC wire. <strong>NOT BOTH</strong>.
</p>

![CT sensor installation ](/images/applications/solar-pv/ctinstall.jpg)



#### {% linkable_title 2. **AC-AC Adapter** %}
- Plug the AC-AC adapter into a power outlet
- This may require installation of a new outlet or extending an existing one
- AC-AC adapter cable can be extended if required
- Plug power connector into the AC socket on the IoTaWatt
- Essential for [Solar PV monitoring](/applications/solar-pv/#sensor-installation)
- Provides AC waveform reference for accurate Real Power measurements. [Learn more about measuring voltage with AC-AC power adapter...](https://learn.openenergymonitor.org/electricity-monitoring/voltage-sensing/measuring-voltage-with-an-acac-power-adapter)


#### {% linkable_title 3. **DC 5V USB Adapter** %}
- Plug the DC 5V USB adapter into a power outlet
- Plug the micro-B USB connector into the IotaWatt
- High quality minimum [1.2A power supply recommended](https://shop.openenergymonitor.com/power-supplies/)

IoTaWatt LED should light up to indicate power up.

<br>


### Connect to WiFi

*When the device powers up, it attempts to connect to the last WiFi network used. Although the device can run without WiFi, a connection must be established if the real time clock is not set, or to run the configuration utility, or if logging to an external server like Emoncms is desired. It is strongly recommended to connect the device to a WiFi network that has a reliable internet connection.*

- If the device is new and has never been connected to a WiFi network, or the last used network is not available, the IoTaWatt will start up in WiFi AP (access point) mode.
- AP mode is indicated by LED flashes `RED-GREEN-GREEN`
- Using a mobile device connect to SSID `iota + <unique-number>`
- The default WiFi password is `IotaWatt` (case sensative)


- After connecting to IoTaWatt AP a captive portal re-direct should display the IoTaWatt WiFi setup portal


![iotawatt wifi](/images/setup/iota-wifi.png)

*Note: If this page does not display automatically then browse to [http://192.168.4.1](http://192.168.4.1)*

- Connect the IoTaWatt to your local WiFi SSID either via auto-scan or enter SSID manually
- Once connected, the name of the new WiFi network will be saved, and the device will continue its startup procedure.
- If the LED begins blinking a rapid dull green, proceed to the next step Device Configuration.
- If the device displays another three color LED sequence, see [Troubleshooting](#Troubleshooting).

### Configuration

The IotaWatt is configured via a web-interface, see online demo: [iotawatt.com](http://iotawatt.com)

Successful startup will be indicated by a dull green glow on the LED. If the LED is off, or blinking a three-color sequence, see the [Troubleshooting](#Troubleshooting) section.

- After successful startup, you can connect to the device with your web browser
- Connect to IoTaWatt using [iotawatt.local](http://iotawatt.local)

*Note: if local hostname resolution fails you will need to connect to IoTaWatt using IP address, obtain this from your router DHCP table, using [Fing](https://www.fing.io/) or see IoTaWatt serial debug at startup to obtain local IP address (115200 baud)*


![iotawatt config](/images/setup/iota-config.png)


#### Device Configuration
 
 
![iotawatt status](/images/setup/iota-device.png)


##### Device Name

You can change the Device name to another 8 character name, or leave it `IoaWatt`.

*Note: from now on, `[Device name].local` will be the name that you will use to access the device from your browser, and the name you will need to change to switch to a different WiFi network.*

##### Time Zone

Set your local Time Zone relative to UTC time. All of the measurements are time stamped using UTC, but the log messages and various reporting apps will use this factor to show the data in local time.

##### Firmware Update (OTA)

- The IotaWatt can receive automatic OTA updates.
- Firmware releases are published to [Releases page of the IotaWatt GitHub Repo](https://github.com/boblemaire/IoTaWatt/releases).


Auto-update Class tells IotaWatt if you want to receive automatic updates of the firmware and what type of updates you are interested in. The choices are:

- `NONE`- Do not Auto-update this device.
- `MAJOR` - only update major releases (DEFAULT). This is recommended.
- `MINOR` - update with minor releases. More frequent but somewhat tested firmware.
- `BETA`- Latest production firmware.
- `ALPHA` - Most recently released firmware in development with bug and all.

IotaWatt checks the [IotaWatt.com](http://IotaWatt.com) site for new software every 1hr. The update process takes less than a minute and the new firmware is authenticated with a digital signature from IotaWatt.

##### Configure Burden Resistors

The Configure Burden Resistors button will allow specification of the burden resistors that are soldered to your board. Your device should be preconfigured and you should not need to go there. If you have changed the resistors or built your own board with different values, click this button and specify the values for your particular custom hardware.

#### Configure Inputs

##### AC-AC Voltage Transformer (VT) Calibration

A prime component of electrical power is voltage. Also, the AC line frequency is the heartbeat of the IoTaWatt. A reliable and accurate AC voltage reference is very important. You should have installed the device with a 9-12V AC-AC voltage reference transformer plugged into the channel zero 5mm DC barrel jack. The initial configuration has this channel pre-configured as a generic "VT" or voltage-transformer.

For accurate measurements, the VT input must be calibrated. IoTaWatt has calibration presets built in for a number of common VT's. However it's recomended for highest accuracy calibration is done on your specific unit.


![iotawatt status](/images/setup/iota-input1.png)

- Click on the "0" to edit the voltage channel

![iotawatt status](/images/setup/iota-input2.png)

Initially, the VT defaults to a "generic" transformer. Check the pull-down list of devices to see if your particular device is listed. If it is, select it and skip to the calibration procedure below. The generic entry is a reasonable starting point that will get you in the ball park for a 9-12Vac adapter in a 120V installation. If your adapter is not listed and your country is 240V select the "generic240V" entry.

![iotawatt status](/images/setup/iota-input-cal.png)

Increase or decrease the "cal" factor until the voltage shown settles down and is a pretty good match with your reference meter. It's not possible to match exactly. .2V in a 120V installation is 0.2% variation. A very good meter accuracy is 1% at best. Just try to get the two to dwell around the same set of fractional digits.

Once calibration is complete and verified, you will not need to do it again unless you change your VT transformer. The IoTaWatt has a very accurate internal calibration reference and will maintain its accuracy indefinitely. You should have no further need for the voltmeter.

*Note: You will need a [decent voltage reference](https://learn.openenergymonitor.org/electricity-monitoring/ctac/how-good-is-your-multimeter) for this step. If you don't have a decent true RMS voltmeter and can't borrow one, go out and get a [Kill-a-Watt](https://en.wikipedia.org/wiki/Kill_A_Watt). They are low cost (some libraries lend them out) and I've found their voltage readings are quite accurate. It pretty much matches my Fluke true-rms voltmeter. (Amps and power on the Kill-watt units I tested seem to be a bit low but voltage is great).*

##### Add Power Channel (CT's)


#### Input Channel Status

![iotawatt status](/images/setup/iota-status.jpg)


### Troubleshooting

#### LED Indications


### Video Guide

<!--<div class='videoWrapper'>-->
<!--<iframe width="560" height="315" src="https://www.youtube.com/embed/6SB4fRYQjno" frameborder="0" allowfullscreen></iframe>-->
<!--</div>-->

***

<!--### [Next step: Log Locally &raquo;](/setup/local/)-->
