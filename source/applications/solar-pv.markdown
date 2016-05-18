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


The OpenEnergyMonitor Solar PV monitor is a tool to help you make the most of your solar generation.

Providing real-time and historic information on your solar generation and demand matching, it will help you make better use of available solar power.

MySolar PV is a dashboard app which runs on [Emoncms](https://Emoncms.org).

![SolarPV](/images/applications/solar-pv/my-solar-pv.jpg)

## Explore, visualise:

 - Solar PV generation
 - Site-consumption
 - Solar PV generation used on-site (self-site-consumption)
 - Solar PV generation exported to the grid
 - Electricity imported from the grid
 - Real-time & historic daily, monthly and annual totals

### Contents

 1. Required Hardware
 2. Sensor Installation
 3. Emoncms Feed Setup
 4. Emoncms MySolarPV App

### Required Hardware

See Solar PV tab of [Setup > Required Hardware](/setup/)

The Emoncms setup instructions below are applicable to both the emonPi and the emonTx where CT1 is either site-consumption (Type 1 system) or import/export (Type 2 system) and CT2 is solar generation. If using an emonTx to monitor generation or site-consumption substitute the 'log to feed' instructions to use an input from the emonTx instead of emonPi (CT4 on the emontx a 0-4kW channel providing higher accuracy for this range and may be suitable for the solar CT if system capacity is less than 4kW).

### {% linkable_title Sensor Installation %}

![Solar PV CT Install](/images/applications/solar-pv/solar-pv-install.png)

<p class='note warning'>
<a href="https://openenergymonitor.org/emon/Current_Transformer_Installation">Please read the CT installation guide before installing.</a>
Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated, i.e. power is switched off, prior to installing your sensors, and proceeding slowly with care. If you have any doubts, seek professional assistance.
</p>

<p class='note'>
The clip-on CT sensors must be clipped round either the live or Neutral AC wire. <strong>Not both</strong>.
</p>

![CT sensor installation ](/images/applications/solar-pv/ctinstall.jpg)

![emonPi Type 1 Solar PV](/images/applications/solar-pv/emonpi-type1-solarpv.png)

**Type 1 solar PV System:** When the generation and site-consumption **can** be monitored separately. The amount exported/imported to or from the grid is the difference between generation and site-consumption.

> *Type 1 system:  Grid (import/export) = site-consumption – Generation*


**Type 2 solar PV System:** When the generation and site-consumption **cannot** be monitored separately e.g. the PV inverter output is fed into the fuse box and the household loads are connected to other circuits in the same fuse box. If this is the case, the output from the PV inverter and the grid import/export connection will need to be monitored and site-consumption calculated by subtracting.

> *Type 2 system:  Site-consumption = Generation + Grid import (negative when exporting)*


<p class='note'>
The polarity of the power readings depends on the orientation of the clip-on CT sensor. Orientate the CTs so that generation and site-consumption is positive and grid import/export is <b>positive when importing and negative when exporting</b>. The correct orientation can be determined by trial and error.
</p>

#### {% linkable_title Type 1 System Setup %}


<p class='note'>
For automatic MySolarPV App setup use the suggested feed names mendtioned below <b>bold The names are case sensitive</b>..
</p>

**1. Setup site-consumption Feed**

*Assuming CT1 (power 1) = site-consumption*

 1. Click on spanner icon to configure `emonPi/power1`.
 2. Select `log to feed` and create a feed called `use` with the feed engine set to PHPFina and feed `interval=10s`.
 3. Select `power to kwh`, create a feed called `use_kwh` with feed engine `PHPFina` and feed `interval=10s`.

**2. Calculated grid import:**

 1. Use the `- input` input processor to subtract solar generation from site consumption in order to calculate import as positive (export will be negative).
 2. Use `allow positive` in order to isolate the import component
 3. Select `log to feed` and create a feed called `import` with the feed engine set to `PHPFina` and feed `interval=10s`
 4. Select `power to kwh`, create a feed called `import_kwh` with feed engine `PHPFina` and feed `interval=10s`

**3. Setup Solar PV Generation Feed**

*Assuming CT2 (power 2) = Solar Gen*

 1. Click on spanner icon to configure `emonPi/power2`.
 2. Select `log to feed` and create a feed called `solar` with the feed engine set to `PHPFina` and feed `interval=10s`
 3. Select `power to kwh`, create a feed called `solar_kwh` with feed engine `PHPFina` and feed `interval=10s`
 
Once complete click on `Apps > MySolarPV` in order to launch the MySolarPV Emoncms app, If you decide to use custom feed names the app will give you the option to select your solar, use and import feeds.

#### {% linkable_title Type 2 System Setup %}


<p class='note'>
For automatic MySolarPV App setup use the suggested feed names in <b>bold</b>. The names are case sensitive:
</p>

**1. Setup Grid Import Feed**

*Assuming CT1 (power 1) = Grid import/export*

 1. Click on spanner icon to configure `emonPi/power1`
 2. Select `allow positive` to isolate import component
 3. Select `power to feed` and create a feed called **import** with the feed engine set to `PHPFina` and feed `interval=10s`
 4. Select `power to kwh`, create a feed called **import_kwh** with feed engine `PHPFina` and feed `interval=10s`
 
**2. Setup Solar Generation Feed**

*Assuming CT2 (power 2) = Solar Generation*

 1. Click on spanner icon to configure `emonPi/power2`
 2. Select `log to feed` and create a feed called **solar** with the feed engine set to `PHPFina` and feed `interval=10s`
 3. Select `power to kwh`, create a feed called **solar_kwh** with feed engine `PHPFina` and feed `interval=10s`

**3. Calculated site-consumption:**

 1. Use `+ input` input processor to add CT1 grid import/export to solar generation in order to calculate site-consumption
 2. Select `log to feed` and create a feed called **use** with the feed engine set to `PHPFina` and feed `interval=10s`
 3. Select `power to kwh`, create a feed called **use_kwh** with feed engine `PHPFina` and feed `interval=10s`

### {% linkable_title Configure MySolarPV App %}

With your emonPi or emonTx inputs configured as above and with use of the suggested feed names the MySolarPV app will launch with no further configuration required.

Alternatively the MySolar app will automatically show the configuration screen if it can't detect the expected feeds. It's then possible to select feeds from the drop down feed selector menus:

Once the required feeds are selected, the Launch App button will appear.

![my-solarpv-config](/images/applications/solar-pv/my-solarpv-config.png)

### {% linkable_title Configure My Solar App power view %}

The main view shows a moving window power view of solar generation Vs site-consumption which, can be used to explore matching at any given moment of the day. Site-consumption is shown in blue and solar generation in yellow. The totals at the bottom of the page relate to the current window selected and show at a glance how much of site-consumption was supplied directly from solar and how much of the solar generation was exported to the grid.

![my-solarpv-config2](/images/applications/solar-pv//my-solarpv1.png)

### {% linkable_title My Solar history view %}

Clicking on view history brings up a bar graph showing solar generation and site-consumption on a daily basis. Including how much of the solar generation is used directly on site and how much is exported.

![my-solarpv-config3](/images/applications/solar-pv//my-solar-pv2.png)
