---
layout: page
title: Exporting CSV
description: Exporting CSV
date: "2015-03-08 21:36"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---


## Using Emoncms

- {% active_link /setup/emoncms-graphs/ View Graphs%}
- {% active_link /setup/daily-kwh/ Daily kWh%}        
- {% active_link /setup/daily-averages/ Daily Averages %}
- {% active_link /setup/export-csv/ Exporting CSV %}
- {% active_link /setup/histograms/ Histograms %}



***

Its possible to easily export data selected using the emoncms data viewer by clicking on the **Show CSV Output** button at the bottom of the page. Multiple feeds can be selected with datapoints aligned to the same timestamps.

The data viewer CSV export tool is limited to 3000 datapoints. For larger exports the export tool that is part of the feed interface can be used, see below.

### Data viewer CSV export tool

There are 3 timestamp formats available:

1. Unix timestamp
2. Seconds since the start of the export
3. Date time string "2016-04-06 00:00:00"

**Unix timestamp**

![csv_export_1.png](/images/setup/csv_export_1.png)

**Date time string (i.e: 2016-04-06 00:00:00)**

![csv_export_2.png](/images/setup/csv_export_2.png)

**Seconds since the start of the export**

![csv_export_3.png](/images/setup/csv_export_3.png)

**Example of exporting multiple feeds**

Multiple feeds can be exported for the same timestamps by selecting multiple feeds from the left hand feed selection menu:

![csv_export_4.png](/images/setup/csv_export_4.png)

### Full Export via Feed interface

Full feed exports can be obtained via the export tool that can be accessed from the feed list interface. The start time, end time interval and timezone offset can be selected an estimate is given of the download size.

![csvexportfromfeeds.png](/images/setup/csvexportfromfeeds.png)
