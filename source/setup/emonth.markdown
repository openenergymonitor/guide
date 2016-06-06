---
layout: page
title: "Add Temperature Nodes"
description: "Add Temperature Nodes"
date: 2015-03-08 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

### [&laquo; Previous step: Add Energy Nodes](/setup/emontx/)

### [Next step: Import / Backup &raquo;](/setup/import/)

***

## Add additional temperature monitoring nodes

Multiple temperature sensors can be connected directly to an emonPi, see Temperature tab of [Setup > Hardware](/setup/hardware).

### [emonTH](http://shop.openenergymonitor.com/emonth-433mhz-temperature-humidity-node/)

- Wireless temperature & humidity monitoring node
- Compatible with emonPi & emonBase
- 6 month battery life (2 x AA not included)
- Up to 4x emonTH can communicate to a single emonPi*
- Internal temperature & humidity + optional external probe
- Optional pulse sensor input



\* *More than 4x emonTH units can be connected to a single emonPi / emonBase with manual change of RF nodeID. This can be done in the factory, please leave note with your online store order.*

{% img /images/setup/emonth-plant.png 400 %}

<a class="btn pull-right" href="http://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/">View in Shop &rarr; </a>

### Hardware Setup

#### 1. DIP Switch Config

- If more than one emonTH is to be used with the same base-station set the node ID using the [on-board DIP switches](https://wiki.openenergymonitor.org/index.php/EmonTH_V1.5#DIP_Switch_node_ID).

#### 2. Install Sensors

Sensors should be pre-installed in the emonTH, if required:

- Install DHT22 sensor into 4-pin socket facing outwards, [see photo](http://shop.openenergymonitor.com/emonth-433mhz-temperature-humidity-node/).
- External DS18B20 can be wired into terminal block see [Hardware Wiki Section](https://wiki.openenergymonitor.org/index.php/EmonTH_V1.5#External_DS18B20_Temperature_Sensor_Connections)
- Optical Pulse Counting Sensor can be wired into terminal block see [Hardware Wiki Section](https://wiki.openenergymonitor.org/index.php/EmonTH_V1.5#Pulse_Sensor_Connection)

<p class="note">
Only one DS18B20 sensor can be connected to an emonTH, if a DHT22 sensor is detected it's assumed the DS18B20 is external. If more than one DS18B20 is required see <a href="https://github.com/openenergymonitor/emonth">emonTH alternative firmware.</a></p>

#### 3. Power Up
- Power emonTH from 2 x AA batteries
- Alternatively 5V DC can be wired into terminal block if required

#### 4. Indicator LED
  - Illuminates solid for a few seconds at first power up
  - LED should then extinguish to indicate successful sensor detection
  - Flashing LED indicates sensor detection failure
  - To preserve battery LED does NOT flash regularly during operation

### Base-station Emoncms Setup

The emonTH is compatible with emonPi / emonBase. RF transmission from the emonTH should be picked up automatically and data should appear in local Emonms `Inputs` page.

*If [Remote logging](/setup/remote) has been setup, data will also be posted to Emoncms.org.*

#### 1. [Log inputs to feeds](/setup/local/)

**Note: if using more than four emonTH units (with custom RF node ID or modified firmware) [`emonhub.conf` node decoders will need to be setup](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md).**

<br>

***

### [Next step: Import / Backup &raquo;](/setup/import/)
