---
layout: page
title: EmonPi
description: emonPi Technical Overview
date: "2015-05-11 12:00"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The emonPi is an all-in-one Raspberry Pi based energy monitoring unit making for a simple installation where Ethernet or WiFi is available at the meter location.

The emonPi can monitor two single-phase AC circuits using clip-on CT sensors. The emonPi can also monitor temperature, and interface directly with a utility meter via an optical pulse sensor.

![emonpi](/images/hardwareimages/emonPi_shop_photo.png)

**Features:**

- 2x CT Sensor inputs for single-phase AC electricity monitoring
- 1x AC voltage measurement using plug-in AC-AC adapter for real power calculation alongside current measurement from CT sensors
- Support for multiple wired one-wire DS18B20 temperature sensors via RJ45 socket
- Support for pulse counting either wired or via Optical Pulse Sensor
- 433 Mhz RFM69 radio transceiver for receiving data from additional energy monitoring or temperature and humidity nodes.
- The emonPi measurement board is based on Arduino (Atmega328). This talks to an integrated Raspberry Pi running our emonSD software stack on it's SD card.
- Full local data logging and visualisation capability using the emonSD Emoncms software stack. Data can also be sent to a remote emoncms server such as emoncms.org.
- Network connectivity via either Ethernet or WiFi.
- **LCD Display:** for easier setup, displays network IP address and sensor status.
- **Push button:** for shutdown and enabling/disabling SSH access.

## {% linkable_title EmonPi Internals %}

The emonPi is based on a RaspberryPi + emonPi measurement board. The emonPi measurement board is based on an ATmega328p 8-bit microcontroller running Arduino based firmware. The following video gives a good overview of what is inside an emonPi. Note that we currently ship RaspberryPi version 3b+ which has WiFi onboard rather than the older version featured in this video.

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/lc2LzCZnySo" frameborder="0" allowfullscreen></iframe>
</div>

EmonPi Wiki: [https://wiki.openenergymonitor.org/index.php/EmonPi](https://wiki.openenergymonitor.org/index.php/EmonPi)

## {% linkable_title System Overview %}

The following system diagram shows the main hardware and software components that make up the emonPi. On the left we have the emonPi measurement board based on the ATmega328 microcontroller with inputs from the different sensors, RFM69 433Mhz transceiver, button and I2C connection to the LCD. 

The Atmega328 microprocessor communicates with the Raspberry Pi via the internal UART serial port (/dev/ttyAMA0).

![emonPi system diagram](https://raw.githubusercontent.com/openenergymonitor/emonpi/master/docs/emonPi_System_Diagram.png)



### {% linkable_title RF %}

The emonPi uses the HopeRF RFM69CW RF module to receive data from other wireless nodes (emonTx, emonTH etc) using 433Mhz. We use the [JeeLib packet format](http://jeelabs.org/2011/06/09/rf12-packet-format-and-design/). Each RF node has a unique node ID but common network group (default 210). The ATmega328 runs a modified version of [JeeLabs RFM12Demo Sketch](http://jeelabs.net/projects/jeelib/wiki/RF12demo) to receive the data from radio nodes. Received radio packets are forwarded over serial and decoded on the RaspberryPi using EmonHub.

### {% linkable_title Energy Monitoring %}

Energy monitoring on the emonPi and emonTx is achieved using [emonLib](https://github.com/openenergymonitor/emonlib) discrete sampling and the ATmega328's 10-bit ADC. By default samples are taken once every 5 seconds.

(Add in links to CT input circuit design and EmonPi firmware here)

### {% linkable_title Pulse Counting %}

Pulse counting on the emonPi uses the hardware interrupt IRQ1 on the ATmega328. The first hardware interrupt IRQ0 is used by the RFM69CW. Only one pulse counter input is possible per emonTx/emonPi.

**See [Optical Pulse Sensor Resources](/technical/resources#optical-pulse-counter)**

## {% linkable_title Software Overview %}

The Raspberry Pi runs [Raspbian Buster Lite](https://www.raspberrypi.org/downloads/raspbian/). A pre-build SD card image (**emonSD**) is available to [purchase or download](https://github.com/openenergymonitor/emonpi/Docs/emonSD-pre-built-SD-card-Download-&-Change-Log) which has everything already set up.

### {% linkable_title emonSD features %}

 - emonPi LCD & Update service
 - Emoncms with low-write optimisations
 - Mosquitto MQTT server
 - emonHub service

**See [emonSD Resources](/technical/resources#emonhub)**

### {% linkable_title emonHub %}

emonHub (emonpi variant) is pre-installed on emonSD. EmonHub is a python service which receives the data from the emonPi via serial (in JeeLabs packet) format. emonHub decodes the data and publishes it to the emonPi's localhost Mosquitto MQTT server and ([if configured](/setup/remote)) remotely to [Emoncms.org](https://emoncms.org).

Corresponding EmonHub node-decoder entries must be present in emonhub config for each wireless RF node e.g. emonTx, emonTH. See configuring emonhub in the resources:

**See [emonHub Resources](/technical/resources#emonhub)**

---

### Specification

| Attribute                          | Parameter  | Link |
|---|---|---|---|---|
| Accuracy                           | >89% | [Further info](https://openenergymonitor.org/emon/buildingblocks/emontx-error-sources)
| Measuring Current (CT)                  |50mA-96A | [Further info](https://openenergymonitor.org/emon/buildingblocks/ct-sensors-interface)
| Measuring Voltage (AC-AC)                  | 1st: 110VAC-254VAC / 2nd: 9VAC-12VAC| [Further info](https://openenergymonitor.org/emon/buildingblocks/measuring-voltage-with-an-acac-power-adapter)
| Sample period                       |  5s  | [Discrete sampling](https://github.com/openenergymonitor/emonpi/blob/master/firmware/firmware/firmware.ino)
| Frequency | 433Mhz | [Identify RF module](https://openenergymonitor.org/emon/buildingblocks/which-radio-module)
| RF range | 40m-100m | [Antenna testing](https://blog.openenergymonitor.org/2014/03/emontx-v3-antenna-testing/)
| Power Consumption | 1.5W-2.5W RasPi2 / 2W-4W RasPi3 | [Further info](https://wiki.openenergymonitor.org/index.php/EmonPi#Electrical_Characteristics)
| Embodied Energy | 40KWh | [Further info]( https://wiki.openenergymonitor.org/index.php/EmonPi#Environmental_.26_Life_Cycle)
| Operating temperature | -25 to +80 DegC | [Further info](https://www.raspberrypi.org/help/faqs/#performanceOperatingTemperature)
| Physical Dimensions | 10cm x 8.5cm x 10cm | [Further info](https://wiki.openenergymonitor.org/index.php/EmonPi#Physical_Dimensions_.26_Fixtures)

