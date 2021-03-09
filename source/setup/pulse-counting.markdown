---
layout: page
title: + Add Pulse Counting
description: + Add Pulse Counting
date: '2020-11-10 10:00'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

<img src="/images/setup/optical_pulse.jpg" style="float:left; margin-right:15px;" />

Many meters, including single phase, 3-phase, import and export electricity meters, gas meters, water meters and heat meters, have pulse outputs. The pulse output may be a flashing LED or a relay (typically solid state) or both.

Using an Optical Pulse Sensor it is possible to detect the LED / IR 'pulse' output from a utility meters. Meters with wired pulse outputs can be connected directly with two wires and usually switch a voltage provided by the monitoring hardware.

In the case of an electricity meter, a pulse output corresponds to a certain amount of energy passing through the meter (kWh/Wh). For single-phase domestic electricity meters e.g. Elster A100c, each pulse typically corresponds to 1 Wh (1000 pulses per kWh). Water and gas meters will usually be marked to show the quantity of water (litres/gallons) or gas (cubic meters/cubic feet) that each pulse represents.

- The emonTx V3.4, emonPi and emonTH all have one spare interrupt pulse input as standard (IRQ 1, Dig3) which can be used for pulse counting.
- This pulse input is accessible via the RJ45 socket on both the emonTx and emonPi.
- The pulse input is also available on terminal block port 4 of the emonTx.
- The pulse input is available on the emonTH terminal block.

Unlike clip-on CT based monitoring, pulse counting is measuring exactly what the utility meter is measuring i.e. what you get billed for. Pulse counting cannot provide an instantaneous power reading like clip on CT sensors can. It is often worthwhile using pulse counting in conjunction with clip on CT sensors to get the best of both techniques.

The emonPi and emonTx can simultaneously perform pulse counting and CT based monitoring.

<p class='note'>
Some meters are configured to pulse on both import and export. If your meter is, and you use it for both (e.g. an import meter on a property with grid-connected Solar PV) then you will have difficulty making good use of an optical pulse sensor, as it will not agree with either the meter reading or any CT sensor measurement. <br><br>One possibility is to use the sign (positive or negative) of the output of a CT sensor attached to the meter's input (or output) to distinguish between positive and negative pulses. You can then either reject negative pulses, or count them separately if you wish.
<a href="https://community.openenergymonitor.org/t/large-discrepancy-between-pulse-counter-and-ct/10561">This community forum discussion</a> contains more information on how to do this.
</p>

### {% linkable_title Pulse counting with an emonPi %}

<a class="btn" href="https://openenergymonitor.com/optical-utility-meter-led-pulse-sensor/" style="float:right">View in Shop &rarr; </a>

#### Option 1: Using an Optical pulse sensor

![optical_pulse_emonpi.png](/images/setup/optical_pulse_emonpi.jpg)

<p class='note warning'>
It is advisable to shield the sensor and the meter from bright light as this can adversely affect readings.
</p>

1. Identify your utility meter's pulse output, usually a red flashing LED marked 'kWh'. Stick the sensor over the LED, carefully aligning the hole so the flashing LED shines through clearly. Be sure to clean any dust from the meter face before attaching the sensor.

2. Plug sensors RJ45 connector into emonPi / emonTx RJ45 socket.

<p class='note warning'>
Ensure the sensor is plugged into the RJ45 socket on the emonPi on the same side as the CT connection jack-plug sockets NOT the Etherent socket.
</p>

If installed correctly when the emonPi / emonTx is powered up the pulse sensor LED should flash in sync with the utility meter LED. See video clip:

*You may need to switch on a large electrical load e.g. kettle to generate some pulses*

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/vq5EmMRrOY0" frameborder="0" allowfullscreen></iframe>
</div>

*Note: If the pulsecount value in emoncms does not increase in line with LED flashes, it maybe that there is light from another source interfering with the pulse detection. Some meters have a plastic cover that makes it quite hard to keep external light away from the pulse sensor. See forum thread [here](https://community.openenergymonitor.org/t/first-try-with-emonpi-pulsecount-stuck-at-1/7375) for more details.*

#### Option 2: Wired pulse counting

To connect to a meter with a wired pulse output it's possible to either wire the pulse output cable directly to a RJ45 passthrough connector or to a RJ45 to terminal block adapter. The screenshot below shows an example with a simple RJ45 passthrough connector.

**RJ45 Pinout**<br>
The RJ45 implements a standard pinout used by other manufacturers of DS18B20 temperate sensing hardware such as Sheepwalk Electronics.

![RJ45-Pin-out.png](/images/setup/RJ45-Pin-out.png)

![emonpi_wired_pulse_input.jpg](/images/setup/emonpi_wired_pulse_input.jpg)

### {% linkable_title Pulse counting with an emonTx V3 %}

The OpenEnergyMonitor optical pulse counter can also be used with the emonTx. The optical pulse counter plugs into the RJ45 socket on the EmonTx. Follow the instructions and suggestions for mounting given for the emonPi above.

![emontx_optical_pulse.jpg](/images/setup/emontx_optical_pulse.jpg)

Alternatively the terminal block can be used for wired pulse counting. Connect the pulse output to **IRQ1 Dig3** (4th along from left). 

![emontx_pulse_input.png](/images/setup/emontx_pulse_input.png)

If you are using an optical counter attached to the terminal block, connect the power pin to the 3.3V terminal or 5V if the emonTx is powered via USB (2nd or 1st from the left) and connect ground to GND (3rd from the left).

For isolated volt-free / switch output (SO) pulse output devices, connect across IRQ1 Dig3 and GND. There is an internal pull-up resistor on the pulse input that is enabled in the standard firmware that will pull the signal up when the switched output is open.

In the face of long leads and/or moderate interference, it is advisable to “stiffen” the relatively weak internal pull-up with a parallel 10 kΩ (or possibly less if necessary) resistor wired between the pulse input and the 3.3 V supply.

Alternatively a volt-free / switch output (SO) pulse output device can be connected across 3.3V (or 5V) and IRQ1 Dig3. A pull-down resistor of resistance low enough to overcome the internal pull-up resistor needs to be added in this case, or a higher-value resistor with the firmware modified to disable the internal pull-up.

We recommend powering the emonTx v3 from either a 5V USB or AC-AC adaptor when used for pulse counting operation. Due to the additional power requirements of the optical pulse sensor, battery life will be reduced significantly compared to an emonTx powered by 3 AA batteries for CT operation only. 

### {% linkable_title  Pulse counting with an emonTH V2 %}

In addition to temperature and humidity sensing the EmonTH has a digital input (with interrupt) that can be used for pulse counting. This can be used for wired pulse counting or with the Optical LED pulse sensor.

![emonth_pulse_input.jpg](/images/setup/emonth_pulse_input.jpg)

To use the Optical LED Pulse sensor the easiest way is to remove the RJ45 connector and then strip back the black sheathing to reveal the red (3.3V power), black (GND) and blue (pulse) wires. Connect the red wire to the 3.3V terminal, the black wire to the GND terminal and the blue wire to the terminal labelled D3 (top) or IRQ1/D3 Pulse Counting (bottom of the board).

<!--
**Advanced**

**Enabling 2x pulse inputs on the emonPi**<br>
A second interrupt based pulse input (IRQ0) is usually used by the RFM69CW module on the emonPi. If the RF module is not present, this interrupt can be jumpered on the PCB (JP5) to be accessible on the RJ45, see below for the pin out:

Optical pulse sensor RJ45 pinout

    Pin 2 = VCC
    Pin 5 = GND
    Pin 6 = IRQ1
    Pin 7 = IRQ0 (Usually used by RFM. Can be jumpered via JP5)

*There is an input pull-up inside the pulse (IRQ) input that is enabled in the standard sketch. Therefore, you can connect a volt-free contact or an SO output between Pin 6 (IRQ input, SO+) and Pin 5 (GND, SO-) without the need for an additional resistor. If you must connect your contacts between VCC (Pin 2) and Pin 6, then you must add a pull-down resistor of resistance low enough to overcome the internal pull-up resistor, or you can use a higher-value resistor and modify the sketch to disable the internal pull-up.*

-->

### {% linkable_title Direct pulse counting with a RaspberryPi %}

Another option for pulse counting is to use a spare GPIO pin on a RaspberryPi directly. 
See [EmonHub Interfacers: Direct pulse counting guide for details](/integrations/emonhub-interfacers/#direct-pulse-counting)

### {% linkable_title Elster A100C IrDa %}

If you have an [Elster meter](http://4.bp.blogspot.com/-O6Rbpza8DRI/UDtMZHQNG7I/AAAAAAAACeo/i6Xx0PCuLdo/s1600/IMAG0876.jpg) (tested with Elster 100C) the emonTx V3 with an [IR TSL261R](http://shop.openenergymonitor.com/tsl261r-ir-sensor-kit/) sensor can be used to interface directly with the meter protocol to read off the exact accumulated watt hours that you have generated or used. This reading can be used on its own or to cross-check and calibrate CT based measurement. See here for [original blog post](http://openenergymonitor.blogspot.com/2012/08/reading-watt-hour-data-from-elster.html)

### {% linkable_title Emoncms input setup %}

See the [Emoncms pulse counting guide](/emoncms/pulse-counting/).

### {% linkable_title Learn %}

- [Intro to pulse counting](https://learn.openenergymonitor.org/electricity-monitoring/pulse-counting/introduction-to-pulse-counting)
- [Interrupt method](https://learn.openenergymonitor.org/electricity-monitoring/pulse-counting/interrupt-based-pulse-counter)
- [Interrupt method sleep](https://learn.openenergymonitor.org/electricity-monitoring/pulse-counting/interrupt-based-pulse-counter-sleep)
- [12 input pulse counting via direct port manipulation](https://learn.openenergymonitor.org/electricity-monitoring/pulse-counting/12-input-pulse-counting)
- [Gas meter monitoring](https://learn.openenergymonitor.org/electricity-monitoring/pulse-counting/gas-meter-monitoring)

### {% linkable_title Appendix %}

The optical pulse sensor should work with all utility meters that have an LED or IR optical pulse output. The sensor has been tested to work with the following meters. The 'pulses per kwh' calibration can be used to configure the input process for the pulse data, see above:


<table border="1" cellpadding="1" cellspacing="1" style="width: 500px;">
	<caption>&nbsp;</caption>
	<tbody>
		<tr>
			<td><strong>Meter</strong></td>
			<td><strong>Image</strong></td>
			<td><strong>Pulses Per KWh</strong></td>
			<td>
			<p><strong>Multiplication factor for </strong></p>
			<p><strong>Wh Accumulator feed</strong></p>
			</td>
		</tr>
		<tr>
			<td>
			<p>Elster&nbsp;A100c</p>
			<p>(Single phase)</p>
			</td>
			<td><a href="/images/setup/meters/a100c.png"><img alt="" src="/images/setup/meters/a100c.png" style="width: 100px; height: 78px;" /></a></td>
			<td>1000</td>
			<td>1000 / 1000 = <strong>1</strong></td>
		</tr>
		<tr>
			<td>
			<p>Actaris ace9000</p>
			<p>(Single phase)</p>
			</td>
			<td><a href="/images/setup/meters/Actaris_ace9000.jpg"><img alt="" src="/images/setup/meters/Actaris_ace9000.jpg" style="width: 100px; height: 118px;" /></a></td>
			<td>800</td>
			<td>1000 / 800 = <strong>1.25</strong></td>
		</tr>
		<tr>
			<td>
			<p>Xil&nbsp;XLA12</p>
			<p>(Single phase)</p>
			</td>
			<td><a href="/images/setup/meters/Xil_XLA12.jpg"><img alt="" src="/images/setup/meters/Xil_XLA12.jpg" style="width: 100px; height: 100px;" /></a></td>
			<td>800</td>
			<td>1000 / 800 =&nbsp;<strong>1.25</strong></td>
		</tr>
		<tr>
			<td>
			<p>Elster A1100</p>
			<p>(3-phase)</p>
			</td>
			<td><a href="/images/setup/meters/ElsterA1100.jpg"><img alt="" src="/images/setup/meters/ElsterA1100.jpg" style="width: 100px; height: 69px;" /></a></td>
			<td>500</td>
			<td>1000 / 500 = <b>2</b></td>
		</tr>
		<tr>
			<td>
			<p>Elster AS300P</p>
			<p>(Single phase)</p>
			</td>
			<td><a href="/images/setup/meters/ElsterAS300P.jpg"><img alt="" src="/images/setup/meters/ElsterAS300P.jpg" style="width: 100px; height: 100px;" /></a></td>
			<td>4000</td>
			<td>1000 / 4000 = <b>0.25</b></td>
		</tr>
		<tr>
			<td>
			<p>Elster&nbsp;A1140</p>
			<p>(3-phase)</p>
			</td>
			<td><a href="/images/setup/meters/Elster_A1140.jpg"><img alt="" src="/images/setup/meters/Elster_A1140.jpg" style="width: 100px; height: 75px;" /></a></td>
			<td>1000</td>
			<td>1000 / 1000 = <b>1</b></td>
		</tr>
		<tr>
			<td>
			<p>Landis &amp; Gyr 5254E</p>
			<p>(Single phase)</p>
			</td>
			<td><a href="/images/setup/meters/LandisGyr5254E.png"><img alt="" src="/images/setup/meters/LandisGyr5254E.png" style="width: 100px; height: 100px;" /></a></td>
			<td>1000</td>
			<td>1000 / 1000 = <strong>1</strong></td>
		</tr>
		<tr>
			<td>
			<p>&nbsp;Inepro PRO1D</p>
			</td>
			<td><a href="/images/setup/meters/Inepro_PRO1D.jpg"><img alt="" src="/images/setup/meters/Inepro_PRO1D.jpg" style="width: 50px; height: 109px;" /></a></td>
			<td>2000</td>
			<td>1000/2000 = <strong>0.5</strong></td>
		</tr>
		<tr>
			<td>
			<p>EDMI&nbsp;MK7C&nbsp;</p>
			<p>AMR Smart Meter</p>
			</td>
			<td><a href="/images/setup/meters/edmi_mk7c.jpg"><img alt="" src="/images/setup/meters/edmi_mk7c.jpg" style="width: 80px; height: 130px;" /></a></td>
			<td>1000</td>
			<td>1000 / 1000 =&nbsp;<strong>1</strong></td>
		</tr>
		<tr>
			<td>
			<p>Landis &amp; Gyr E110</p>
			<p>(Single Phase)</p>
			</td>
			<td><a href="/images/setup/meters/Original-Landis_E110_1__1.jpg"><img alt="" src="/images/setup/meters/Original-Landis_E110_1__1.jpg" style="width: 100px; height: 66px;" /></a></td>
			<td>1000</td>
			<td>
			<p>1000 / 1000 =&nbsp;<strong>1</strong></p>
			</td>
		</tr>
		<tr>
			<td>
			<p>Secure Liberty 100</p>
			<p>(Single Phase)</p>
			</td>
			<td><a href="/images/setup/meters/Secure_Liberty_100.png"><img alt="" src="/images/setup/meters/Secure_Liberty_100.png" style="width: 150px; height: 100px;" /></a></td>
			<td>3200</td>
			<td>
			<p>1000 / 3200 =&nbsp;<strong>0.3125</strong></p>
			</td>
		</tr>
		<tr>
			<td>
			<p>EDMI ATLAS Mk10D</p>
			<p>(Single Phase)</p>
			</td>
			<td><a href="/images/setup/meters/EDMI_ATLAS_Mk10D.png"><img alt="" src="/images/setup/meters/EDMI_ATLAS_Mk10D.png" style="width: 150px; height: 100px;" /></a></td>
			<td>10</td>
			<td>
			<p>11000/10 =&nbsp;<strong>100</strong></p>
			</td>
		</tr>		
	</tbody>
</table>


Please help us expand this table by contributing details for your meter. Email photo and scale factor to [support@openenergymonitor.zendesk.com](mailto:support@openenergymonitor.zendesk.com?subject=pulse%20output%20utility%20meter)
