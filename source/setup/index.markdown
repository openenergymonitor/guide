---
layout: page
title: System Overview
description: Getting started with OpenEnergyMonitor
date: '2014-12-18 22:57'
sidebar: true
comments: false
sharing: false
footer: true
published: true
---

The OpenEnergyMonitor system  has the capability to monitor electrical energy use / generation, temperature and humidity.

The system is made up of five main units. These can be assembled and configured to work for a variety of [applications](/applications). The system is fully open-source, both hardware and software. All hardware is based on the [Arduino](http://www.arduino.cc/) and [Raspberry Pi](http://raspberrypi.org) platforms:

![image](/images/setup/oemfpsystemdiagram.png)

### Example configurations

---

**EmonPi (£169.59 exc VAT, £203.51 inc VAT)**<br>
All in one, 2x CT inputs, 1x ACAC Voltage input, Temperature and pulse input, LCD Display, Integrated RaspberryPi with Emoncms for local data logging. Wifi or Ethernet connectivity. Designed for single phase home solar and consumption monitoring.

![image](/images/setup/emonpi.png)

---

**EmonTx + EmonBase (£138.04 exc VAT, £165.65 inc VAT)**<br>
Seperate sensor node and base station linked by 433Mhz radio, 4x CT inputs, 1x ACAC Voltage input, Temperature and pulse input. RaspberryPi Base station with Emoncms for local data logging. Wifi or Ethernet connectivity. Applications: Home solar, consumption, multiple circuits, 3-phase.

![image](/images/setup/emontxandbase.png)

*New 2019: EmonTx firmware supports higher accuracy continuous monitoring.*

---

**EmonTx + ESP8266 (£105.29 exc VAT, £126.35 inc VAT)**<br>
Using and ESP8266 Adapter the EmonTx can send data directly to a remote emoncms server such as emoncms.org. It is also possible to use an ESP8266 adapter with an EmonTx to send data to an emonPi or emonBase basestation to improve reliability where 433Mhz is not sufficient.

![image](/images/setup/emontx.png)

*Note: Without local data logging this approach can incur additional service costs via the remote server.*

---

**EmonTx + EmonPi**<br>
An EmonPi and emonBase can be extended with up to 30 wireless 433 MHz sensor nodes. As an example it is possible to add an EmonTx to gain an additional 4x CT inputs. 

![image](/images/setup/emontxandemonpi.png)

*Note: sensor node transmit timing is not synchronised and so packet collisions increase with the number of nodes. In practice we recommend not more than 10 nodes per base station.*

---

**EmonTH**

![image](/images/setup/emonth.png)

---

**DS18B20 Temperature sensor**

<img src="/images/hardwareimages/rj45_sensor.png" style="width:120px; padding:20px">

---

**Optical pulse sensor**

<img src="/images/setup/ops.png" style="width:120px; padding:20px">

---

### Choosing a system configuration

**1. How many AC circuits do you wish to measure?**<br>
The basic emonPi configuration supports 2x CT sensor inputs. A basic emonTx + emonBase configuration supports 4x CT sensor inputs. Both configurations can be extended to increase the number of CT inputs by adding additional emonTx units (4x CT sensor inputs per emonTx).

**2. Is the system single phase or 3 phase?**<br>
Our units are primarily designed for single-phase operation, however the emonTx can be configured for 3 phase energy monitoring with 3-phase firmware. This firmware measures the current on all three phases but only voltage on the first phase. See [EmonTx 3-Phase Firmware](https://github.com/openenergymonitor/emontx-3phase) for full details. An EmonTx can support one set of 3-phase measurements, for applications requiring 3-phase measurement of multiple circuits e.g 3 phase SolarPV & Grid Import/Export, multiple emonTx units will be required.


3. Do you have an AC Socket nearby for power supply and an ACAC Voltage sensor?
4. Ethernet or WiFi for connectivity?
5. Number of room temperature and humidity sensors required
6. Other temperature sensing with RJ45 sensors
7. Pulse counting?
8. How important is having a basestation status display to you? Easy access to IP address.

