---
layout: page
title: MQTT
description: "emonPi / emonBase MQTT technical guide"
date: 2014-12-18 21:49
sidebar: true
comments: false
sharing: true
footer: true
---

<style>.code {font-family:monospace; font-size:14px; background-color: #eee; padding: 20px; margin-bottom:20px}</style>

We use MQTT (Message Queuing Telemetry Transport) as one way of passing data between different hardware devices and software components within the OpenEnergyMonitor ecosystem.

The emonPi and emonBase running our emonSD software stack includes a local [Mosquitto MQTT](http://mosquitto.org/) server. A device can connect to this server and publish data to a MQTT topic. A script on the emonPi/emonBase then subscribes and receives the data sent by the device.

This Mosquitto server is accessible via authentication on port 1883.<br>See [MQTT Service Credentials](/technical/credentials#mqtt).

## {% linkable_title MQTT Publishers %}

### {% linkable_title emonHub %}

[EmonHub](https://github.com/openenergymonitor/emonhub) python service decodes the data received from the emonPi/emonBase + RF nodes and publishes to the emonPi/emonBase's Mosquitto MQTT server using the following two topic formats (both formats are published to parallel):

#### {% linkable_title 1. New MQTT Topic Format %}

Each data key (power) has its own MQTT topic as a sub-topic of the NodeID or NodeName. This MQTT topic structure makes it far easier to subscribe to a particular node key of interest e.g. `emontx/power1` using another service e.g. [openHAB](/integrations/openhab).

<div class="code">basetopic/node/keyname</div>

*Note: the default base topic is `emon/` this is set in `/etc/emonhub/emonhub.conf` and `/var/www/emoncms/settings.ini`.*

Example:

<div class="code">emon/emonpi/power1</div>

#### {% linkable_title 2. Legacy CSV MQTT Topic Format %}

Used by older version of emonPi and emonPiLCD service. All data from a single node is published in CSV format to a single topic. More compact but does not allow naming of keys and difficult to subscribe to a single key.

<div class="code">emonhub/rx/[nodeID]/values format</div>

Example:

<div class="code">emonhub/rx/10/values format</div>

The emonHub service can be restarted with `$ sudo service emonhub restart`.
Latest log file entries can be viewed via the Emoncms web interface admin or with: `$ tail /var/log/emonhub/emonhub.log`. All the data currently being published to MQTT topic can be viewed in real-time in the EmonHub log.

### {% linkable_title Emoncms Publisher %}

Data can be published to an MQTT topic using the `Publish to MQTT` Emoncms Input Process. In the Input process 'Text' box add the topic, for example: `house/power/solar`.

***

## {% linkable_title MQTT Subscribers %}

### {% linkable_title Emoncms MQTT Service %}

The Emoncms MQTT service subscribes to the MQTT base topic (default `emon/#`) and posts any data on this topic to Emoncms Inputs with the NodeName and KeyName taken from the MQTT topic and sub-topic name.

**Example:**

A power value published to `emon/emonpi/power1` would result in an Emoncms Input from `Node: emonpi` with `power1=XX`.

Data from any service (internal or external) that connect to the MQTT server (assuming authentication) and publishes to the base topic `emon/` will appear in Emoncms. See related blog posts below for example posting temperature data to Emoncms from Weather Underground using [NodeRED running locally on the emonPi](/integrations/nodered).

*Emoncms MQTT Service is running by default on the emonSD software stack*

The MQTT input service can be restarted using `$ sudo service emoncms_mqtt restart`.The Emoncms MQTT service runs the [`emoncms_mqtt.php` script](https://github.com/emoncms/emoncms/tree/master/scripts/services/emoncms_mqtt).
Latest log file entries can be viewed via Emoncms web interface admin or with: `$ tail /var/log/emoncms/emoncms.log`

### {% linkable_title EmonPiLCD Service %}

The [emonPi's python LCD Service Script](https://github.com/openenergymonitor/emonpi/blob/master/lcd/emonPiLCD.py) subscribes to the 'Legacy MQTT Topic' structure to obtain the real-time data to display on the emonPi LCD.

The emonPiLCD service can be restarted with: `$ sudo service emonPiLCD restart`.
Latest log file entries can be viewed with: `$ tail /var/log/emonpilcd/emonpilcd.log`.

***

## {% linkable_title Testing MQTT %}

To view all MQTT messages subscribe to  `emon/#` base topic :

<div class="code">$ mosquitto_sub -v -u 'emonpi' -P 'emonpimqtt2016' -t 'emon/#'</div>

To view all MQTT messages for a particular node subscribe to sub-topic:

<div class="code">$ mosquitto_sub -v -u 'emonpi' -P 'emonpimqtt2016' -t 'emon/emonpi/#'</div>

*Note: `#` denotes a wild-card*

**Test publishing and subscribing on a test topic:**

Subscribe to test topic:

<div class="code">$ mosquitto_sub -v -u 'emonpi' -P 'emonpimqtt2016' -t 'test'</div>

Open *another shell window* to publish to the test topic :

<div class="code">$mosquitto_pub -u 'emonpi' -P 'emonpimqtt2016' -t 'test' -m 'helloWorld'</div>

If all is working we should see `helloWord` :-)


To avoid connecting via SSH alternately you could use [MQTTlens Chrome Extension](https://chrome.google.com/webstore/detail/mqttlens/hemojaaeigabkbcookmlgmdigohjobjm?hl=en) or any other MQTT client connected to the emonPi IP address on port 1883 with user name: `emonpi` and password: `emonpimqtt2016`.
