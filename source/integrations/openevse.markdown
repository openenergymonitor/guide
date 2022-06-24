---
layout: page
title: OpenEVSE Kit Build Guide
description: Open Source Electric Vehicle Charging Staion
date: '2014-12-18 21:49'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

<p>&larr; <a href="/integrations/ev-charging/">EV-Charging Overview</a></p>

OpenEVSE is a fully open-source EVSE (Electric Vehicle Supply Equipment) charging station designed by [OpenEVSE](http://openevse.com) and re-sold by [OpenEnergyMonitor Store](https://openenergymonitor.com/openevse-wifi-emoncms-ev-charging-station-kit/?ctk=cf86cd83-ac4d-4f18-a852-0b8fa1eb427a).

![Nissan LEAF OpenEVSE](/images/integrations/openevse-banner.png)

OpenEnergyMonitor has collaborated with OpenEVSE to improve energy monitoring integration and control as well as tailoring the setup for use in Europe and the UK. This page provides **European specific** build, ans setup instructions.


***

## {% linkable_title Assembly %}

**This build guide is for OpenEVSE kits purchased via the [OpenEnergyMonitor Store ](https://shop.openenergymonitor.com/evse/).**

[![](/images/integrations/ev-charging/evse-build/evse-build-0-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-0.png.jpg)

| Step 1   |  |
| -------- | ----------- |
|[![](/images/integrations/ev-charging/evse-build/evse-build-1-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-1.png.jpg) |- Check kit contents<br>- Note: cable glands and base-plate are inside the enclosure in the photo  |

| Step 2   |  |
| -------- | ----------- |
|[![](/images/integrations/ev-charging/evse-build/evse-build-2-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-2.png.jpg) | -Check screws and fastners<br>- *Note: there may be spare screws included* |




| Step 3   |  |
| -------- | ----------- |
|[![](/images/integrations/ev-charging/evse-build/evse-build-3-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-3.png.jpg) |- Screw contactor to base plate using FOUR self-tapping screws<br>- Mount the FOUR 10mm standoffs to the top side of the plate with FOUR M2.5 x 6 mm screws<br>- Mount Earth bar to the plate with ONE 1/4" self tapping screws<br>Mount plate in enclosure with SIX coarse threaded 6mm screws  |



| Step 4   |  |
| -------- | ----------- |
|[![](/images/integrations/oem-ev-cable-wire.jpg)](/images/integrations/oem-ev-cable-wire.jpg)| EV cable wiring |
|[![](/images/integrations/crimped-evse-wire.png)](/images/integrations/crimped-evse-wire.png)| **Bootlace ferrules crimped terminals should be used for EV cable connections.** This fine stranded wire is susceptible to creeping out of a terminal due to thermal cycling resulting in possible overheating |
|[![](/images/integrations/ev-charging/evse-build/evse-build-4-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-4.png.jpg) |- Install the TWO cable glands<br>- Insert EV Cable through the Cable Gland on the right and tighten<br>- Connect the ground wire to the ground block<br>- Thread **BOTH** Line and Neutral wires through the 4 wire GFCI coil with the orange self test loop (do NOT thread the Earth wire through)<br>- Thread **EITHER** Line OR Neutral through the Current Measurement Coil |


| Step 5   |  |
| -------- | ----------- |
|[![](/images/integrations/ev-charging/evse-build/evse-build-5-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-5.png.jpg) |- Connect the controller harness to the contactor  |

| Step 6   |  |
| -------- | ----------- |
|[![](/images/integrations/ev-charging/evse-build/evse-build-6-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-6.png.jpg) |- Install the OpenEVSE controller<br>- Connect the pilot wire to the controller<br>- Connect the controller harness to the controller<br>- Connect the GFCI coil and the Current measurement coil to the controller  |

| Step 7   |  |
| -------- | ----------- |
|[![](/images/integrations/ev-charging/evse-build/evse-build-7-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-7.png.jpg) |- Screw the LCD to the enclosure lid using self tapping screws<br>- Stick the touch button\* and WiFi module to the enclosure lid using double sided sticky tape  |

| Step 8   |  |
| -------- | ----------- |
|[![](/images/integrations/ev-charging/evse-build/evse-build-8-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-8.png.jpg) |- Use zip ties to tidy up the cables<br>- Ensure low voltage cables are routed away from 230V connections  |

| Step 9   |  |
| -------- | ----------- |
|[![](/images/integrations/ev-charging/evse-build/evse-build-9-thumb.png.jpg)](/images/integrations/ev-charging/evse-build/evse-build-9.png.jpg) |- Once the EVSE has been assembled it can be tested<br>- See [Testing OpenEVSE](https://openevse.dozuki.com/Guide/Testing+Basic+and+Advanced/12)<br>-An [EV Simulator Kit](https://shop.openenergymonitor.com/ev-simulator-kit/) useful for testing  |

\* Note: On current models the touch button has been substituted for a physical push button


## {% linkable_title Supply Connection %}

<p class='note warning'>
Mains supply connection should only be undertaken by a qualified electrician.
</p>

*The following is recommendation for a typical domestic installation in the UK:*

The EVSE should be installed by a competent electrician in accordance with BS7671:2018+A2:2022 (18th edition) and IET code of practice.

The EVSE requires:
 
- Dedicated circuit 
- RCD: duel-pole **Type-B RCD with 6mA DC leakage protection** e.g [Chint NL210](https://shop.openenergymonitor.com/type-b-rcd-1p-n-chint-nl210-63-263-30/
), Proteus 63/2/30B 
      
- MCB: **32A Curve B MCB** overcurrent protection (40A MCB can be used providing disconnecting time requirements are met) 
  
- EVSE should be earthed in accordance with BS7671:2018+A1:2020. 
- Earth rod* or CPC disconnection / O-PEN detection device e.g Matt-e unit should be used when applicable**. 
- **PME earth facility shall not be used as means of earthing if EVSE is connected to an EV located outdoors**. See BS7671:2018+A2:2022 Section 722.411.4.1
  
- All terminals should be checked for correct tightness upon final installation

*Earth-rod impedance must be <150Ω for reliable charging of all vehicle types (this exceeds the 200 Ω requirement of BS7671).

**It’s possible to obtain RCD, MCB and O-PEN protection in a single unit e.g Matt:e SP-EVCP-B or Garo G8EV40PMEB

***



## {% linkable_title User Guide %}

Once the hardware is up and running see our [OpenEVSE Software User Guide](https://guide.openenergymonitor.org/integrations/evse-setup/)

## {% linkable_title Safety %}

OpenEVSE units have been designed to exceed the safety requirements for EV Charging Stations from SAE J1772, NEC, UL and CE. Before supplying power to the car (and continuously while charging) the EVSE unit conducts a number of checks, no power is supplied until all the checks have passed. See

- [OpenEVSE Safety Features](https://openev.freshdesk.com/support/solutions/articles/6000113537-openevse-safety-features)
- [OpenEVSE Safety Features Flow Diagram (.pdf)](/images/integrations/OpenEVSE_flowchart.pdf)
