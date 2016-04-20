---
layout: page
title: Install
description: Physically install emonPi
date: "2015-03-08 21:36"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---
### [&laquo; Previous step: Connect](/setup/connect/)

## Installation

### 1. Clip-on CT Sensors & AC Adapter


{% img /images/setup/emonPi_install_diagram.png 500 %}


The emonPi can now be installed in a location where the clip on CT sensor(s) AC-AC adapter can be installed.

The AC-AC adapter is not essential but is highly recommended to provide an AC waveform reference for accurate Real Power measurements. *Real Power is what your utility-meter measures and what you get billed for, see [detailed explanation](http://openenergymonitor.org/emon/applications/homeenergy) and [Building Blocks reference](http://openenergymonitor.org/emon/buildingblocks) for AC power theory.*

**Use of an AC-AC adapter to provide a voltage reference is essential when monitoring solar PV**, see [Sensor Installation section on Solar PV Application page](/applications/solar-pv/#sensor-installation).

<p class='note warning'>
<a href="https://openenergymonitor.org/emon/Current_Transformer_Installation">Please read the CT installation guide before installing.</a>
Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated, i.e. power is switched off, prior to installing your sensors, and proceeding slowly with care. If you have any doubts, seek professional assistance.
</p>

<p class='note'>
The clip-on CT sensors must be clipped round either the live or Neutral AC wire. Not both.
</p>

![CT sensor installation ](/images/applications/solar-pv/ctinstall.jpg)

**If the power reading is negative invert the CT sensor clip-on orientation**

### 1. Clip-on CT Sensors & AC Adapter

### [Next step: Log Locally &raquo;](/setup/local/)

### Video Guide
<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/6SB4fRYQjno" frameborder="0" allowfullscreen></iframe>
</div>
