---
layout: page
title: "Integrations"
description: "Integrate with other services"
date: 2015-10-08 19:05
sidebar: true
comments: false
sharing: true
footer: true
---

# Pre Installed on emonPi

*Assuming pre-build SD card image [emonSD-03-May16](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log#emonsd-03may16--release) or later*

## [Node-RED](/integrations/nodered)

**[https://emonpi:1880](https://emonpi:1880)**

Node-RED is a tool for wiring together hardware devices, APIs and online services in new and interesting ways. Using NodeRED the emonPi can become a central hub for home automation, control and notification.

## [OpenHAB](/integrations/openhab)

**[https://emonpi:8080](https://emonpi:8080)**

Open Home Automation Bus (OpenHAB) is “a vendor and technology agnostic open source automation software for your home”. OpenHAB is java based and can run on an emonPi (Raspberry Pi) and is very flexible and can be configured for just about any home automation task

## [LightWaveRF Control via MQTT](/integrations/lightwaverf)

LightWaveRF produce a variety of RF plugs and relays which can be controlled via OOK (on-off-keying RF. The LightWaveRF OOK protocol is also compatible with some lower cost un-branded OOK learning receivers relays.

***

# No Software Installation Required

## [WiFi MQTT Control Relay Thermostat](/integrations/mqtt-relay/)

Multi-purpose Wifi connected relay control board. Applications include: remote heating an A/C systems control via HTTP or MQTT using nodeRED, openHAB etc.

## [EV Charging](/integrations/ev-chargin/)

We have worked with OpenEVSE to develope open-source EV charging stations which can integrate with OpenEnergyMonitor. With WiFi connectivity the OpenEVSE and EmonEVSE units can log data directly to Emoncms and integrate with emonPi via MQTT for features such as Solar PV energy divert.

***

# Installation Required

## [HA-bridge](https://github.com/openenergymonitor/emonpi-ha-bridge)

Enable voice control of MQTT devices using Google Home or Amazon Eco using home automation bridge (ha-bridge) running on emonPi

## [Home Assistant](https://blog.openenergymonitor.org/2016/04/Home-Assistant/)

Fully open-source python based home automation platform, similar to openHAB but easier to setup with some nice auto-detection. Tested to work on emonPi (not pre-installed, requires install)

