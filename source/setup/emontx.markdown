---
layout: page
title: + Add Additional emonTx
description: + Add Additional emonTx
date: 2015-03-08 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

Additional EmonTx units can be added to both an emonPi or a emonBase system to:

- Expand the number of AC circuits that can be measured
- Monitor circuits at different locations in a building
- Monitor circuits where an AC socket is not available (using battery power)

The emonTx is an low power RF remote sensor node. Data is transmitted to an emonPi or an emonBase via a low power 433MHz radio.

![emontx](/images/setup/emontx.jpg)

<a class="btn pull-right" href="http://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/">View in Shop &rarr; </a>

### Key Features

- 4 x single-phase current sensor (CT) channels
- 1 x AC VRMS Channel
- Supports multiple temperature sensors
- Supports Optical Pulse Sensor
- Can be powered by a single AC-AC adaptor (DC PSU not required)
- Battery power option
- RF Range is approximately similar to home WiFi (real world range depends on many factors e.g. thick stone walls)
- Up to 2x emonTx can be connected to a single emonPi or emonBase (up to 30x is possible with manual RF node ID setting*)
- Approximate three-phase possible with firmware update
- Wall-mount option


**Note:** it is possible to use emonTx 'standalone' (without emonPi / emonBase) with the addition of an ESP8266 WiFi module running EmonESP to post directly to Emoncms. See [Using emonTx with the ESP8266 WiFi module](/setup/esp8266-adapter-emontx/)

### Hardware Setup

#### 1. DIP Switch Config

- If using 2x emonTx units with the same base-station, the node ID on both units can be set using the [on-board DIP switches](https://wiki.openenergymonitor.org/index.php/EmonTx_V3.4#DIP_Switch_Config). We can do this for you prior to shipping, just select which node ID you require when ordering. 

- More than 2x emonTx units can be connected to a single emonPi / emonBase with manual change of RF nodeID. This can be done via [serial node ID config](https://community.openenergymonitor.org/t/emontx-emonth-configure-rf-settings-via-serial-released-fw-v2-6-v3-2/2064?u=glyn.hudson). We can do this for you prior to shipping, just leave a comment with your order.

- USA mode (enable 120V AC-AC adaptor calibration) can be toggled using DIP switches. See Wiki link above for further details
 
#### 2. Install Sensors

  - Install clip on CT sensors on circuits to be monitored, follow [CT installation instructions](/setup/install) and plug into emonTx jack plug sockets
  - CT 1-3 are standard 100A / 24KW max CT inputs (@240V)
  - CT 4 is a special high sensitivity input for 19A / 4.6KW (@240V)
  - CT Inputs are designed for the [100A SCT-013-00 CT sensor](http://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/)
  - Optional: Plug in temperature sensor(s) and [optical pulse count sensor](http://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor/)

#### 3. Power Up

- Power emonTx directly from an AC-AC adapter (additional DC adapter not required)
- Or alternatively power via 3 x AA batteries.
- **All sensors should be connected before power up**

<p class='note'>
An emonTx can be powered by 3 x AA batteries; however, if possible, it is recommended to power the unit with an AC-AC adapter to provide an AC voltage reference for more accurate Real Power and VRMS calculations.
</p>

#### 4. Indicator LED

  - Illuminates solid for a 10 seconds on first power up
  - Flash multiple times to indicate an AC-AC waveform has been detected (if powering via AC-AC adapter)
  - Flash once every 10s to indicate sampling and RF transmission interval

#### 5. Base-station Emoncms Setup

  - RF transmission from the emonTx will be picked up automatically and data should appear in the local Emoncms Inputs page.
  - If [Remote logging](/setup/remote) has been setup, data will also be posted to Emoncms.org.
  - Continue with guide: [Log Local](/setup/local/) to configure the emonTx inputs.

**Note:** if using more than two emonTx units (with custom RF node ID or modified firmware) [emonhub.conf node decoders will need to be setup](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md).
