---
layout: page
title: Solar PV
description: Solar PV Monitor
date: "2015-10-08 19:05"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---
# Solar PV

The OpenEnergyMonitor Solar Photovoltaic (PV) monitor is a tool to help you make the most of your solar generation.

Providing real-time and historic information on your solar generation and demand matching, helping you increase increase utilisation of your available solar power.

MySolar PV is a dashboard app which runs on [Emoncms](https://emoncms.org).

![SolarPV](/images/applications/solar-pv/my-solar-pv.jpg)

## Explore, visualise:

 - Solar PV generation
 - Site-consumption
 - Solar PV generation used on-site (self-site-consumption)
 - Solar PV generation exported
 - Electricity imported from the grid
 - Real-time & historic daily, monthly and annual totals
 
### Contents

 1. Required Hardware
 2. Sensor Installation
 3. Emoncms Feed setup
 4. Emoncms MySolarPV app
 
### Required Hardware

Solar PV monitoring can be achieved with either an emonPi or an emonPi + emonTx energy monitor.

An emonPi can be used on it's own if both the generation and site-consumption feeds are in the same physical location and WiFi/Ethernet connectivity is accesible at this location. The emonPi is a Raspberry Pi based energy monitor, Emoncms web-app runs on the emonPi allowing data to be logged locally to the  emonPi's SD card as well as (optionally) logging to [Emoncms.org](http://emoncms.org) cloud server.

An emonTx can be added if the emonPi is required to be located at a different location e.g to access Etherent/WiFi or if solar PV generation and site-consumption feeds are in seperate locations. The emonTx communicates with the emonPi via low-power 433Mhz. Range is approximately similar to home WiFi and can be effected by obstacles e.g. thick stone walls.

The Emoncms setup instructions below are applicable to both the emonPi and the emonTx where CT1 is solar generation and CT2 is either site-consumption (Type 1 system) or import/export (Type 2 system). If using an emonTx to monitor generation or site-consumption substitute the 'log to feed' instructions to use an input from the emonTx instead of emonPi.

As standard the emonPi and emonTx are designed to monitor single phase AC up to 100A. Users in North America should consult the Building Blocks guide ["EmonTx - Use in North America"](http://openenergymonitor.org/emon/buildingblocks/EmonTx-in-North-America) and forum thread discussions [1](http://openenergymonitor.org/emon/node/711) and [2](http://openenergymonitor.org/emon/node/3265).

### {% linkable_title Sensor Installation %}

![Solar PV CT Install](/images/applications/solar-pv/solar-pv-install.png)

<p class='note warning'>
[Please read CT installation guide before installing](https://openenergymonitor.org/emon/Current_Transformer_Installation). Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated, i.e. power is switched off, prior to installing your sensors, and proceeding slowly with care. If you have any doubts, seek professional assistance.
</p>

![CT sensor installation ](/images/applications/solar-pv/ct-install.jpg)

<p class='note'>
the clip-on CT sensors must be clipped round either the live or Neutral AC wire. Not both.
</p>

# **NEED INSTALLATION IMAGE HERE**

**Type 1 solar PV System:** When the generation and site-consumption **can** be monitored separately. The amount exported/imported to or from the grid is the difference between generation and site-consumption.

**Type 1 system:  Grid (import/export) = site-consumption – Generation**


**Type 2 solar PV System:** When the generation and site-consumption **cannot** be monitored separately e.g. the PV inverter output is fed into the fuse box and ther household loads are connected to other circuits in the same fuse box. If this is the case, the output from the PV inverter and the grid import/export connection will need to be monitored and site-consumption calculated by subtracting.

**Type 2 system:  Site-consumption = Generation + Grid import (negative when exporting)**


<p class='note'>
The polarity of the power readings depends on the orientation of the clip-on CT sensor. Orient the CTs so that generation and site-consumption is positive and grid import/export is **positive when importing and negative when exporting**. The correct orientation can be determined by trial and error.
</p>

#### {% linkable_title Type 1 System Setup %}

##### Type 1 Emoncms input setup

<p class='note'>
For automatic MySolarPV app setup use the suggested feed names in **bold**. The names are case sensitive.
</p>

**Setup Solar PV Generation Feed**

*Assuming CT1 (power 1) = Solar Gen*

 1. Click on spanner icon to configure `emonPi/power1`.
 2. Select `log to feed` and create a feed called **solar** with the feed engine set to `PHPFina` and feed `interval=10s`
 3. Select power to kWh, create a feed called **solar_kwh** with feed engine `PHPFina` and feed `interval=10s`
 
**Calculated export:**

 1. Use the `- input` input processor to subtract site-consumption from solar generation in order to calculate export as positive (import will be negative).
 2. Use `allow positive` in order to isolate the export component
 3. Select `log to feed` and create a feed called **export** with the feed engine set to `PHPFina` and feed `interval=10s`
 4. Select `power to kWh`, create a feed called **export_kwh** with feed engine `PHPFina` and feed `interval=10s`

**Setup site-consumption Feed**

*Assuming CT2 (power 2) = site-consumption*

 1. Click on spanner icon to configure `emonPi/power2`.
 2. Select `log to feed` and create a feed called **use** with the feed engine set to PHPFina and feed `interval=10s`.
 3. Select `power to kWh`, create a feed called **use_kwh** with feed engine `PHPFina` and feed `interval=10s`.

Once complete click on `Apps > MySolarPV` in order to launch the MySolarPV emoncms app, If you decide to use custom feed names the app will give you the option to select your solar, use and export feeds.

#### {% linkable_title Type 2 System Setup %}

##### Type 2 Emoncms input setup

<p class='note'>
For automatic MySolarPV app setup use the suggested feed names in **bold**. The names are case sensitive:
</p>

**Setup Solar Generation Feed**

*Assuming CT1 (power 1) = Solar Generation*

 1. Click on spanner icon to configure `emonPi/power1`
 2. Select `log to feed` and create a feed called **solar** with the feed engine set to `PHPFina` and feed `interval=10s`
 3. Select `power to kWh`, create a feed called **solar_kwh** with feed engine `PHPFina` and feed `interval=10s`

**Calculated site-consumption:**

 1. Use `+ input` input processor to add CT2 grid import/export to solar generation in order to calculate site-consumption
 2. Select `log to feed` and create a feed called use with the feed engine set to PHPFina and feed `interval=10s`
 3. Select `power to kWh`, create a feed called use_kwh with feed engine PHPFina and feed `interval=10s`

**Setup Grid Import / Export Feed**

*Assuming CT2 (power 2) = Grid import/export*

 1. Click on spanner icon to configure `emonPi/power2`
 2. Multiply `x` by `-1` to make export positive
 3. Select `allow positive` to isolate export component
 4. Select `log to feed` and create a feed called **export** with the feed engine set to `PHPFina` and feed `interval=10s`
 5. Select `power to kWh`, create a feed called **export_kwh** with feed engine `PHPFina` and feed `interval=10s`

### {% linkable_title Configure MySolarPV App %}

With your emonPi or emonTx inputs configured as above and with use of the suggested feed names the MySolarPV app will launch with no further configuration required.

Alternatively the mysolar app will automatically show the configuration screen if it can't detect the expected feeds. Its then possible to select feeds from the drop down feed selector menus:

Once the required feeds are selected, the Launch App button will appear.

![My Solar PV app config](/images/applications/solar-pv/my-solarpv-config.png)

### {% linkable_title Configure My Solar app power view %}

The main view shows a moving window power view of solar generation Vs site-consumption which, can be used to explore matching at any given moment of the day. site-consumption is shown in blue and solar generation in yellow. The totals at the bottom of the page relate to the current window selected and show at a glance how much of site-consumption was supplied directly from solar and how much of the solar generation was exported to the grid.

![My Solar PV app 2](/images/applications/solar-pv/my-solar-pv2.png)

### {% linkable_title My Solar history view %}

Clicking on view history brings up a bargraph showing solar generation and site-consumption on a daily basis. Including how much of the solar generation is used directly on site and how much is exported.


![My Solar PV app 1](/images/applications/solar-pv/my-solar-pv2.png)

