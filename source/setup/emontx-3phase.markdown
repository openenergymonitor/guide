---
layout: page
title: + Add Additional emonTx-3phase
description: + Add Additional emonTx-3phase
date: 2015-03-22 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

<a class="btn pull-right" href="http://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/" style="margin-left:10px">View in Shop &rarr; </a>

Additional EmonTx energy monitoring nodes running [three-phase firmware](https://github.com/openenergymonitor/emontx-3phase) can be added to both an emonPi or a emonBase system to:

- Monitor 3-phase power (with 3-phase emonTx firmware, see [EmonTx Technical](/technical/emontx))

Data is transmitted to the emonPi or emonBase via low power 433MHz radio as standard, or alternatively using the [ESP8266 WiFi adapter](/setup/esp8266-adapter-emontx/) via WiFi for applications where the 433 MHz radio range is insufficient. 

The emonTx with three-phase firmware is designed for use on a 3-phase, 4-wire system.

### A) Adding one emonTx three-phase to an emonPi system

#### Installtion 

**Before starting installation it's important to identify the phases.**

- Ideally plug the AC voltage adapter into L1 this will allow straightforward connection of CTs as follows CT1=L1, CT2=L2 and CT3=L3. 

- If it's not possible to plug the AC voltage adapter into L1 e.g all the accessible plug sockets are on a different phase then the connection of CTs must be adjusted e.g If AC voltage adapter is plugged into L2 then the CTs must be connected as follows CT1=L2, CT2=L3 and CT3=L1

For a detailed and technical explanation of the 3-phase firmware, see the [emonTx three-phase technical user guide](https://github.com/openenergymonitor/emontx-3phase/blob/master/emontx-3-phase-userguide.pdf) and the [3-phase emonTx firmware repository}(https://github.com/openenergymonitor/emontx-3phase). 

#### Emoncms Input processing

Setup the input processing as follows, 

![emontx three-phase input processing](/images/setup/3-phase-emontx.png)

Use the `+ Input` input process to add the phase power inputs together to create a feed for the total power e.g

![emontx three-phase sum](/images/setup/3-phase-emontx-sum.png)



#### B) Adding more than one emonTx three-phase to an emonPi or emonBase system

In addition to standard emonTx installation as covered in the [emonTx and emonBase installation guide](/setup/install-emontx): when using 2 or more emonTx units with the same base-station **the node ID on each unit needs to be unique**. 

The nodeID can be selected at time of purchase or set using the on-board DIP switch to toggle. If more than two emonTx's are required on the same network then further nodeID values can be set via RF node ID serial config.

<img src="/images/setup/emontx_dipswitch.jpg" style="max-width:400px; float:right; padding:0 0 10px 10px">

The image on the right shows the DIP switch configuration looking at the emonTx with the CT sensor inputs at the top of the board. Move the top switch D9 to the left to select USA ACAC Voltage calibration. **Move the bottom switch D8 to the left to select RF node ID 12 rather than 11.**

**Serial Configuration**<br>

It's possible to set the emonTx radio settings, sensor calibration and other properties over serial. See [Github PDF: Configuration of RF Module & on-line calibration](https://github.com/openenergymonitor/EmonTxV3CM/blob/master/Config.pdf) for full details. If a custom node ID is set, a corresponding node decoder needs to be in place in emonhub.conf to decode the emonTx radio packet data. See [emonhub.conf configuration guide](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md).

Note: If using the Arduino IDE serial terminal to set properties of the firmware via serial, ensure the serial monitor is set to `NL/CR` and the baud rate is set to `115200`. The serial monitor may need to be restarted after changing the line ending selection.
