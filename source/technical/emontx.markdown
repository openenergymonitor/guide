---
layout: page
title: EmonTx
description: EmonTx Technical Overview
date: "2015-05-11 12:00"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The emonTx is an low power RF remote sensor node. Data is transmitted to an emonPi or an emonBase via a low power 433MHz radio.

![emontx](/images/setup/emontx.jpg)

<a class="btn pull-right" href="http://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/">View in Shop &rarr; </a>

**Features:**

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

## {% linkable_title Open Source %}

**EmonTx Wiki:**<br> [https://wiki.openenergymonitor.org/index.php/EmonTx_V3.4](https://wiki.openenergymonitor.org/index.php/EmonTx_V3.4)

**EmonTx Firmware**<br>

- [EmonTxV3CM Continuous Monitoring firmware](https://github.com/openenergymonitor/EmonTxV3CM)
- [Discrete Sampling Firmware](https://github.com/openenergymonitor/emontx3/tree/master/firmware)
- [3-phase Firmware](https://github.com/openenergymonitor/emontx-3phase/)

**EmonPi Schematic and Board files:**<br> [https://github.com/openenergymonitor/emontx3/tree/master/hardware/V3.4.4](https://github.com/openenergymonitor/emontx3/tree/master/hardware/V3.4.4)

