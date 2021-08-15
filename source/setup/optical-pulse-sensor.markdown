---
layout: page
title: + Add Optical Pulse Sensor
description: Add optical pulse sensor
date: '2017-01-06 21:36'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

<img src="/images/setup/optical_pulse.jpg" style="float:left; margin-right:15px;" />

<a class="btn" href="https://openenergymonitor.com/optical-utility-meter-led-pulse-sensor/">View in Shop &rarr; </a>

An Optical Pulse Sensor detects the LED / IR 'pulse' output from a utility meters. Each pulse corresponds to a certain amount of energy passing through the meter. The amount of energy each pulse corresponds to depends on the meter. By counting these pulses and measuring the time between each pulse the meters kWh value can be calculated.

Unlike clip-on CT based monitoring, pulse counting is measuring exactly what the utility meter is measuring i.e. what you get billed for. Pulse counting cannot provide an instantaneous power reading like clip on CT sensors can. It is often worthwhile using pulse counting in conjunction with clip on CT sensors to get the best of both techniques.

The emonPi and emonTx can simultaneously perform pulse counting and CT based monitoring.

**Due to hardware limitations only a single pulse counting sensor can be connected to a single emonPi, emonTx or emonTH unit.**

<p class='note'>
Some meters are configured to pulse on both import and export. If your meter is, and you use it for both (e.g. an import meter on a property with grid-connected Solar PV) then you will have difficulty making good use of an optical pulse sensor, as it will not agree with either the meter reading or any CT sensor measurement.
  
One possibility is to use the sign (positive or negative) of the output of a CT sensor attached to the meter's input (or output) to distinguish between positive and negative pulses. You can then either reject negative pulses, or count them separately if you wish.
<a href="https://community.openenergymonitor.org/t/large-discrepancy-between-pulse-counter-and-ct/10561">This community forum discussion</a> contains more information on how to do this.
</p>

### {% linkable_title Sensor Installation %}

<img src="/images/setup/optical_pulse_emonpi.jpg" />

<p class='note warning'>
It is advisable to shield the sensor and the meter from bright light as this can adversely affect readings.
</p>

1. Identify your utility meter's pulse output, usually a red flashing LED marked 'KWh'. Stick the sensor over the LED, carefully aligning the hole so the flashing LED shines through clearly. Be sure to clean any dust from the meter face before attaching the sensor.

2. Plug sensors RJ45 connector into emonPi / emonTx RJ45 socket.

<p class='note warning'>
Ensure the sensor is plugged into the RJ45 socket on the emonPi on the same side as the CT connection jack-plug sockets NOT the Etherent socket.
</p>

If installed correctly when the emonPi / emonTx is powered up the pulse sensor LED should flash in sync with the utility meter LED. See video clip:

*You may need to switch on a large electrical load e.g. kettle to generate some pulses*

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/vq5EmMRrOY0" frameborder="0" allowfullscreen></iframe>
</div>

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
			<td><p><strong>Notes</strong></p>
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
			<p>Elster AS300P</p>
			<p>(single phase)</p>
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
			<p>Kaifa MA120</p>
			<p>(Single Phase)</p>
			</td>
			<td>
		         <a href="/images/setup/meters/kaifa_ma120.jpg"><img alt="" src="/images/setup/meters/kaifa_ma120.jpg" style="width: 150px; height: 100px;" /></a>	
			</td>
			<td>2000</td>
			<td>
			<p>1000 / 2000 =&nbsp;<strong>0.5</strong></p>
			</td>
			<td>
			<p><i><a href="https://community.openenergymonitor.org/t/pv-and-night-tariff-ev-and-immersion-heater/16010/29">'Energy Bucket': Even though the meter shows 2000imp/kWh, it only registers usage at 1000 imp/kWh.</i></a></p>
	                </td>
		</tr>		
	</tbody>
</table>


Please help us expand this table by contributing details for your meter. Email photo and scale factor to [support@openenergymonitor.zendesk.com](mailto:support@openenergymonitor.zendesk.com?subject=pulse%20output%20utility%20meter)
