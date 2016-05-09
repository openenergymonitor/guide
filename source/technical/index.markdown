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

The emonPi is based on a RaspberryPi + [emonPi Shield PCB](https://wiki.openenergymonitor.org/index.php/EmonPi). The emonPi shield has an ATmega328p 8-bit microcontroller which is which Arduino sketch compatiable.

An [emonBase](http://shop.openenergymonitor.com/emonbase-web-connected-base-station/) works in the same way as the emonPi, just instead of an emonPi shield PCB the emonBase uses an [RFM69Pi PCB](http://shop.openenergymonitor.com/rfm69pi-433mhz-raspberry-pi-base-station-receiver-board/) which works the same as the emonPi Shield PCB just without the local energy monitoring capability. The Raspberry Pi on the emonBase runs exactly the same emonSD software as the emonPi


## Hardware Overview

As the diagram above shows the Atmega328 microprocessor communicates with the RaspberyPi via the internal UART `(/dev/ttyAMA0` serial port. Data is transmitted over serial using the [JeeLib packet format](http://jeelabs.org/2011/06/09/rf12-packet-format-and-design/). The ATmega328 on the emonPi / RFM69Pi run a modifed version of [JeeLabs RFM12Demo Sketch](http://jeelabs.net/projects/jeelib/wiki/RF12demo).

### RF

The emonPi / RFM69Pi uses the HopeRF RFM69CW RF module to recieve data from other wireless nodes (emonTx, emonTH etc) using 433Mhz. Each RF node is required to be on the same network group (default 210) and have an unique node ID. Data is transmitted over serial using the [JeeLib packet format](http://jeelabs.org/2011/06/09/rf12-packet-format-and-design/). EmonHub python service on the Raspberry Pi requires a corresponding node decoder entry in `emonhub.conf` for each RF node. See emonHub in software section below. For more info on RF see [Resources > Building blocks](/technical/resources).


### Energy Monitoring

Energy monitoring on the emonPi and emonTx is acheved using [emonLib](https://github.com/openenergymonitor/emonlib) discrete sampling and the ATmega328's 10-bit ADC. See [Resources > Building blocks](/technical/resources).

### Pulse Counting

Pulse couting on the emonPi and emonTx uses ATmega328's 2nd hardware interrupt IRQ1. The first hardware interrupt IRQ0 is used by the RFM69CW. Only one pulse couter input is possible per emonTx/emonPi. See [optical pulse counter documentaion](https://openenergymonitor.org/emon/opticalpulsesensor).

## Software Overview


EmonHub python service




