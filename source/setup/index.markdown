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

### {% linkable_title Home Energy Hardware %}

</div> <!-- Home energy hardware -->





<div class='install-instructions solarpv' markdown='1'>


### {% linkable_title Solar PV Hardware %}

<!-- Solar PV hardware -->

# NEED ILLUSTRATION

Solar PV monitoring can be achieved with either an **emonPi** or an **emonPi + emonTx**.

**emonPi**

- Raspberry Pi based energy monitor
- Install next to utility meter
- Local & Remote Emoncms logging
- Requires WiFi / Ethernet plus 2 x power sockets
- Single unit required to monitor solar PV if the generation and site-consumption feeds are in the same physical location and WiFi/Ethernet connectivity is accesible at this location



**emonTx (optional)**

- Energy monitoring add-on node
- Required if solar PV generation and site-consumption feeds are located in separate locations
- Remote energy monitoring add-on node
- Range is approximately similar to home WiFi and can be affected by obstacles e.g. thick stone walls
- Up to 4 x emonTx can be connected to a single emonPi
- To connect an emonTx see: [Setup > Adding Energy Monitoring Node](/setup/emontx

<p class='note'>
An emonTx can be powerd by 3 x AA batteries, however this is not recomended for solar PV monitoring application since sensor adapter is require to determine direction of current flow.
</p>


#### Sensors

 - 2 X Clip-on CT sensors
 - 1 x AC-AC voltage sensor adapter

#### Power Adapters

 - 1 x USB 5V DC PSU
 - *1 x AC-AC voltage sensor adapter (if using emonTx)*

#### Advanced

**emonBase**

 -  Web connected gateway: Raspberry Pi + RFM69Pi RF receiver board
 -  Lower cost option if using an emonTx is to use an emonBase instead of an emonPi
 -  No on-board energy monitoring functions
 -  Receive data via low power RF (433Mhz) from emonTx or emonTH
 -  Local & Remote Emoncms logging
 -  Runs same software stack as emonPi
 -  More involved than emonPi since there is no LCD screen to display local IP address or shutdown button
 -  Knowledge of SSH is essential

</div>

<div class='install-instructions temperature' markdown='1'>



### {% linkable_title Temperature Hardware %}

</div> <!-- temperature hardware-->


</div>



### {% linkable_title Comparision %}

## emonPi / emonBase / emonTx / emonTH comparison table

The emonPi and emonTx Energy Monitoring Node are designed to monitor single phase AC up to 100A. Users in North America should consult the Building Blocks guide ["emonTx - Use in North America"](http://openenergymonitor.org/emon/buildingblocks/EmonTx-in-North-America) and forum thread discussions [[1]](http://openenergymonitor.org/emon/node/711) [[2]](http://openenergymonitor.org/emon/node/3265).


### [Next step: Connect &raquo;](/setup/connect/)
