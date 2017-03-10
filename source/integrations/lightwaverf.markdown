---
layout: page
title: "Lightwave RF"
description: "LightWAve RF OOK"
date: 2014-12-18 21:49
sidebar: true
comments: false
sharing: true
footer: true
---

LightWaveRF produce a [variety of RF plugs](http://www.megamanuk.com/lightwaverf/products/power-control/) and [relays](http://www.megamanuk.com/lightwaverf/products/inline-switching/jsjslw830/) which can be controlled via OOK ([on-off-keying](https://en.wikipedia.org/wiki/On-off_keying) RF. The LightWaveRF OOK protocol is also compatible with some [lower cost un-branded OOK learning receivers relays](http://www.ebay.co.uk/itm/321887470042?_trksid=p2057872.m2749.l2649&var=510834121070&ssPageName=STRK%3AMEBIDX%3AIT).

While not strictly open-source the LightWaveRF OOK protocol has been reverse engineered allowing plugs to be easily controlled from an Arduino / Raspberry Pi. There is an active [LightWaveRF](http://lightwaverfcommunity.org.uk/forum/) online community. Using off-the shelf hardware like this is a safer way to control lights, heaters and appliances around a home than getting our hands dirty with dangerously high voltages. These plugs and relays can be used to control anything from lights to immersion heaters, most LightWaveRF plugs/relays will switch up to 13A / 3kW.

**The latest emonSD emonPi / emonBase image includes a LightWaveRF MQTT service running by default. To use this feature you will need to add an OOK transmitter to the emonPi.**


## Hardware

An OOK transmitter can easily be added to the emonPi.  We stock [OOK transmitter modules in the OpenEnergyMonitor shop](http://shop.openenergymonitor.com/ook-on-off-keying-transmitter-433mhz/).

See [emonPi Technical Hardware Wiki](http://wiki.openenergymonitor.org/index.php?title=EmonPi#OOK) for details on how to retrofit an OOK TX module to an existing emonPi.

{% img /images/integrations/ook.jpg 200 %}

![emonPi LightWaveRF](/images/integrations/lwrf.png)

## Software

The latest emonSD emonPi / emonBase image includes a LightWaveRF MQTT service running by default. A plug can be controlled by publishing to the `lwrf/` MQTT topic:

**E.g Publishing `1 1` to `lwrf/` topic will switch on plug 1 while publishing `1 0` switches off plug 1.**

Plugs can be paired with the emonPi in the usual LightwaveRF way: either press and hold pairing button (if button exists) or turn on the plug from main power and send 'on' command. Most LightWaveRF plugs allow multiple (up to 6) control devices to be paired.

To reset the plug and delete all pairing: firstly, press and hold the pairing button to enter pairing mode; secondly, press and hold again to erase memory; lastly, press (but don't hold) once to confirm. For plugs without a pairing button turn on the plug from the mains power then in the first few seconds press the 'all off' button on the RF remote.

### [LightWaveRF Pi - MQTT Service GitHub](https://github.com/openenergymonitor/lightwaverf-pi)

*Note: The OOK RF protocol by its simplistic nature is not particularly secure, we would not recommend controlling anything you do not mind getting accidently switched. For critical switching applications and when more control (e.g. state feedback) is required we recomend using [MQTT WiFi Relay Thermostat](https://guide.openenergymonitor.org/integrations/mqtt-relay/).*

### Documenttion

- [LightWaveRF Pi - MQTT Service GitHub](https://github.com/openenergymonitor/lightwaverf-pi)
- [Adding OOK RF Transmitter to emonPi](https://wiki.openenergymonitor.org/index.php/EmonPi#LightWaveRF_OOK)

### Related blog posts

- [Controling LightWaveRF plugs using emonPi](https://blog.openenergymonitor.org/2015/11/remote-control-of-lightwave-rf-plugs/)

