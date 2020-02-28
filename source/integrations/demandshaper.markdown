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

Available on Emoncms v10 & emonSD-17Oct19 or newer.

<img src="/images/integrations/demandshaper/demandshaper.png" style="width:50%; float:right; padding-left:10px">

The emoncms demand shaper module uses a day ahead forecast and user set schedules to determine the best time to run household loads. An example could be charging an electric car, the user enters a desired completion time and charge duration, the demand shaper module then works out the best time to charge the car, generally there will be higher power availability overnight and during sunny midday hours. The demand shaper attempts to avoid running appliances at peak times while ensuring that the appliance has completed the required run period.

The demand shaper supports the following forecasts:

- Agile Octopus tariff forecast
- UK Grid Carbon Intensity forecast
- EnergyLocal power availability forecast

The DemandShaper module is part of our work on demand side response and is a relatively new development in the OpenEnergyMonitor ecosystem. For more information on the approach that we are taking as well as ongoing development discussion see the following forum posts:

- [Forum post: OpenEnergyMonitor Demand Side Response Development](https://community.openenergymonitor.org/t/openenergymonitor-demand-side-response-development/9095)<br>
- [Forum post: Demand Shaper module development](https://community.openenergymonitor.org/t/emoncms-demand-shaper-module/9097)

### Guides

#### [+ Smart EV Charging](/integrations/demandshaper-openevse)

#### [+ Sonoff WiFi Smart Plug](/integrations/demandshaper-sonoff)

<br>

### <a id="development" name="development"></a>Further Development

The DemandShaper modules is currently in an early beta stage of development for more information on features planned and for support using the module see the forum post: [Emoncms Demand Shaper module](https://community.openenergymonitor.org/t/emoncms-demand-shaper-module/9097).

The source code for the DemandShaper module is available on github here:<br>[https://github.com/emoncms/demandshaper](https://github.com/emoncms/demandshaper)
