---
layout: page
title: "Node-RED"
description: "Node-RED integeation"
date: 2014-12-18 21:49
sidebar: true
comments: false
sharing: true
footer: true
---

Node-RED is a tool for wiring together hardware devices, APIs and online services in new and interesting ways. Using NodeRED the emonPi can become a central hub for home automation, control and notification.

At the heart of Node-RED is a visual editor allowing complex data flows to be wired together with only a little coding skills.

Node-RED is pre-installed and setup on the latest emonSD Raspberry Pi images, see [emonSD repository and change log](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log).

If your running a newer image to use Node-RED just browse to:

`http://emonpi:1880`

`Username: "emonpi"`
`Password: "emonpi2016`

*Or substitite `emonpi` for your local emonpi's IP address if hostname lookup does not work*

![default node red](/images/integrations/nodered.png)

Node-RED visual editor should load in the web browser with an example flow. The example flow suscribes to the emonPi MQTT (see [MQTT docs](/technical/mqtt/)) and extracts real-time values.

For inspiration on what can be acheived with nodeRED and MQTT [check out Martin Harizanov's IoT Google hangout](http://www.youtube.com/watch?v=KPnwyTgZaS0&t=29m18s).

### Documentation

**[emonPi Node-RED](https://github.com/openenergymonitor/oem_node-red)**


### Related Blog Posts

  - [Node-RED blog post tag](https://blog.openenergymonitor.org/categories/nodered/)
  - [emonPi, NodeRed and MQTT](https://blog.openenergymonitor.org/2015/10/emonpi-nodered-and-mqtt/)
  - [Node-RED Emoncms Node](http://2.bp.blogspot.com/-wVqIG0KV_8k/VkPM0XAJCYI/AAAAAAABi1c/EoNQ2OvDVvs/s1600/emoncms_nodered_node.png)
  - [Outdoor Temperature Data from Weather Underground to Emoncms & MQTT](https://blog.openenergymonitor.org/2016/02/outdoor-temperature-data-from-weather/)
  - [Ambient Wind Energy Indicator using Node-RED and Blink(1) USB](https://blog.openenergymonitor.org/2015/11/ambient-wind-energy-indicator-using/)

