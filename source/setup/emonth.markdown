---
layout: page
title: "7. Add Temperature Node(s)"
description: "Add Temperature Nodes"
date: 2015-03-08 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

### [&laquo; Previous step: Add Energy Sensing Node(s)](/setup/emontx/)

### [Next step: Import / Backup &raquo;](/setup/import/)

***

## Temperature Monitoring

## Wired

Up to 6x wired temperature sensors can be connected directly to an emonPi / emonTx V3 via RJ45 connection, see Temperature tab of [Setup > Temperature & Humidity](/setup/).

### Wireless

#### emonTH Wireless Temperature Monitoring Node

- Wireless temperature & humidity monitoring node
- Communicates with emonPi & emonBase via RF (433Mhz)
- 1yr+ battery life (2 x AA not included)
- Up to 4x emonTH can communicate to a single emonPi*
- Internal temperature & humidity + optional external probe
- Optional pulse sensor input


\* *More than 4x emonTH units can be connected to a single emonPi / emonBase with manual change of RF nodeID. This can be done via [serial node ID config](https://community.openenergymonitor.org/t/emontx-emonth-configure-rf-settings-via-serial-released-fw-v2-6-v3-2/2064?u=glyn.hudson)*

{% img /images/setup/emonth-plant.png 400 %}

<a class="btn pull-right" href="https://shop.openenergymonitor.com/emonth-433mhz-temperature-humidity-node/">View in Shop &rarr; </a>

### emonTH Hardware Setup

#### 1. DIP Switch Config

- If more than one emonTH is to be used with the same base-station set the node ID using the [on-board DIP switches](https://wiki.openenergymonitor.org/index.php/EmonTH_V1.5#DIP_Switch_node_ID).

#### 2. Install Additional Sensors

Internal temperature and humidity sensor is pre-installed in the emonTH, additional external sensors can be connected if required:

- External DS18B20 can be wired into terminal block see [Hardware Wiki Section](https://wiki.openenergymonitor.org/index.php/EmonTH_V1.5#External_DS18B20_Temperature_Sensor_Connections)
- Optical Pulse Counting Sensor can be wired into terminal block see [Hardware Wiki Section](https://wiki.openenergymonitor.org/index.php/EmonTH_V1.5#Pulse_Sensor_Connection)

<p class="note">
Only one external DS18B20 sensor can be connected to an emonTH with standard firmare. If more than one DS18B20 is required see <a href="https://github.com/openenergymonitor/emonth">emonTH alternative firmware.</a></p>

#### 3. Power Up
- Power emonTH from 2 x AA batteries
- Alternatively 5V DC can be wired into terminal block if required

#### 4. Indicator LED
  - Illuminates solid (dimly) for a few seconds at first power up
  - LED should then extinguish to indicate successful sensor detection
  - Flashing LED indicates sensor detection failure
  - To preserve battery LED does NOT flash regularly during operation

### Base-station Emoncms Setup

The emonTH is compatible with emonPi / emonBase. RF transmission from the emonTH should be picked up automatically and data should appear in local Emonms `Inputs` page.

*If [Remote logging](/setup/remote) has been setup, data will also be posted to Emoncms.org.*

#### 1. [Log inputs to feeds](/setup/local/)

<p class="note">
<b>Important: the emonTH reports data at a 60s interval, it's important to log the data to emoncms with a 60s inerval as shown below:</b>
</p>

![emonth input process](/images/setup/emonth-inputprocess.png)

**Note: if using more than 4x emonTH units (with custom RF node ID or modified firmware) [`emonhub.conf` node decoders will need to be setup](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md).**

<br>

***

### [Next step: Add Optical Pulse Sensor &raquo;](/setup/optical-pulse-sensor)
