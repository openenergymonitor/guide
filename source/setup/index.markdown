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

### {% linkable_title Example configurations %}

---

**EmonPi**<br>
All in one, 2x CT inputs, 1x ACAC Voltage input, Temperature and pulse input, LCD Display, Integrated RaspberryPi with Emoncms for local data logging. Wifi or Ethernet connectivity. Designed for single phase home solar and consumption monitoring.

![image](/images/setup/emonpi.png)

**[Installation Guide](/setup/install)** | **[EmonPi Technical](/technical/emonpi)** | **[View in Shop](https://shop.openenergymonitor.com/emonpi-3/)**

---

**EmonTx + EmonBase**<br>
Seperate sensor node and base station linked by 433Mhz radio, 4x CT inputs, 1x ACAC Voltage input, Temperature and pulse input. RaspberryPi Base station with Emoncms for local data logging. Wifi or Ethernet connectivity. Applications: Home solar, consumption, multiple circuits, 3-phase.

![image](/images/setup/emontxandbase.png)

*New 2019: EmonTx firmware supports higher accuracy continuous monitoring.*

**[Installation Guide](/setup/install-emontx)** | **[EmonTx Technical](/technical/emontx)**<br> **View in Shop: [EmonTx](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/) & [EmonBase](https://shop.openenergymonitor.com/emonbase-web-connected-base-station/)**

---

**EmonTx + ESP8266**<br>
Using and ESP8266 Adapter the EmonTx can send data directly to a remote emoncms server such as emoncms.org. It is also possible to use an ESP8266 adapter with an EmonTx to send data to an emonPi or emonBase basestation to improve reliability where 433Mhz is not sufficient.

![image](/images/setup/emontx.png)

*Note: Without local data logging this approach can incur additional service costs via the remote server.*

**[Installation Guide](/setup/esp8266-adapter-emontx/)** | **[EmonTx Technical](/technical/emontx)**<br>**View in Shop: [EmonTx](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/) & [ESP8266 WiFi Adapter](https://shop.openenergymonitor.com/esp8266-wifi-adapter-for-emontx/)**

---

**EmonTx + EmonPi**<br>
An EmonPi and emonBase can be extended with up to 30 wireless 433 MHz sensor nodes. As an example it is possible to add an EmonTx to gain an additional 4x CT inputs. 

![image](/images/setup/emontxandemonpi.png)

*Note: sensor node transmit timing is not synchronised and so packet collisions increase with the number of nodes. In practice we recommend not more than 10 nodes per base station.*

**[EmonPi Installation Guide](/setup/install) [+ Add Additional emonTx](/setup/emontx/)** | **[EmonPi Technical](/technical/emonpi)** | **[View in Shop](https://shop.openenergymonitor.com/emonpi-3/)**

---

**EmonTH**<br>
Add wireless temperature & humidity monitoring nodes to an emonPi or emonBase base station. Ideal for room based temperature & humidity sensing.

![image](/images/setup/emonth.png)

**[Installation Guide](/setup/emonth)** | **[View in Shop](https://shop.openenergymonitor.com/emonth-v2-temperature-humidity-node/)**

---

**DS18B20 Temperature sensor**<br>
Wired one-wire DS18B20 temperature sensors can be added to both the emonTx and emonPi via RJ45 connection. Ideal for measuring space and hot water system temperatures, or an outside ambient air temperature measurement.

<img src="/images/hardwareimages/rj45_sensor.png" style="width:120px; padding:20px">

**[View in Shop](https://shop.openenergymonitor.com/rj45-encapsulated-ds18b20-temperature-sensor/)**

---

**Optical pulse sensor**<br>
Add an optical pulse sensor to an emonTx or emonPi to count energy meter pulses.

<img src="/images/setup/ops.png" style="width:120px; padding:20px">

**[Installation Guide](/setup/optical-pulse-sensor)** | **[View in Shop](https://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor/)**

---

### {% linkable_title Example Applications %}

- [Home Energy Monitor](/applications/home-energy/)
- [Solar PV](/applications/solar-pv/)
- [Home Energy Monitor](http://heatpumpmonitor.org)

---

### {% linkable_title Choosing a system configuration %}

**1. How many AC circuits do you wish to measure?**<br>
The basic emonPi configuration supports 2x CT sensor inputs. A basic emonTx + emonBase configuration supports 4x CT sensor inputs. Both configurations can be extended to increase the number of CT inputs by adding additional emonTx units (4x CT sensor inputs per emonTx).

**2. Is the system single phase or 3 phase?**<br>
Our units are primarily designed for single-phase operation, however the emonTx can be configured for 3 phase energy monitoring with 3-phase firmware. This firmware measures the current on all three phases but only voltage on the first phase. See [EmonTx 3-Phase Firmware](https://github.com/openenergymonitor/emontx-3phase) for full details. An EmonTx can support one set of 3-phase measurements, for applications requiring 3-phase measurement of multiple circuits e.g 3 phase SolarPV & Grid Import/Export, multiple emonTx units will be required.

**3. Do you have an AC Socket nearby for power supply and an ACAC Voltage sensor?**<br>
The emonPi requires an AC socket near the meter cabinet both for power and to provide an AC voltage signal. The emonTx also gives best results if used with an AC voltage sensor. If the meter location does not have an accessible AC socket and its not possible to install a socket; it is possible to power the emonTx with batteries and measure AC current only and calculate an approximate apparent power measurement. Select ['3 X AA Battery Holder' under the power supply section when buying an emonTx](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/) for this option. Note that the discreet sampling firmware will be installed which puts the emonTx to sleep between readings to extend battery life.

**4. Ethernet or WiFi for connectivity?**<br>
Both the emonPi and emonTx + emonBase systems support WiFi and Ethernet provided by the RaspberryPi. To use Ethernet with the emonPi, ethernet is required at the metering location. The emonTx + emonBase configuration allows for seperation of the metering location and the base station which can be located next to your internet router.

**5. Number of room temperature and humidity sensors required**<br>
Both the emonPi and emonBase based systems support receiving data from up to 30 wireless 433MHz radio nodes, including multiple emontx units and emonTH temperature and humidity nodes.

**6. Wired temperature sensing with RJ45 DS18B20 sensors**<br>
Both the emonPi and emonTx support wired temperature sensing using the RJ45 socket. The emonTx includes a terminal block for DS18B20 sensors without the RJ45 socket.

**7. Pulse counting?**<br>
Both the emonPi and emonTx support a single pulse counting input using the RJ45 socket.

**8. How important is having a basestation status display to you?**<br>
The emonPi includes an LCD Display for easy access to the emonPi network IP address. This can simplify setup on networks where hostnames are unreliable. The emonBase does not include an LCD display and so requires either the hostname to work (e.g emonpi.local) or device detection using the routers device list or using tools such as [Fing Android](https://play.google.com/store/apps/details?id=com.overlook.android.fing&hl=en_GB) or [Fing iOS](https://itunes.apple.com/gb/app/fing-network-scanner/id430921107?mt=8).

For further Q&A you may find the [community forum FAQ](https://community.openenergymonitor.org/t/frequently-asked-questions/3005) useful.
