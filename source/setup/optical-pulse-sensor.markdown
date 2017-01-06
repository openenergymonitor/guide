---
layout: page
title: "Add Optical Pulse Sensor"
description: "Add Temperature Nodes"
date: 2017-01-06 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

### [&laquo; Previous step: Add Temperature Node(s)](/setup/emonth/)

### [Next step: Import / Backup &raquo;](/setup/import/)


***

## Optical Pulse Sensor

{% img /images/setup/ops.png 100 %}

The Optical Pulse Sensor detects an utility meters pulsed LED output. Each pulse corresponds to a certain amount of energy passing through the meter. The amount of energy each pulse corresponds to depends on the meter. By counting these pulses the meters KWh value can be calculated.

Unlike clip-on CT based monitoring, pulse counting is measuring exactly what the utility meter is measuring i.e. what you get billed for. The pulse counting cannot provide an instantaneous power reading like CT based monitoring can. Where possible, we recommend using pulse counting in conjunction with CT monitoring. The emonPi and emonTx can simultaneously perform pulse counting and CT based monitoring.

### Sensor Installation

{% img /images/setup/optical_pulse_emonpi.jpg 500 %}

1. Identify your utility meter's pulse output, usually a red flashing LED marked 'KWh'. Stick the supplied self adhesive base-pad over the LED, carefully aligning the hole in the center of the circle so the flashing LED shines through clearly. Be sure to clean any dust from the meter face before attaching the sensor.

2. Attach the sensor to the circular base sticker by pressing the sensor head firmly in place. Take care to ensure sensor is centered over the pad.

3. Plug sensors RJ45 connector into emonPi / emonTx RJ45 socket.

<p class='note warning'>
Ensure the sensor is plugged into the RJ45 socket on the emonPi on the same side as the CT connection jack-plug sockets NOT the Etherent socket.
</p>

If installed correctly when the emonPi / emonTx is powered up the pulse sensor LED should flash in sync with the utility meter LED. See video clip:

*You may need to swich on a large electrical load e.g. kettle to generate some pulses*

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/vq5EmMRrOY0" frameborder="0" allowfullscreen></iframe>
</div>

## Configure Emoncms


<br>

***

### [Next step: Import / Backup &raquo;](/setup/import/)
