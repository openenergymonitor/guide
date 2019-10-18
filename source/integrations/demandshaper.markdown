---
layout: page
title: Emoncms Demand Shaper Module (beta)
description: Emoncms Demand Shaper Module (beta)
date: '2019-10-18 11:20'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

<img src="/images/integrations/demandshaper/demandshaper.png" style="width:50%; float:right; padding-left:10px">

Available on Emoncms v10 & emonSD-17Oct19 or newer.

The emoncms demand shaper module uses a day ahead forecast and user set schedules to determine the best time to run household loads. An example could be charging an electric car, the user enters a desired completion time and charge duration, the demand shaper module then works out the best time to charge the car, generally there will be higher power availability overnight and during sunny midday hours. The demand shaper attempts to avoid running appliances at peak times while ensuring that the appliance has completed the required run period.

The demand shaper supports the following forecasts:

- Agile Octopus tariff forecast
- UK Grid Carbon Intensity forecast
- EnergyLocal power availability forecast

The DemandShaper module is part of our work on demand side response and is a relatively new development in the OpenEnergyMonitor ecosystem. For more information on the approach that we are taking as well as ongoing development discussion see the following forum posts:

- [Forum post: OpenEnergyMonitor Demand Side Response Development](https://community.openenergymonitor.org/t/openenergymonitor-demand-side-response-development/9095)<br>
- [Forum post: Demand Shaper module development](https://community.openenergymonitor.org/t/emoncms-demand-shaper-module/9097)

## Smart Charge your Electric Vehicle

The most useful and developed application for the DemandShaper module at present is smart charging and electric vehicle using the OpenEVSE charging station and an OVMS Open Vehicle Monitor.

*Add in system overview picture here:*

          agile forecast
               |
    Laptop -> hub -> OpenEVSE -> car + OVMS

**Note:** The automatic reading of EV state of charge is currently only supported when used in conjunction with the OVMS Open Vehicle Monitor, we would like to add support for other API's in future releases. The following has been tested and is in active use with the Nissan Leaf 24 kWh. It should work with other vehicles that are supported by OVMS but we have not tested this yet.

**Requirements**

- emonPi/emonbase (raspberrypi running emonSD software stack).
- OpenEVSE or EmonEVSE open source charging station
- OVMS Open Vehicle Monitoring System plugged into OBD2 port of EV.
 
**Setup**
 
1\. Start by connecting your OpenEVSE to your home WiFi network and configuring the MQTT settings following the [OpenEVSE setup guide](https://guide.openenergymonitor.org/integrations/evse-setup/).

2\. Navigate to the emoncms inputs page where a set of OpenEVSE inputs will appear including charge current, energy used and charger state. 

![openevse_inputs.png](/images/integrations/demandshaper/openevse_inputs.png)

3\. Click on the Cog to the top-right of the inputs to bring up the 'Configure Device' window. Select the EVSE > OpenEVSE > Default device template.

![openevse_deviceconfig1.png](/images/integrations/demandshaper/openevse_deviceconfig1.png)

4\. Optional: To create a set of feeds from the OpenEVSE charger so that you can monitor it's use over time: click Save and then Initialize to confirm.

![openevse_deviceconfig2.png](/images/integrations/demandshaper/openevse_deviceconfig2.png)

5\. Navigate to the DemandShaper module in the top bar, the OpenEVSE device should now appear in the left hand menu. If it is not present try refreshing the page. Click on the OpenEVSE menu item to bring up the scheduler interface.

Select the demand shaper signal you wish to use. If you are using the Octopus Agile tariff, select the relevant region from the drop down menu.

![demandshaper2.png](/images/integrations/demandshaper/demandshaper2.png)

To enable automatic reading of EV state of charge with OVMS enter your OVMS Vehicle ID and car password at the bottom of the page. Wait 5s for the settings to save and then refresh the page. You should now see the current SOC on the battery bar widget:

![demandshaper_ovms.png](/images/integrations/demandshaper/demandshaper_ovms.png)

Thats it, to schedule a charge enter the time that you wish the charge to complete by and select the battery % that you wish to reach.
