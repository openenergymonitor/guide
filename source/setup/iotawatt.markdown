---
layout: page
title: IoTaWatt Quick Start
description: IotaWatt is an open-hardware multi-channel WiFi connected electric power
  monitor
date: '2017-10-16 12:00'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---
### [&laquo; Previous step: Dashboards](/setup/dashboards/)

### [Next step: Add Temperature Node(s) &raquo;](/setup/emonth/)

***

## IoTaWatt Quick Start

IotaWatt<sup>tm</sup> is an open-hardware 14 channel WiFi connected electric power monitor. It's based on the ESP8266 IoT platform using MCP3208 12 bit ADCs to sample voltage and current.

![iotawatt](/images/setup/iotawatt-1.jpg) <a class="btn pull-right" href="http://shop.openenergymonitor.com/iotawatt-wifi-connected-14-channel-electricity-monitor/">View in Shop &rarr; </a>


<!-- toc -->

- [Install](#install)
  * [1. Clip-on Current Sensor](#1-clip-on-current-sensor)
  * [2. AC-AC Voltage Sensor Adapter (VT)](#2-ac-ac-voltage-sensor-adapter-vt)
  * [3. DC 5V USB Adapter](#3-dc-5v-usb-adapter)
  * [4. Wall Mount](#4-wall-mount)
- [Connect WiFi](#connect-wifi)
- [Configuration](#configuration)
  * [Configure Input Sensors](#configure-input-sensors)
    + [1. AC-AC Voltage Transformer (VT)](#1-ac-ac-voltage-transformer-vt)
    + [2. Configure Current Transformer(s (CT's)](#2-configure-current-transformers-cts)
  * [View Local Data](#view-local-data)
    + [Real Time Status](#real-time-status)
    + [View historic local data](#view-historic-local-data)
  * [Configure Remote Emoncms Server](#configure-remote-emoncms-server)
  * [Firmware Update (OTA)](#firmware-update-ota)
  * [Technical Wiki](#technical-wiki)
  * [Open Source](#open-source)

<!-- tocstop -->

<p class='note info'>
This is a quick start guide, for full technical documentation see
<a href="https://learn.openenergymonitor.org/electricity-monitoring/ct-sensors/installation">IoTaWatt GitHub repo Wiki.</a>
</p>

# Features

- 14 x single-phase current sense (CT) channels
- 1 x AC VRMS Channel
- Compatible with multiple types of CT sensors and AC-AC voltage sensor adaptor
- Local SD card logging
- WiFi connected to post to Emoncms
- Sample rate: 35-40 channels per second
- Voltage (VRMS), Power (W) and Energy (kWh) logged to local SD card - every 5s
- On-board Real-time-clock (RTC) with battery backup
- Web-config interface
- Secure encrypted data connection to emoncms.org
- Secure automatic OTA firmware updates
- 5V Micro USB power supply required
- Wall mountable
- Open-source / hardware
- CE certified
- RoHs compliant

# Install

<p class='note warning'>
<a href="https://learn.openenergymonitor.org/electricity-monitoring/ct-sensors/installation">Please read the CT installation guide before installing.</a>
Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated; i.e., switch off the power prior to installing your sensors and proceed slowly with care. If you have any doubts, seek professional assistance.
</p>

## Clip-on Current Sensor

The clip-on current sensor measures the current flow. IoTaWatt is compatible with a number of different sized CT sensors.

- Clip the CT sensor around either the **Live** or **Neutral** cable
- Connect 3.5mm jack plug into one of the CT inputs on the IoTaWatt
- If the power reading is negative, reverse the CT sensor orientation
- [Learn more about how CT sensors work...](https://learn.openenergymonitor.org/electricity-monitoring/voltage-sensing/measuring-voltage-with-an-acac-power-adapter)

<p class='note'>
The clip-on CT sensors must be clipped round either the live or Neutral AC wire. <strong>Not both.</strong>.
</p>

![CT sensor installation ](/images/applications/solar-pv/ctinstall.jpg)



## AC-AC Voltage Sensor Adapter (VT)

AC-AC adapter (also known as 'VT' Voltage Transformer) is used to measure AC voltage, power factor and determine direction of current flow.


<p class='note'>
<strong>Use of an AC-AC voltage sensor plug-in adapter with IoTaWatt is essential</strong>.
</p>


- Plug the AC-AC adapter into a power outlet
- This may require installation of a new outlet or extending an existing one
- AC-AC adapter cable can be extended if required
- Plug power connector into the AC socket on the IoTaWatt
- Provides AC waveform reference for accurate Real Power measurements. [Learn more about measuring voltage with AC-AC power adapter...](https://learn.openenergymonitor.org/electricity-monitoring/voltage-sensing/measuring-voltage-with-an-acac-power-adapter)

*Note: Unlike with the emonTx, the AC-AC adapter does not power the IoTaWatt. It just provides an AC voltage reference signal. This is due to the increased power requirement of the IoTaWatt WiFi connectivity*

## DC 5V USB Adapter

A 5V DC power supply provides power to the IoTaWatt.

- Plug the DC 5V USB adapter into a power outlet
- Plug the micro-B USB connector into the IotaWatt
- High quality minimum [1.2A power supply recommended](https://shop.openenergymonitor.com/power-supplies/)

IoTaWatt status LED should light up to indicate power-up.

## Wall Mount

IoTaWatt can be optionally wall mounted using enclosed bracket.

- Open IoTaWatt enclosure
- Attach 'male' part of wall-mount bracket to IoTaWatt
- Re-assemble IoTawatt
- Attach 'female' part of wall-mount to the wall
- Clip IoTaWatt onto wall-mount
- IoTawatt can easily be removed if required

![CT sensor installation ](/images/setup/iota-wall.jpg)

***

# Connect WiFi


<p class='note'>
It's highly recommended to connect the IoTaWatt to a local WiFi network with a web connection.
</p>

*Although the IoTaWatt can run without WiFi an internet connection is required to set the real time clock is not set*


- If the device is new and has never been connected to a WiFi network, or the last used network is not available, the IoTaWatt will start up in WiFi AP (access point) mode.
- AP mode is indicated by LED flashes `RED-GREEN-GREEN`
- Using a mobile device connect to SSID `iota + <unique-number>`
- **The default WiFi password is `IotaWatt` (case sensative)**
- After connecting to IoTaWatt AP a captive portal re-direct should display the IoTaWatt WiFi setup portal


![iotawatt wifi](/images/setup/iota-wifi.png)

*Note: If this page does not display automatically browse to [http://192.168.4.1](http://192.168.4.1)*

- Follow on screen instructions to connect IoTaWatt to your local WiFi network.
- Once connected, the name of the new WiFi network will be saved, and the device will continue its startup procedure.
- If the LED begins blinking a rapid dull green, proceed to the next step Device Configuration.
- If the device displays another three colour LED sequence, see [Troubleshooting (wiki)](https://github.com/boblemaire/IoTaWatt/wiki/Troubleshooting).

***

# Configuration

The IotaWatt is configured via a web-interface, see online demo at [iotawatt.com](http://iotawatt.com)

Successful startup will be indicated by a dull green glow on the LED. If the LED is off, or blinking a three-colour sequence, see [Troubleshooting (wiki)](https://github.com/boblemaire/IoTaWatt/wiki/Troubleshooting).

- After successful startup, you can connect to the device with your web browser
- Connect to IoTaWatt using [http://iotawatt.local](http://iotawatt.local)

![iotawatt config](/images/setup/iota-config.png)

*Note: if local hostname resolution is not supported on your network you will need to connect to IoTaWatt using its local IP address. This can be obtained this from your router DHCP table, using [Fing](https://www.fing.io/) or see IoTaWatt serial debug at startup to obtain local IP address (115200 baud)*


## Configure Input Sensors

### AC-AC Voltage Transformer (VT)

You should have installed the device with an AC-AC voltage reference transformer plugged into the IoTaWatt via 2.1mm barrel-jack. The initial configuration has this channel pre-configured as a generic "VT" or voltage-transformer.



![iotawatt status](/images/setup/iota-input1.png)

- Click on `[0]` input to edit the voltage input channel
- Select your VT (AC-AC adapter) calibration pre-set from the drop down list
- Click `Save`


![iotawatt status](/images/setup/iota-input2.png)

*It's recomended for highest accuracy that calibration is done on your specific unit. See [IoTaWatt Wiki.](https://github.com/boblemaire/IoTaWatt/wiki/Reference-Voltage-Calibration)*


### Configure Current Transformers (CT's)

IoTaWatt is compatible with a number of different sized CT sensors. Pre-set calibrations are available for popular models.

- Click on `[1]` to configure the first CT input channel
- Choose calibration pre-set to match your CT model
- Click `Save`

![iotawatt status](/images/setup/iota-ct2.png)

Input list should now show input 0 configured as a AC voltage input and input 1 configured as a current sensor CT input.

Add additional CT's as required:

![iotawatt status](/images/setup/iota-ct3.png)

***

## View Local Data

### Real Time Status

After VT and CT inputs have been setup, check real-time readings on the Input Channel Status page.

Here is an example of a more complex setup:

![iotawatt status](/images/setup/iota-status.jpg)

### View historic local data

Historic data logged to internal-SD card can be viewed using `Run Local Graph App`

***


## Configure Remote Emoncms Server

By default the IoTaWatt logs data to internal SD card, data can be viewed using Local Graph App.

The IoTaWatt can also post to a remote Emoncms server e.g. [Emoncms.org](https://emoncms.org) or emonPi etc. Posting to a remote server is recommended for backup and to enable easy remote access to view the data.

To enable remote data logging:

- Select `Setup Web Server`
- Choose `Emoncms`
- Enter Emoncms.org `API KEY`
- (optional but recommended): Enter Emoncms.org `userID` to enable posting using encrypted protocol (recommended)*
- Chose which inputs to be posted remotely (default all)

![iotawatt status](/images/setup/iota-emoncms.png)

\* Emoncms UserID can be found in the `Setup > Account` page of Emoncms.org.

Encrpted protocol is specific to Emoncms.org, posting to other Emoncms sever (e.g. emonPi) can only be done using un-encrypted http.

<p class='note'>
If network connectivity is lost, data logged locally to SD card will later be bulk-uploaded to Emoncms when connectivity is restored.
</p>


***

## Firmware Update (OTA)

- The IotaWatt can receive automatic OTA updates.
- Firmware releases are published to [Releases page of the IotaWatt GitHub Repo](https://github.com/boblemaire/IoTaWatt/releases).

IotaWatt checks the [IotaWatt.com](http://IotaWatt.com) site for new software every 1hr. The update process takes less than a minute and the new firmware is authenticated with a digital signature from IotaWatt.

![iotawatt status](/images/setup/iota-device.png)


***

## Technical Wiki

For technical IoTaWatt documentation see [IoTaWatt GitHub repo Wiki.](github.com/boblemaire/IoTaWatt/wiki)

## Open Source

IoTaWatt is fully open-source and has been designed with input from the OpenEnergyMonitor community.

- [IoTaWatt Hardware & Firmware GitHub Repo](github.com/boblemaire/IoTaWatt)
- [IoTaWatt Community Forum Sub-category](https://community.openenergymonitor.org/c/hardware/iotawatt)

*IoTaWatt is designed and manufactured by Bob Lemaire [@overeasy](https://community.openenergymonitor.org/u/overeasy/) in partnership with OpenEnergyMonitor.*

<!--### Video Guide-->

<!--<div class='videoWrapper'>-->
<!--<iframe width="560" height="315" src="https://www.youtube.com/embed/6SB4fRYQjno" frameborder="0" allowfullscreen></iframe>-->
<!--</div>-->

<br>

***

### [Next step: Add Temperature Node(s) &raquo;](/setup/emonth/)
