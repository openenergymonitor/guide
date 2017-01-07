---
layout: page
title: Creating Daily kWh
description: Creating Daily kWh
date: "2015-03-08 21:36"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---


## Using Emoncms
        
- {% active_link /setup/daily-kwh Daily kWh%}
- {% active_link /setup/daily-averages Daily Averages %}
- {% active_link /setup/export-csv Exporting CSV %}
- {% active_link /setup/histograms Histograms %}
   
        
***

Emoncms supports the creation of daily, weekly, monthly kWh data and graph's from several different emoncms input types.

- Power in Watts (i.e emontx, emonpi CT channels)
- Cumulative Wh (i.e pulse counter, 3rd party meter)
- Cumulative kWh (i.e pulse counter, 3rd party meter)

### {% linkable_title 1a) Creating Daily Energy Wh/kWh data from power inputs %}

The standard emonTx and emonPi firmware transmit real power values for each CT channel. Accumulating kWh data can be calculated from this power data using the emoncms "Power to kWh" input processor.

Note: use the `CREATE NEW` option and add `_kwh` to the feed name in order to help distinguish it from the power feed.

1. In the inputs interface select the power input for which you wish to generate kWh data. Click on the spanner icon to bring up the input processing configuration interface.

2. Select the `power to kWh` input processor and create a feed, select a feed interval that either matches your post rate i.e 10s on the emontx and emonpi or for reduced disk use; intervals of up to 3600s can be used.

<img src="https://emoncms.org/Modules/site/inputprocessing.png" /><br><br>


### {% linkable_title 1b) Creating daily kWh data from Cumulative Wh or kWh inputs %}

e.g. [Optical Pulse Sensor](/setup/optical-pulse-sensor)

Some energy meters provide kWh output via Modbus, RS485, MBus, IEC1107, etc. For those meters, the log to feed input processor could be used. However, if the data is irregular, missing data will be recorded as null values. If a null value happens to coincide with midnight, the bar graph produced will show spikes or gaps. At present the process to use is the Wh Accumulator input process. It will fill any missing data. The Wh accumulator has a 23 kW limit equivalent power limit for inputs that are cumulative Wh.

1. In the inputs interface select the input for which you wish to generate kWh data. Click on the spanner icon to bring up the input processing configuration interface.


<img src="/images/setup/emonpi-input-list.png" />

2. Select the `wh accumulator` input processor (note: this process can also be used for accumulating kWh inputs) and create a feed, select a feed interval that either matches your post rate i.e 10s on the emontx and emonpi or for reduced disk use; intervals of up to 3600s can be used. A `x` calibration can be applied to convert raw pulse data into kwh/wh data, see [Optical Pulse Sensor](/setup/optical-pulse-sensor) setup page.

<img src="/images/setup/emonpi-pulse-input-process.png" />


### {% linkable_title 2. Viewing a kWh per day bar graph %}

Note: At least 2 days of data is required to generate a daily kWh graph from accumulating kWh data. At the moment, the bar graphs built using the vis module don't show the current day's kWh consumption. The myelectric app, which also uses the accumulating kWh feed type, does show the current day.

Click on `Extras > Visualisation`, and select the `BarGraph`.

Select the accumulating watt hour or kWh feed created in step 1.

**Delta:** The important property here is 'delta'. With delta set to 1, the bar graph will draw the total kWh for each day calculated from the kWh value at the end of the day, minus the kWh value at the start of the day.

**Scale & Units:** If the feed is in watt hours, the scale can be used to convert it to kWh by multiplying by 0.001. Units can be set in the units field.

**Interval:** The interval property can be set if you wish to have kwh at a set interval such as kwh per hour, for daily, weekly, monthly data use the **mode** property.

**Mode:** Use this property to obtain timezone correct kwh data. Set to either daily, weekly or monthly.

<img src="https://emoncms.org/Modules/site/dailykwh.png" />

The same options can be used in dashboards for the same output.

All of the visualisations in emoncms that make use of daily data also support this approach including: SimpleZoom, Stacked, StackedSolar, Zoom and OrderBars.

The **Graph module** (set as default on emonPi and Emoncms.org) can also be used to create Kwh per day bar graph from Wh / Kwh accumulator data:

Raw data wh accumulator view:

<img src="/images/setup/wh-accumulator.png" />

To convert the wh accumulator feed to daily KWh bargraph using the graph tool select Window `type-daily` feed `type=Bars` and `delta = 1` then click `reload`

<img src="/images/setup/wh-accumulator-bargraph.png" />

