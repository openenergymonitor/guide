---
layout: page
title: Electric Vehicle (EV) Charging
description: Open Source Electric Vehicle Charging
date: '2018-11-18 21:49'
sidebar: true
comments: false
sharing: true
footer: true
published: false
---

We have worked with [OpenEVSE](https://www.openevse.com/) to develop a high qulity open-source EV charging station (EVSE) that integrates with OpenEnergyMonitor.

The EmonEVSE has been developed by OpenEnergyMonitor for highest compatability with European charging standards e.g 3-phase, type-2 etc. In The OpenEnergyMonitor web shop we sell both the EmonEVSE and resell the OpenEVSE unit in kit form.


| **EmonEVSE**                                   | **OpenEVSE**           |
| :-------------:|:-------------:|
| ![emonevse](/images/integrations/emonevse.png)     | ![openevse](/images/integrations/openevse.jpg)      |
|  32A Max                                  |  32A Max                                    |
|  7kW single-phase / 22kW three-phase*     |  7kW single-phase                           |
|  Type-2 European standard EV socket       |  Tethered cable (type-1 or type-2)          |
|  WiFi Interface                           |  WiFi Interface                             |
|  Fully assembled                          |  DIY assembly kit                           |
|  Fully CE certified && OLEV grant approved|  Components are CE complient                |
|  OpenEnergyMonitor Integration            |  OpenEnergyMonitor Integration              |
| <a class="btn pull-center" href="https://openenergymonitor.com/openevse-wifi-emoncms-ev-charging-station-kit/">View in Shop &rarr; </a> | <a class="btn pull-center" href="https://openenergymonitor.com/openevse-wifi-emoncms-ev-charging-station-kit/">View in Shop &rarr; </a> |
| EmonEVSE Installation                      | [**OpenEVSE Kit Build Guide**](/integrations/openevse)   |
| [**Setup Guide**](/integrations/openevse-software) | [**Setup Guide**](/integrations/openevse-software) |

\*optional

Both the EmonEVSE and OpenEVSE use the same open-source [OpenEVSE Controler](https://openenergymonitor.com/openevse-v5-controller-pcb/) running almost the same firmware and both have the same WiFi module running the same WiFi interface software.

## {% linkable_title Safety %}

EmonEVSe / OpenEVSE units have been designed to exceed the safety requirements for EV Charging Stations from SAE J1772, NEC, UL and CE. Before supplying power to the car (and continuously while charging) the EVSE unit conducts a number of checks, no power is supplied until all the checks have passed. See

- [Safety Features](https://openev.freshdesk.com/support/solutions/articles/6000113537-openevse-safety-features)
- [Safety Features Flow Diagram (.pdf)](/images/integrations/OpenEVSE_flowchart.pdf)

<p class='note warning'>
Installation should only be undertaken by a qualified electrician.
</p>