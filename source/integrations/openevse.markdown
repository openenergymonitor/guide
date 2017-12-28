---
layout: page
title: OpenEVSE EV Charging Station
description: Open Source Electric Vehicle Charging Staion
date: '2014-12-18 21:49'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

OpenEVSE is a fully open-source EVSE (Electric Vehicle Supply Equipment) charging station designed by [OpenEV](http://openevse.com).

> An EVSE charging station is a device an electric car (EV) is plugged into to charge. It communicates with the car to agree on the fastest and safest charging rate that both the car and the power supply can support.

![Nissan LEAF OpenEVSE](/images/integrations/openevse-banner.png)

*OpenEnergyMonitor have been collaborating with OpenEV to improve energy monitoring integration and control as well as tailoring the setup for use in Europe and the UK. This page provides Europe / UK specific setup instructions and considerations.*

See our [blog post](https://blog.openenergymonitor.org/2017/01/openevse-build/) detailing a full OpenEVSE build review, and usage.

<a class="btn pull-right" href="https://shop.openenergymonitor.com/ev-charge-controllers/">View in Shop &rarr; </a>

<br>

<div class='videoWrapper'>
<iframe width="300" height="169" src="https://www.youtube.com/embed/A9D48V1D1G4" frameborder="0" allowfullscreen></iframe>
</div>

<br>

<div class='videoWrapper'>
<iframe width="300" height="169" src="https://www.youtube.com/embed/cIvmYP57eOo" frameborder="0" allowfullscreen></iframe>
</div>

<br>

***

## Assembly

The standard build guide from OpenEV can be followed taking into account the specific OpenEnergyMonitor (Europe / UK) considerations (see below):

**OpenEVSE P50D Assembly guide**: [**Web**](http://openevse.dozuki.com/Guide/OpenEVSE+50A+Charging+Station/8), [**pdf**](http://openevse.dozuki.com/GuidePDF/link/8/en)

<figure>
  <img src="/images/integrations/openevse-kit.jpg">
  <figcaption><i>Kit contents.</i></figcaption>
</figure>

<figure>
  <img src="/images/integrations/openevse-build.jpg">
  <figcaption><i>An assembled OpenEVSE unit with cover removed.</i></figcaption>
</figure>

___

## OpenEnergyMonitor EVSE Considerations

Specific considerations for OpenEVSE units obtained via the [OpenEnergyMonitor Shop](http://shop.openenergymonitor.com/ev-charge-controllers/) to be installed in Europe / UK.

### 1. EV Connector Cable Wiring

The [EV cables from the OpenEnergyMonitor shop (Type 1 & Type 2)](http://shop.openenergymonitor.com/tethered-ev-charging-cable/) are wired as follows:

![](/images/integrations/oem-ev-cable-wire.jpg)

### 2. EVSE Mains Wiring

<p class='note warning'>
Mains wiring should only be undertaken by a qualified electrician.
</p>

In the UK / Europe an EVSE must be directly wired into a consumer unit using appropriately sized wiring and an RCD circuit breaker e.g. RCBO. It is highly recomended to size the mains wiring for at least the maximum rating of the EV teathered cable (usually 32A).

<p class='note'>
The max current of the EVSE should be set to match the continuous current rating of mains wiring in the OpenEVSE settings (via LCD menu) on first power up before connecting to an EV (Setup > Max Current >).
</p>


*In the USA / Canada you may [see photos of the EVSE plugged into a wall-outlet](/images/integrations/openevse_usa_plug.jpg), this is a [NEMA 14-30 plug](https://en.wikipedia.org/wiki/AC_power_plugs_and_sockets#NEMA_14-30) commonly used for electric clothes dryers, etc. These plugs don't exist in the UK. The UK uses [BS1363 3-pin plugs](https://en.wikipedia.org/wiki/AC_power_plugs_and_sockets:_British_and_related_types#BS_1363-2_13.C2.A0A_switched_and_unswitched_socket-outlets) rated to 13A max (10A continuous).*

**Do not wire an EVSE into a 3-pin BS1363 plug unless the charging current is limited to 10A**. This defeats the point of using an EVSE; better to use a [portable EVSE 'granny cable'](http://www.evcables.co.uk/231/Portable-Charger-Cables) instead.

In mainland Europe [Schuko plugs](https://en.wikipedia.org/wiki/Schuko) are rated to 16A max (13A continous).

### 3. Charging Level

The OpenEVSE unit should be set to **Level 2** charging mode. The charging mode can be set via the LCD menu:

`Setup > Charging Mode > L2`

*Level 2 charging refers to charging from 220v-240v, as opposed to level 1 charging from 110v.*

**See User Guide video at the top of this page for a overview of how to opperate the unit**

## WiFi Setup (optional)

If using the optional WiFi module:

- Follow the [OpenEVSE WiFi setup](https://openevse.dozuki.com/Guide/OpenEVSE+WiFi+%28Beta%29/14) guide to connect up the ESP8266 WiFi unit

- Once powered up connect to WiFi network with SSID `OpenEVSE_xxxx` with password `openevse` using a computer or mobile device.

- You should get directed to a captive portal where you choose to join a local network. If captive portal does not work, browse to [http://192.168.4.1](http://192.168.4.1).

- Setup Emoncms / MQTT settings

See full guide and source code in the [OpenEVSE ESP8266 WiFi GitHub Repo](https://github.com/openevse/ESP8266_WiFi_v2.x/)
