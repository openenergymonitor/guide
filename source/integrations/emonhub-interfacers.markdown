---
layout: page
title: "EmonHub Interfacers"
description: "EmonHub Interfacers"
date: 2020-11-21 14:32
sidebar: true
comments: false
sharing: true
footer: true
---

<style>
.code_20px {font-family:monospace; font-size:14px; background-color: #eee; padding: 20px;}
.code_15px {font-family:monospace; font-size:14px; background-color: #eee; padding: 15px;}
</style>


EmonHub is a piece of software running on the emonPi and emonBase that can read/subscribe or send/publish data to and from a multitude of services. It is primarily used as the bridge between the OpenEnergyMonitor monitoring hardware and the Emoncms software but it can also be used to read in data from a number of other sources, providing an easy way to interface with a wider range of sensors.

- [SDS011 Air-Quality sensor](/integrations/emonhub-interfacers#sds011-air-quality-sensor)
- [SDM120 Modbus single-phase meter](/integrations/emonhub-interfacers#reading-from-a-sdm120-single-phase-meter)
- [MBUS Reader for electric and heat meters](/integrations/emonhub-interfacers#mbus-reader-for-electric-and-heat-meters)
- [Direct DS18B20 temperature sensing](/integrations/emonhub-interfacers#direct-ds18b20-temperature-sensing)
- [Direct Pulse counting](/integrations/emonhub-interfacers#direct-pulse-counting)
- [Read State of charge of a Tesla Power Wall](/integrations/emonhub-interfacers#read-state-of-charge-of-a-tesla-power-wall)
- [Modbus: Renogy](/integrations/emonhub-interfacers#modbus-renogy)
- [SMA Solar](/integrations/emonhub-interfacers#sma-solar)
- [Victron VE.Direct Protocol](/integrations/emonhub-interfacers#victron-ve.direct-protocol)
- [Modbus TCP](/integrations/emonhub-interfacers#modbus-tcp)

### {% linkable_title SDS011 Air-Quality sensor %}

1\. Plug the SDS011 sensor into a USB port on either the emonPi or emonBase.

<img src="/images/integrations/emonhub/sds011.jpg" style="max-width:300px;">

2\. Login to the local copy of Emoncms running on the emonPi/emonBase and navigate to Setup > EmonHub. Click on 'Edit Config' and add the following config to the interfacers section to enable reading from the SDS011 sensor:

**readinterval:** Interval between readings in minutes, it is recommended to read every 5 minutes to preserve sensor lifespan.

Example SDS011 EmonHub configuration:

<pre class="code_20px">
[[SDS011]]
    Type = EmonHubSDS011Interfacer
    [[[init_settings]]]
        com_port = /dev/ttyUSB0
    [[[runtimesettings]]]
        readinterval = 5
        nodename = SDS011
        pubchannels = ToEmonCMS,
</pre>

3\. The SDS011 readings will appear on the Emoncms Inputs page within a few minutes and should look like this:

<img src="/images/integrations/emonhub/sds011_emoncms.png" style="max-width:500px;">


**Tip:** When logging the SDS011 inputs to feeds, make sure to set the feed interval to match the sensor readinterval, e.g select 5 minutes if readinterval is set to 5.

<div style="height:20px"></div>

### {% linkable_title Reading from a SDM120 single-phase meter %}

The SDM120-Modbus single phase electricity meter provides MID certified electricity monitoring up to 45A, ideal for monitoring the electricity supply of heat pumps and EV chargers. A USB to RS485 converter is needed to read from the modbus output of the meter such as: [https://www.amazon.co.uk/gp/product/B07SD65BVF](https://www.amazon.co.uk/gp/product/B07SD65BVF). The SDM120 meter comes in a number of different variants, be sure to order the version with a modbus output.

1\. Connect up the USB to RS485 converter to the modbus output of the SDM120 meter and plug the converter into a USB port on either the emonPi or emonBase.

<img src="/images/integrations/emonhub/sdm120_modbus.png" style="max-width:400px;">

2\. Login to the local copy of Emoncms running on the emonPi/emonBase and navigate to Setup > EmonHub. Click on 'Edit Config' and add the following config to the interfacers section to enable reading from the SDM120 meter:

**read_interval:** Interval between readings in seconds

Example SDM120 EmonHub configuration:

<pre class="code_20px">
[[SDM120]]
    Type = EmonHubSDM120Interfacer
    [[[init_settings]]]
        device = /dev/ttyUSB0
        baud = 2400
    [[[runtimesettings]]]
        pubchannels = ToEmonCMS,
        read_interval = 10
        nodename = SDM120
</pre>

3\. The SDM120 readings will appear on the Emoncms Inputs page within a few seconds and should look like this:

<img src="/images/integrations/emonhub/sdm120_emoncms.png" style="max-width:500px;">

**Tip:** When logging the SDM120 cumulative energy output (sdm_E) to a feed, use the 'log to feed (join)' input processor to create a feed that can work with the delta mode in graphs. This removes any data gaps and makes it possible for the graph to generate daily kWh data on the fly.

<div style="height:20px"></div>

### {% linkable_title MBUS Reader for Electric and Heat meters %}

Many electricity and heat meters are available with meter bus (MBUS) outputs. Using an MBUS to USB converter (coming soon), these can be read from an emonPi or emonBase.  For heat pumps, this provides a convenient way of monitoring the heat output, flow temperature, return temperature, flow rate and cumulative heat energy provided by the system.

1\. Connect up the USB to MBUS converter to the MBUS output of the meter and plug the converter into a USB port on either the emonPi or emonBase.

<img src="/images/integrations/emonhub/mbus_reader.png" style="max-width:600px;">

2\. Login to the local copy of Emoncms running on the emonPi/emonBase and navigate to Setup > EmonHub. Click on 'Edit Config' and add the following config in the interfacers section to enable reading from the MBUS meter:

- **baud:** The MBUS baud rate is typically 2400 or 4800. It is usually possible to check the baud rate of the meter using the meter configuration interface.
- **address:** The address of the meter is also usually possible to find via the meter configuration interface. If in doubt try 0 or 254.
- **pages:** Some meters such as the Sontex 531 have infomation on multiple MBUS pages (These are 3,1 on the Sontex 531). For other meters just set to 0. 
- **read_interval:** Interval between readings in seconds.

Example MBUS EmonHub configuration:

<pre class="code_20px">
[[MBUS]]
    Type = EmonHubMBUSInterfacer
    [[[init_settings]]]
        device = /dev/ttyUSB0
        baud = 4800
    [[[runtimesettings]]]
        pubchannels = ToEmonCMS,
        address = 100
        pages = 3,1
        read_interval = 10
        nodename = MBUS
</pre>

3\. The MBUS readings will appear on the Emoncms Inputs page within a few seconds and for the Sontex 531 should look like this:

<img src="/images/integrations/emonhub/mbus_emoncms.png" style="max-width:600px;">

**Tip:** When logging the cumulative energy output (Energy) to a feed, use the 'log to feed (join)' input processor to create a feed that can work with the delta mode in graphs. This removes any data gaps and makes it possible for the graph to generate daily kWh data on the fly.

<div style="height:20px"></div>

### {% linkable_title Direct DS18B20 temperature sensing %}

This EmonHub interfacer can be used to read directly from DS18B20 temperature sensors connected to the GPIO pins on the RaspberryPi. At present a couple of manual setup steps are required to enable DS18B20 temperature sensing before using this EmonHub interfacer.

**Manual RaspberryPi configuration:**

1\. SSH into your RaspberryPi, open /boot/config.txt in an editor:

<pre class="code_15px">sudo nano /boot/config.txt</pre>

2\. Add the following to the end of the file:

<pre class="code_15px">dtoverlay=w1-gpio</pre>

3\. Exit and reboot the Pi

<pre class="code_15px">sudo reboot</pre>
    
4\. SSH back in again and run the following to enable the required modules:

<pre class="code_15px">
sudo modprobe w1-gpio
sudo modprobe w1-therm
</pre>

**Configuring the Interfacer:**

Login to the local copy of Emoncms running on the emonPi/emonBase and navigate to Setup > EmonHub. Click on 'Edit Config' and add the following config in the interfacers section to enable reading from the temperature sensors.

- **read_interval:** Interval between readings in seconds. 
- **ids:** This can be used to link specific sensors addresses to input names listed under the names property. 
- **names:** Names associated with sensor id's, ordered by index.


Example DS18B20 EmonHub configuration:

<pre class="code_20px">
[[DS18B20]]
    Type = EmonHubDS18B20Interfacer
    [[[init_settings]]]
    [[[runtimesettings]]]
        pubchannels = ToEmonCMS,
        read_interval = 10
        nodename = sensors
        # ids = 28-000008e2db06, 28-000009770529, 28-0000096a49b4
        # names = ambient, cyl_bot, cyl_top
</pre>

<div style="height:20px"></div>

### {% linkable_title Direct Pulse counting %}

This EmonHub interfacer can be used to read directly from pulse counter connected to a GPIO pin on the RaspberryPi.

- **pulse_pin:** Pi GPIO pin number must be specified. Create a second interfacer for more than one pulse sensor
- **Rate_limit:** The rate in seconds at which the interfacer will pass data to emonhub for sending on. Too short and pulses will be missed. Pulses are accumulated in this period.
- **nodeoffset:** Default NodeID is 0. Use nodeoffset to set NodeID 

Example Pulse counting EmonHub configuration:

<pre class="code_20px">
[[pulse]]
    Type = EmonHubPulseCounterInterfacer
    [[[init_settings]]]
        pulse_pin = 15
        # bouncetime = 2
        # rate_limit = 2
    [[[runtimesettings]]]
        pubchannels = ToEmonCMS,
        nodeoffset = 3
</pre>

<div style="height:20px"></div>

### {% linkable_title Read State of charge of a Tesla Power Wall %}

This interfacer fetches the state of charge of a Tesla Power Wall on the local network. Enter your PowerWall IP-address or hostname in the URL section of the following emonhub.conf configuration:

<pre class="code_20px">
[[PowerWall]]
    Type = EmonHubTeslaPowerWallInterfacer
    [[[init_settings]]]
    [[[runtimesettings]]]
        pubchannels = ToEmonCMS,
        name = powerwall
        url = http://POWERWALL-IP/api/system_status/soe
        readinterval = 10
</pre>

<div style="height:40px"></div>

### {% linkable_title Modbus Renogy %}

See example config:<br>[EmonHub Github: Renogy.emonhub.conf](https://github.com/openenergymonitor/emonhub/blob/master/conf/interfacer_examples/Renogy/Renogy.emonhub.conf)

### {% linkable_title SMA Solar %}

See example config and documentation:<br>[EmonHub Github: SMA Solar](https://github.com/openenergymonitor/emonhub/tree/master/conf/interfacer_examples/smasolar)

### {% linkable_title Victron VE.Direct Protocol %}

See example config and documentation:<br>[EmonHub Github: Victron VE.Direct Protocol](https://github.com/openenergymonitor/emonhub/tree/master/conf/interfacer_examples/vedirect)

### {% linkable_title Modbus TCP %}

See example config and documentation:<br>[EmonHub Github: modbus TCP configuration](https://github.com/openenergymonitor/emonhub/tree/master/conf/interfacer_examples/modbus)
