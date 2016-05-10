---
layout: page
title: "Overview"
description: "dev1"
date: 2015-05-11 12:00
sidebar: true
comments: false
sharing: true
footer: true
---

![emonPi overview](https://github.com/openenergymonitor/emonpi/raw/master/docs/emonPi_System_Diagram.png)
<figcaption>Fig1 emonPi Artitecture Overview</figcaption><br>

The emonPi is based on a RaspberryPi + [emonPi Shield PCB](https://wiki.openenergymonitor.org/index.php/EmonPi). The emonPi features a ATmega328p 8-bit microcontroller which is which Arduino sketch compatiable.

![emonPi PCB](https://github.com/openenergymonitor/Hardware/raw/master/emonPi/emonPi_V1_6/photo.png)
<figcaption>emonPi RaspberryPi Shield PCB</figcaption><br>

An [emonBase](http://shop.openenergymonitor.com/emonbase-web-connected-base-station/) works in the same way as the emonPi, just instead of an emonPi shield PCB the emonBase uses an [RFM69Pi PCB](http://shop.openenergymonitor.com/rfm69pi-433mhz-raspberry-pi-base-station-receiver-board/) which works the same as the emonPi Shield PCB just without the local energy monitoring capability. The Raspberry Pi on the emonBase runs exactly the same [emonSD](#emonsd-features) software as the emonPi.

![emonBase RFM69Pi](https://wiki.openenergymonitor.org/images/thumb/RFM69Pi_RasPi.JPG/1500px-RFM69Pi_RasPi.JPG)
<figcaption>emonBase: Raspberry Pi + RFM69Pi</figcaption><br>

## {% linkable_title Hardware Overview %}

As the diagram (fig 1) shows the Atmega328 microprocessor communicates with the RaspberyPi via the internal UART `(/dev/ttyAMA0` serial port. Data is transmitted over serial using the [JeeLib packet format](http://jeelabs.org/2011/06/09/rf12-packet-format-and-design/). The ATmega328 on the emonPi / RFM69Pi run a modifed version of [JeeLabs RFM12Demo Sketch](http://jeelabs.net/projects/jeelib/wiki/RF12demo).

**See [emonPi Resources](/technical/resources#emonpi)**

### {% linkable_title RF %}

The emonPi / RFM69Pi uses the HopeRF RFM69CW RF module to recieve data from other wireless nodes (emonTx, emonTH etc) using 433Mhz. Each RF node is required to be on the same network group (default 210) and have an unique node ID. Data is transmitted over serial using the [JeeLib packet format](http://jeelabs.org/2011/06/09/rf12-packet-format-and-design/). EmonHub python service on the Raspberry Pi requires a corresponding node decoder entry in emonhub config for each RF node. See [emonHub in section below](#emonhub).

**See [Fundamental Building block Resources](/technical/resources/fundamentals)**


### {% linkable_title Energy Monitoring %}

Energy monitoring on the emonPi and emonTx is acheved using [emonLib](https://github.com/openenergymonitor/emonlib) discrete sampling and the ATmega328's 10-bit ADC. By default samples are taken once every 5s.

**See [Fundamental Building block Resources](/technical/resources#fundamentals)**

### {% linkable_title Pulse Counting %}

Pulse couting on the emonPi and emonTx uses ATmega328's 2nd hardware interrupt IRQ1. The first hardware interrupt IRQ0 is used by the RFM69CW. Only one pulse couter input is possible per emonTx/emonPi.

**See [Optical Pulse Sensor Resources](/technical/resources#optical-pulse-counter)**

## {% linkable_title Software Overview %}

By default the Raspberry Pi runs a modifed version of Debain [Raspbian Jessie Lite](https://www.raspberrypi.org/downloads/raspbian/). A pre-build SD card image (**emonSD**) is available to [purchase or download](https://github.com/openenergymonitor/emonpi/Docs/emonSD-pre-built-SD-card-Download-&-Change-Log)) which includes everything setup.

### {% linkable_title emonSD features %}

 - Read-only root file-system for long SD card lifespan
 - emonPi LCD & Update service
 - Emoncms with low-write optimisations
 - Mosquitto MQTT server
 - emonHub service
 - Node-RED
 - OpenHAB
 - LightWave RF MQTT OOK

**See [emonSD Resources](/technical/resources#emonsd)**

### {% linkable_title emonHub %}

emonHub (emon-pi variant) is pre-installed on emonSD. EmonHub is a pythion service wich receives the data from the emonPi via serial (in JeeLabs packet) format. emonHub decodes the data and publishes to the emonPi's localhost Mosquitto MQTT server and ([if configured](/setup/remote)) remotely to [Emoncms.org](https://emoncms.org).

Corresponding EmonHub nodedecoder entrys must be present in emonhub config for each wireless RF node e.g. emonTx, emonTH. See confguring emonhub in the resources:

**See [emonHub Resources](/technical/resources#emonhub)**

***

### See [Technical > Resources](/technical/resources) for further info and support >




