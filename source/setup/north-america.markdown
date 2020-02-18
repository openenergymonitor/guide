---
layout: page
title: Use In North America
description: Using emonPi in USA
date: '2015-03-08 21:36'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The emonPi / emonTx hardware units are designed for use on single-phase systems. However, the they can be used on a North American Split-Phase system with the following considerations:


### 1. Ensure clip-on CT sensor will fit your conductors

Typical residential Service Entrance Wires are AWG 2/0 Copper or AWG 4/0 Aluminum.  The opening in the [standard clip-on CT sensor sold in the OpenEnergyMonitor shop](http://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/) is **13mm**, and hence can accommodate a maximum wire size of **AWG 1/0**. Therefore, we recommend you measure the diameter of your feeders before purchasing a CT sensor.

If the standard CT sensor does not fit your conductors there are two options:

1. Use an [Optical Pulse Sensor](https://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor/) instead of CT sensor to interface directly with a utility meter. This will give an accurate reading of energy consumed (KWh) but will not provide a real-time power reading (W).

2. Use an alternative larger CT sensor: It's possible to obtain larger CT sensors. However, using an alternative CT will usually require re-calibration and possibly, hardware modification (burden resistor may need replacement). See [Learn > EmonTx in North America](https://learn.openenergymonitor.org/electricity-monitoring/ac-power-theory/use-in-north-america) for more info. ['Learn' CT sections](https://learn.openenergymonitor.org/electricity-monitoring/ac-power-theory/use-in-north-america). Please search / post on the [community forums](https://community.openenergymonitor.org) for further assistance.

<p class='note warning'>
Installing clip-on CT sensors on USA electrical systems should only by undertaken by a professional electrician. In a typical residential installation, even if the main breaker is swiched off, the load center Service Entrance Wires and busbars are always live.
</p>

### 2. Use USA AC-AC Adapter

<a class="btn pull-right" href="http://shop.openenergymonitor.com/ac-ac-power-supply-adapter-ac-voltage-sensor-us-plug/">View in Shop &rarr; </a>

Use the [USA AC-AC voltage sensor adapter sold via the OpenEnergyMonitor Shop](http://shop.openenergymonitor.com/ac-ac-power-supply-adapter-ac-voltage-sensor-us-plug). The system has been calibrated to work with this adapter. Using any other adapter will usually require re-calibration.

### 3. Software Calibration

#### a.) emonPi: Set EmonHub USA Calibration

In the `[[RFM2Pi]]` interfacer section of `emonhub.conf` set:

`calibration=110v`

emonhub.conf can be edited directly in local Emoncms as described in [Setup > Logging Remotely](/setup/remote).

See [[[RFM2Pi]] section of emonHub configuration guide](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md#a-rfm2pi) for advanced emonhub config info.

#### b.) emonTx: Enable USA calibration using [on-board DIP switch](https://wiki.openenergymonitor.org/index.php/EmonTx_V3.4#DIP_Switch_Config)

### 4. Sum power values

If monitoring a split-phase system the power values from each leg can be summed in Emoncms to calculate the total power.

The emonPi by default reports `power1_plus_power2`, this input will need to be logged to a feed. See [Setup > Logging Locally](/setup/local).

If using emonTx then the power values from multiple CT inputs can be summed in Emoncms using `+ feed` Input Processor.

See [Learn > EmonTx in North America](https://learn.openenergymonitor.org/electricity-monitoring/ac-power-theory/use-in-north-america) for further technical info about the USA system.
