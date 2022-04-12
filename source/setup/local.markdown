---
layout: page
title: 2. Log Locally
description: "Log data locally to emonPi"
date: 2015-03-08 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

**Local vs Remote logging**

Both the emonPi and emonBase feature full local data logging and visualisation capability using our [open source emoncms web application](https://github.com/emoncms/emoncms) - making it easy to keep your energy data within the privacy of your home and without any online service subscription requirements. The local web interface is accessible via the emonPi/emonBase hostname or IP address.

The emonPi and emonBase SD card includes 10 GB's of data storage enough for 138 years! worth of feed data for our solar PV application (6 feeds at 10s resolution). The software has also been designed to minimise write wear to prolong SD card lifespan.

If you wish to access your data away from home this is possible using remote access services such as Dataplicity. Dataplicity currently offer a free-tier of one device per user. For more information see: [Remote Access](/setup/remote-access/).

We do also offer an optional remote data logging and visualisation service called [Emoncms.org](https://emoncms.org) running a slightly reduced feature set to that available locally for applications were remote logging is required.  Emoncms.org is a pay-as-you-go service but all OpenEnergyMonitor shop hardware purchases come with 20% free emoncms.org credit which is designed to give 5-10 years of free use. See [Log Remotely](/setup/remote/) for configuration steps.

It is also possible to install our open source emoncms software on your own remote server, we have a nice installation script to help with this for use with Debian systems, see [EmonScripts](https://github.com/openenergymonitor/EmonScripts).

---

For application specific input processing see:

- [Applications > Home Energy](/applications/home-energy)
- [Applications > Solar PV](/applications/solar-pv).

The following describes a generic example of configuring an emoncms input, e.g an emonpi power input. 

1. Start by logging in to your emonPi/emonBase [http://emonpi/](http://emonpi/) (or local IP address)
2. Navigate to `Setup > Inputs`

You should now see an updating input list of connected nodes (e.g emonPi, emonTx, emonTH) and they keys (e.g. power1, power2 etc.) together with the last received value. If you do not, see [Setup > Troubleshooting](/setup/troubleshooting).

Input data is not saved to disk. To save an input Emoncms Input Processing is used to log an input to a Feed. Feed data is then logged persistently to disk. To log an Input to a Feed:

- Click on the `Input Config Spanner` next to the input you wish to log to a Feed:

![Emoncms Inputs](/images/setup/local-log1.png)

- Process List setup box will open
- Choose required Input Process e.g `Log to Feed`
- Create a new feed giving it a name e.g. `use` or log to an existing feed *
- Select the default `PHPFINA` Feed Engine
- Select a logging interval e.g. `10s` for emonTx/emonpi or `60s` for emonTH**
- Click add to `Add` to add that input process

![Input Processing Power](/images/setup/local-log2.png)

If logging a `Power` value input you will also want to create a corresponding kWh Feed. This is done by adding another input process:

- Choose `Power to KWh` Input Process
- Create a new KWh feed e.g. `use_kwh` *

![Input Processing kwh](/images/setup/local-log3.png)

- Once required input processes have been added click `Changed, Press to Save`
- Then `Close` the Input List window

![Input Processes List View](/images/setup/local-log4.png)

- The Inputs page should now display the active input processes in the `Process list` column

![Input View with processing](/images/setup/local-log5.png)

- Navigate to `Setup > Feeds`
- Updating feeds should now be visible


![Feed View](/images/setup/local-log6.png)

- To view the feed data click on the feed row
- This will open the Emoncms Graph module
- Multiple feeds can be overlayed on the same graph by selecting feeds in the right hand side
- To view daily data see [Emoncms > Daily KWh](/emoncms/daily-kwh).

Note: no data will be visible immediately. Wait a few hours to build up some data before trying to view a feed.

![Feed Viewer](/images/setup/data-viewer.png)

Using standard feed names such as `use`, `use_kwh`, `solar`, `solar_kwh` `import` and `import_kwh` (**case sensitive**) will automate the setup of MyElectric, MySolar PV and Android app dashboards. See [Setup > Dashboards](/emoncms/dashboards) and [Home Energy](/applications/home-energy) and [Solar PV](/applications/solar-pv) applications pages for more info.

IMPORTANT: Feed interval logging time should not be less (faster) then the default node update rate. Choosing a longer (slower) update rate is fine and will conserve disk space:

| **Node** | **Max Update Rate**  |
| ------ | --- |
| emonPi | 5s  |
| emonTx | 10s |
| emonTH | 60s |

We recommend making regular backups of local data. See [Setup > Import/Backup](/setup/import).
