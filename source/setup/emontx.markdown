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

<a class="btn pull-right" href="http://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/" style="margin-left:10px">View in Shop &rarr; </a>

Additional [EmonTx energy monitoring nodes](/technical/emontx) can be added to both an emonPi or a emonBase system to:

- Expand the number of AC circuits that can be measured.<br>(Each EmonTx adds +4x CT sensor inputs)
- Monitor circuits at different locations in a building
- Monitor circuits where an AC socket is not available (using battery power)
- Monitor 3-phase power (with 3-phase emonTx firmware, see [EmonTx Technical](/technical/emontx))

Data is transmitted to the emonPi or emonBase via low power 433MHz radio as standard, or alternatively using the [ESP8266 WiFi adapter](/setup/esp8266-adapter-emontx/) via WiFi for applications where the 433Mhz radio range is insufficient. 

![emontx](/images/setup/emontx.jpg)

#### A) Adding one EmonTx to an EmonPi system

If you have already setup an EmonPi following the [EmonPi installation guide](/setup/install). The steps for installing an EmonTx are covered in the [EmonTx and EmonBase installation guide](/setup/install-emontx). The EmonPi in this instance works in much the same way as the emonBase.

#### B) Adding more than one EmonTx to an EmonPi or EmonBase system

In addition to standard EmonTx installation as covered in the [EmonTx and EmonBase installation guide](/setup/install-emontx): when using 2 or more emonTx units with the same base-station **the node ID on each unit needs to be unique**. 

The nodeID can be selected at time of purchase or set using the on-board DIP switch to toggle. If more than two emonTx's are required on the same network then further nodeID values can be set via RF node ID serial config.

<img src="/images/setup/emontx_dipswitch.jpg" style="max-width:400px; float:right; padding:0 0 10px 10px">

The image on the right shows the DIP switch configuration looking at the emonTx with the CT sensor inputs at the top of the board. Move the top switch D9 to the left to select USA ACAC Voltage calibration. **Move the bottom switch D8 to the left to select RF node ID 16 rather than 15.**

**Serial Configuration**<br>
It's possible to set the emonTx radio settings, sensor calibration and other properties over serial. See [Github PDF: Configuration of RF Module & on-line calibration](https://github.com/openenergymonitor/EmonTxV3CM/blob/v1.6/Config.pdf) for full details. If a custom node ID is set, a corresponding node decoder needs to be in place in emonhub.conf to decode the EmonTx radio packet data. See [emonhub.conf configuration guide](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md).
