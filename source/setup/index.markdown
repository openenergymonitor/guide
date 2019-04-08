---
layout: page
title: System Overview
description: Getting started with OpenEnergyMonitor
date: '2014-12-18 22:57'
sidebar: true
comments: false
sharing: false
footer: true
published: true
---

### [Next step: Connect &raquo;](/setup/connect/)

The OpenEnergyMonitor system  has the capability to monitor electrical energy use / generation, temperature and humidity.

The system is made up of five main units. These can be assembled and configured to work for a variety of [applications](/applications). The system is fully open-source, both hardware and software. All hardware is based on the [Arduino](http://www.arduino.cc/) and [Raspberry Pi](http://raspberrypi.org) platforms:

![image](/images/setup/oemfpsystemdiagram.png)

***

**Please select the type of system you are interested in:**

<ol>
	<li>
		<a href="#home-energy-hardware"><b>Home Energy Monitoring</b></a>
	</li>
	<li>
		<a href="#solar-pv-hardware"><b>Solar PV Monitoring</b></a>
	</li>
	<li>
		<a href="#temperature--humidity-sensors"><b>Temperature & Humidity<br>
		Monitoring</b></a>
	</li>
</ol>
<div style="background-color:#F0F0F0;padding:10px;">
	<div class="install-instructions energy">
		<h3 id="a-classtitle-link-namehome-energy-hardware-hrefhome-energy-hardwarea-home-energy-hardware"><a class="title-link" href="#home-energy-hardware" id="home-energy-hardware" name="home-energy-hardware"></a>1. Home Energy Monitoring</h3>
		<blockquote>
			<p>The OpenEnergyMonitor system can be used as a simple home energy monitoring system for analyzing real-time power use and daily energy consumption.</p>
		</blockquote>
		<p>The hardware options to set up a home energy monitor are as follows:</p>
		<hr>
		<h4 id="emonpihttpsshopopenenergymonitorcomemonpi-3"><strong><a href="https://shop.openenergymonitor.com/emonpi-3/">emonPi</a></strong></h4>
		<p>The emonPi is an all-in-one Raspberry Pi based energy monitoring unit making for a simple installation where Ethernet or WiFi is available at the meter location.</p>
		<p>The emonPi can monitor two single-phase AC circuits using clip-on CT sensors. The emonPi can also monitor temperature, and interface directly with a utility meter via an optical pulse sensor.</p>
		<p><img alt="emonPi" src="/images/hardwareimages/emonPi_shop_photo.png"></p>
		<ul>
			<li>Raspberry Pi-based energy monitor</li>
			<li>Local &amp; remote data logging with <a href="https://emoncms.org/">Emoncms</a>, our open-source web-app for processing, logging and visualising energy and other environmental data, such as humidity and temperature
			</li>
			<li>Requires WiFi / Ethernet plus 2 x power outlets</li>
			<li>Requires <a href="https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&amp;-Change-Log">pre-built SD card image</a> (included)
			</li>
		</ul>
		<h4 id="sensors-required">Sensors Required:</h4>
		<ul>
			<li>1 X <a href="https://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/">Clip-on CT sensors</a> (the emonPi can accept up to two CT sensors; one is included as standard with the emonPi)
			</li>
			<li>1 x <a href="https://shop.openenergymonitor.com/components/">AC-AC voltage sensor adapter</a> (optional but highly recommended)
			</li>
		</ul>
		<h4 id="power-adapters-required">Power Adapters Required:</h4>
		<ul>
			<li>1 x <a href="https://shop.openenergymonitor.com/power-supplies/">USB 5V DC PSU</a>
			</li>
		</ul>
		<p><a class="btn pull-right" href="https://shop.openenergymonitor.com/emonPi-3">View in Shop →</a></p>
		<p><br></p>
		<hr>
		<h4 id="emontxhttpsshopopenenergymonitorcomemontx-v3-electricity-monitoring-transmitter-optional"><strong><a href="https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter">emonTx</a></strong> (optional)</h4>
		<p>The emonTx is a remote sensor node. Data is transmitted to an emonPi or an emonBase via a low power 433MHz radio.</p>
		<p><strong>Note:</strong> as an alternative option, the emonTx can be used ‘standalone’ with an ESP8266 WiFi module running EmonESP to post directly to Emoncms without an emonPi / emonBase. See <a href="/setup/esp8266-adapter-emontx/">Using the EmonTx v3 with the ESP8266 Huzzah WIFI module</a></p>
		<p>The emonTx can monitor up to four single-phase AC circuits using clip-on CT sensors. A plug-in AC-AC adapter can be used to power the unit and provide an AC voltage sample for real-power calculations. 4x AA batteries can be used to power the emonTx if AC power is not available.</p>
		<p><img alt="emonTxV3" src="/images/hardwareimages/emontxv3photo.png"></p>
		<ul>
			<li>Energy monitoring add-on node</li>
			<li>Optional add-on if more than two circuits need to be monitored or if WiFi / Ethernet connectivity is not available at the location of the utility meter</li>
			<li>RF Range is approximately similar to home WiFi and can be affected by obstacles e.g. thick stone walls</li>
			<li>Up to 2x emonTx can be connected to a single emonPi</li>
			<li>To connect an emonTx see: <a href="/setup/emontx">Setup &gt; Adding Energy Monitoring Node</a>
			</li>
		</ul>
		<p class="note">An emonTx can be powered by 3 x AA batteries; however, if possible, it is recommended to power the unit with an AC-AC adapter to provide an AC voltage reference for more accurate Real Power and VRMS calculations.</p>
		<p><a class="btn pull-right" href="https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter-unit-433mhz">View in Shop →</a></p>
		<p><br></p>
		<hr>
		<h4 id="optical-utility-meter-led-pulse-sensorhttpsshopopenenergymonitorcomoptical-utility-meter-led-pulse-sensor-optional"><a href="https://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor/">Optical Utility Meter LED Pulse Sensor</a> (optional)</h4>
		<p><img src="/images/setup/ops.png" width="100"></p>
		<ul>
			<li>Optional add-on sensor for interfacing directly with a utility meter</li>
			<li>Compatible with all utility meters with LED pulse output</li>
			<li>Compatible with emonPi &amp; emonTx (one pulse sensor per unit)</li>
			<li>Reports exact amount of energy (Wh) reported by utility meter</li>
			<li>Cannot measure instantaneous power</li>
			<li>Best used in conjunction with clip-on CT sensor(s)</li>
		</ul>
		<p><a class="btn pull-right" href="https://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor">View in Shop →</a></p>
		<p><br></p>
		<hr>
		<h4 id="emonbasehttpsshopopenenergymonitorcomemonbase-web-connected-base-station-alternative-to-emonpi"><a href="https://shop.openenergymonitor.com/emonbase-web-connected-base-station/">emonBase</a> (alternative to emonPi)</h4>
		<p><img src="/images/setup/emonbase.jpg" width="200"></p>
		<ul>
			<li>Web connected gateway: <a href="https://shop.openenergymonitor.com/raspberry-pi-2-web-connected-base-station/">Raspberry Pi</a> + <a href="https://shop.openenergymonitor.com/rfm69pi-433mhz-raspberry-pi-base-station-receiver-board/">RFM69Pi RF receiver board</a>
			</li>
			<li>No on-board energy monitoring functions</li>
			<li>Receive data via low power RF (433Mhz) from emonTx or emonTH</li>
			<li>Local &amp; Remote Emoncms data logging</li>
			<li>Runs the same <a href="https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&amp;-Change-Log">software stack</a> as the emonPi
			</li>
			<li>No LCD screen to display local IP address or shut-down button</li>
			<li>Knowledge of SSH highly desirable</li>
			<li>Requires <a href="https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&amp;-Change-Log">pre-built SD card image</a> (optional extra)
			</li>
		</ul>
		<p><a class="btn pull-right" href="https://shop.openenergymonitor.com/emonbase-web-connected-base-station">View in Shop →</a></p>
		<p><br></p>
		<h4 id="a-classtitle-link-nameuse-in-the-usa-hrefuse-in-the-usaa-use-in-the-usa"><a class="title-link" href="#use-in-the-usa" id="use-in-the-usa" name="use-in-the-usa"></a> Use in the USA</h4>
		<p>The emonPi and emonTx are designed to monitor single phase AC up to 100A. The system can work for some set-ups in the USA with some changes to the configuration. See user guide section <a href="/setup/north-america/">Use in North America</a>.</p>
		<h4 id="a-classtitle-link-nameuse-with-3-phase-hrefuse-with-3-phasea-use-with-3-phase"><a class="title-link" href="#use-with-3-phase" id="use-with-3-phase" name="use-with-3-phase"></a> Use with 3 phase</h4>
		<p>The emonPi / emonTx have been designed for single-phase AC monitoring. The emonTx can monitor ‘approximate’ 3 phase (assuming balanced phases) using <a href="https://github.com/openenergymonitor/emonTxFirmware/tree/master/emonTxV3/RFM/emonTxV3.4/emonTxV3_4_3Phase_Voltage">modified firmware</a> and 3x CT sensors + 1 x AC-AC adapter. <a href="https://openenergymonitor.org/emon/buildingblocks/3-phase-power">Further reading</a></p><br>
		<a href="#comparison-table">View hardware comparison table <i class="icon-external-link"></i></a>
	</div>
</div><!--

</div>
<div class='install-instructions solarpv' markdown='1'>

-->
<br>
<div style="padding:10px;">
	<div class="install-instructions solarpv">
		<h3 id="a-classtitle-link-namesolar-pv-hardware-hrefsolar-pv-hardwarea-solar-pv-hardware"><a class="title-link" href="#solar-pv-hardware" id="solar-pv-hardware" name="solar-pv-hardware"></a> 2. Solar PV Monitoring</h3>
		<blockquote>
			<p>Providing real-time and historic information on your solar generation and demand matching, it will help you make better use of available solar power.</p>
		</blockquote>
		<p>The hardware options to set up a solar PV monitor are as follows:</p>
		<hr>
		<h4 id="emonpihttpsshopopenenergymonitorcomemonpi-solar-pv"><strong><a href="https://shop.openenergymonitor.com/emonpi-solar-pv/">emonPi</a></strong></h4>
		<p>The emonPi is an all-in-one Raspberry Pi based energy monitoring unit making for a simple installation where Ethernet or WiFi is available at the meter location.</p>
		<p>The emonPi can monitor two single-phase AC circuits using clip-on CT sensors. The emonPi can also monitor temperature, and interface directly with a utility meter via an optical pulse sensor.</p>
		<p><img alt="emonPi" src="/images/hardwareimages/emonPi_shop_photo.png"></p>
		<ul>
			<li>Raspberry Pi-based energy monitor</li>
			<li>Local &amp; Remote Emoncms data logging</li>
			<li>Requires WiFi / Ethernet plus 2 x power outlets</li>
			<li>Single unit required to monitor solar PV, provided the generation and site-consumption feeds are in the same physical location and WiFi/Ethernet connectivity is accessible at this location</li>
			<li>Requires <a href="https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&amp;-Change-Log">pre-built SD card image</a> (included)
			</li>
		</ul>
		<p><a class="btn pull-right" href="https://shop.openenergymonitor.com/emonpi-solar-pv-bundle/">View in Shop →</a></p>
		<p><br></p>
		<hr>
		<h4 id="emontxhttpsshopopenenergymonitorcomemontx-v3-electricity-monitoring-transmitter-optional-1"><strong><a href="https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/">emonTx</a></strong> (optional)</h4>
		<p>The emonTx is a remote sensor node. Data is transmitted to an emonPi or an emonBase via a low power 433MHz radio.</p>
		<p><strong>Note:</strong> as an alternative option, the emonTx can be used ‘standalone’ with an ESP8266 WiFi module running EmonESP to post directly to Emoncms without an emonPi / emonBase. See <a href="/setup/esp8266-adapter-emontx/">Using the EmonTx v3 with the ESP8266 Huzzah WIFI module</a></p>
		<p>The emonTx can monitor up to four single-phase AC circuits using clip-on CT sensors. A plug-in AC-AC adapter can be used to power the unit and provide an AC voltage sample for real-power calculations.</p>
		<p><img alt="emonTxV3" src="/images/hardwareimages/emontxv3photo.png"></p>
		<ul>
			<li>Energy monitoring add-on node</li>
			<li>Required if solar PV generation and site-consumption feeds are located in separate locations or if WiFi / Ethernet connectivity is not available at utility meter</li>
			<li>RF range is approximately similar to home WiFi and can be affected by obstacles e.g. thick stone walls</li>
			<li>Up to 2x emonTx can be connected to a single emonPi</li>
			<li>To connect an emonTx see: <a href="/setup/emontx">Setup &gt; Adding Energy Monitoring Node</a>
			</li>
		</ul>
		<p class="note">An emonTx can be powered by 3 x AA batteries, however this is not recommended for solar PV monitoring application since sensor adapter is require to determine direction of current flow and accurate VRMS &amp; Real Power calculations.</p>
		<h4 id="sensors-required-1">Sensors Required:</h4>
		<ul>
			<li>2 X <a href="https://shop.openenergymonitor.com/100a-max-clip-on-current-sensor-ct/">Clip-on CT sensors</a> (included in emonPi solar PV bundle)
			</li>
			<li>1 x <a href="https://shop.openenergymonitor.com/components/">AC-AC voltage sensor adapter</a> (included in emonPi solar PV bundle)
			</li>
		</ul>
		<h4 id="power-adapters-required-1">Power Adapters Required:</h4>
		<ul>
			<li>1 x <a href="https://shop.openenergymonitor.com/power-supplies/">USB 5V DC PSU</a>
			</li>
			<li><em>1 x <a href="https://shop.openenergymonitor.com/power-supplies/">AC-AC voltage sensor adapter</a> (essential for solar PV monitoring)</em></li>
		</ul>
		<p><a class="btn pull-right" href="https://shop.openenergymonitor.com/emontx-v3-electricity-monitoring-transmitter/">View in Shop →</a></p>
		<p><br></p>
		<hr>
		<h4 id="optical-utility-meter-led-pulse-sensorhttpsshopopenenergymonitorcomoptical-utility-meter-led-pulse-sensor-optional-1"><a href="https://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor/">Optical Utility Meter LED Pulse Sensor</a> (optional)</h4>
		<p><img src="/images/setup/ops.png" width="100"></p>
		<ul>
			<li>Optional add-on sensor for interfacing directly with utility meters</li>
			<li>Compatible with all utility meters with LED pulse output</li>
			<li>Compatible with emonPi &amp; emonTx (one pulse sensor per unit)</li>
			<li>Reports exact amount of energy (Wh) reported by utility meter</li>
			<li>Cannot measure instantaneous power</li>
			<li>Best used in conjunction with clip-on CT sensor(s)</li>
		</ul>
		<p><a class="btn pull-right" href="https://shop.openenergymonitor.com/optical-utility-meter-led-pulse-sensor">View in Shop →</a></p>
		<p><br></p>
		<hr>
		<h4 id="emonbasehttpsshopopenenergymonitorcomemonbase-web-connected-base-station-alternative-to-emonpi-1"><a href="https://shop.openenergymonitor.com/emonbase-web-connected-base-station/">emonBase</a> (alternative to emonPi)</h4>
		<p><img src="/images/setup/emonbase.jpg" width="200"></p>
		<ul>
			<li>Web connected gateway: <a href="https://shop.openenergymonitor.com/raspberry-pi-2-web-connected-base-station/">Raspberry Pi</a> + <a href="https://shop.openenergymonitor.com/rfm69pi-433mhz-raspberry-pi-base-station-receiver-board/">RFM69Pi RF receiver board</a>
			</li>
			<li>No on-board energy monitoring functions</li>
			<li>Receive data via low power RF (433Mhz) from emonTx or emonTH</li>
			<li>Local &amp; Remote Emoncms data logging</li>
			<li>Runs the same <a href="https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&amp;-Change-Log">software stack</a> as the emonPi
			</li>
			<li>No LCD screen to display local IP address or shut-down button</li>
			<li>Knowledge of SSH highly desirable</li>
			<li>Requires <a href="https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&amp;-Change-Log">pre-built SD card image</a> (optional extra)
			</li>
		</ul>
		<p><a class="btn pull-right" href="https://shop.openenergymonitor.com/emonbase-web-connected-base-station">View in Shop →</a></p>
		<p><br>
		<br></p>
		<h4 id="a-classtitle-link-nameuse-in-the-usa-hrefuse-in-the-usaa-use-in-the-usa"><a class="title-link" href="#use-in-the-usa" id="use-in-the-usa" name="use-in-the-usa"></a> Use in the USA</h4>
		<p>The emonPi and emonTx are designed to monitor single phase AC up to 100A. The system can work for some set-ups in the USA with some changes to the configuration. See user guide section <a href="/setup/north-america/">Use in North America</a>.</p>
		<h4 id="a-classtitle-link-nameuse-with-3-phase-hrefuse-with-3-phasea-use-with-3-phase"><a class="title-link" href="#use-with-3-phase" id="use-with-3-phase" name="use-with-3-phase"></a> Use with 3 phase</h4>
		<p>The emonPi / emonTx have been designed for single-phase AC monitoring. The emonTx can monitor ‘approximate’ 3 phase (assuming balanced phases) using <a href="https://github.com/openenergymonitor/emonTxFirmware/tree/master/emonTxV3/RFM/emonTxV3.4/emonTxV3_4_3Phase_Voltage">modified firmware</a> and 3x CT sensors + 1 x AC-AC adapter. <a href="https://openenergymonitor.org/emon/buildingblocks/3-phase-power">Further reading</a></p><br>
		<a href="#comparison-table">View hardware comparison table <i class="icon-external-link"></i></a>
	</div>
</div><!--

</div>
<div class='install-instructions temperature' markdown='1'>

-->
<div style="background-color:#F0F0F0;padding:10px;">
	<div class="install-instructions temperature" style="border-style: none;">
		<h3><a class="title-link" href="#temperature--humidity-sensors" id="temperature--humidity-sensors" name="temperature--humidity-sensors"></a>3. Temperature &amp; Humidity Monitoring</h3>
		<p><img alt="Temperature monitoring example" src="/images/setup/temp-dash.png"></p>
		<p>The hardware options to monitor temperature and/or humidity are as follows:</p>
		<hr>
		<h4 id="wireless-temperature-hardware">a) Wireless Temperature Hardware</h4>
		<h4 id="emonthhttpshopopenenergymonitorcomemonth-433mhz-temperature-humidity-node"><a href="http://shop.openenergymonitor.com/emonth-433mhz-temperature-humidity-node/">emonTH</a></h4>
		<p>The emonTH is a long battery-life, easy to deploy, wireless room temperature and humidity sensor node designed for monitoring a building’s thermal performance.</p>
		<p>The emonTH is powered by two AA batteries and has an on-board Si7021 temperature and humidity sensor. An external DS18B20 temperature sensor can easily be connected to a screw terminal block to provide external temperature readings.
</p>
		<p><img alt="emonTH" src="/images/setup/emonth-plant.png" title="emonTH"></p>
		<ul>
			<li>Wireless temperature &amp; humidity monitoring node</li>
			<li>Compatible with emonPi &amp; emonBase</li>
			<li>6 month battery life (2 x AA batteries not included)</li>
			<li>Up to 4 emonTH nodes can communicate with a single emonPi</li>
			<li>Internal temperature &amp; humidity + optional external probe</li>
			<li>Optional pulse sensor input</li>
		</ul>
		<p><a class="btn pull-right" href="https://shop.openenergymonitor.com/emonth-v2-temperature-humidity-node/">View in Store →</a></p>
		<p><br></p>
		<hr>
		<h4 id="wired-temperature-hardware">b) Wired Temperature Hardware</h4>
		<h4 id="ds18b20-sensor-on-rj45httpsshopopenenergymonitorcomrj45-encapsulated-ds18b20-temperature-sensor"><a href="https://shop.openenergymonitor.com/rj45-encapsulated-ds18b20-temperature-sensor/">DS18B20 sensor on RJ45</a></h4>
		<p><img src="/images/hardwareimages/rj45_sensor.png"></p>
		<ul>
			<li>Compatible with emonPi &amp; emonTx</li>
			<li>Up to 6 sensors can be connected to a single emonPi / emonTx using <a href="http://shop.openenergymonitor.com/rj45-expander-for-ds18b20-pulse-sensors/">RJ45 Breakout</a>
			</li>
			<li>Sensor wire can be extended using RJ45 cable and <a href="http://shop.openenergymonitor.com/rj45-extender/">RJ45 Extender</a>
			</li>
		</ul>
		<p><a class="btn pull-right" href="http://shop.openenergymonitor.com/rj45-encapsulated-ds18b20-temperature-sensor/">View in Shop →</a></p>
		<p><br></p>
		<h4 id="ds18b20-sensor-on-wirehttpshopopenenergymonitorcomencapsulated-ds18b20-temperature-sensor"><a href="http://shop.openenergymonitor.com/encapsulated-ds18b20-temperature-sensor/">DS18B20 sensor on wire</a></h4>
		<p><img src="https://cdn2.bigcommerce.com/server4400/98a75/products/173/images/668/SWE2btesting__95144.1429694876.1280.1280.jpg?c=2" width="300"></p>
		<ul>
			<li>Compatible with emonTx terminal block</li>
			<li>Compatible with emonPi using <a href="http://shop.openenergymonitor.com/rj45-to-terminal-block-breakout-for-ds18b20/">RJ45 Breakout</a>
			</li>
			<li>Up to 6 sensors can be connected to emonPi / emonTx using <a href="http://shop.openenergymonitor.com/rj45-to-terminal-block-breakout-for-ds18b20/">RJ45 Breakout</a>
			</li>
		</ul>
		<p><a class="btn pull-right" href="http://shop.openenergymonitor.com/encapsulated-ds18b20-temperature-sensor/">View in Shop →</a><br></p><br>
		<a href="#comparison-table">View hardware comparison table <i class="icon-external-link"></i></a>
	</div>
</div><!--

</div>

</div>

-->
<br>

### {% linkable_title Comparison Table%}

<table style="border: 1px solid black;">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th style="border: 1px solid black;">emonPi</th>
			<th style="border: 1px solid black;">emonBase</th>
			<th style="border: 1px solid black;">emonTx</th>
			<th style="border: 1px solid black;">emonTH</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="border-right: 1px solid black;">Main purpose</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">All-in-one monitor &amp; gateway</td>
			<td style="border-right: 1px solid black;">Web-connected gateway</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">Energy monitor add-on</td>
			<td>Sensor Node</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid black;">No. CT sensor inputs</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">2</td>
			<td style="border-right: 1px solid black;">0</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">4</td>
			<td>0</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid black;">No. of voltage sensor inputs</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">1</td>
			<td style="border-right: 1px solid black;">0</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">1</td>
			<td>0</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid black;">No. of pulse counting inputs</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">1 - via RJ45</td>
			<td style="border-right: 1px solid black;">0</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">1 - via RJ45</td>
			<td>1 - via terminal block*</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid black;">No. of temperature sensor inputs</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">6 - via RJ45**</td>
			<td style="border-right: 1px solid black;">0</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">6 - via RJ45**</td>
			<td>2 - internal + external</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid black;">No. of humidity sensor inputs</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">0</td>
			<td style="border-right: 1px solid black;">0</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">0</td>
			<td>1</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid black;">Power supply</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">5V USB mini-B</td>
			<td style="border-right: 1px solid black;">5V mico USB</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">9V AC-AC / 3 x AAA</td>
			<td>2 x AA</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid black;">Local data storage (Emoncms)</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">Yes</td>
			<td style="border-right: 1px solid black;">Yes</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">No</td>
			<td>No</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid black;">Requires additional base-station</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">No</td>
			<td style="border-right: 1px solid black;">No</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">Yes</td>
			<td>Yes</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid black;">LCD Display</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">Yes</td>
			<td style="border-right: 1px solid black;">No</td>
			<td style="border-right: 1px solid black;background-color:#F0F0F0;">No</td>
			<td>No</td>
		</tr>
	</tbody>
</table>

<p>* Requires manual wiring into terminal block </p>
<p>* Requires RJ45 breakout board </p>

*Full Documentation on all hardware units in the [Technical Resources](/technical/resources/) section.*

<br>

<h3>Video Guide</h3>

<div class='videoWrapper'>
	<iframe allowfullscreen frameborder="0" height="315" src="https://www.youtube.com/embed/ZEa7neZesko" width="560"></iframe>
</div>
<br>
<p style="text-align: right;"><small>Raspberry Pi is a registered trademark of the <a href="https://www.raspberrypi.org/about/">Raspberry Pi Foundation</a></small></p>

***

### [Next step: Connect &raquo;](/setup/connect/)
