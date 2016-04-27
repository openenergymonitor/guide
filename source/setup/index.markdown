---
layout: page
title: Hardware
description: Getting started with OpenEnergyMonitor
date: "2014-12-18 22:57"
sidebar: true
comments: false
sharing: false
footer: true
published: true
---

### [Next step: Connect &raquo;](/setup/connect/)

<div class='install-instructions-container' markdown='0'>
<input name='install-instructions' type='radio' id='home-energy-hardware' checked>
<input name='install-instructions' type='radio' id='solar-pv-hardware'>
<input name='install-instructions' type='radio' id='temperature-hardware'>

<label class='menu-selector energy' for='home-energy-hardware'>Home Energy</label>
<label class='menu-selector solarpv' for='solar-pv-hardware'>Solar PV</label>
<label class='menu-selector temperature' for='temperature-hardware'>Temperature</label>

<div class='install-instructions energy' markdown='1'>


### {% linkable_title Home Energy Hardware %}

> The OpenEnergyMonitor system can be used as a simple home energy monitoring system for analyzing real-time power use and > daily energy consumption.

___


*All hardware is based on the [Arduino](http://www.arduino.cc/) and [Raspberry Pi](http://raspberrypi.org) platforms and is fully open-source.*

#### **[emonPi](https://shop.openenergymonitor.com/emonpi-3/)**

- Raspberry Pi-based energy monitor
- Install next to utility meter
- Local & remote data logging with [Emoncms](https://emoncms.org/), our open-source web-app for processing, logging and visualising energy and other environmental data, such as humidity and temperature
- Requires WiFi / Ethernet plus 2 x power outlets
- Requires [pre-built SD card image](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Repository-&-Change-Log) (included)

<p><small>Raspberry Pi is a registered trademark of the <a href="https://www.raspberrypi.org/about/">Raspberry Pi Foundation</a></small></p>

#### Sensors Required:

 - 1 X [Clip-on CT sensors](https://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/) (the emonPi can accept up to two CT sensors; one is included as standard with the emonPi)
 - 1 x [AC-AC voltage sensor adapter](https://shop.openenergymonitor.com/components/) (optional but highly recommended)

#### Power Adapters Required:

 - 1 x [USB 5V DC PSU](https://shop.openenergymonitor.com/power-supplies/)


___

#### **[emonTx](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/)** (optional)

- Energy monitoring add-on node
- Optional add-on if more then two circuits need to be monitored or if WiFi / Ethernet connectivity is not available at the location of the utility meter
- RF Range is approximately similar to home WiFi and can be affected by obstacles e.g. thick stone walls
- Up to 2x emonTx can be connected to a single emonPi
- To connect an emonTx see: [Setup > Adding Energy Monitoring Node](/setup/emontx)

<p class='note'>
An emonTx can be powered by 3 x AA batteries; however, if possible, it is recommended to power the unit with an AC-AC adapter to provide an AC voltage reference for more accurate Real Power and VRMS calculations.
</p>

***

#### [emonBase](https://shop.openenergymonitor.com/emonbase-web-connected-base-station/) (emonPi Alternative)

   -  Web connected gateway: [Raspberry Pi](https://shop.openenergymonitor.com/raspberry-pi-2-web-connected-base-station/) + [RFM69Pi RF receiver board](https://shop.openenergymonitor.com/rfm69pi-433mhz-raspberry-pi-base-station-receiver-board/)
  -  No on-board energy monitoring functions
  -  Receive data via low power RF (433Mhz) from emonTx or emonTH
  -  Local & Remote Emoncms data logging
  -  Runs the same [software stack](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Repository-&-Change-Log) as the emonPi
  -  No LCD screen to display local IP address or shut-down button
  -  Knowledge of SSH highly desirable
  -  Requires [pre-built SD card image](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Repository-&-Change-Log) (optional extra)

***

#### [Optical Utility Meter LED Pulse Sensor](https://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor/) (Optional)

 - Optional add-on sensor for interfacing directly with utility meter
 - Compatible with emonPi & emonTx (one per unit)
 - Requires utility meter with LED pulse output
 - Reports exact amount of energy (Wh) reported by utility meter
 - Does not report instantaneous power
 - Best used in conjunction with clip-on CT sensor(s)



</div> <!-- END HOME ENERGY -->
<div class='install-instructions solarpv' markdown='1'>


### {% linkable_title Solar PV Hardware %}

___


#### **[emonPi](https://shop.openenergymonitor.com/emonpi-solar-pv/)**

- Raspberry Pi-based energy monitor
- Install next to utility meter
- Local & Remote Emoncms data logging
- Requires WiFi / Ethernet plus 2 x power outlets
- Single unit required to monitor solar PV, provided the generation and site-consumption feeds are in the same physical location and WiFi/Ethernet connectivity is accessible at this location
- Requires [pre-built SD card image](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Repository-&-Change-Log) (included)

<p><small>Raspberry Pi is a registered trademark of the <a href="https://www.raspberrypi.org/about/">Raspberry Pi Foundation</a></small></p>

#### **[emonTx](https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz/)** (optional)

- Energy monitoring add-on node
- Required if solar PV generation and site-consumption feeds are located in separate locations or if WiFi / Ethernet connectivity is not available at utility meter
- RF range is approximately similar to home WiFi and can be affected by obstacles e.g. thick stone walls
- Up to 2x emonTx can be connected to a single emonPi
- To connect an emonTx see: [Setup > Adding Energy Monitoring Node](/setup/emontx)

<p class='note'>
An emonTx can be powered by 3 x AA batteries, however this is not recommended for solar PV monitoring application since sensor adapter is require to determine direction of current flow and accurate VRMS & Real Power calculations.
</p>


#### Sensors:

 - 2 X [Clip-on CT sensors](https://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/) (included in emonPi solar PV bundle)
 - 1 x [AC-AC voltage sensor adapter](https://shop.openenergymonitor.com/components/) (included in emonPi solar PV bundle)

#### Power Adapters:

 - 1 x [USB 5V DC PSU](https://shop.openenergymonitor.com/power-supplies/)
 - *1 x [AC-AC voltage sensor adapter](https://shop.openenergymonitor.com/power-supplies/) (optional if using an emonTx but highly recommended)*

 ***

#### [emonBase](https://shop.openenergymonitor.com/emonbase-web-connected-base-station/) (emonPi Alternative)

  -  Web connected gateway: [Raspberry Pi](https://shop.openenergymonitor.com/raspberry-pi-2-web-connected-base-station/) + [RFM69Pi RF receiver board](https://shop.openenergymonitor.com/rfm69pi-433mhz-raspberry-pi-base-station-receiver-board/)
  -  No on-board energy monitoring functions
  -  Receive data via low power RF (433Mhz) from emonTx or emonTH
  -  Local & Remote Emoncms data logging
  -  Runs the same [software stack](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Repository-&-Change-Log) as the emonPi
  -  No LCD screen to display local IP address or shut-down button
  -  Knowledge of SSH highly desirable
  -  Requires [pre-built SD card image](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Repository-&-Change-Log) (optional extra)

 ***

#### [Optical Utility Meter LED Pulse Sensor](https://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor/) (Optional)

  - Optional add-on sensor for interfacing directly with utility meter
  - Compatible with emonPi & emonTx (one per unit)
  - Requires utility meter with LED pulse output
  - Reports exact amount of energy (Wh) reported by utility meter
  - Does not report instantaneous power
  - Best used in conjunction with clip-on CT sensor(s)










</div> <!-- END SOLAR PV -->
<div class='install-instructions temperature' markdown='1'>

### {% linkable_title Wireless Temperature Hardware %}
***


#### [emonTH](http://shop.openenergymonitor.com/emonth-433mhz-temperature-humidity-node/)
- Wireless temperature & humidity monitoring node
- Compatible with emonPi & emonBase
- 6 month battery life (2 x AA not included)
- Up to four emonTH can communicate to a single emonPi
- Internal temperature & humidity + optional external probe
- Optional pulse sensor input

{% img /images/setup/emonth-plant.png 400 %}

***

### {% linkable_title Wired Temperature Hardware %}



#### [DS18B20 sensor on RJ45](https://shop.openenergymonitor.com/rj45-encapsulated-ds18b20-temperature-sensor/)
  {% img https://cdn2.bigcommerce.com/server4400/98a75/products/144/images/633/IMG_5193__36054.1424864401.1280.1280.JPG?c=2 300 %}

 - Compatible with emonPi & emonTx
 - Up to x6 sensors can be connected to a single emonPi / emonTx using [RJ45 Breakout](http://shop.openenergymonitor.com/rj45-expander-for-ds18b20-pulse-sensors/)
 - Sensor wire can be extended using RJ45 cable and [RJ45 Extender](http://shop.openenergymonitor.com/rj45-extender/)



#### [DS18B20 sensor on wire](http://shop.openenergymonitor.com/encapsulated-ds18b20-temperature-sensor/)
{% img https://cdn2.bigcommerce.com/server4400/98a75/products/173/images/668/SWE2btesting__95144.1429694876.1280.1280.jpg?c=2 300 %}

- Compatible with emonTx terminal block
- Compatible with emonPi using [RJ45 Breakout](http://shop.openenergymonitor.com/rj45-to-terminal-block-breakout-for-ds18b20/)
- Up to 6x sensors can be connected to emonPi / emonTx using [RJ45 Breakout](http://shop.openenergymonitor.com/rj45-to-terminal-block-breakout-for-ds18b20/)













</div> <!-- END TEMP -->


</div>




***

### {% linkable_title Overview%}

![image](/images/setup/oemfpsystemdiagram.png)


### {% linkable_title Comparison Table%}

|                                    | emonPi  | emonBase  | emonTx  | emonTH |
|---|---|---|---|---|
| Main purpose                      | All-in-one energy monitor & gateway| Web-connected gateway | Energy monitor add-on | Temperature & Humidity room node |
| No. CT sensor inputs               |  2  |    0      |    4    |    0   |
| No. of voltage sensor inputs       |  1  |    0      |    1    |    0   |
| No. of pulse counting inputs       |  1 - via RJ45 |    0      |    1 - via RJ45   |    1 -  via terminal block*  |
| No. of temperature sensor inputs   |  6 - via RJ45** |    0      |    6 - via RJ45**   |    2 - internal + external  |
| No. of humidity sensor inputs      |  0 | 0 | 0 | 1
| Power supply                       |  5V USB mini-B  | 5V mico USB | 9V AC-AC / 3 x AAA | 2 x AA |
| Local data storage (Emoncms)      |  Yes | Yes | No | No |
| Requires additional base-station | No | No | Yes | Yes
| LCD Display | Yes | No | No | No

\* Requires manual wiring into terminal block

\* Requires RJ45 breakout board


#### {% linkable_title Use in USA%}

The emonPi and emonTx are designed to monitor single phase AC up to 100A. The system can work for some set-ups in USA with some changes to the configuration. Users in North America should consult the Building Blocks guide ['emonTx - Use in North America'](http://openenergymonitor.org/emon/buildingblocks/EmonTx-in-North-America) and forum thread discussions [[1]](http://openenergymonitor.org/emon/node/711) [[2]](http://openenergymonitor.org/emon/node/3265).

#### {% linkable_title Use with three-phase%}

The emonPi / emonTx have been designed for single-phase AC monitoring. The emonTx can monitor 'approximate' three-phase (assuming balanced phases) using [modified firmware](https://github.com/openenergymonitor/emonTxFirmware/tree/master/emonTxV3/RFM/emonTxV3.4/emonTxV3_4_3Phase_Voltage) and 3x CT sensors + 1 x AC-AC adapter. [Further reading](https://openenergymonitor.org/emon/buildingblocks/3-phase-power)

<br>

### [Next step: Connect &raquo;](/setup/connect/)

<br>

### Video Guide
<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/ZEa7neZesko" frameborder="0" allowfullscreen></iframe>
</div>
