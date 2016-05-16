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

<figure><a href="https://github.com/openenergymonitor/emonpi/raw/master/docs/emonPi_System_Diagram.png">
<img src="https://github.com/openenergymonitor/emonpi/raw/master/docs/emonPi_System_Diagram.png" alt="emonPi Architecture Overview">
<figcaption style="text-align:center;"><i>Fig.1 - emonPi Architecture Overview</i></figcaption>
</a>
</figure>

***

> [MQTT](http://mqtt.org/) is a machine-to-machine (M2M)/"Internet of Things" connectivity protocol. It was designed as an extremely lightweight publish/subscribe messaging transport.

The emonPi with [emonSD pre-built SD card](/technical/#emonsd-features) by default runs a local [Mosquitto MQTT](http://mosquitto.org/) server. This server is accesiable ([via authentication](/technical/credentials#mqtt) on port 1883. See [MQTT Service Credentials](/technical/credentials#mqtt).

## {% linkable_title MQTT Publishers %}

### {% linkable_title emonHub %}

[EmonHub](/technical/#emonhub) python service decodes the data received from the emonPi + RF nodes and publishes to the emonPi's Mosquitto MQTT server using the following two topic formats (both formats are published to parallel) :

#### {% linkable_title 1. New MQTT Topic Format %}

Each data key (power) has it's own MQTT topic as a sub-topic of the NodeID or NodeName. This MQTT topic structure makes it far easier to subscribe to a particular node key of interest e.g. `emontx/power1` using another service e.g. [OpenHAB](/integrations/openhab).

`[basetopic]/[node]/[keyname]`

*Note: the default base topic is `emon/` this is set in `~/data/emonhub.conf` and `/var/www/emoncms/settings.php`.*

Example:

`emon/emonpi/power1`

#### {% linkable_title 2. Legacy CSV MQTT Topic Format %}

Used by older version of emonPi and emonPiLCD service. All data from a single node is published in CSV format to a single topic. More compact but does not allow naming of keys and difficult to subscibe to a single key.

`emonhub/rx/[nodeID]/values format`

Example:

`emonhub/rx/10/values format`

emonHub servie can be restarted with `$ sudo service emonhub restart`.
Latest log file entries can be viewed via the Emoncms web interface admion or with: `$ tail /var/log/emonhub/emonhub.log`. All the data currently being published to MQTT topic can be viewed in real-time in the EmonHub log.

### {% linkable_title Emoncms Publisher %}

Data can be published to an MQTT topic using the `Publish to MQTT` Emoncms Input Process. In the Input process 'Text' box add the topic, for example: `house/power/solar`.

***

## {% linkable_title MQTT Subscribers %}

### {% linkable_title Emoncms MQTT Service %}

Emoncms MQTT Input service subscribes to the MQTT base topic (default `emon/#`) and posts any data on this topic to Emoncms Inputs with the NodeName and KeyName taken from the MQTT topic and sub-topic name.

Example:

A power value published to `emon/emonpi/power1` would result in an Emoncms Input from `Node: emonpi` with `power1=XX`.

Data from any service (internal or external) that connect to the MQTT server (assuming authentication) and publishes to the base topic `emon/` will appear in Emoncms. See related blog posts below for example posting temperature data to Emoncms from Weather Underground using [NodeRED running locally on the emonPi](/integrations/nodered).

*Emoncms MQTT Service is running by default on the emonSD software stack*

The MQTT input service can be restarted using `$ sudo service mqtt_input restart`.The MQTT input service runs a [`phpmqtt_input.php` script](https://github.com/emoncms/emoncms/blob/master/scripts/phpmqtt_input.php).
Latest log file entries can be viewed via Emoncms web inerface admin or with: `$ tail /var/log/emoncms.log`



### {% linkable_title EmonPiLCD Service %}

The [emonPi's python LCD Service Script](https://github.com/openenergymonitor/emonpi/blob/master/lcd/emonPiLCD.py) subscribes to the 'Legacy MQTT Topic' structure to obtain the real-time data to display on the emonPi LCD.

The emonPiLCD service can be restarted with: `$ sudo service emonPiLCD restart`.
Latest log file entries can be viewed with: `$ tail /var/log/emonpilcd/emonpilcd.log`.

***

## {% linkable_title Testing MQTT %}

To view all MQTT messages subscribe to  `emon/#` base topic :

  `$ mosquitto_sub -v -u 'emonpi' -P 'emonpimqtt2016' -t ' emon/#'`
  
To view all MQTT messages for a particular node subscribe to sub-topic:

`$ mosquitto_sub -v -u 'emonpi' -P 'emonpimqtt2016' -t ' emon/emonpi/#'`

*Note: `#` denotes a wild-card*
  
**Test publishing and subscribing on a test topic:**

Subscribe to test topic:

	`$ mosquitto_sub -v -u 'emonpi' -P 'emonpimqtt2016' -t 'test'`

Open *another shell window* to publish to the test topic :
 
	`$mosquitto_pub -u 'emonpi' -P 'emonpimqtt2016' -t 'test' -m 'helloWorld'`
	
If all is working we should see `helloWord` :-) 

***

# {% linkable_title Related Blog Posts %}

- [EmonPi, Node-RED and MQTT](https://blog.openenergymonitor.org/2015/10/emonpi-nodered-and-mqtt/)
- [Temperature data from Weather Underground](https://blog.openenergymonitor.org/2016/02/outdoor-temperature-data-from-weather/)
- [MQTT blog category](https://blog.openenergymonitor.org/categories/mqtt/)

# {% linkable_title Resources %}

- [MQTT Service Credentials](/technical/credentials#mqtt).
- [MQTT Installation Docs](https://github.com/emoncms/emoncms/blob/master/docs/RaspberryPi/MQTT.md)
- [emonSD Buid Guide](https://github.com/openenergymonitor/emonpi/blob/master/docs/SD-card-build.md)
- [Emoncms PHP MQTT Input Script](https://github.com/emoncms/emoncms/blob/master/scripts/phpmqtt_input.php)
