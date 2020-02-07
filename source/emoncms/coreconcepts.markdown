---
layout: page
title: Emoncms Core Concepts
description: Emoncms Core Concepts
date: "2020-02-07 09:54"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

Emoncms is an open-source web application developed as part of this project, for processing, logging and visualising energy, temperature and other environmental data. 

Emoncms receives data from OpenEnergyMonitor monitoring hardware and runs both locally on the emonPi/emonBase and remotely on emoncms.org.

The following guide introduces the core concepts behind emoncms and provides links to guides to learn more.

#### Inputs, Devices, Input processing and Feeds

**Inputs:** Data arriving in emoncms is registered first as inputs. Inputs hold only the most recent value and time associated with incoming data. Each input has an associated "node" identifier and a "key" sub-identifier. To record historic data a feed needs to be created from an input.

**Feed:** A place where data is recorded, a time-series of datapoints. The standard time-series databases used by emoncms are [PHPFina](https://learn.openenergymonitor.org/electricity-monitoring/timeseries/Fixed-interval) and [PHPTimeSeries](https://learn.openenergymonitor.org/electricity-monitoring/timeseries/Variable-interval) and were written as part of the emoncms project.

**Input processing:** It is often useful to be able to perform mathematical operations on inputs before recording the result to a feed. We can use input processing to calibrate inputs, add, subtract, multiply and divide inputs by each other, and process inputs in one format to another such as the conversion of input power values to a cumulative kWh feed.

**Devices:** If the emoncms device module is installed (included by default on emonPi/emonBase). The input "node" indentifier, links these inputs to a device. The device module provides device templates for automatic feed creation and application of input processing.

The following guides provide an overview of how to use these features:

- [Log Locally](/setup/local/): An example of configuring emonPi inputs, adding input processing and logging data to feeds
- [Calculating Daily kWh](/emoncms/daily-kwh/): Covers input processes: power_to_kwh, log_to_feed (join) & kWh Accumulator
- Application guides: [Home Energy](/applications/home-energy/) and [Solar PV](/applications/solar-pv/) cover input processing and feed creation for these applications.

#### Graphs, Visualisations, Apps & Dashboards

Data recorded in feeds can then be visualised with a number of different tools to suit a wide range of applications.

**Emoncms Graph module:** The emoncms graph module is the standard feed data viewer accessible directly from the emoncms feeds page by selecting or clicking on feeds. This interface provide options to compare multiple feeds on a single graph, calculate averages, daily, monthly and annual values and export data as CSV. Graphs created using this interface can be saved and included on Emoncms dashboards. 

Guides: [View Graphs](/emoncms/graphs/), [Calculating Daily kWh](/emoncms/daily-kwh/), [Calculating Averages](/emoncms/daily-averages/), [Exporting CSV](/emoncms/export-csv/), [Histograms](/emoncms/histograms/)

**Visualisations:** Emoncms visualisations pre-dated the graph module and include a wider range of different visualisations - some of which are reproducable using the graph module such as 'rawdata', 'bargraph' and many aspects of 'multigraph'. Visualisations can also be included in dashboards.

**Dashboards:** The Emoncms dashboard module provides a way to build custom dashboards using a drag-and-drop interface using a variety of widgets and graphs. Dashboards can be made public.

**Apps:** The Emoncms apps module provides pre-built application specific dashboards e.g MyElectric for home energy consumption, MySolar for home solar self consumption visualisation and MyHeatpump for heatpump performance analysis.

#### Emoncms Modules

Emoncms is designed as a modular extendable application. [Emoncms core](https://github.com/emoncms/emoncms) includes the core: user, inputs, input processing, feeds & visualisations functionality.

The following modules are all optional modules, but are installed as default on our emonSD software stack included on the emonPi/emonBase SD card.

| Module | Github |
| ----------- | ----------- |
| Graph       | https://github.com/emoncms/graph |
| App       | https://github.com/emoncms/app |
| Dashboard       | https://github.com/emoncms/dashboard |
| Backup       | https://github.com/emoncms/backup |
| Post Process       | https://github.com/emoncms/postprocess |
| Sync       | https://github.com/emoncms/sync |
| DemandShaper       | https://github.com/emoncms/demandshaper |
| WiFi       | https://github.com/emoncms/wifi |
| Config       | https://github.com/emoncms/config |
| Usefulscripts       | https://github.com/emoncms/usefulscripts

#### emonSD and EmonScripts

The emonSD software stack designed to run on a emonPi/emonBase (or any RaspberryPi) is available as a pre-built image for download here: [https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log)

This image is built using a collection of automated build scripts called EmonScripts available here: [https://github.com/openenergymonitor/EmonScripts](https://github.com/openenergymonitor/EmonScripts). These scripts also handle the emoncms system updater available from the Emoncms Admin page. 

The EmonScripts installer can also be used to install on any debian system. Follow the instructions here for [custom raspberrypi, ubuntu and digital ocean droplet installation](https://github.com/openenergymonitor/EmonScripts/blob/master/install/readme.md).
