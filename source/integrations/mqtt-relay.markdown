---
layout: page
title: WiFi MQTT Control Relay Thermostat
description: MQTT heating control relay
date: '2014-12-18 21:49'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

> **Multi-purpose Wifi connected relay control board. Applications include: remote heating an A/C systems control via nodeRED, openHAB and Android Tasker etc. **


<a class="btn pull-right" href="https://shop.openenergymonitor.com/wifi-mqtt-relay-thermostat">View in Shop &rarr; </a>

## Overview

*   1 x High quality 16A Relay  (tested 100 switches @ 3x rated current)
*   Powered by the popular [ESP8266 ](https://espressif.com/en/products/esp8266/)WiFi SoC
*   OTA Firmware upload function
*   Powered direct from 110-240V AC via isolated on-board PSU
*   Built-in web server with mobile device friendly UI and
*   HTTP Control API
*   Thermostat function with weekly scheduling
*   Manual relay control via web interface
*   [MQTT ](http://en.wikipedia.org/wiki/MQTT) control
*   [NTP](http://en.wikipedia.org/wiki/Network_Time_Protocol) for network time and scheduling functionality
*   Web server settings: including HTTP port & authentication setup
*   Temperature sensor support - 1 x sensor included

![mqtt-relay-overview.png](/images/integrations/mqtt-relay-overview.png)

![mqtt-relay](/images/integrations/mqtt-relay.jpg)

<a class="btn pull-right" href="http://shop.openenergymonitor.com/wifi-mqtt-relay-thermostat/">View in Shop &rarr; </a>

## Contents

2.  [Physical Connections ](#physical-connections)
3.  [Network Setup ](#network_setup)
5.  [Web UI Control ](#Reset)
6.  [Thermostat Scheduler ](#Thermostat)
7.  [HTTP API](#HTTP)
8.  [MQTT API](#MQTT)
9.  [Other Settings](#other_settings)
10.  [Firmware Update](#firmware)
11.  [Programming](#Programming)
12.  [Schematic](#schematic)
14.  [Dimensions](#dimensions)

## Physical Connections

<p class="note warning">
<b>The board connects to and controls high voltage, knowledge and attention is required when installing to prevent electrical shock</b>
</p>

1\. Connect 110V-240V AC into the duel terminal block to power the unit (polarity does not matter) . There is a 0.25A fuse (MST250 slow blow) on the board, however an external fuse is also recommended.

2\. The relay contacts are isolated from the main supply. The 3 x relay terminals are connected as follows:

![relay connection labeled](/images/integrations/relay-connections.png)

![new relay connections](/images/integrations/new-relay-contacts.png)

<p class='note warning'>
<b>Your safety is your responsibility. Ensure all contacts are fully isolated before installing. If you have any doubts, seek professional assistance. Ensure power cables are securely wired into relay terminal blocks and are held captive externally.</b>
</p>


## Network Setup

On first power the unit will enter WiFi Access Point (AP) mode serving it's own WiFi hotspot called 'ESP_XXX', where XXX is the units MAC address. AP mode is only designed to setup the unit, opperation of the thermostat requires connection to a WiFi network with interent access to obtain NTP time.

1\. Connect to the '**OEM_XXX**' WiFi network and browse to **[http://192.168.10.1](http://192.168.10.1).**

![relay-menu](/images/integrations/relay-menu.png)

2\. Select **WiFi Settings**, wait for auto scan to populate then select the network to connect to and enter password. If required enter static IP settings or choose DHCP (default).

3\. Click **Connect!**

Unit will now reboot and turn off AP mode. Unit should not be connected to the choose WiFi network. Fing [Android](https://play.google.com/store/apps/details?id=com.overlook.android.fing&hl=en_GB) / [iOS](https://itunes.apple.com/gb/app/fing-network-scanner/id430921107?mt=8) app can be used to find it's IP or run terminal command to scan for IP addresses of all connected ESP8266 modules:

`sudo arp-scan –retry 7 –quiet –localnet –interface=wlan0 | grep -s -i 18:fe:34`

![relay-wifi](/images/integrations/relay-wifi.png)


## Turn on WiFi AP / Restore Default Settings <a id="Reset" name="Reset"></a>

Once the unit is connected to your local Wifi network for security the Wifi AP will automatically be turned off.

**To turn the Wifi AP back on (e.g to scan and connect to a different network) press and hold the reset button for 3 seconds**

**When in Wifi AP mode a further 3 second press of the reset button will <u>clear all setting and restore to default.</u>**

## Control

Relay can now be in four ways:

#### <a id="web_UI" name="web_UI"></a>1\. Web UI Simple interface

Select **Relay Control** via web interface. Or browse to http://<IP-ADDRESS>/control/relay.html

![relay-control](/images/integrations/relay-control.png)

#### <a id="Thermostat" name="Thermostat"></a>2\. Thermostat Scheduler

Heating or A/C schedule and desired set point (from connected internal DS18B20 temperature sensor) can be set using the Thermostat Scheduler interface

![relay-thermostat](/images/integrations/relay-thermostat.png)

The **Thermostate Settings **page allow setting of Thermostat Input (currently only DS18B20 sensor is implemented)

**Hysteresis** is a nice function that prevents the relay from switching on/off frequently around the setpoint. It is defined in 100ths of a gedree, i.e. 500 means 5 degrees C. See fig below:

The "high" defines how much higher than the desired temperature the temperature reading has to be in order for the relay to switch off

The "low" defines how much lower than the desired temperature the temperature reading has to be in order for the relay to switch on

![relay-thermostat-settings](/images/integrations/relay-thermostat-settings.png)

![relay-hist](/images/integrations/relay-hist.png)


#### <a id="HTTP" name="HTTP"></a>3\. HTTP API

**Return Status**

`http://<IP-ADDRESS>/control/relay.cgi`

Returns JSON:

`"relay1": 0,"relay1name":"Heating"}`

**Turn Relay on: **

`http://<IP-ADDRESS>/control/relay.cgi?relay1=1`

Returns:

`'OK'`

**HTTPD Settings** allow the HTTP port to be set

**Disable HTTPD in normal working mode -** Turns off the HTTP service if not in "setup" mode, useful when you want to only use the MQTT interface and not worry about exposing the HTTP configuration UI to the wild

**HTTP Auth** allows for setting separate Admin and User password. Non-admin user cannot make any changes to the config.

![relay-httpd](/images/integrations/relay-httpd.png)


#### <a id="MQTT" name="MQTT"></a>4. MQTT API

The best (secure and lightweight) way IMHO to control the unit is via MQTT.

Using MQTT the relay can easily be controlled from applications such as nodeRED openHAB and Android Tasker. [See this informative video](http://youtu.be/nDaiUxO4Lt8) by Paul explaining how to control the relay via MQTT using nodeRED. The video was made using the older 3CH version of the relay but much of the info is still the same.

**Status:**

Unit periodically publishes DS18B20 temperature sensor value to the following topic:

`heating/status/ds18b20/1`

Relay Status after state is changed is published to:

`heating/status/relay/1 `

**Control **

Relay can be controlled by publishing 1 or 0 to the MQTT control topic, default:

`heating/control/relay/1`

After a control message has been received (either via MQTT or HTTP) relay will respond with a status MQTT message posted to the status topic (see above).

MQTT topic names are fully configurable, see **MQTT Setttings:**

![relay-mqtt](/images/integrations/relay-mqtt.png)

##### MQTT with emonPi & Emoncms


The emonPi has a Mosquitto MQTT server running as standard on port 1883. To publish heating / temperature status to Emoncms publish to emonPi MQTT server with the `emon/` MQTT prefix e.g:

`emon/heating/status/ds18b20/1`

![mqtt-emonpi-relay](/images/integrations/mqtt-emonpi-relay.png)

*Note: Older 1st gen emonPi's have an unauthenticated MQTT server running on localhost with port 1883 closed. Port can be opened and make persistently open with:*

`sudo iptables -A INPUT -p tcp -m tcp --dport 1883 -j ACCEPT`

`sudo apt-get install iptables-persistent`

Newer emonPi's have the MQTT port open by default and authentication turned on with default _user: `emonpi`, password: `emonpimqtt2016`. _Port 1883 is closed by default on all home network routers therefor this port is not exposed to the web.






#### <a id="other_settings" name="other_settings"></a>Other Settings

**NTP Settings **- unit obtain current time from NTP for use with thermostat scheduler, set GMT offset based on your time zone.

![relay-ntp](/images/integrations/relay-ntp.png)


**Relay latching**  - Restores relay state after reset (not recommended)

**Relay name** - Sets name of Relay to be used in web UI

**Relay Pulse time:** max "on" time in milliseconds. 0 means disabled (the default setting), setting it to 500 for example will result in the relay auto-switching off after 500ms of on-time. Useful when you want to pulse-contact something, say simulate a button press or make temporary make contact of the relay. Also useful when you want to ensure that the relay will be forced off after certain time, regardless of connectivity loss. I'd say if you control some heater, it would make sense to have the pulse time to 3hrs (1000*60*60*3) for just in case.

![relay-settings](/images/integrations/relay-settings.png)

**DS18B20 Setting - **A DS18B20 is used to inform the on-board thermostat. Changing these setting should not be required

![relay-settings](/images/integrations/ds18b20-settings.png)

**ADC Poll** - defaults to 0, it is the ADC polling interval. The two-wire connector is connected to the ADC, you can use it to measure temperature, light etc and take action accordingly. **3.3V Max**

![relay-settings](/images/integrations/adc-settings.png)

## <a id="firmware" name="firmware"></a>Firmware Upgrade (recommended way)

The unit has the ability to **update firmware over WiFi network via the web interface**. Firmware updates will be posted here. There are two branches of the relay board firmware the first is Martin's more advanced firmware based on his recent developments, Martin has not made source code available for this but has given us a compiled binary, available here:

**[Current latest firmware: V3190](https://github.com/openenergymonitor/mqtt-wifi-mqtt-single-channel-relay) (Oct 2017)**

**​Unzip then select the .bin into units interface then hit upload**

![relay-settings](/images/integrations/relay-firmware.png)


## <a id="Programming" name="Programming"></a>Programming (advanced)

The ESP8266 can be programmed manually using 3.3V USB to UART / FTDI cable. Jumper 5 should be between 2 and 3 (closer to the LED side). **Hold down the push button for the duration of the upload.**

Pre compiled binary can be flashed using [esptool](https://github.com/themadinventor/esptool) :

**Note: the recommended way to update firmware is via the web uploader (see above)**

`esptool.py --port /dev/ttyUSB0 --baud 460800 write_flash --flash_freq 80m --flash_mode qio --flash_size 16m-c1 0x1000 oem_v2088.bin`

The FTDI connection has additional jumper so second UART can be used as debug when the first one is used by the extension port (e.g. RFM69Pi - yet to be implemented).

###### **Alternative Firmware**

The second option is our adaptation of Martin's original 3 channel relay firmware, with relay 2 and 3 removed. **[This is open source and available here](https://github.com/openenergymonitor/ESP8266_Relay_Board/tree/master/1ch_relay):**

To upload this code, in the 1ch_relay directory run:

`"line-height: 20.8px;">$ sudo make`

and then to upload with a USB to UART cable:

`$ sudo sh burn.sh`

Hold down the push button for the duration of the upload, note there are 4 stages to the upload.

**Further development**: It is our intention to further develop this open source version of the firmware, if your interested in helping please get in touch.

###### **Bootloader re-load **

You can re-flash the bootloader ([download.zip](https://github.com/openenergymonitor/ESP8266_Relay_Board/blob/master/bootloader.zip)) like this:

`esptool.py --port /dev/ttyUSB0 --baud 460800 write_flash --flash_freq 80m --flash_mode qio --flash_size 16m-c1 0x00000 "boot_v1.5.bin" `

flashing the firmware itself:

`esptool.py --port /dev/ttyUSB0 --baud 460800 write_flash --flash_freq 80m --flash_mode qio --flash_size 16m-c1 0x1000 oem.v2088.bin `

If you have modified other system areas of the flash, this may also cause trouble.. try resetting them and then re-eating the bootloader-firmware update again:

`esptool.py  --port /dev/ttyUSB0 --baud 460800 write_flash --flash_freq 80m --flash_mode qio --flash_size 16m-c1 \
    0x00000 blank.bin  \
    0x01000 blank.bin  \
    0x7C000 esp_init_data_default.bin \
    0x7D000 blank.bin  \
    0x7E000 blank.bin  \
    0x7F000 blank.bin  \
    0x80000 blank.bin  \
    0xFE000 blank.bin  \
    0x100000 blank.bin \
    0x101000 blank.bin \
    0x1FC000 esp_init_data_default.bin \
    0x1FD000 blank.bin \
    0x1FE000 blank.bin \
    0x1FF000 blank.bin \
    0x3FC000 esp_init_data_default.bin \
    0x3FD000 blank.bin \
    0x3FE000 blank.bin \`

Note: flash address  0xFC000 contains board identification information. do not erase or modify it. Check debug serial output.

## <a id="schematic" name="schematic"></a>Schematic

![relay-settings](/images/integrations/relay-schematic.png)

## <a id="dimentions" name="dimensions"></a>Physical Dimensions

PCB: 87mm x 50mm


#### Credits

This unit has been designed by [Martin Harizanov](https://twitter.com/mharizanov).

Code from the following sources has been used in this project:

*   The ESP-HTTPD project by Jeroen, beerware license
*   The ESP-MQTT project by Tuan PM, MIT license
*   JSON jsmn library, Z Serge, MIT license
*   Open heating controller/thermostat scheduler by Trystan Lea
