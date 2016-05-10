---
layout: page
title: "MQTT"
description: "dev2"
date: 2014-12-18 21:49
sidebar: true
comments: false
sharing: true
footer: true
---

> [MQTT](http://mqtt.org/) is a very lightweight machine-to-machine (M2M)/"Internet of Things" connectivity protocol.

The latest version of emonHub as setup on the emonPi (and emonHub from July 15) uses MQTT as a link to Emoncms and also to provide data to the emonPi LCD script. Since MQTT is already running all we need to do is to point Node-RED MQTT input block to subscribe to the 'emonhub/rx/#' MQTT topic on port 1883. The '#' topic includes data received from all nodes. To subscribe to just one node use e.g. emonPi use: 'emonhub/5/values' or 'emonhub/10/values' for emonTx.

### [MQTT Docs](https://github.com/emoncms/emoncms/blob/master/docs/RaspberryPi/MQTT.md)




https://blog.openenergymonitor.org/2015/10/emonpi-nodered-and-mqtt/
https://blog.openenergymonitor.org/categories/mqtt/