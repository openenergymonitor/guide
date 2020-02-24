---
layout: page
title: 3. Log Remotely
description: Log remotly to Emoncms.org
date: '2015-03-08 21:36'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

In addition to [local logging](/setup/local/), we also offer an optional remote data logging and visualisation service called Emoncms.org running a slightly reduced feature set to that available locally for applications where remote logging is required. Emoncms.org is a pay-as-you-go service but all OpenEnergyMonitor shop hardware purchases come with 20% free emoncms.org credit which is designed to give 5-10 years of free use. See [Emoncms.org pricing](https://emoncms.org/site/pricing) for more information.

It is also possible to self-host our open source emoncms software on your own remote server, we have a nice installation script to help with this for use with Debian systems, see [EmonScripts](https://github.com/openenergymonitor/EmonScripts).

Posting data to a remote server such as emoncms.org is particularly useful for applications that require public dashboards as there is usually more bandwidth for many users to access the same dashboard than available over a household or remote monitoring site connection. Remote data logging is also useful for applications that require aggregation or remote data analysis. The OpenEnergyMonitor system provides both local and remote options so that you can choose the right tool for your application.

### 1. Create an emoncms account

![remote log1](/images/setup/remote-log0.png)

- Browse to [Emoncms.org](https://emoncms.org)
- Create account or log-in with existing account
- Select **Inputs > Input API helper**
- Copy Read-Write API key


![remote log1](/images/setup/remote-log01.png)

### 2. Enter API key into local Emoncms

![remote log1](/images/setup/remote-log1.png)

- Log-in to local Emoncms on your local network e.g. [http://emonpi](http://emonpi) or http://192.168.X.X
- Navigate to **Setup > emonHub**
- Scroll down the emonHub config, in the **[[emoncmsorg]]** section pate in your Emoncms.org R/W API key overwriting the **xxxxxxxxxxxxxxx** value
- Hit **Save**

[*Advanced emonhub.conf configuration guide*](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md)

### 3. Setup Emoncms.org Input Processing

- Log back into [Emoncms.org](https://emoncms.org)
- Inputs from emonPi should be visible on the Inputs page
- Log Inputs to Feeds in the same way as [Local Emoncms Logging](/setup/local)

*If no appear in Emoncms.org emonHub.log on `emonHub` page of Local Emoncms for debugging*

***

## {% linkable_title Posting to multiple Emoncms accounts %}

The emonPi can post to other remote Emoncms accounts as well as or instead of emoncms.org. To post to another Emoncms account create another `EmonHubEmoncmsHTTPInterfacer` section in `emonhub.conf` e.g :

<pre style="font-family:monospace; font-size:14px; background-color: #eee; padding: 20px;">
[[my-emoncms-server]]
    Type = EmonHubEmoncmsHTTPInterfacer
    [[[init_settings]]]
    [[[runtimesettings]]]
        pubchannels = ToRFM12,
        subchannels = ToEmonCMS,
        url = https://my-awesome-emoncms-server-url
        apikey = xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        senddata = 1                    # my-awesome-emoncms-server
        sendstatus = 0                  # Enable sending WAN IP to Emoncms MyIP
        sendinterval= 10                # Bulk send interval to post in seconds
</pre>


***


## {% linkable_title Multiple emonPi's posting to a single Emoncms.org account %}

It's possible to setup multiple emonPi's posting to a single Emoncms.org account, this is useful if you want to monitor several installations with a single login. By defaut data from sensors connected direclty to the emonPi are tagged in Emoncms with **node ID 5**. If multiple emonPi's are posting to the same account we need to set a different node ID to each emonPi.

### 1. Change emonPi node ID

The emonPi's node ID can be changed in the *EmonHub Config Editor*. Login to **local Emoncms* then browser to `Setup > EmonHub`, in the `[interfacers]` section change `baseid = 5` to a different number: 4, 3, and 2 are recomended since these node ID's are not already allocated:

![remote log1](/images/setup/emonpi-nodeid-decoder.png)

### 2. Update emonPi Node Decoder

After changing the emonPi node ID we also needto update the EmonHub node decoder to enablelocal Emoncms to decode the data from the emonPi with the updated node ID. To do this scroll further down the emonhub config page to the `[Nodes]` section and change `[[5]]` to the new emonPi node ID e.g. 5, 3, or 2. Then click `Save` to save changes.

[See here for detailed emonhub config documentation.](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md)

To start the emonPi's posting to the same emoncms.org account paste in the same Emoncms.org read-write API key into each emonPi's emonhub config file as detailed above.
