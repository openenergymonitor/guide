---
layout: page
title: Solar PV
description: Solar PV Monitor
date: '2015-10-08 19:05'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

<p><a class="btn pull-right" href="http://shop.openenergymonitor.com/emonpi-solar-pv-bundle/">View in Shop →</a></p>

The OpenEnergyMonitor Solar PV monitor provides real-time and historic information on solar generation on on-site consumption.

My Solar is a dashboard app which runs on Emoncms.

Emoncms and My Solar are pre-installed on the emonPi and can run locally and or data can be posted to our remote emoncms server [Emoncms.org](https://emoncms.org)

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
 4. Emoncms My Solar App

### Required Hardware

[emonPi Solar PV Bundle](https://shop.openenergymonitor.com/emonpi-solar-pv-bundle/)

<p><a class="btn pull-right" href="http://shop.openenergymonitor.com/emonpi-solar-pv-bundle/">View in Shop →</a></p>

The Emoncms setup instructions below are applicable to both the emonPi and the emonTx.

### {% linkable_title Sensor Installation %}

<!-------------------------------------------------------------------
-- Lightbox ---------------------------------------------------------
-------------------------------------------------------------------->

<style>

#openImg {
  cursor: pointer;
  transition: 0.3s;
}

#openImg:hover {
  opacity: 0.7;
}

.lightBox {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.9);
}

.lightBox-image {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 1000px;
}

.lightBox-image {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

.lightBox-close {
  position: absolute;
  top: 40px;
  right: 25px;
  color: #f1f1f1;
  font-size: 50px;
  font-weight: bold;
  transition: 0.3s;
}

.lightBox-close:hover,
.lightBox-close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

@media only screen and (max-width: 700px) {
  .lightBox-image {
    width: 100%;
  }
}

</style>

<img id="openImg" src="/images/applications/solar-pv/solar-pv-install.webp" alt="Solar PV installation">

<div id="lightBox" class="lightBox">
  <span class="lightBox-close">&times;</span>
  <img class="lightBox-image" id="img01">
</div>

<script>

  var lightbox = document.getElementById('lightBox');
  
  var img = document.getElementById('openImg');
  var lightboxImg = document.getElementById("img01");
  
  img.onclick = function(){
    lightbox.style.display = "block";
    lightboxImg.src = this.src;
  }
  
  var span = document.getElementsByClassName("lightBox-close")[0];
  
  span.onclick = function() {
    lightbox.style.display = "none";
  }

</script>

<!-------------------------------------------------------------------
-- // Lightbox ------------------------------------------------------
-------------------------------------------------------------------->

It is important that an  AC-AC adapter (included as default in the [emonPi solar PV bundle](https://shop.openenergymonitor.com/emonpi-solar-pv-bundle/) is used for solar PV monitoring. 

**All sensors should be connected to the emonPi before powering up**

<p class='note warning'>
<a href="https://learn.openenergymonitor.org/electricity-monitoring/ct-sensors/installation">Please read the CT installation guide before installing.</a>
Your safety is your responsibility. Clip-on current sensors are non-invasive and should not have direct contact with the AC mains. However, installing the sensors will require working in close proximity to cables carrying high voltage. As a precaution, we recommend ensuring the cables are fully isolated prior to installing your sensors, and proceeding slowly with care. If in doubt, seek professional assistance.
</p>

<p class='note'>
The clip-on CT sensors must be clipped round either the Line   or Neutral AC wire. <strong>Not both</strong>.
</p>

![CT sensor installation ](/images/applications/solar-pv/ctinstall.jpg)

<!-- ![emonPi Type 1 Solar PV](/images/applications/solar-pv/emonpi-type1-solarpv.png) -->

**Type 1 solar PV System:** The generation and site-consumption **can** be monitored separately. The amount exported/imported to or from the grid is the difference between generation and site-consumption.

> *Type 1 system:  Grid (import/export) = site-consumption – Generation*

Connect CT's are follows: 

 * CT1 (power 1) = site consumption.
 * CT2 (power 2) = solar generation.

**Type 2 solar PV System:** When the generation and import can be monitored separately, but site-consumption **cannot**, for example where:

* the PV inverter output is fed into the fuse box (consumer unit) and the household loads are connected to other circuits in the same fuse box, or
* It's physically difficult to attach a CT sensor to anywhere after the import and generation supplies meet (e.g. to the meter tails from the junction point to the fuse box).

Connect CT's as follows:
* CT1 (power 1) = grid import (positive) / export (negative), and
 * CT2 (power 2) = solar generation,

> *Type 2 system:  Site-consumption = Generation + Grid import (negative when exporting)*

**All solar PV systems can be monitored using the Type-2 method; it's highly recommended to use this method.**

<p class='note'>
The polarity of the power readings depends on the orientation of the clip-on CT sensor. Orientate the CTs so that generation and site-consumption is positive and grid import/export is <b>positive when importing and negative when exporting</b>. The correct orientation can be determined by trial and error. But for CT sensors from our shop, the writing on the side should normally be on the downstream/consumer side, so try that first.
</p>



### {% linkable_title Configure Feeds %}

On the Emoncms Inputs page click on the spanner icon next to your emonPi Inputs, and then from the left-hand menu choose _OpenEnergyMonitor > EmonPi > Solar PV Type 1/2_ (as appropriate). Click _Save_ and the Input Processing and solar PV feeds will be automatically created:

![](/images/applications/solar-pv/v10-emonpi-solar-inputs.png)
![](/images/applications/solar-pv/v10-device-module.png)
![](/images/applications/solar-pv/v10-solar-inputs.png)


![](/images/applications/solar-pv/v10-power1-inputprocess.png)

![](/images/applications/solar-pv/v10-power2-inputprocess.png)
![](/images/applications/solar-pv/v10-solar-feeds.png)

 
 
 



Video guide for solar PV Feed & My Solar App Setup:

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/Nc6YSWqqxkA" frameborder="0" allowfullscreen></iframe>
</div>


### {% linkable_title My Solar Emoncms App %}

Once setup is complete click on `Apps > My Solar` in order to launch the My Solar Emoncms app. The My Solar app should automatically detect the solar PV feeds. 




![my-solarpv-config](/images/applications/solar-pv/my-solarpv-config.png)

### {% linkable_title Configure My Solar App power view %}

Site-consumption is shown in blue and solar generation in yellow. The totals at the bottom of the page relate to the current window selected and show at a glance how much of site-consumption was supplied directly from solar and how much of the solar generation was exported to the grid.

![my-solarpv-config2](/images/applications/solar-pv//my-solarpv1.png)


Clicking on view history brings up a bar graph showing solar generation and site-consumption on a daily basis. Including how much of the solar generation is used directly on site and how much is exported.

![my-solarpv-config3](/images/applications/solar-pv//my-solar-pv2.png)
