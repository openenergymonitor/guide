---
layout: page
title: OpenEVSE / EmonEVSE WiFi Software Setup
description: Open Source Electric Vehicle Charging Staion
date: '2014-12-18 21:49'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

**Note: OpenEVSE and EmonEVSE share the same software platform, both these units are configured and setup in the same way. The names "OpenEVSE" and "EmonEVSE" will be used interchangeably in this guide**

## {% linkable_title EVSE Web Interface Setup %}

### Video Guide

<br>
<div class='videoWrapper'>
<iframe width="300" height="169" src="https://www.youtube.com/embed/OAjlKmyRJMk" frameborder="0" allowfullscreen></iframe>
</div>
<br>

## {% linkable_title Emoncms Setup %}

OpenEVSE can be setup to log data directly to Emoncms for datalogging and visualization. This guide section will cover configuring Emoncms once OpenEVSE is posting data:

### Video Guide

<br>
<div class='videoWrapper'>
<iframe width="300" height="169" src="https://www.youtube.com/embed/uI1mtGOGLRw" frameborder="0" allowfullscreen></iframe>
</div>
<br>

### Setup Emoncms Input Processing

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


### Setup OpenEVSE Emoncms ‘App’ View

Click on ‘Apps’ on the Emoncms top bar then select new OpenEVSE App


![](/images/integrations/7-evse-sw.png)


![](/images/integrations/8-evse-sw.png)


![](/images/integrations/9-evse-sw.png)

Clicking on a Feed on the feeds page will open the Emoncms Graph display to show the raw feed data. Various Feeds van be displayed at once, e.g. looking at the effect of the internal temperature of the OpenEVSE unit during a charge:

*Note: The OpenEVSE has integrated temperature monitoring and will automatically throttle charging current and eventually stop a charging session if the temperature gets too hot.*


![](/images/integrations/10-evse-sw.png)

## {% linkable_title Safety %}