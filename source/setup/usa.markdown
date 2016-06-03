---
layout: page
title: Use In USA
description: Using emonPi in USA
date: '2015-03-08 21:36'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The emonPi has been designed for single-phase single-conductor systems. However, the emonPi can be used on a North American Split-Phase system with the following considerations:


### 1. Ensure clip-on CT current sensor will fit conductors

Due to lower voltage (and resulting higher current) conductors (wires) in the USA are larger than in Europe. We recommend you measure the diameter of your feeders before purchasing a CT sensor. The opening in the [standard clip-on CT sensor sold in the OpenEnergyMonitor shop](http://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/) is **13mm diamater**, and hence can accommodate a maximum wire size of **AWG 1/0**.


<a class="btn pull-right" href="http://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/">View in Shop &rarr; </a>
<br><br>

If the standard CT sensor does not fit your conductors there are two options:

1. Use an [Optical Pulse Sensor](https://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor/) instead of CT sensor to interface directly with a utility meter. This will give an accurate reading of energy consumed (KWh) but will not provide a real-time power reading (W).

2. Use an alternative larger CT sensor: It's possible to obtain larger CT sensors, however using an alternative sensor will usually require a change of calibration and possibly hardware modification (change burden resistor value). See [Building Blocks > EmonTx in North America](https://openenergymonitor.org/emon/buildingblocks/EmonTx-in-North-America) for more info and general [Building Blocks CT sections](https://openenergymonitor.org/emon/buildingblocks/EmonTx-in-North-America). Please search / post on the [community forums](https://community.openenergymonitor.org) for further assistance.

<p class='note warning'>
Installing clip-on CT sensors on USA electrical systems should only by undertaken by a professional electrician. In a typical residential installation an isolator isn't present, therefore the load center feeders and busbars are always live inside an electrical cabinet.
</p>

### 2. Use USA AC-AC Adapter


Use the [USA AC-AC voltage sensor adapter sold via the OpenEnergyMonitor Shop](http://shop.openenergymonitor.com/ac-ac-power-supply-adapter-ac-voltage-sensor-us-plug). The system has been calibrated to work with this adapter. Using any other adapter will usually requires re-calibration.

<a class="btn pull-right" href="http://shop.openenergymonitor.com/ac-ac-power-supply-adapter-ac-voltage-sensor-us-plug/">View in Shop &rarr; </a>
<br><br>

### 3. Set EmonHub USA Calibration

In the `[[RFM2Pi]]` interfacer section of `emonhub.conf` set:

`calibration=110v`

emonhub.conf can be edited directly in local Emoncms as described in [Setup > Logging Remotely](/setup/remote).

See [[[RFM2Pi]] section of emonHub configuration guide](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md#a-rfm2pi) for advanced emonhub config info.

### 4. Sum power values

If monitoring a split-phase system the power values from each leg can be summed in Emoncms to calculate the total power. The emonPi by default reports `power1_plus_power2`, this input will need to be logged to a feed. See [Setup > Logging Locally](/setup/local).

See [Building Blocks > EmonTx in North America](https://openenergymonitor.org/emon/buildingblocks/EmonTx-in-North-America) for further technical info about the USA system.



#### Teminology

- Feeders = Incomers
- Load Center = Consumer Unit
- AWG = American Wire Gauge