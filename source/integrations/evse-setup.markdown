---
layout: page
title: OpenEVSE / EmonEVSE Setup Guide
description: Open Source Electric Vehicle Charging Staion
date: '2014-12-18 21:49'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

<p>&larr; <a href="/integrations/ev-charging/">EV-Charging</a></p>

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/WJtNEPrSSvg" frameborder="0" allowfullscreen></iframe>
</div>

<p class='note'>
OpenEVSE and EmonEVSE share the same software platform, both these units are configured and setup in the same way, "OpenEVSE" and "EmonEVSE" will be used interchangeably in this guide.
</p>

<!-- toc -->

- [Web Interface Setup](#web-interface-setup)
  * [WiFi Setup](#wifi-setup)
  * [Services Setup](#services-setup)
    + [Emoncms Server Setup](#emoncms-server-setup)
    + [MQTT Setup](#mqtt-setup)
    + [Developer API](#developer-api)
  * [Solar PV Divert](#solar-pv-divert)
    + [Solar PV Divert Setup](#solar-pv-divert-setup)
    + [Advanced Solar PV Divert Setup](#advanced-solar-pv-divert-setup)
    + [Solar PV Divert Operation](#solar-pv-divert-operation)
- [Emoncms Setup](#emoncms-setup)
  * [Input Processing](#input-processing)
  * [Emoncms ‘Apps’ Dashboard](#emoncms-apps-dashboard)

<!-- tocstop -->

## Web Interface Setup

All functions of the EVSE can be controlled via the web interface, see [https://openevse.openenergymonitor.org](https://openevse.openenergymonitor.org) for a live demo. This interface is optimised to work well on a mobile device. 

<br>
<div class='videoWrapper'>
<iframe width="300" height="169" src="https://www.youtube.com/embed/OAjlKmyRJMk" frameborder="0" allowfullscreen></iframe>
</div>
<br>

### WiFi Setup

![OpenEVSE WiFi](/images/integrations/openevse-wifi.png)

- Once powered up connect to WiFi network with SSID `OpenEVSE_xxxx` with password `openevse` using a computer or mobile device.

- You should get directed to a captive portal where you choose to join a local network. If captive portal does not work, browse to [http://192.168.4.1](http://192.168.4.1)

![](/images/integrations/openevse-wifi-scan.png)

### Services Setup

![](/images/integrations/openevse-services.png)

#### Emoncms Server Setup

OpenEVSE can post data directly to an Emoncms server, enter the following:

- Emoncms server url e.g [emoncms.org](https://emoncms.org)
- Node-name is the name given to the OpenEVSE data in Emoncms Inputs
- Write API key, obtained from Emoncms account page
- SHA-1 fingerpint, if posting over HTTPS/SSL is required enter Emoncms server SHA-1 fingerprint. Recomended leave blank. The emoncms.org SHA-1 finger print will change ever few months.
- See [Emoncms Setup](#emoncms-setup) below for details of how to log the EVSE data in Emoncms

#### MQTT Setup

The OpenEVSE supports [MQTT connection](/technical/mqtt). MQTT is used to communicate with an emonPi for Solar PV Divert (EcoMode) feature.

<p class='note'>
For Solar PV Divert (EcoMode) to work emonPi and OpenEVSE need be on the same local network or at least access to emonPi MQTT server (port 1883)
</p>

- Check your local emonPi hostname, this should bt [emonpi/](http://emonpi) or [emonpi.local/](http://emonpi.local). On some networks local hostname lookup doesn't work. In this case use emonPi local IP address, highly recommend assigning emonPi a reserved local IP address to avoid it chaging via DHCP.
- Enter emonPi local network
- To connect to an emonPi MQTT server on local network use pre-populated username and password
- Base-topic is the base topic used by the OpenEVSE to publish data. If posting data to local emonPi via MQTT is required change base-topic to `emon/openevse`. EVSE data should will now appaar in local emonPi Emoncms Inputs
- If Solar PV Divert feature is required see [Solar PV Divert](#solar-pv-divert) section below for more info


#### Developer API

The OpenEVSE can be controlled remotely via web interface or via  MQTT, HTTP or direct serial using RAPI API.See full OpenEVSE WiFi gateway documentation in the [OpenEVSE ESP8266 WiFi GitHub Repo](https://github.com/openevse/ESP8266_WiFi_v2.x/).

Developer mode can be enabled on the `System` tab of the OpenEVSE web interface

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

**The decision was made not to pause charging if generation current drops below 6A since repeatedly starting / stopping a charge causes excess wear to the OpenEVSE relay contactor.**

If a Grid +I/-E (positive import / negative export) feed was used (instead of solar PV generation feed) the OpenEVSE would adjust its charging rate based on *excess* power that would be exported to the grid; for example, if solar PV was producing 4kW and 1kW was being used on-site, the OpenEVSE would charge at 3kW and the amount exported to the grid would be 0kW. If on-site consumption increases to 2kW the OpenEVSE would reduce its charging rate to 2kW.

An [OpenEnergyMonitor solar PV energy monitor](https://guide.openenergymonitor.org/applications/solar-pv/) with an AC-AC voltage sensor adaptor is required to monitor direction of current flow.

#### Solar PV Divert Setup

- To use 'Eco' charging mode MQTT must be enabled and 'Solar PV divert' [emonPi MQTT topics](/technical/mqtt/) must be entered.
- Integration with an OpenEnergyMonitor emonPi is straightforward:
  - *Note: This guide assumes an OpenEnergyMonitor emonPi system is already setup monitoring solar PV, see not [emonPi Solar PV Setup Guide](/applications/solar-pv)*
  - Connect to emonPi MQTT server, [emonPi MQTT credentials](technical/credentials/#mqtt) should be pre-populated
  - [MQTT lens Chrome extension](https://chrome.google.com/webstore/detail/mqttlens/hemojaaeigabkbcookmlgmdigohjobjm?hl=en) can be used to view MQTT data e.g. subscribe to `emon/#` to see all OpenEnergyMonitor MQTT data. To lean more about MQTT see [MQTT section of OpenEnergyMonitor user guide](https://guide.openenergymonitor.org/technical/mqtt/)


**Divert Total PV Generation:**

Preferable if another solar PV diversion system is fitted e.g hot water immersion, battery storage or the solar PV system is small. Setting the EVSE to divert the total PV generation to the EV will ensure the EV takes priority over other diversion systems that may be fitted.

- Enter MQTT topic of the solar PV generation into the `Solar PV Generation` field e.g if emonPi CT1 is monitoring generation enter `emon/emonpi/power1` or if using emonTx CT2 `emon/emontx3/power2`. Leave the Grid field empty

**Divert Excess Generation:**

Preferable to minimise grid import. Excess generation takes into account the power being used locally onsite e.g home consumption.

- Enter MQTT topic of the CT sensor being using to monitor the grid connection into the `Grid` field. This CT should be clipped on the incoming Live/Neutral before any consumption or generation. The grid feed should be **positive while importing and negative when exporting**, physically invert the CT sensor to invert the reading if required. If emonPi CT1 is monitoring generation enter `emon/emonpi/power1` or if using emonTx CT2 `emon/emontx3/power2`. Leave the Solar PV generation field empty.

#### Advanced Solar PV Divert Setup

In some installations it may be not possible measure the correct metric required by the EVSE e.g solar PV gen or grid import / export. However if is possible to calculate the required metric by addition or subtraction using Emoncms Input Processing the resulting value then then be published to a new MQTT topic which can be used by the EVSE. eg This maybe required for a [Type 1 solar PV system](/applications/solar-pv/#sensor-installation): `Grid (import/export) = site-consumption – Generation`.

To publish a value to a new MQTT topic feed use the Emoncms `Publish to MQTT` Input Process then enter a new unique MQTT topic e.g `grid` or `import` then use this new MQTT topic in the EVSE config.

For more advance solar PV divert config it's possible to modify the MQTT feed value and republish to a new topic using Emoncms Input processing or something like NodeRED. This may be desirable to increase the s  

![mqtt1](/images/integrations/ev-charging/publish-mqtt.png)

![mqtt2](/images/integrations/ev-charging/publish-mqtt2.png)


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

\* *OpenEVSE controller firmware [V4.8.0](https://github.com/OpenEVSE/open_evse/releases/tag/v4.8.0) has a bug which restricts the lowest charging current to 10A. The J1772 protocol can go down to 6A. This ~~will~~ has be fixed with a firmware update. See [OpenEnergyMonitor OpenEVSE FW releases](https://github.com/openenergymonitor/open_evse/releases/). A ISP programmer is required to update openevse controler FW.*

*Note: Solar PV divert under 10A may not work reliably with 'Q' models of Renault Zoe *

***

See full OpenEVSE WiFi gateway documentation in the [OpenEVSE ESP8266 WiFi GitHub Repo](https://github.com/openevse/ESP8266_WiFi_v2.x/).


***

## Emoncms Setup

OpenEVSE can be setup to log data directly to Emoncms for datalogging and visualization. This guide section will cover configuring Emoncms once OpenEVSE is posting data.

<br>
<div class='videoWrapper'>
<iframe width="300" height="169" src="https://www.youtube.com/embed/uI1mtGOGLRw" frameborder="0" allowfullscreen></iframe>
</div>
<br>

### Input Processing

First enable Device Module view (currently beta)

![](/images/integrations/1-evse-sw.png)

On the Emoncms Inputs page click the ‘cog’ icon on the OpenEVSE device to log OpenEVSE Inputs to Feeds using Device Module template:

*Note: If OpenEVSE Inputs are not present see section 1 to check OpenEVSE WiFi Emoncms service setup settings.*


![](/images/integrations/2-evse-sw.png)

Choose OpenEVSE device template then click Save:

![](/images/integrations/3-evse-sw.png)


Device Module shows the Feeds and Input Processing which will be applied:

![](/images/integrations/4-evse-sw.png)


Once Initialized and saved the Device Module has automatically applied the correct Input Processing to the OpenEVSE Inputs:

![](/images/integrations/5-evse-sw.png)


On the Emoncms Feeds page the OpenEVSE Feeds should now be there with correct scale, names and units:

![](/images/integrations/6-evse-sw.png)


### Emoncms ‘Apps’ Dashboard

Click on ‘Apps’ on the Emoncms top bar then select new OpenEVSE App


![](/images/integrations/7-evse-sw.png)


![](/images/integrations/8-evse-sw.png)


![](/images/integrations/9-evse-sw.png)

Clicking on a Feed on the feeds page will open the Emoncms Graph display to show the raw feed data. Various Feeds van be displayed at once, e.g. looking at the effect of the internal temperature of the OpenEVSE unit during a charge:

*Note: The OpenEVSE has integrated temperature monitoring and will automatically throttle charging current and eventually stop a charging session if the temperature gets too hot.*


![](/images/integrations/10-evse-sw.png)
