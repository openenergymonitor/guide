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

An Optical Pulse Sensor detects the LED / IR 'pulse' output from a utility meters. Each pulse corresponds to a certain amount of energy passing through the meter. The amount of energy each pulse corresponds to depends on the meter. By counting these pulses and measuring the time between each pulse the meters KWh value can be calculated.

Unlike clip-on CT based monitoring, pulse counting is measuring exactly what the utility meter is measuring i.e. what you get billed for. Pulse counting cannot provide an instantaneous power reading like clip on CT sensors can. **Where possible, we recommend using pulse counting in conjunction with clip on CT sensors**.

The emonPi and emonTx can simultaneously perform pulse counting and CT based monitoring.

**Due to hardware limitations only a single pulse counting sensor can be connected to a single emonPi, emonTx or emonTH unit.**

### {% linkable_title Sensor Installation %}

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

## {% linkable_title Configure Emoncms %}

View the Input list:

<img src="/images/setup/emonpi-input-list.png" />

Clicking the spanner icon brings up the feed input processor. It's a good idea to log the raw pulse count to a feed for debugging. The pulse count needs to be multiplied by a scalar to convert the pulses to Wh. The scale factor will depend on your meter, see the table in Appendix A below. Once the scalar has been applied, log the result to a Wh Accumulator feed. This feed is an ever increasing number which won't return to zero if the emonPi / emonTx is reset, which would result in the raw pulse count returning to zero.

<img src="/images/setup/emonpi-pulse-input-process.png" />

Viewing the Wh accumulator feed:

<img src="/images/setup/wh-accumulator.png" />

To convert the wh accumulator feed to daily KWh bargraph using the graph tool select Window `type-daily` feed `type=Bars` and `delta = 1` then click `reload`

<img src="/images/setup/wh-accumulator-bargraph.png" />

See Emoncms [daily Kwh guide](/setup/daily-kwh) for mor info.

## {% linkable_title Appendix A: %}

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

			<p>(single phase)</p>
			</td>
			<td><a href="/images/setup/meters/a100c.png"><img alt="" src="/images/setup/meters/a100c.png" style="width: 100px; height: 78px;" /></a></td>
			<td>1000</td>
			<td>1000 / 1000 = <strong>1</strong></td>
		</tr>
		<tr>
			<td>
			<p>Actaris ace9000</p>

			<p>(single phase)</p>
			</td>
			<td><a href="/images/setup/meters/Actaris_ace9000.jpg"><img alt="" src="/images/setup/meters/Actaris_ace9000.jpg" style="width: 100px; height: 118px;" /></a></td>
			<td>800</td>
			<td>1000 / 800 = <strong>1.25</strong></td>
		</tr>
		<tr>
			<td>
			<p>Xil&nbsp;XLA12</p>

			<p>(single phase)</p>
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
			<p>&nbsp;</p>
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
			<p>Elster&nbsp;A1140</p>

			<p>(3-phase)</p>
			</td>
			<td><a href="/images/setup/meters/Elster_A1140.jpg"><img alt="" src="/images/setup/meters/Elster_A1140.jpg" style="width: 100px; height: 75px;" /></a></td>
			<td>1000</td>
			<td>1000 / 5000 = <b>1</b></td>
		</tr>
		<tr>
			<td>
			<p>Landis &amp; Gyr 5254E</p>

			<p>(single phase)</p>
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
	</tbody>
</table>


Please help us expand this table by contributing details for your meter. Email photo and scale factor to [support@openenergymonitor.zendesk.com](mailto:/images/setup/meters/emonpi_pulse_wh_log.png?subject=pulse%20output%20utility%20meter)


<br>

***

### [Next step: Import / Backup &raquo;](/setup/import/)
