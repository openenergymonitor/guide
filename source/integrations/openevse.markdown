---
layout: page
title: OpenEVSE Build Guide
description: Open Source Electric Vehicle Charging Staion
date: '2014-12-18 21:49'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

OpenEVSE is a fully open-source EVSE (Electric Vehicle Supply Equipment) charging station designed by [OpenEVSE](http://openevse.com) and re-sold by OpenEnergyMonitor.

![Nissan LEAF OpenEVSE](/images/integrations/openevse-banner.png)


<p class='note'>
OpenEnergyMonitor have collaborated with OpenEVSE to improve energy monitoring integration and control as well as tailoring the setup for use in Europe and the UK. This page provides Europe / UK specific setup instructions and considerations.
</p>


See our [blog post](https://blog.openenergymonitor.org/2017/01/openevse-build/) detailing a full OpenEVSE build review, and usage.


***

## {% linkable_title Assembly %}

The standard build guide from OpenEVSE can be followed taking into account the specific OpenEnergyMonitor (Europe / UK) considerations (see below):

- **OpenEVSE Assembly guide**: [**Web**](http://openevse.dozuki.com/Guide/OpenEVSE+50A+Charging+Station/8), [**pdf**](http://openevse.dozuki.com/GuidePDF/link/8/en)
- [**OpenEVSE WiFi Module Installation Guide**](https://openevse.dozuki.com/Guide/OpenEVSE+WiFi+%28Beta%29/14)

<figure>
  <img src="/images/integrations/openevse-kit.jpg">
  <figcaption><i>Kit contents.</i></figcaption>
</figure>

<figure>
  <img src="/images/integrations/openevse-build.jpg">
  <figcaption><i>An assembled OpenEVSE unit. LCD, push button and WiFi module are attached to the EVSE enclosure cover, not shown. </i></figcaption>
</figure>

- **[Testing OpenEVSE](https://openevse.dozuki.com/Guide/Testing+Basic+and+Advanced/12)**

___

## {% linkable_title OpenEnergyMonitor EVSE Considerations %}

Specific considerations for OpenEVSE units obtained via the [OpenEnergyMonitor Shop](http://shop.openenergymonitor.com/ev-charge-controllers/) to be installed in Europe / UK.

### 1. EV Connector Cable Wiring

The [EV cables from the OpenEnergyMonitor shop (Type 1 & Type 2)](http://shop.openenergymonitor.com/tethered-ev-charging-cable/) are wired as follows:

![](/images/integrations/oem-ev-cable-wire.jpg)

<p class='note warning'>
All connections in EVSE should be made using bootlace ferrules crimped terminals. This is especially essential for EV cables since they use fine stranded wire for increased flexibility. This fine stranded wire is susceptible to creeping out of a terminal due to thermal cycling resulting in possible overheating. See this <a href="http://www2.schneider-electric.com/resources/sites/SCHNEIDER_ELECTRIC/content/live/FAQS/126000/FA126881/en_US/Fine%20Stranded%20Wire%200515DB0301.pdf">Schneider Electric Data Bulletin</a>.
</p>

**EVSE cables obtained from the OpenEnergyMonitor shop will be pre-equipped with bootlace ferrules crimped terminals connections.**

![OpenEVSE WiFi](/images/integrations/crimped-evse-wire.png)

### 2. EVSE Mains Wiring

<p class='note warning'>
Mains wiring should only be undertaken by a qualified electrician.
</p>

In the UK / Europe an EVSE must be directly wired into a consumer unit using appropriately sized wiring and an RCD circuit breaker e.g. RCBO. The wiring and circuit breaker should be sized for maximum rating of the EV/EVSE and tethered cable, 6mm CSA wire is appropriate for 32A.

<p class='note'>
The max current of the EVSE should be set to match the continuous current rating of mains wiring in the OpenEVSE settings (via LCD menu) on first power up before connecting an EV (Setup > Max Current >).
</p>


*In the USA / Canada you may [see photos of the EVSE plugged into a wall-outlet](/images/integrations/openevse_usa_plug.jpg), this is a [NEMA 14-30 plug](https://en.wikipedia.org/wiki/AC_power_plugs_and_sockets#NEMA_14-30) commonly used for electric clothes dryers, etc. These plugs don't exist in the UK. The UK uses [BS1363 3-pin plugs](https://en.wikipedia.org/wiki/AC_power_plugs_and_sockets:_British_and_related_types#BS_1363-2_13.C2.A0A_switched_and_unswitched_socket-outlets) rated to 13A max (10A continuous).*

**Do not wire an EVSE into a 3-pin BS1363 plug unless the charging current is limited to 10A**. This defeats the point of using an EVSE; better to use a [portable EVSE 'granny cable'](http://www.evcables.co.uk/231/Portable-Charger-Cables) instead.

In mainland Europe [Schuko plugs](https://en.wikipedia.org/wiki/Schuko) are rated to 16A max (10A continuous).

### 3. Charging Level

The OpenEVSE unit should be set to **L2** (Level 2) charging mode (240V). This should be default setting for OpeneVSE running EU firmware. The charging mode can be set via the LCD menu:

`Setup > Charging Mode > L2`

*Level 2 charging refers to charging from 220v-240v, as opposed to level 1 charging from 110v.*

**See User Guide video at the bottom of this page for a overview of how to operate the unit.**

### 4. GFCI Test Enabled

All OpenEVSE's from OpenEnergyMonitor contain hardware for GFCI (ground fault interruption) continuous monitoring of ground faults. See safely features section above. GFCI test should always be enabled in the LCD menu.


***



## {% linkable_title User Guide %}


### Hardware User Guide

<div class='videoWrapper'>
<iframe width="300" height="169" src="https://www.youtube.com/embed/cIvmYP57eOo" frameborder="0" allowfullscreen></iframe>
</div>

**[Software User Guide](/integrations/evse-setup)**


## {% linkable_title Safety %}

OpenEVSE units have been designed to exceed the safety requirements for EV Charging Stations from SAE J1772, NEC, UL and CE. Before supplying power to the car (and continuously while charging) the EVSE unit conducts a number of checks, no power is supplied until all the checks have passed. See

- [OpenEVSE Safety Features](https://openev.freshdesk.com/support/solutions/articles/6000113537-openevse-safety-features)
- [OpenEVSE Safety Features Flow Diagram (.pdf)](/images/integrations/OpenEVSE_flowchart.pdf)

<p class='note warning'>
Mains wiring should only be undertaken by a qualified electrician.
</p>
