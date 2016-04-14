---
layout: page
title: "Required Hardware"
description: "Getting started with OpenEnergyMonitor"
date: 2014-12-18 22:57
sidebar: true
comments: false
sharing: false
footer: true
---

<div class='install-instructions-container' markdown='0'>
<input name='install-instructions' type='radio' id='home-energy-hardware' checked>
<input name='install-instructions' type='radio' id='solar-pv-hardware'>
<input name='install-instructions' type='radio' id='temperature-hardware'>

<label class='menu-selector energy' for='home-energy-hardware'>Home Energy</label>
<label class='menu-selector solarpv' for='solar-pv-hardware'>Solar PV</label>
<label class='menu-selector temperature' for='temperature-hardware'>Temperature</label>

<div class='install-instructions energy' markdown='1'>
### {% linkable_title Home energy hardware %}

**emonPi**

- Raspberry Pi based energy monitor
- Install next to utility meter
- Local & Remote Emoncms logging
- Requires WiFi / Ethernet plus 2 x power sockets



**emonTx (optional)**

- Energy monitoring add-on node
- Optional add-on if more then two circuits need to be monitored or if WiFi / Ethernet connectivity is not available at utility meter.
- RF Range is approximately similar to home WiFi and can be affected by obstacles e.g. thick stone walls
- Up to 4 x emonTx can be connected to a single emonPi
- To connect an emonTx see: [Setup > Adding Energy Monitoring Node](/setup/emontx)

<p class='note'>
An emonTx can be powered by 3 x AA batteries, however it's recomend if possible to power via AC-AC adapter to provide AC voltage reference for more accurate Real Power and VRMS calculations.
</p>


### Sensors

 - 1 X Clip-on CT sensors
 - 1 x AC-AC voltage sensor adapter (optional but highly recommended)

### Power Adapters

 - 1 x USB 5V DC PSU
 - *1 x AC-AC voltage sensor adapter (if using emonTx, optional but highly recommended)*

### Advanced

**emonBase**

 -  Web connected gateway: Raspberry Pi + RFM69Pi RF receiver board
 -  Lower cost option if using an emonTx is to use an emonBase instead of an emonPi
 -  No on-board energy monitoring functions
 -  Receive data via low power RF (433Mhz) from emonTx or emonTH
 -  Local & Remote Emoncms logging
 -  Runs same software stack as emonPi
 -  More involved than emonPi since there is no LCD screen to display local IP address or shut-down button
 -  Knowledge of SSH is essential





</div> <!-- END HOME ENERGY -->
<div class='install-instructions solarpv' markdown='1'>
### {% linkable_title Solar PV hardware %}

**emonPi**

- Raspberry Pi based energy monitor
- Install next to utility meter
- Local & Remote Emoncms logging
- Requires WiFi / Ethernet plus 2 x power sockets
- Single unit required to monitor solar PV if the generation and site-consumption feeds are in the same physical location and WiFi/Ethernet connectivity is accessible at this location


**emonTx (optional)**

- Energy monitoring add-on node
- Required if solar PV generation and site-consumption feeds are located in separate locations or if WiFi / Ethernet connectivity is not available at utility meter
- RF range is approximately similar to home WiFi and can be affected by obstacles e.g. thick stone walls
- Up to 4 x emonTx can be connected to a single emonPi
- To connect an emonTx see: [Setup > Adding Energy Monitoring Node](/setup/emontx)

<p class='note'>
An emonTx can be powered by 3 x AA batteries, however this is not recommended for solar PV monitoring application since sensor adapter is require to determine direction of current flow and accurate VRMS & Real Power calculations.
</p>


### Sensors

 - 2 X Clip-on CT sensors
 - 1 x AC-AC voltage sensor adapter

### Power Adapters

 - 1 x USB 5V DC PSU
 - *1 x AC-AC voltage sensor adapter (if using emonTx)*

### Advanced

**emonBase**

 -  Web connected gateway: Raspberry Pi + RFM69Pi RF receiver board
 -  Lower cost option if using an emonTx is to use an emonBase instead of an emonPi
 -  No on-board energy monitoring functions
 -  Receive data via low power RF (433Mhz) from emonTx or emonTH
 -  Local & Remote Emoncms logging
 -  Runs same software stack as emonPi
 -  More involved than emonPi since there is no LCD screen to display local IP address or shut-down button
 -  Knowledge of SSH is essential





</div> <!-- END SOLAR PV -->
<div class='install-instructions temperature' markdown='1'>
### {% linkable_title Temperature Hardware %}





Temperature monitoring is using digital DS18B20 temperature sensors connected to emonPi, emonTx or emonTH.

**emonTH**

The emonTH is a dedicated wireless temperature & humidity monitoring room node.

# Photo of RJ45 temperature sensor breakout







</div> <!-- END TEMP -->


</div>



### {% linkable_title Comparison Table%}

|                                    | emonPi  | emonBase  | emonTx  | emonTH |
|---|---|---|---|---|
| Main purpose                      | All-in-one energy monitor & gateway| Web-connected gateway | Energy monitor add-on | Temperature & Humidity room node |
| No. CT sensor inputs               |  1  |    0      |    4    |    0   |
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


**Use in USA**

The emonPi and emonTx are designed to monitor single phase AC up to 100A. The system can work for some set-ups in USA with slightly different config. Users in North America should consult the Building Blocks guide ['emonTx - Use in North America'](http://openenergymonitor.org/emon/buildingblocks/EmonTx-in-North-America) and forum thread discussions [[1]](http://openenergymonitor.org/emon/node/711) [[2]](http://openenergymonitor.org/emon/node/3265).


### [Next step: Connect &raquo;](/getting-started/connect/)