---
layout: page
title: "OpenHAB"
description: "OpenHAB Integration"
date: 2014-12-18 21:49
sidebar: true
comments: false
sharing: true
footer: true
---

Open Home Automation Bus (OpenHAB) is *"a vendor and technology agnostic open source automation software for your home"*. OpenHAB can run on an emonPi (Raspberry Pi) and is very flexible and can be configured for just about any home automation task. This high level of configurability can also make it seem quite hard to understand to start with.

**OpenHAB is pre-installed and setup on the latest emonSD Raspberry Pi images, see [emonSD repository and change log](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log). If your running an emonSD image that includes OpenHAB browse to:**

## [http://emonpi:8080](http://emonpi:8080)

*Substitite `emonpi` for your local emonpi's IP address if hostname lookup does not work*

```yaml
Username: "pi"
Password: "emonpi2016"
```

![OpenHAB OpenEnergyMonitor](https://raw.githubusercontent.com/openenergymonitor/oem_openHab/master/images/web.png)

Pre installed on the emonPi is a skeleton config setup openHAB with to subscribe to data from the emonPi's MQTT server (see [MQTT docs](/technical/mqtt/)). For a full OpenHAB demo see the [OpenHAB Demo House](http://demo.openhab.org:8080/openhab.app?sitemap=demo).

### Configuring OpenHAB

OpenHAB is configured from three main files:

- **`openhab.cfg`**
- **`<sitemap-name>.items`**
- **`<sitemap-name>.sitemap`**

*In the openHAB emonPi install instructions (see docs link below) we recommend cloning the oem_openHAB to the /home directory then soft linking the `items` and `sitemap` files to the relevant config locations in `/etc/openhab/configurations/`. This makes the files easier to edit*

It's possible to have multiple user interfaces defined by multiple sitemaps e.g oem.sitemap, kids.sitemap or admin.sitemap etc. The default sitemap is default e.g. `default.items` and `default.sitemap`.

#### openhab.cfg

This is the overall config file located in `/etc/openhab/configurations/`. In this file global config is set such as security authentication and MQTT server setting. E.g. to connect to emonPi local MQTT server the following is added:

```
mqtt:mosquitto.url=tcp://localhost:1883
mqtt:mosquitto.user=emonpi
mqtt:mosquitto.pwd=emonpimqtt2016
mqtt:mosquitto.qos=2
mqtt:mosquitto.retain=true
```

See the full openhab.cfg file used for this example on the open_openhab GitHub repo (see docs link below).

#### Items

The items file defines all the 'things' you might want to view or control in openHAB. Items can be bound to 'bindings' which are optional packages that used to extend functionality of openHAB. This example makes use of the MQTT and HTTP bindings. The items file is located in `/etc/openhab/configurations/items`.

For example the line in the items file to subscribe to *emonPi Power 1* from emonhub MQTT is as follows:

```
Number emonpi_ct1 "Power 1 [%d W]" { mqtt="<[mosquitto:emon/emonpi/power1:state:default]" }
```

The items file entry to [control LightWaveRF plug](/integrations/lightwaverf/) (publish "1 1" to /lwrf mqtt topic) is as follows:

```
Switch lwrf1 "LWRF Socket 1" {mqtt=">[mosquitto:lwrf:command:ON:1 1],>[mosquitto:lwrf:command:OFF:1 0]"}
```

See the full items file used for this example on the open_openhab GitHub repo (see docs link below).


#### Sitemap

The second openHAB config file of interest is 'sitemap'. Sitemaps are used to create elements of a user interface for making openHAB items accessible to the frontend interface.

For example the sitemap config line to produce the emonPi Power1 in the interface is as follows:

`Text item=emonpi_ct1 icon="firstfloor"`

And to produce the LightWaveRF control swithches:

`Switch item=lwrf1 label="LWRF Plug 1"`


See the full sitemap file used for this example on the open_openhab GitHub repo (see docs link below).

I have intentionally kept this 'skeleton' example as simple as possible. To view the full capabilities of openHAB including using groups checkout the openHAB demo and corresponding demo items and sitemap files.


### Documentation & Source Code

**[emonPi OpenHAB](https://github.com/openenergymonitor/oem_openhab)**


### Related Blog Posts

[OpenEnergyMonitor, emonPi and openHAB](https://blog.openenergymonitor.org/2015/12/openenergymonitor-emonpi-and-openhab/)