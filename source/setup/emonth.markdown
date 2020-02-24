---
layout: page
title: + Add Temperature Nodes
description: Add Temperature Nodes
date: 2015-03-08 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

<a class="btn pull-right" href="https://shop.openenergymonitor.com/emonth-433mhz-temperature-humidity-node/">View in Shop &rarr; </a>

### emonTH Temperature & Humidity Node

- Wireless temperature & humidity monitoring node
- Communicates with emonPi & emonBase via RF (433Mhz)
- 1yr+ battery life (2 x AA not included)
- Up to 4x emonTH can communicate to a single emonPi*
- Internal temperature & humidity + optional external probe
- Optional pulse sensor input

\* *More than 4x emonTH units can be connected to a single emonPi / emonBase with manual change of RF nodeID. This can be done via [serial node ID config](https://community.openenergymonitor.org/t/emontx-emonth-configure-rf-settings-via-serial-released-fw-v2-6-v3-2/2064?u=glyn.hudson)*

![emonth-plant.png](/images/setup/emonth-plant.png)

### emonTH Setup

#### 1. DIP Switch Config (emonTH V1.5 and up)

If more than one emonTH is to be used with the same base-station, each emonTH will need a different RF node ID. The node IDs on each unit can be set using the on-board DIP switch; this enables four node IDs to be selected by changing the switch positions without the need to change the firmware (as before). Up to 30 emonTHs can theoretically connect to a single emonBase / emonPi.

A USB to UART cable and Arduino IDE can be used to set additional unique node IDs by changing the nodeID variable at the beginning of the [sketch](https://community.openenergymonitor.org/t/emontx-emonth-configure-rf-settings-via-serial-released-fw-v2-6-v3-2/2064?source_topic_id=5468).

Alternatively, we are happy to set the node ID for you before shipping (please leave us a note with your order).

| DIP 1 | DIP 2 | RF node ID V1.x firmware | RF node ID V2.x firmware |
|-------|-------|--------------------------|--------------------------|
| OFF   | OFF   | 19 (default)             | 23 (default)             |
| ON    | OFF   | 20                       | 24                       |
| OFF   | ON    | 21                       | 25                       |
| ON    | ON    | 22                       | 26                       |

#### 2. Install Additional Sensors

An internal temperature and humidity sensor is built in to the emonTH, additional external sensors can be connected if required:

- External DS18B20 can be wired into a terminal block see [Hardware Wiki Section](https://wiki.openenergymonitor.org/index.php/EmonTH_V1.5#External_DS18B20_Temperature_Sensor_Connections)
- Optical Pulse Counting Sensor can be wired into a terminal block see [Hardware Wiki Section](https://wiki.openenergymonitor.org/index.php/EmonTH_V1.5#Pulse_Sensor_Connection)

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

#### 5. Emoncms Setup

  - RF transmission from the emonTH will be picked up automatically and data will appear in local Emoncms Inputs page.
  - If [Remote logging](/setup/remote) has been setup, data will also be posted to Emoncms.org.
  - See guide [Log Locally](/setup/local) for an overview of logging inputs to feeds. For EmonTH inputs select a feed interval 60s or greater:
  
<p class="note">
<b>Important: the emonTH reports data at a 60s interval, it's important to log the data to emoncms with a 60s inerval as shown below:</b>
</p>

![emonth input process](/images/setup/emonth-inputprocess.png)

**Note:** If using more than 4x emonTH units (with custom RF node ID or modified firmware) [emonhub.conf node decoders will need to be setup](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md).
