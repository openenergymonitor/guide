---
layout: page
title: Log Remotely
description: Log remotly to Emoncms.org
date: '2015-03-08 21:36'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

### [&laquo; Previous step: Log Locally](/setup/local/)

### [Next step: Dashboards &raquo;](/setup/dashboards/)

***

Data can also (optionally) be posted remotely to [Emoncms.org](https://emoncms.org). Posting data remotely has the advantage of being able to easily access your data from anywhere on the web without having to open access to your local emonPi:

## 1. Create Emoncms.org account

![remote log1](/images/setup/remote-log0.png)

- Browse to [Emoncms.org](https://emoncms.org)
- Create account or log-in with existing account
- Select `Inputs > Input API helper` [(https://emoncms.org/input/api)](https://emoncms.org/input/api)
- Copy Read-Write API key


![remote log1](/images/setup/remote-log01.png)

## 2. Enter API key into local Emoncms

![remote log1](/images/setup/remote-log1.png)

- Log-in to local Emoncms on your local network e.g. [http://emonpi](http://emonpi) or http://192.168.X.X
- Navigate to `Setup > emonHub`
- Scroll down the emonHub config, in the `[[emoncmsorg]]` section pate in your Emoncms.org R/W API key overwriting the `xxxxxxxxxxxxxxx` value.
- Hit `Save`

[*Advanced emonhub.conf configuration guide*](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md)

## 3. Setup Emoncms.org Input Processing

- Log back into [Emoncms.org](https://emoncms.org)
- Inputs from emonPi should be visible on the Inputs page
- Log Inputs to Feeds in the same way as [Local Emoncms Logging](/setup/local)

*If no appear in Emoncms.org emonHub.log on `emonHub` page of Local Emoncms for debugging*


<br>

***

### [Next step: Dashboards &raquo;](/setup/dashboards/)
