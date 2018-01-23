---
layout: page
title: "3. Log Locally"
description: "Log data locally to emonPi"
date: 2015-03-08 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

### [&laquo; Previous step: Connect](/setup/connect/)

### [Next step: Log Remotely &raquo;](/setup/remote/)

***

Data can now be logged to Emoncms runnning on the emonPi's local server, data will be saved to the Raspberry Pi's SD card.

Data can also (optionally) be posted remotely to [Emoncms.org](https://emoncms.org), see [Next step: Log Remotely](/setup/remote/).


For application specific input processing see:

- [Applications > Home Energy](/applications/home-energy)
- [Applications > Solar PV](/applications/solar-pv).

## {% linkable_title 1. Emoncms Inputs %}

- Login to Local Emoncms [http://emonpi/](http://emonpi/) (or local IP address)
- Navigate to `Setup > Inputs`

You should now see an updating input list of connected nodes (e.g emonPi, emonTx, emonTH) and they keys (e.g. power1, power2 etc.) together with the last received value. If you do not, see [Setup > Troubleshooting](/setup/troubleshooting).

Input data is not saved to disk. To save an input Emoncms Input Processing is used to log an input to a Feed. Feed data is then logged persistantly to disk. To log an Input to a Feed:

- Click on the `Input Config Spanner` next to the input you wish to log to a Feed:

![Emoncms Inputs](/images/setup/local-log1.png)

- Process List setup box will open
- Choose required Input Process e.g `Log to Feed`
- Create a new feed giving it a name e.g. `use` or log to an existing feed *
- Select the default `PHPFINA` Feed Engine
- Select a logging interval e.g. `10s` for emonTx/emonpi or `60s` for emonTH**
- Click add to `Add` to add that input process

![Input Processing Power](/images/setup/local-log2.png)

If logging a `Power` value input you will also want to create a corresponding KWh Feed. This is done by adding another input process:

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

- To view the feed data click the `Eye Icon`
- This will open `Data Viewer`
- Multiple feeds can be overlayed on the same graph by checking the boxes on the right hand side
- To view daily data see [Emoncms > Daily KWh](/setup/daily-kwh).

Note: no data will be visible immediately. Wait a few hours to build up some data before trying to view a feed.

![Feed Viewer](/images/setup/data-viewer.png)

\* Using standard feed names such as `use`, `use_kwh`, `solar`, `solar_kwh` `import` and `import_kwh` (**case sensitive**) will automate the setup of MyElectric, MySolar PV and Android app dashboards. See [Setup > Dashboards](/setup/dashboards) and [Home Energy](/applications/home-energy) and [Solar PV](/applications/solar-pv) applications pages for more info.

\** IMPORTANT: Feed interval logging time should not be less (faster) then the default node update rate. Choosing a longer (slower) update rate is fine and will conserve disk space:

| **Node** | **Max Update Rate**  |
| emonPi | 5s  |
| emonTx | 10s |
| emonTH | 60s |

We recommend making regular backups of local data. See [Setup > Import/Backup](/setup/import).

### Video Guide
<div class='videoWrapper'>
<iframe width="300" height="315" src="https://www.youtube.com/embed/8nVP0Hgkuuc" frameborder="0" allowfullscreen></iframe>
</div>

<br>

***

### [Next step: Log Remotely &raquo;](/setup/remote/)
