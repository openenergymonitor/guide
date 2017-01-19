---
layout: page
title: Install
description: Physically install emonPi
date: '2015-03-08 21:36'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---
### [&laquo; Previous step: Connect](/setup/connect/)

### [Next step: Log Locally &raquo;](/setup/local/)

## Installation

![emonpi install digram](/images/setup/emonpilabel.png)

![emonpi install](/images/setup/emonPi_install_diagram.png)

<p class='note warning'>
<a href="https://openenergymonitor.org/emon/Current_Transformer_Installation">Please read the CT installation guide before installing.</a>
Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated; i.e., switch off the power prior to installing your sensors and proceed slowly with care. If you have any doubts, seek professional assistance.
</p>

## {% linkable_title 1. **CT sensor** %}

- Clip the CT sensor around either the **Live** or **Neutral** cable
- Connect jack plug into either CT1 or CT2 socket on the emonPi
- If the power reading is negative, reverse the CT sensor orientation
- CT sensor cable should not be extended to avoid induced noise
- For Solar PV install see [Solar PV Application page](/applications/solar-pv/#sensor-installation)

<p class='note'>
The clip-on CT sensors must be clipped round either the live or Neutral AC wire. <strong>NOT BOTH</strong>.
</p>

![CT sensor installation ](/images/applications/solar-pv/ctinstall.jpg)



## {% linkable_title 2. **AC-AC Adapter** %}
- Plug the AC-AC adapter into a power outlet
- This may require installation of a new outlet or extending an existing one
- AC-AC adapter cable can be extended if required
- Plug power connector into the AC socket on the emonPi
- Essential for [Solar PV monitoring](/applications/solar-pv/#sensor-installation)
- Provides AC waveform reference for accurate Real Power measurements. [[1]](http://openenergymonitor.org/emon/applications/homeenergy) , [[2]](http://openenergymonitor.org/emon/buildingblocks)



## {% linkable_title 3. **DC 5V USB Adapter** %}
- Plug the DC 5V USB adapter into a power outlet
- Plug the mini-B USB connector into the emonPi
- High quality minimum [1.2A power supply recommended](https://shop.openenergymonitor.com/power-supplies/)

<br>

### {% linkable_title 4. *Optical Utility Meter LED Pulse Sensor (optional)* %}
- See [Optical Pulse Sensor setup page](http://openenergymonitor.org/emon/opticalpulsesensor)
- Connects to emonPi / emonTx via RJ45 connector
- Self-adhesive velcro attachment to utility meter
- One optical pulse sensor per emonPi/emonTx
- Can be used in conjunction with temperature sensors using [RJ45 Breakout](http://shop.openenergymonitor.com/rj45-expander-for-ds18b20-pulse-sensors/)


### {% linkable_title 5. *Temperature Sensors (optional)* %}
- Connect to emonPi / emonTx via RJ45 connector
- Up to 6x sensors can be connected using [RJ45 Breakout](http://shop.openenergymonitor.com/rj45-expander-for-ds18b20-pulse-sensors/)
- Sensor wire can be extended using RJ45 cable and [RJ45 Extender](http://shop.openenergymonitor.com/rj45-extender/)

## Installation Examples

![home energy](/images/applications/home-energy/home-energy-emonpi-install.jpg)

![home energy2](/images/applications/home-energy/emonpi-install2.jpg)

See [Solar PV Application Note](applications/solar-pv/) for emonPi solar PV install guide & images.

## {% linkable_title 6. Power Up %}


<p class='note'>
Ensure all sensors are connected before powering up.
</p>


a.) **Switch on DC & AC power**

b.) **Check CT sensor(s) & AC Wave are detected:**

{% img /images/setup/acwave_ct1.JPG %}

c.) **emonPi should remember WiFi network and re-connect**

{% img /images/setup/wifi_connected.JPG %}


### Video Guide
<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/6SB4fRYQjno" frameborder="0" allowfullscreen></iframe>
</div>

***

### [Next step: Log Locally &raquo;](/setup/local/)
