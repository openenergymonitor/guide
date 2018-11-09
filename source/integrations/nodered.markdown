---
layout: page
title: "Node-RED"
description: "Node-RED integration"
date: 2014-12-18 21:49
sidebar: true
comments: false
sharing: true
footer: true
---

Node-RED is a tool for wiring together hardware devices, APIs and online services in new and interesting ways. Using NodeRED the emonPi can become a central hub for home automation, control and notification.

At the heart of Node-RED is a visual editor allowing complex data flows to be wired together with little coding.

**Node-RED is NOT pre-installed on emonSD-30Oct18, see [NodeRED RaspberryPi Install Guide](https://nodered.org/docs/hardware/raspberrypi) to install**

***

**Node-RED is pre-installed on emonSD pre 2018, see [emonSD repository and change log](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log). If you are running an emonSD image that includes Node-RED just browse to:**

## [http://emonpi:1880](http://emonpi:1880)

```
Username: "emonpi"
Password: "emonpi2016"
```

*Or substitute `emonpi` for your local emonpi's IP address if hostname lookup does not work*

![default node red](/images/integrations/nodered.png)

The Node-RED visual editor should load in the web browser with an example flow. The example flow subscribes to the emonPi MQTT (see [MQTT docs](/technical/mqtt/)) and extracts real-time values.

Make changes to the Node-RED flow by dragging-and-dropping nodes and connecting flows. Hit deploy to save and execute the configuration.

**On the emonPi the node-RED data folder /home/pi/.node-red is soft-linked to the read-write folder `/home/pi/data/node-red` so modifications to the flows can be saved.**

*For inspiration on what can be achieved with nodeRED and MQTT [check out Martin Harizanov's IoT Google hangout](http://www.youtube.com/watch?v=KPnwyTgZaS0&t=29m18s).*

### Documentation

**[emonPi Node-RED](https://github.com/openenergymonitor/oem_node-red)**


### Related Blog Posts

  - [Node-RED blog post tag](https://blog.openenergymonitor.org/categories/nodered/)
  - [emonPi, NodeRed and MQTT](https://blog.openenergymonitor.org/2015/10/emonpi-nodered-and-mqtt/)
  - [Node-RED Emoncms Node](http://2.bp.blogspot.com/-wVqIG0KV_8k/VkPM0XAJCYI/AAAAAAABi1c/EoNQ2OvDVvs/s1600/emoncms_nodered_node.png)
  - [Outdoor Temperature Data from Weather Underground to Emoncms & MQTT](https://blog.openenergymonitor.org/2016/02/outdoor-temperature-data-from-weather/)
  - [Ambient Wind Energy Indicator using Node-RED and Blink(1) USB](https://blog.openenergymonitor.org/2015/11/ambient-wind-energy-indicator-using/)

