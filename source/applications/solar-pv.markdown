---
layout: page
title: "Solar PV"
description: "Solar PV Monitor"
date: 2015-10-08 19:05
sidebar: true
comments: false
sharing: true
footer: true
---

# Solar PV

The OpenEnergyMonitor Solar Photovoltaic (PV) monitor is a tool to help you make the most of your solar generation, providing real-time and historic information on your solar generation compared to home consumption, helping you increase home use of your available solar power.

![SolarPV](/images/applications/solar-pv/my-solar-pv.jpg)

## Explore, visualise:

 - Solar PV generation
 - Home consumption
 - Solar PV generation used on-site (self-consumption)
 - Solar PV generation exported
 - Electricity imported from the grid
 - Real-time & historic daily, monthly and annual totals
 
### Contents

 1. Required Hardware
 2. Type 1 or Type 2 setup
 3. Input and feed setup
 4. Using the MySolarPV app
 
### Required Hardware

Solar PV monitoring can be achieved with either an emonPi or an emonPi + emonTx energy monitor.

# NEED TO ADD SHOP LINKS + PHOTO / ILLUSTRATION (maybe this section should go into getting-started hardware?

The emonPi combines the monitoring functionality of the emonTx and base-station in one unit and is the recommended route in most installations where either

emonPi can be used if both the generation and consumption feeds are in the same physical location and WiFi/Ethernet connectivity is accesible at this location.


An emonTx can be added if the emonPi is required to be located at a different location e.g to access Etherent/WiFi or if solar PV gen / consumption feeds are in seperate locations. The emonTx communicates with the emonPi via low-power 433Mhz. Range is approximately similar to home WiFi (around 50-100m)

base-station can alternatively be used if ethernet is prefered and the meter cabinet does not have ethernet close by. The emoncms setup instructions below are applicable to both the emonPi and the emonTx where CT1 is solar generation and CT2 is either consumption `(type1)` or import/export `(type2)`.

### {% linkable_title Install Hardware %}

![Solar PV CT Install](/images/applications/solar-pv/solar-pv-install.png)

<p class='note'>
the clip-on CT sensors must be clipped round either the live (red/brown in the UK), or neutral (blue in the UK) wire. Not both.
</p>

<p class='note warning'>
Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated, i.e. power is switched off, prior to installing your sensors, and proceeding slowly with care. If you have any doubts, seek professional assistance.
</p>

![Solar PV CT Sensor Install 1](/images/applications/solar-pv/solar-pv-ct1.jpg)

![Solar PV CT Sensor Install 2](/images/applications/solar-pv/solar-pv-ct2.jpg)

*Above: CT installation on the live wire AC output from the PV inverter. Generation meter can be seen at the top right.*

#### {% linkable_title Type 1 System %}

Use this when the generation and consumption can be monitored separately. The amount exported/imported to or from the grid is the difference between generation and consumption. Knowledge of the direction of the current is not required, therefore a plug-in AC-AC voltage sensor adapter is not essential but **highly recommended** for accurate readings.

##### Type 1 Emoncms input setup

<p class='note'>
For automatic MySolarPV app setup use the suggested feed names in bold below:
</p>

**Setup Solar PV Generation Feed**

*Assuming CT1 (power 1) = Solar Gen*

 1. Click on spanner icon to configure `emonPi/power1`.
 2. Select log to feed and create a feed called **solar** with the feed engine set to `PHPFin`a and feed `interval=10s`
 3. Select power to kWh, create a feed called **solar_kwh** with feed engine `PHPFina` and feed `interval=10s`.
 
**Calculated export:**

 1. Use subtract input (`- input`) input processor to subtract home consumption from solar generation in order to calculate export as positive (import will be negative).
 2. Use allow positive in order to isolate the export component
 3. Select log to feed and create a feed called **export** with the feed engine set to `PHPFina` and feed `interval=10s`.
 4. Select `power to kWh`, create a feed called **export_kwh** with feed engine `PHPFina` and feed `interval=10s`.
 
**Setup Consumption Feed**

*Assuming CT2 (power 2) = Consumption*

 1. Click on spanner icon to configure `emonPi/power2`.
 2. Select log to feed and create a feed called **use** with the feed engine set to PHPFina and feed interval set to 10 seconds.
 3. Select `power to kWh`, create a feed called **use_kwh** with feed engine `PHPFina` and feed `interval=10s`.

Once complete click on `Apps > MySolarPV` in order to launch the MySolarPV emoncms app, If you decide to use custom feed names the app will give you the option to select your solar, use and export feeds.


#### {% linkable_title Type 2 System %}

Use this when the generation and consumption cannot be monitored separately, i.e the PV inverter output is fed into a spare MCB (circuit breaker) in the fuse box. Other household loads are connected to other circuits in the same fuse box. If this is the case, the output from the PV inverter and the grid import/export connection will need to be monitored instead. Knowledge of the direction of the current is required to determine the difference between power import and export, therefore an AC-AC voltage sensor adapter is required.

When the AC-AC voltage sensor is used, (see below) the sign of the grid import/export power reading will depend on the orientation of the CT. To be compatible with the software examples included with this documentation, it is desirable to orient the CT on the grid import/export cable so the power reading is positive when importing, and negative when exporting. The correct orientation can be determined by trial and error.

##### Type 2 Emoncms input setup

<p class='note'>
For automatic MySolarPV app setup use the suggested feed names in bold below:
</p>

**Setup Solar Gen Feed**

*Assuming CT1 (power 1) = Solar Generation*

 1. Click on spanner icon to configure `emonPi/power1`.
 2. Select log to feed and create a feed called **solar** with the feed engine set to `PHPFina` and feed `interval=10s`.
 3. Select `power to kWh`, create a feed called **solar_kwh** with feed engine `PHPFina` and feed `interval=10s`.

**Calculated consumption:**

Use subtract input (+ input) to add CT2 grid import/export to solar generation in order to calculate consumption.
Select log to feed and create a feed called use with the feed engine set to PHPFina and feed interval set to 10 seconds.
Select power to kWh, create a feed called use_kwh with feed engine PHPFina and feed interval set to 10 seconds.

 
**Setup Grid Import / Export Feed**

*Assuming CT2 (power 2) = Grid import/export*

 1. Click on spanner icon to configure emonPi/power2.
 2. Multiply by `-1` to make export positive
 3. Select allow positive to isolate export component
 4. Select log to feed and create a feed called export with the feed engine set to `PHPFina` and feed `interval=10s`.
Select `power to kWh`, create a feed called **export_kwh** with feed engine `PHPFina` and feed `interval=10s`.

### {% linkable_title Configure MySolarPV App %}

With your emonPi or emonTx inputs configured as above and with use of the suggested feed names the MySolarPV app will launch and work out of the box without further configuration required.

Alternatively the mysolar app will automatically show the configuration screen if it cant detect the expected feeds. Its then possible to select feeds from the drop down feed selector menus:

Once the required feeds are selected the Launch App button will appear.

![My Solar PV app config](/images/applications/solar-pv/my-solarpv-config.png)

### {% linkable_title Configure My Solar app power view %}

The main view shows a moving window power view of solar generation vs consumption which can be used to explore matching at any given moment of the day. Consumption is shown in blue and solar generation in yellow. The totals at the bottom of the page relate to the current window selected and show at a glance how much of consumption was supplied directly from solar and how much of the solar generation was exported to the grid.

![My Solar PV app 2](/images/applications/solar-pv/my-solar-pv2.png)

### {% linkable_title My Solar history view %}

Clicking on view history brings up a bargraph showing solar generation and consumption on a daily basis. Including how much of the solar generation is used directly on site and how much is exported.


![My Solar PV app 1](/images/applications/solar-pv/my-solar-pv2.png)