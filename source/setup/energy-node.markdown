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

## Additional energy monitoring node(s)

Additional energy monitoring nodes can be added if additional AC circuits require monitoring or the location of the circuits is inconvenient to access power outlet and network connectivity. There are two options emonTx or IoTaWatt:

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
- Up to 2x emonTx can be connected to a single emonPi (up to 30x is possible with manual RF node ID setting)
- Approximate three-phase possible with firmware update
- Wall-mount option


**Note:** it is possible to use emonTx 'standalone' (without emonPi / emonBase) with the addition of an ESP8266 WiFi module running EmonESP to post directly to Emoncms. See [Using emonTx with the ESP8266 WiFi module](/setup/esp8266-adapter-emontx/)

<a class="btn pull-left" href="/setup/emontx">Setup emonTx</a><a class="btn pull-right" href="http://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/">View in Shop &rarr; </a>

<br>

***

### [Next step: Add Temperature Node(s) &raquo;](/setup/emonth/)
