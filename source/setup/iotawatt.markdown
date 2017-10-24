---
layout: page
title: IoTaWatt Quick Start
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

IotaWatt<sup>tm</sup> is an open-hardware 14 channel WiFi connected electric power monitor. It's based on the ESP8266 IoT platform using MCP3208 12 bit ADCs to sample voltage and current.

![iotawatt](/images/setup/iotawatt-1.jpg)

Data is saved locally to the on-board SD card and (optionally) posted online to [Emoncms.org](https://emoncms.org) or another Emoncms server e.g. [emonPi](shop.openenergymonitor.com/emonpi-3/). On-board data storage ensures no data-loss in the event of network failure. If network is lost, data logged locally will be bulk-uploaded to Emoncms when connectivity is restored.


The IoTaWatt is configured via a web-interface, see online demo at [iotawatt.com](http://iotawatt.com).

*IoTaWatt is desinged and manufactured by Bob Lemaire [@overeasy](https://community.openenergymonitor.org/u/overeasy/) in partnership with OpenEnergyMonitor.*

<p class='note info'>
This is a quick start guide, for full technical documentation see
<a href="https://learn.openenergymonitor.org/electricity-monitoring/ct-sensors/installation">IoTaWatt GitHub repo Wiki</a>
</p>


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

AC-AC adapter (also known as 'VT' Voltage Transformer) is used to measure AC voltage. Use of an AC-AC adapter with IoTaWatt is essential.

- Plug the AC-AC adapter into a power outlet
- This may require installation of a new outlet or extending an existing one
- AC-AC adapter cable can be extended if required
- Plug power connector into the AC socket on the IoTaWatt
- Provides AC waveform reference for accurate Real Power measurements. [Learn more about measuring voltage with AC-AC power adapter...](https://learn.openenergymonitor.org/electricity-monitoring/voltage-sensing/measuring-voltage-with-an-acac-power-adapter)


#### {% linkable_title 3. **DC 5V USB Adapter** %}
- Plug the DC 5V USB adapter into a power outlet
- Plug the micro-B USB connector into the IotaWatt
- High quality minimum [1.2A power supply recommended](https://shop.openenergymonitor.com/power-supplies/)

IoTaWatt LED should light up to indicate power-up.

<br>


### Connect to WiFi

*Although the IoTaWatt can run without WiFi, a connection must be established if the real time clock is not set. It's strongly recommended to connect the device to a WiFi network with a web connection.*

- If the device is new and has never been connected to a WiFi network, or the last used network is not available, the IoTaWatt will start up in WiFi AP (access point) mode.
- AP mode is indicated by LED flashes `RED-GREEN-GREEN`
- Using a mobile device connect to SSID `iota + <unique-number>`
- **The default WiFi password is `IotaWatt` (case sensative)**
- After connecting to IoTaWatt AP a captive portal re-direct should display the IoTaWatt WiFi setup portal


![iotawatt wifi](/images/setup/iota-wifi.png)

*Note: If this page does not display automatically then browse to [http://192.168.4.1](http://192.168.4.1)*

- Connect the IoTaWatt to your local WiFi SSID either via auto-scan or enter SSID manually
- Once connected, the name of the new WiFi network will be saved, and the device will continue its startup procedure.
- If the LED begins blinking a rapid dull green, proceed to the next step Device Configuration.
- If the device displays another three color LED sequence, see [Troubleshooting](#Troubleshooting).

### Configuration

The IotaWatt is configured via a web-interface, see online demo: [iotawatt.com](http://iotawatt.com)

Successful startup will be indicated by a dull green glow on the LED. If the LED is off, or blinking a three-color sequence, see [Troubleshooting (wiki)](https://github.com/boblemaire/IoTaWatt/wiki/Troubleshooting).

- After successful startup, you can connect to the device with your web browser
- Connect to IoTaWatt using [iotawatt.local](http://iotawatt.local)

*Note: if local hostname resolution fails you will need to connect to IoTaWatt using IP address, obtain this from your router DHCP table, using [Fing](https://www.fing.io/) or see IoTaWatt serial debug at startup to obtain local IP address (115200 baud)*


![iotawatt config](/images/setup/iota-config.png)


 





#### Configure Input Sensors

##### AC-AC Voltage Transformer (VT)

You should have installed the device with an AC-AC voltage reference transformer plugged into the IoTaWatt via 2.1mm barrel-jack. The initial configuration has this channel pre-configured as a generic "VT" or voltage-transformer.



![iotawatt status](/images/setup/iota-input1.png)

- Click on the "0" to edit the voltage input channel (input 0)
- Select your VT (AC-AC adapter) calibration preset from the drop down list


![iotawatt status](/images/setup/iota-input2.png)

*It's recomended for highest accuracy that calibration is done on your specific unit. See [IoTaWatt Wiki.](https://github.com/boblemaire/IoTaWatt/wiki/Reference-Voltage-Calibration)*


##### Current Transformer (CT's)


![iotawatt status](/images/setup/iota-ct2.png)

![iotawatt status](/images/setup/iota-ct3.png)

#### Input Channel Status

After VT and CT inputs have been setup, check real-time readings on the Input Channel Status page.

![iotawatt status](/images/setup/iota-status.jpg)

##### Firmware Update (OTA)

- The IotaWatt can receive automatic OTA updates.
- Firmware releases are published to [Releases page of the IotaWatt GitHub Repo](https://github.com/boblemaire/IoTaWatt/releases).

IotaWatt checks the [IotaWatt.com](http://IotaWatt.com) site for new software every 1hr. The update process takes less than a minute and the new firmware is authenticated with a digital signature from IotaWatt.

![iotawatt status](/images/setup/iota-device.png)


### Technical Wiki

For full technical IoTaWatt documentation see [IoTaWatt GitHub repo Wiki](https://learn.openenergymonitor.org/electricity-monitoring/ct-sensors/installation)

### Video Guide

<!--<div class='videoWrapper'>-->
<!--<iframe width="560" height="315" src="https://www.youtube.com/embed/6SB4fRYQjno" frameborder="0" allowfullscreen></iframe>-->
<!--</div>-->

***

<!--### [Next step: Log Locally &raquo;](/setup/local/)-->
