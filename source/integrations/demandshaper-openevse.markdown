---
layout: page
title: Smart Charge your Electric Vehicle
description: Smart Charge your Electric Vehicle
date: '2020-02-28 11:20'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The following guide covers how to setup the Emon/OpenEVSE charging station and [Emoncms DemandShaper module](/integrations/demandshaper/) to smart charge an electric vehicle based on day-ahead forecasts for the best time to use power.

![emonevse_hub.png](/images/integrations/demandshaper/emonevse/emonevse_hub.png)

**You will need:**
 
- [OpenEVSE or EmonEVSE open source EV charging station](/integrations/ev-charging/)
- emonBase or emonPi base-station running [emonSD-17Oct19 or newer](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log#emonsd-17oct19-stable).
- Optional: [OVMS Open Vehicle Monitoring System](https://shop.openenergymonitor.com/open-vehicle-monitor-ovms-wifi-3g-europe) for automatic reading of EV battery state of charge.

**OVMS:** The [OVMS Open Vehicle Monitor](https://shop.openenergymonitor.com/open-vehicle-monitor-ovms-wifi-3g-europe/) is a module that plugs into the OBD2 port of an EV. It can access a lot of detailed information about the vehicle and battery status for a wide variety of EV models. The DemandShaper module integrates with OVMS in order to access the state-of-charge to calculate how long a charge session needs to be.

**Custom SOC integration:** It is also possible to provide the DemandShaper module with a state-of-charge value using an emoncms input e.g `openevse/soc`. If you have a script that reads the state-of-charge you can pass it on to the DemandShaper module using this approach. You can create an emoncms input `openevse/soc` by posting the SOC to MQTT topic `emon/openevse/soc`
 
#### Setup
 
1\. Start by connecting your OpenEVSE to your home WiFi network and configuring the MQTT settings following the [OpenEVSE setup guide](https://guide.openenergymonitor.org/integrations/evse-setup/).

2\. Navigate to the emoncms inputs page where a set of OpenEVSE inputs will appear including charge current, energy used and charger state. 

![openevse_inputs.png](/images/integrations/demandshaper/emonevse/openevse_inputs.png)

3\. Click on the Cog to the top-right of the inputs to bring up the 'Configure Device' window. Select the EVSE > OpenEVSE > Default device template.

![openevse_deviceconfig1.png](/images/integrations/demandshaper/emonevse/openevse_deviceconfig1.png)

4\. Optional: To create a set of feeds from the OpenEVSE charger so that you can monitor it's use over time: click Save and then Initialize to confirm.

![openevse_deviceconfig2.png](/images/integrations/demandshaper/emonevse/openevse_deviceconfig2.png)

5\. Navigate to the DemandShaper module in the top bar, the OpenEVSE device should now appear in the left hand menu. If it is not present try refreshing the page. Click on the OpenEVSE menu item to bring up the scheduler interface.

Select the demand shaper signal you wish to use. If you are using the Octopus Agile tariff, select the relevant region from the drop down menu.

![demandshaper2.png](/images/integrations/demandshaper/emonevse/demandshaper2.png)

To enable automatic reading of EV state of charge with OVMS enter your OVMS Vehicle ID and car password at the bottom of the page. Wait 5s for the settings to save and then refresh the page. You should now see the current SOC on the battery bar widget:

![demandshaper_ovms.png](/images/integrations/demandshaper/emonevse/demandshaper_ovms.png)

Thats it, to schedule a charge enter the time that you wish the charge to complete by and select the battery % that you wish to reach.
