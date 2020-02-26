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

The system is made up of five main units. These can be configured to work for a variety of [applications](/applications). The system is fully open-source, both hardware and software. All hardware is based on the [Arduino](http://www.arduino.cc/) and [Raspberry Pi](http://raspberrypi.org) platforms.

![image](/images/setup/oemfpsystemdiagram.png)

<img src="/images/setup/emonpi-min.png" style="float:left; width:50px; margin-right:10px"><b><a href="/technical/emonpi">emonPi:</a></b> An all in one 2 circuit energy monitor and base-station which collects data, hosts the emonCMS software and can also receive data from other sensor nodes.<br><br>

<img src="/images/setup/emonbase-min.png" style="float:left; width:50px; margin-right:10px"><b><a href="/setup/install-emontx">emonBase:</a></b> A simple base-station that receives data sent from wireless sensor nodes. Hosts the emonCMS software for full local data logging and visualisation capability.
<br><br>

<img src="/images/setup/emontx-min.png" style="float:left; width:50px; margin-right:10px"><b><a href="/technical/emontx">emonTx:</a></b> A 4 circuit energy monitoring node. Transmits data via an inbuilt 433MHz radio to an emonBase or emonPi. It can also send data via an ESP8266 WiFi adapter or directly by a serial connection.<br><br>

<img src="/images/setup/emonth-min.png" style="float:left; width:50px; margin-right:10px"><b><a href="/setup/emonth">emonTh:</a></b> A wireless room based temperature & humidity monitoring node. Transmits data via 433MHz radio to an emonBase or emonPi.
<br><br>

<img src="/images/setup/emoncms-min.png" style="float:left; width:50px; margin-right:10px"><b><a href="/emoncms/coreconcepts">emonCMS:</a></b> An open-source web application, for processing, logging and visualising energy, temperature and other data. Runs locally on the emonPi and emonBase, also available remotely via emoncms.org.
<br><br>

<div style="height:1px; background-color:#eee; margin-bottom:20px"></div>

<img src="/images/setup/ctsensor.png" style="float:left; width:50px; margin-right:10px"><b>CT sensor:</b> Current transformer. Used for measuring AC current. We use a non-invasive clip-on sensor for ease of installation and safety.
<br><br>

<img src="/images/setup/voltagesensor.png" style="float:left; width:50px; margin-right:10px"><b>ACAC Voltage sensor:</b> An AC-AC Voltage adapter, used for measuring AC Voltage safely. Used in conjunction with the AC current measurement to calculate power consumption accurately.
<br><br>
<br>


### {% linkable_title Example configurations %}

---

**emonPi**<br>
All in one energy monitor. 2x CT sensor inputs, 1x ACAC Voltage sensor input, temperature and pulse input, LCD Display. Integrated RaspberryPi with emonCMS for local data logging. Wifi or Ethernet connectivity. Designed for single phase home solar and monitoring energy consumption.

![image](/images/setup/emonpi.png)

**[Installation Guide](/setup/install)** \| **[emonPi Technical](/technical/emonpi)** \| **[View in Shop](https://shop.openenergymonitor.com/emonpi-3/)**

---

**emonTx + emonBase**<br>
Separate sensor node and base station linked by 433MHz radio, 4x CT sensor inputs, 1x ACAC Voltage sensor input, temperature and pulse input. RaspberryPi Base station with emonCMS for local data logging. Wifi or Ethernet connectivity. Applications: Home solar, consumption, multiple circuits, 3-phase.

![image](/images/setup/emontxandbase.png)

*New 2019: emonTx firmware supports higher accuracy continuous monitoring.*

**[Installation Guide](/setup/install-emontx)** \| **[emonTx Technical](/technical/emontx)**<br> **View in Shop: [emonTx](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/) & [emonBase](https://shop.openenergymonitor.com/emonbase-web-connected-base-station/)**

---

**emonTx + ESP8266 WiFi**<br>
Using and ESP8266 WiFi Adapter the emonTx can send data directly to a remote emonCMS server such as emoncms.org. It is also possible to use an ESP8266 WiFi adapter with an emonTx to send data to an emonPi or emonBase to improve reliability where 433MHz is not sufficient.

![image](/images/setup/emontx.png)

*Note: Without local data logging this approach can incur additional service costs via the remote server.*

**[Installation Guide](/setup/esp8266-adapter-emontx/)** \| **[emonTx Technical](/technical/emontx)**<br>**View in Shop: [emonTx](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/) & [ESP8266 WiFi Adapter](https://shop.openenergymonitor.com/esp8266-wifi-adapter-for-emontx/)**

---

**emonTx + emonPi**<br>
It also possible to add one or more emonTx units to an emonPi to gain additional CT sensor inputs. 

![image](/images/setup/emontxandemonpi.png)

*Note: sensor node transmit timing is not synchronised and so packet collisions increase with the number of nodes. In practice we recommend not more than 10 nodes per base station.*

**[emonPi Installation Guide](/setup/install) [+ Add Additional emonTx](/setup/emontx/)** \| **[emonPi Technical](/technical/emonpi)** \| **[View in Shop](https://shop.openenergymonitor.com/emonpi-3/)**

---

### {% linkable_title Example Applications %}

- [Home Energy Monitor](/applications/home-energy/)
- [Solar PV](/applications/solar-pv/)
- [Heatpump Monitoring](http://heatpumpmonitor.org)

---

### {% linkable_title Choosing a system configuration %}

**1. How many AC circuits do you wish to measure?**<br>
The basic emonPi configuration supports 2x CT sensor inputs. A basic emonTx + emonBase configuration supports 4x CT sensor inputs. Both configurations can be extended to increase the number of CT inputs by adding additional emonTx units (4x CT sensor inputs per emonTx).

**2. Is the system single phase or 3 phase?**<br>
Our units are primarily designed for single-phase operation, however the emonTx can be configured for 3 phase energy monitoring with 3-phase firmware. This firmware measures the current on all three phases but only voltage on the first phase. See [emonTx 3-Phase Firmware](https://github.com/openenergymonitor/emontx-3phase) for full details. An emonTx can support one set of 3-phase measurements, for applications requiring 3-phase measurement of multiple circuits e.g 3 phase SolarPV & Grid Import/Export, multiple emonTx units will be required.

**3. Do you have an AC Socket nearby for power supply and an ACAC Voltage sensor?**<br>
The emonPi requires an AC socket near the meter cabinet both for power and to provide an AC voltage signal. The emonTx also gives best results if used with an AC voltage sensor. If the meter location does not have an accessible AC socket and its not possible to install a socket; it is possible to power the emonTx with batteries and measure AC current only and calculate an approximate apparent power measurement. Select ['3 X AA Battery Holder' under the power supply section when buying an emonTx](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/) for this option. Note that the discreet sampling firmware will be installed which puts the emonTx to sleep between readings to extend battery life.

**4. Ethernet or WiFi for connectivity?**<br>
Both the emonPi and emonTx + emonBase systems support WiFi and Ethernet provided by the RaspberryPi. To use Ethernet with the emonPi, ethernet is required at the metering location. The emonTx + emonBase configuration allows for separation of the metering location and the base station which can be located next to your internet router.

**5. Number of room temperature and humidity sensors required**<br>
Both the emonPi and emonBase based systems support receiving data from up to 30 wireless 433MHz radio nodes, including multiple emontx units and emonTH temperature and humidity nodes.

**6. Wired temperature sensing with RJ45 DS18B20 sensors**<br>
Both the emonPi and emonTx support wired temperature sensing using the RJ45 socket. The emonTx includes a terminal block for DS18B20 sensors without the RJ45 plug. The terminal block can also be used for the pulse input.

**7. Pulse counting?**<br>
Both the emonPi and emonTx support a single pulse counting input using the RJ45 socket.

**8. How important is having a basestation status display to you?**<br>
The emonPi includes an LCD Display for easy access to the emonPi network IP address. This can simplify setup on networks where hostnames are unreliable. The emonBase does not include an LCD display and so requires either the hostname to work (e.g emonpi.local) or device detection using the routers device list or using tools such as [Fing Android](https://play.google.com/store/apps/details?id=com.overlook.android.fing&hl=en_GB) or [Fing iOS](https://itunes.apple.com/gb/app/fing-network-scanner/id430921107?mt=8).

For further Q&A you may find the [community forum FAQ](https://community.openenergymonitor.org/t/frequently-asked-questions/3005) useful.
