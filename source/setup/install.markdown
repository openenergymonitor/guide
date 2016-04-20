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

![emonpi install](/images/setup/emonPi_install_diagram.png)

<p class='note warning'>
<a href="https://openenergymonitor.org/emon/Current_Transformer_Installation">Please read the CT installation guide before installing.</a>
Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated, i.e. power is switched off, prior to installing your sensors, and proceeding slowly with care. If you have any doubts, seek professional assistance.
</p>

1. **CT sensor**
- Clip the CT sensor round either the Live or Neutral Cable
- If the power reading is negative reverse CT sensor orientation
- Plug jack-plug socket into either CT1 or CT2 in emonPi
- CT sensor cable should not be extended to avoid induced noise
- For Solar PV install see [Solar PV Application page](/applications/solar-pv/#sensor-installation).

2. **AC-AC Adpater**
- Plug the AC-AC apter into a power outlet
- This may require installation of a new outlet or extending existing
- AC-AC adapter cable can be extended if required
- Plug barrel-socket into AC socket in emonPi
- Essential for [Solar PV monitoring](/applications/solar-pv/#sensor-installation)
- Provides AC waveform reference for accurate Real Power measurements [[1]](http://openenergymonitor.org/emon/applications/homeenergy) , [[2]](http://openenergymonitor.org/emon/buildingblocks)

3. **USB 5V Adapter**

![home energy](/images/applications/home-energy/home-energy-emonpi-install.jpg)


<p class='note'>
The clip-on CT sensors must be clipped round either the live or Neutral AC wire. NOT BOTH:
</p>

![CT sensor installation ](/images/applications/solar-pv/ctinstall.jpg)

## Power Up


<p class='note'>
Ensure all sensors are connected before power up
</p>


1. **Switch on DC & AC power**

2. **Check CT sensor(s) & AC Wave are detected:**

{% img /images/setup/acwave_ct1.JPG %}

3. **emonPi should remember WiFi network and re-connect**

{% img /images/setup/wifi_connected.JPG %}


### [Next step: Log Locally &raquo;](/setup/local/)

### Video Guide
<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/6SB4fRYQjno" frameborder="0" allowfullscreen></iframe>
</div>
