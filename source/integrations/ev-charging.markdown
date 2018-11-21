---
layout: page
title: EV Charging
description: EV charging
date: '2018-05-15 14:05'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

OpenEnergyMonitor has partnered with [OpenEVSE](https://www.openevse.com) to develop the EmonEVSE unit which is fully certified and designed for the European market. We are also the official European re-seller of OpenEVSE.

We have been collaborating with OpenEVSE to improve Emoncms remote data logging integration, web UI control interface and solar PV diversion.

<table style="width:100%">
  <tr>
    <th><h2>EmonEVSE</h2></th>
    <th><h2>OpenEVSE (Kit)</h2></th>
  </tr>
  <tr>
    <td>
      <img src="/images/integrations/ev-charging/emonevse-t2.png">
    </td>
    <td>
      <img src="/images/integrations/ev-charging/openevse.jpg">
    </td>
  </tr>
  <tr>
    <td>
      <ul>
        <li>Non-tethered socket (Type 2)</li>
        <li>Pre-assembled</li>
      	<li>Fully CE certified && OLEV grant approved</li>
        <li>7kW single-phase / 22kW three-phase</li>
        <div class="divider"></div>
        <li>Energy monitoring</li>
        <li>RGB LCD display</li>
      	<li>WiFi connectivity</li>
		    <li>Web-app interface</li>
		    <li>Real-time solar PV diversion</li>
				<li>Variable charge rate</li>
				<li>Emoncms data logging</li>
        <li>Advanced safety features</li>
				<li>Open hardware & firmware</li>
				<li>HTTP/MQTT developer API</li>
				<div class="divider"></div>
				<li><a href="http://files.openenergymonitor.org/datasheet/EmonEVSE-datasheet.pdf"><b>Installation Guide & Datasheet</b></a></li>
				<li><a href="/integrations/evse-setup"><b>User Setup Guide</b></a></li>
	      <a class="btn pull-center" href="https://shop.openenergymonitor.com/emonevse-wifi-connected-ev-charging-station-iec-60947-5-type-2/">View in Shop &rarr; </a>
      </ul>
    </td>
    <td>
      <ul>
        <li>Tethered cable</li>
        <li>DIY Assembly Kit</li>
        <li>Components are CE complient </li>
        <li>Single-phase 7kW</li>
        <div class="divider"></div>
        <li>Energy monitoring</li>
        <li>RGB LCD display</li>
				<li>WiFi connectivity</li>
		    <li>Web-app interface</li>
		    <li>Real-time solar PV diversion</li>
				<li>Variable charge rate</li>
				<li>Emoncms data logging</li>
        <li>Advanced safety features</li>
        <li>Open hardware & firmware</li>
				<li>HTTP/MQTT developer API</li>
				<div class="divider"></div>
				<li><a href="/integrations/openevse"><b>Assembly Guide</b></a></li>
				<li><a href="/integrations/evse-setup"><b>User Setup Guide</b></a></li>
				<a class="btn pull-center" href="https://shop.openenergymonitor.com/openevse-wifi-emoncms-ev-charging-station-kit/">View in Shop &rarr; </a>
      </ul>
    </td>
  </tr>
</table>

## WiFi Connectivity

![](/images/integrations/ev-charging/openevse-wifi.png)

<a class="btn pull-center" href="https://openevse.openenergymonitor.org">View Live App Demo &rarr; </a>


## Solar PV Diversion Demo

Solar PV diversion dynamically adjusts the charging rate in real-time based on the excess generated power, an OpenEnergyMonitor emonPi is required for solar PV diversion. See [Solar PV Application Guide](/applications/solar-pv).

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/WJtNEPrSSvg" frameborder="0" allowfullscreen></iframe>
</div>

## {% linkable_title Safety %}

OpenEVSE & EmonEVSE units have been designed to exceed the safety requirements for EV Charging Stations from SAE J1772, NEC, UL and CE. Before supplying power to the car (and continuously while charging) the EVSE unit conducts a number of checks, no power is supplied until all the checks have passed. See

- [Safety Features](https://openev.freshdesk.com/support/solutions/articles/6000113537-openevse-safety-features)
- [Safety Features Flow Diagram (.pdf)](/images/integrations/OpenEVSE_flowchart.pdf)

<p class='note warning'>
Installation should only be undertaken by a qualified electrician.
</p>

![](/images/integrations/ev-charging/evsolarpv.jpeg)
