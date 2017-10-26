---
layout: page
title: "6. Add Energy Sensing Node(s)"
description: "Add additional energy monitoring nodes"
date: 2015-03-08 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

### [&laquo; Previous step: Dashboards](/setup/dashboards/)

### [Next step: Add Temperature Node(s) &raquo;](/setup/emonth/)

***

## emonTx

The emonTx is an low power RF remote sensor node. Data is transmitted to an emonPi or an emonBase via a low power 433MHz radio.

![emontx](/images/setup/emontx.jpg)

### Key Features

- 4 x single-phase current sense (CT) channels
- 1 x AC VRMS Channel
- Supports multiple temperature sensors
- Supports Optical Pulse Sensor
- Can be powered single AC-AC adaptor (DC PSU not required)
- Battery power option
- RF Range is approximately similar to home WiFi (real world range depends on many factors e.g. thick stone walls)
- Up to 2x emonTx can be connected to a single emonPi (up to 30x is possible with manual RF node ID setting*)
- Approximate three-phase possible with firmware update
- Wall-mount option


**Note:** it is possible to use emonTx 'standalone' (without emonPi / emonBase) with the addition of an ESP8266 WiFi module running EmonESP to post directly to Emoncms. See [Using emonTx with the ESP8266 WiFi module](/setup/esp8266-adapter-emontx/)

<a class="btn pull-left" href="/setup/emontx">Setup emonTx</a><a class="btn pull-right" href="http://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/">View in Shop &rarr; </a>


\* *More than 2x emonTx units can be connected to a single emonPi / emonBase with manual change of RF nodeID. This can be done This can be done via [serial node ID config](https://community.openenergymonitor.org/t/emontx-emonth-configure-rf-settings-via-serial-released-fw-v2-6-v3-2/2064?u=glyn.hudson)*

![emontx](/images/setup/emontx.jpg)

<a class="btn pull-right" href="http://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/">View in Shop &rarr; </a>

### Hardware Setup

#### 1. DIP Switch Config

- If more than one emonTx is to be used with the same base-station set the node ID using the [on-board DIP switches](https://wiki.openenergymonitor.org/index.php/EmonTx_V3.4#DIP_Switch_Config).
 - *USA mode can also be toggled using DIP switches*

#### 2. Install Sensors

- Install clip on CT(s) on circuit to be monitored Follow [CT installation instructions](/setup/install). and plug into emonTx jack plug sockets
  - *CT 1-3 are standard 100A / 24KW max CT inputs (@240V)*
  - *CT 4 is a special high sensitivity input for 19A / 4.6KW (@240V)*
  - *Recomended [100A SCT-013-00 CT sensors should be used](http://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/)*
- (Optional) Plug in temperature sensor(s) and [optical pulse count sensor](http://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor/)


#### 3. Power Up
- Power emonTx directly from an AC-AC adapter (additional DC adapter not required)
- Or alternatively power via 3 x AA batteries.
- **All sensors should be connected before power up**


#### 4. Indicator LED
  - Illuminates solid for a 10 seconds on first power up
  - Flash multiple times to indicate an AC-AC waveform has been detected (if powering via AC-AC adapter)
  - Flash once every 10s to indicate sampling and RF transmission interval

<p class='note'>
An emonTx can be powered by 3 x AA batteries; however, if possible, it is recommended to power the unit with an AC-AC adapter to provide an AC voltage reference for more accurate Real Power and VRMS calculations.
</p>

### Base-station Emoncms Setup

The emonTx is compatible with emonPi / emonBase. RF transmission from the emonTx should be picked up automatically and data should appear in local Emonms `Inputs` page.

*If [Remote logging](/setup/remote) has been setup, data will also be posted to Emoncms.org.*

#### 1. [Log inputs to feeds](/setup/local/)

**Note: if using more than two emonTx units (with custom RF node ID or modified firmware) [`emonhub.conf` node decoders will need to be setup](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md).**

<br>

***

### [Next step: Add Temperature Node(s) &raquo;](/setup/emonth/)
