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
2. Plug CT sensors into the EmonTx first and then clip around either the **Line** or **Neutral** cable of the AC circuits that you wish to measure.
3. Attach temperature sensors or/and pulse sensor as required.
3. Plug in and connect the AC-AC adapter to provide voltage measurement and power.

**EmonBase**

1. Connect Ethernet before powering up the emonBase if using Ethernet.
2. Plug in USB power supply and connect micro-USB cable.
3. Continue to guides: [Connect](/setup/connect) and [Log Locally](/setup/local) to setup the software.

#### {% linkable_title 1. **Installing CT sensors** %}

<p class='note warning'>
<a href="https://learn.openenergymonitor.org/electricity-monitoring/ct-sensors/installation">Please read the CT installation guide before installing.</a>
Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated; i.e., switch off the power prior to installing your sensors and proceed slowly with care. If you have any doubts, seek professional assistance.
</p>


- Connect the CT jack plug to either CT1, CT2, CT3 or CT4 socket on the emonTx first
- Clip the CT sensor around either the **Line** or **Neutral** cable of circuits that you wish to measure
- If the power reading is negative, reverse the CT sensor orientation
- CT sensor cable should not be extended to avoid induced noise
- For Solar PV install see [Solar PV Application page](/applications/solar-pv/#sensor-installation)
- [Learn more about how CT sensors work...](https://learn.openenergymonitor.org/electricity-monitoring/voltage-sensing/measuring-voltage-with-an-acac-power-adapter)

<p class='note'>
The clip-on CT sensors must be clipped round either the Line or Neutral AC wire. <strong>NOT BOTH</strong>.
</p>

![CT sensor installation ](/images/applications/solar-pv/ctinstall.jpg)

#### {% linkable_title 2. **AC-AC Adapter** %}
- Plug the AC-AC adapter into a power outlet
- This may require installation of a new outlet or extending an existing one
- AC-AC adapter cable can be extended if required
- Plug power connector into the AC socket on the emonTx
- Essential for [Solar PV monitoring](/applications/solar-pv/#sensor-installation)
- Provides AC waveform reference for accurate Real Power measurements.
- [Learn more about measuring voltage with AC-AC power adapator...](https://learn.openenergymonitor.org/electricity-monitoring/voltage-sensing/measuring-voltage-with-an-acac-power-adapter)

#### {% linkable_title 3. *Optical Utility Meter LED Pulse Sensor (optional)* %}
- See [Optical Pulse Sensor setup page](http://openenergymonitor.org/emon/opticalpulsesensor)
- Connects to emonTx via RJ45 connector
- Self-adhesive velcro attachment to utility meter
- One optical pulse sensor per emonTx
- Can be used in conjunction with temperature sensors using [RJ45 Breakout](http://shop.openenergymonitor.com/rj45-expander-for-ds18b20-pulse-sensors/)

#### {% linkable_title 4. *Temperature Sensors (optional)* %}
- Connect to emonTx via RJ45 connector.
- Up to 6x [RJ45 sensors](https://shop.openenergymonitor.com/rj45-encapsulated-ds18b20-temperature-sensor/) can be connected using the [RJ45 expander](http://shop.openenergymonitor.com/rj45-expander-for-ds18b20-pulse-sensors/).
- Up to 6x [wired sensors](https://shop.openenergymonitor.com/encapsulated-ds18b20-temperature-sensor/) can be connected using the [terminal block breakout board](https://shop.openenergymonitor.com/rj45-to-terminal-block-breakout-for-ds18b20/).
- Sensor wire can be extended using RJ45 cable and the [RJ45 Extender](http://shop.openenergymonitor.com/rj45-extender/).

#### {% linkable_title 5. *DC 5V USB Adapter (optional)* %}

For use when using an EmonTx in conjunction with an [ESP8266 WiFi Adapter](https://shop.openenergymonitor.com/esp8266-wifi-adapter-for-emontx/).

- Plug the DC 5V USB adapter into a power outlet
- Plug the mini-B USB connector into the emonTx

---

- Firmware
- Data packet contents
- Firmware modification
- Connecting multiple emontx units
- Serial configuration
- Updating firmware
- Power supply jumper modification
- 3 phase
- RFM69Pi adapter board on the pi
- Hardware schematics and info 
