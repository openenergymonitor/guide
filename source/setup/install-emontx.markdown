---
layout: page
title: Install EmonTx & emonBase
description: Physically install emonTx & emonBase
date: '2020-02-03 15:29'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The following guide details how to setup an EmonTx + EmonBase system. Covering an example with 2x CT sensors to monitor two AC circuits in a house and an ACAC Voltage sensor to allow real power calculation as well as power for the EmonTx unit itself. The EmonTx supports up to 4x CT sensors so the steps below can easily be extended to monitor additional circuits. 

In this example the EmonTx transmits AC power, voltage and temperature sensor measurements (if connected) every 10s via 433 Mhz radio to the emonBase basestation. 

The emonBase basestation consists of a RaspberryPi and an RFM69Pi adapter board to recieve the 433Mhz radio packets from the EmonTx. The emonBase runs our emonSD software including emoncms for full local data logging and visualisation capability.

*New 2019: The EmonTx firmware now supports higher accuracy continuous monitoring as standard - if powered from an ACAC adapter or USB power.*

![emontx and emonbase](/images/setup/emontxemonbase.jpg)

A typical EmonTx & EmonBase system consists of:

- 1x [EmonTx (includes antennae and wall mounts)](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/)
- 1-4x [100A CT sensors](https://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/)
- 1x [ACAC Voltage sensor](https://shop.openenergymonitor.com/ac-ac-power-supply-adapter-ac-voltage-sensor-uk-plug/)
- 1x [EmonBase (RaspberryPi + RFM69Pi adapter board + Enclosure + emonSD card)](https://shop.openenergymonitor.com/emonbase-web-connected-base-station/)
- 1x [USB Power supply](https://shop.openenergymonitor.com/5v-dc-usb-power-adapter-uk-plug/) and [micro-USB cable](https://shop.openenergymonitor.com/micro-usb-cable-20-awg-emonbase/)

#### Example EmonTx sensor node installation

In this example installation the total house electricity consumption is measured using the CT sensor attached to the brown cable (main feed to the house). Another CT sensor is located inside the main consumer unit, in this case monitoring the electricity supply to a heat pump.

A dedicated socket was installed for the AC-AC Voltage sensor and combined power supply. 

A RFM69 433 Mhz antennae is attached and also a DS18B20 temperature sensor connected to the EmonTx RJ45 Temperature and Pulse input socket.

![emontx install](/images/setup/emontx_install.JPG)

The EmonTx transmits real power, cumulative watt-hours, mains voltage and temperature measurements every 10s over RFM69 radio to an emonBase connected via Ethernet to the internet router in the livingroom.

#### Installation overview

**EmonTx**

1. Mount emonTx in desired location, use wall mounts if required, attach antennae.
2. Plug CT sensors into the EmonTx first and then clip around either the **Line** or **Neutral** cable of the AC circuits that you wish to measure. If the power reading is negative, reverse the CT sensor orientation. [Please read the CT installation guide before installing](https://learn.openenergymonitor.org/electricity-monitoring/ct-sensors/installation).
3. Attach temperature sensors or/and pulse sensor as required. See guides: [+ Add Temperature Nodes](/setup/emonth) and [+ Add Optical Pulse Sensor](/setup/optical-pulse-sensor).
    
3. Plug in and connect the AC-AC adapter to provide voltage measurement and power. This may require installation of a new outlet or extending an existing one.

**EmonBase**

1. Connect Ethernet before powering up the emonBase if using Ethernet.
2. Plug in USB power supply and connect micro-USB cable.

That's the hardware setup done! The next step is to configure the network connection and setup the emonBase to log data locally or/and post data to a remote server such as emoncms.org. 

Continue to guides: [1. Connect](/setup/connect), [2. Log Locally](/setup/local) and [3. Log Remotely](/setup/remote) to setup the software.

#### Advanced

**Configure RF Node ID**<br>
Multiple emonTx unit's can operate on a single network posting to a single emonBase web-connected base station, each emonTx on the same network group must have an unique node ID. The nodeID can be selected at time of purchase or set using the on-board DIP switch to toggle. If more than two emonTx's are required on the same network then further nodeID values can be set via RF node ID serial config.

<img src="/images/setup/EmonTx_V3.4_DIP_Switch.jpg" style="max-width:400px; float:right; padding:0 0 10px 10px">

The image on the right shows the DIP switch configuration looking at the emonTx with the CT sensor inputs at the top of the board. Move the top switch D9 to the left to select USA ACAC Voltage calibration. **Move the bottom switch D8 to the left to select RF node ID 16 rather than 15.**

**Serial Configuration**<br>
It's possible to set the emonTx radio settings, sensor calibration and other properties over serial. See [Github PDF: Configuration of RF Module & on-line calibration](https://github.com/openenergymonitor/EmonTxV3CM/blob/v1.6/Config.pdf) for full details.

**Firmware**<br>
The emonTx firmware is based on Arduino. Alternative or customised firmware sketches can be uploaded using Arduino IDE or PlatformIO and a USB to UART cable. The emonTx comes pre-loaded with the EmonTxV3CM Continuous Sampling firmware as standard for single phase operation. If you bought the EmonTx with the battery holder option it will come with the Discreet Sampling firmware.

- [EmonTxV3CM Continuous Sampling firmware](https://github.com/openenergymonitor/EmonTxV3CM)
- [EmonTx Discreet Sampling firmware](https://github.com/openenergymonitor/emontx3)
- [3-phase firmware](https://github.com/openenergymonitor/emontx-3phase)



**Power supply jumper modification**<br>

**3 Phase**<br>

- Data packet contents
- Serial configuration
- RFM69Pi adapter board on the pi
- Hardware schematics and info 
