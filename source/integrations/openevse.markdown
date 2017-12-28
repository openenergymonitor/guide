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

![OpenEVSE WiFi](/images/integrations/openevse-wifi.png)

*OpenEnergyMonitor have been collaborating with OpenEV to improve energy monitoring integration and control as well as tailoring the setup for use in Europe and the UK. This page provides Europe / UK specific setup instructions and considerations.*


See our [blog post](https://blog.openenergymonitor.org/2017/01/openevse-build/) detailing a full OpenEVSE build review, and usage.

<a class="btn pull-right" href="https://shop.openenergymonitor.com/ev-charge-controllers/">View in Shop &rarr; </a>

<br>

<!--<div class='videoWrapper'>-->
<!--<iframe width="300" height="169" src="https://www.youtube.com/embed/A9D48V1D1G4" frameborder="0" allowfullscreen></iframe>-->
<!--</div>-->

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
  <figcaption><i>An assembled OpenEVSE unit.</i></figcaption>
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

**See User Guide video at the top of this page for a overview of how to opperate the unit.**

## WiFi Gateway

The WiFi gateway allows all functions of the OpenEVSE to be controlled remotly and data logged to Emoncms. The WiFi gateway is optional but highly recommend.

![OpenEVSE WiFi](/images/integrations/openevse-wifi.png)

### Setup

- Follow the [OpenEVSE WiFi setup](https://openevse.dozuki.com/Guide/OpenEVSE+WiFi+%28Beta%29/14) guide to connect up the ESP8266 WiFi module.

- Once powered up connect to WiFi network with SSID `OpenEVSE_xxxx` with password `openevse` using a computer or mobile device.

- You should get directed to a captive portal where you choose to join a local network. If captive portal does not work, browse to [http://192.168.4.1](http://192.168.4.1)

![](/images/integrations/openevse-wifi-scan.png)

- Setup Emoncms / MQTT settings

![](/images/integrations/openevse-services.png)

- OpenEVSE control: the OpenEVSE can be controlled remotely via web interface or via  MQTT, HTTP or direct serial using RAPI API.

See full OpenEVSE WiFi gateway documentation in the [OpenEVSE ESP8266 WiFi GitHub Repo](https://github.com/openevse/ESP8266_WiFi_v2.x/).

### Solar PV Divert

The OpenEVSE WifI gateway includes a solar PV diversion feature. This feature allows the OpenEVSE to adjust the charge rate based on the amount of available solar PV production or excess power.

<figure>
  <img src="/images/integrations/openevse-divert.png">
  <figcaption><i>OpenEVSE solar PV diversion example. Yellow: solar PV, blue: OpenEVSE.</i></figcaption>
</figure>

The graph above is explained as follows:

- OpenEVSE is initially sleeping with an EV connected
- Once solar PV generation (yellow) reaches 6A (1.5kW @ 240V) the OpenEVSE initiates charging
- Charging current is dynamically adjusted based on available solar PV generation
- Once charging has begun, even if generation drops below 6A, the EV will continue to charge*

**The decision was made not to pause charging if generation current drops below 6A since repeatedly starting / stopping a charge causes excess wear to the OpenEVSE relay contactor.*

If a Grid +I/-E (positive import / negative export) feed was used (instead of solar PV generation feed) the OpenEVSE would adjust its charging rate based on *excess* power that would be exported to the grid; for example, if solar PV was producing 4kW and 1kW was being used on-site, the OpenEVSE would charge at 3kW and the amount exported to the grid would be 0kW. If on-site consumption increases to 2kW the OpenEVSE would reduce its charging rate to 2kW.

An [OpenEnergyMonitor solar PV energy monitor](https://guide.openenergymonitor.org/applications/solar-pv/) with an AC-AC voltage sensor adaptor is required to monitor direction of current flow.

#### Solar PV Divert Setup

- To use 'Eco' charging mode MQTT must be enabled and 'Solar PV divert' MQTT topics must be entered.
- Integration with an OpenEnergyMonitor emonPi is straightforward:
  - Connect to emonPi MQTT server, [emonPi MQTT credentials](https://guide.openenergymonitor.org/technical/credentials/#mqtt) should be pre-populated
  - Enter solar PV generation / Grid (+I/-E) MQTT topic e.g. if solar PV is being monitored by emonPi CT channel 1 enter `emon/emonpi/power1`
  - [MQTT lens Chrome extension](https://chrome.google.com/webstore/detail/mqttlens/hemojaaeigabkbcookmlgmdigohjobjm?hl=en) can be used to view MQTT data e.g. subscribe to `emon/#` for all OpenEnergyMonitor MQTT data. To lean more about MQTT see [MQTT section of OpenEnergyMonitor user guide](https://guide.openenergymonitor.org/technical/mqtt/)
  - If using Grid +I/-E (positive import / negative export) MQTT feed ensure the notation positive import / negative export is correct, CT sensor can be physically reversed on the cable to invert the reading.

#### Solar PV Divert Operation

![eco](/images/integrations/eco.png)

To enable 'Eco' mode (solar PV divert) charging:

- Connect EV and ensure EV's internal charging timer is switched off
- Pause charge; OpenEVSE should display 'sleeping'
- Enable 'Eco' mode using web interface or via MQTT
- EV will not begin charging when generation / excess current reaches 6A (1.4kW @ 240V)

- During 'Eco' charging changes to charging current are temporary (not saved to EEPROM)
- After an 'Eco mode' charge the OpenEVSE will revert to 'Normal' when EV is disconnected and previous 'Normal' charging current will be reinstated.
- Current is adjusted in 1A increments between 6A* (1.5kW @ 240V) > max charging current (as set in OpenEVSE setup)
- 6A is the lowest supported charging current that SAE J1772 EV charging protocol supports
- The OpenEVSE does not adjust the current itself but rather request that the EV adjusts its charging current by varying the duty cycle of the pilot signal, see [theory of operation](https://openev.freshdesk.com/support/solutions/articles/6000052070-theory-of-operation) and [Basics of SAE J1772](https://openev.freshdesk.com/support/solutions/articles/6000052074-basics-of-sae-j1772).
- Charging mode can be viewed and set via MQTT: `{base-topic}/divertmode/set` (1 = normal, 2 = eco).

\* *OpenEVSE contoller firmware [V4.8.0](https://github.com/OpenEVSE/open_evse/releases/tag/v4.8.0) has a bug which restricts the lowest charging current to 10A. The J1772 protcol can go down to 6A. This ~~will~~ has be fixed with a firmware update. See [OpenEnergyMonitor OpenEVSE FW releases](https://github.com/openenergymonitor/open_evse/releases/). A ISP programmer is required to update openevse controler FW.*

***

See full OpenEVSE WiFi gateway documentation in the [OpenEVSE ESP8266 WiFi GitHub Repo](https://github.com/openevse/ESP8266_WiFi_v2.x/).

