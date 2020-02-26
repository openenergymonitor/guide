---
layout: page
title: Install emonTx & emonBase
description: Physically install emonTx & emonBase
date: '2020-02-03 15:29'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The following guide details how to setup an [emonTx energy monitoring node](/technical/emontx) + emonBase system. Covering an example with 2x CT sensors to monitor two AC circuits in a house and an ACAC Voltage sensor to allow real power calculation as well as power for the emonTx unit itself. The emonTx supports up to 4x CT sensors so the steps below can easily be extended to monitor additional circuits. 

In this example the emonTx transmits AC power, voltage and temperature sensor measurements (if connected) every 10s via 433 MHz radio to the emonBase base-station. 

The emonBase base-station consists of a RaspberryPi and an RFM69Pi adapter board to receive the 433 MHz radio packets from the emonTx. The emonBase runs our emonSD software including emonCMS for full local data logging and visualisation capability.

*New 2019: The emonTx firmware now supports higher accuracy continuous monitoring as standard - if powered from an ACAC adapter or USB power. Alternative firmware options include: Discreet Sampling for battery operation and 3-phase firmware. See [emonTx technical](/technical/emontx)*.

![emontx and emonbase](/images/setup/emontxemonbase.jpg)

A typical emonTx & emonBase system consists of:

- 1x [emonTx (includes antennae and wall mounts)](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/)
- 1-4x [100A CT sensors](https://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/)
- 1x [ACAC Voltage sensor](https://shop.openenergymonitor.com/ac-ac-power-supply-adapter-ac-voltage-sensor-uk-plug/)
- 1x [emonBase (RaspberryPi + RFM69Pi adapter board + Enclosure + emonSD card)](https://shop.openenergymonitor.com/emonbase-web-connected-base-station/)
- 1x [USB Power supply](https://shop.openenergymonitor.com/5v-dc-usb-power-adapter-uk-plug/) and [micro-USB cable](https://shop.openenergymonitor.com/micro-usb-cable-20-awg-emonbase/)

### {% linkable_title Example emonTx sensor node installation %}

In this example installation the total house electricity consumption is measured using the CT sensor attached to the brown cable (main feed to the house). Another CT sensor is located inside the main consumer unit, in this case monitoring the electricity supply to a heat pump.

A dedicated socket was installed for the AC-AC Voltage sensor and combined power supply. 

A RFM69 433 MHz antennae is attached and also a DS18B20 temperature sensor connected to the emonTx RJ45 Temperature and Pulse input socket.

![emontx install](/images/setup/emontx_install.JPG)

The emonTx transmits real power, cumulative watt-hours, mains voltage and temperature measurements every 10s over RFM69 radio to an emonBase connected via Ethernet to the internet router in the living room.

### {% linkable_title Installation overview %}

**emonTx**

1. Mount emonTx in desired location, use wall mounts if required, attach antennae.
2. Plug CT sensors into the emonTx first and then clip around either the **Line** or **Neutral** cable of the AC circuits that you wish to measure. If the power reading is negative, reverse the CT sensor orientation. [Please read the CT installation guide before installing](https://learn.openenergymonitor.org/electricity-monitoring/ct-sensors/installation).
3. Attach temperature sensors or/and pulse sensor as required. See guides: [+ Add Temperature Nodes](/setup/emonth) and [+ Add Optical Pulse Sensor](/setup/optical-pulse-sensor).
    
3. Plug in and connect the AC-AC adapter to provide voltage measurement and power. This may require installation of a new outlet or extending an existing one.

**emonBase**

1. Connect Ethernet before powering up the emonBase if using Ethernet.
2. Plug in USB power supply and connect micro-USB cable.

That's the hardware setup done! The next step is to configure the network connection and setup the emonBase to log data locally or/and post data to a remote server such as emoncms.org. 

To setup the software continue to guides: 

- [1. Connect](/setup/connect)
- [2. Log Locally](/setup/local)
- [3. Log Remotely](/setup/remote)

For advanced emonTx configuration and alternative firmware options see:<br> [emonTx technical guide](/technical/emontx).
