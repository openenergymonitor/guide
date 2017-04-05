---
layout: page
title: Using the EmonTx v3 with the ESP8266 Huzzah WIFI module
description: Using the EmonTx v3 with the ESP8266 Huzzah WIFI module
date: '2017-03-31 14:51'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

This is a guide on how to use the Adafruit ESP8266 Huzzah WiFi module with an emonTx v3 to make a simple WiFi enabled energy monitor that can post directly to [emoncms.org](https://emoncms.org) or any other Emoncms installation local or remote.

For applications that only require basic posting of data from one emonTx to a remote server such as emoncms.org an emonTx with this WiFi module provides a lower cost route than a emonBase or emonPi base-station installation.

An emonBase or emonPi is recommended for more complex applications where local storage is desirable and/or an installation with multiple sensors and control nodes. An emonPi/emonBase system allows for much greater expandability and customisation.

![emontxesp.jpg](/images/setup/esp8266adapter/emontxesp.jpg)

### To setup an emonTx v3 + ESP8266 Wifi energy monitor you will need:

- **emonTx V3:** + CT, AC-AC adapter, temperature and pulse sensors as required by your application.

  - **Note:** [emonTx V3 firmware V2.5+](https://github.com/openenergymonitor/emontx3/tree/master/firmware) is required to support EmonESP.

- **5V USB DC Power supply for the emonTx:** The AC-AC Voltage adapter that can power the emonTx in normal operation does not deliver enough power to run the ESP8266 Huzzah WiFi module and so an additional USB Power supply is required.

- **ESP8266 Huzzah WIFI module with a 6 way stackable header running [EmonESP](https://github.com/openenergymonitor/emonesp):** we offer a pre-programmed ESP8266 Huzzah WiFi module in our [shop here](https://shop.openenergymonitor.com/esp8266-wifi-adapter-for-emontx/), ready to go out of the box with the header already installed and running our open source EmonESP firmware (Alternatively for a DIY approach see the original forum post [here](https://community.openenergymonitor.org/t/using-the-emontx-v3-with-the-esp8266-huzzah-wifi-module/795).

### ESP8266 Huzzah WIFI module with a 6 way stackable header:

![esp8266adapter.jpg](/images/setup/esp8266adapter/esp8266adapter.jpg)

### Setup procedure

1) Plug the ESP8266 Huzzah WIFI module into the emonTx as shown in the first picture above.

2) Connect up any CT sensors, ACAC adapter for voltage sensing and other sensors as required and plug in USB Power to the USB mini socket on the emonTx.

3) Remove (open) jumper JP2 on the emonTx PCB, then connect both the 5V DC USB power supply and the AC-AC adapter simultaneously, to ensure that the emonTx starts up detecting the AC-AC adapter and that enough power is delivered to the ESP8266 Huzzah WIFI module for startup.

**Note:** It's important to remove / open jumper JP2 seperates the AC and DC power supplies to ensure the emonTx is powered via DC and the AC is only used to provide an AC voltage referance.

4) The ESP8266 WIFI module will now create a WIFI access point for configuration. Using your laptop or phone, scan for WIFI networks, you should see a network SSID that looks something like:

    emonESP_1679732

5) After successful connection, navigate to IP address 192.168.4.1 to access the configuration page:

![emonesp-scan.png](/images/setup/esp8266adapter/emonesp-scan.png)

6) Select the WIFI network that you wish to connect to, enter passkey and click Connect. Wait about 30s for the module to connect. Once connected the module will show its IP-address in the interface (underlined in red in the screenshot).

![emonesp-ipaddress.png](/images/setup/esp8266adapter/emonesp-ipaddress.png)

7) Click on the IP address to change your browser to the new location. Reconnect to your home WIFI network. Refresh the page to load the emonESP configuration page across your home LAN WIFI rather than the access point.

8) If you wish to post data to emoncms.org, enter your emoncms.org write apikey found on your emoncms.org account page.

9) Set the Emoncms Node Name to 0 or other numeric node id in the range 0 – 31 (Emoncms.org does not currently support non-numeric node names).

10) Click save, after around 10-20 seconds the interface should report that the successful packets have been sent to emoncms.org. You can now check the inputs page on your emoncms.org account, which should looks like this:

![espinputs.png](/images/setup/esp8266adapter/espinputs.png)

11) Configure emoncms.org as normal, see section on “Using Emoncms” in the [emoncms documentation](https://github.com/emoncms/emoncms/blob/master/readme.md).

### EmonESP

The ESP8266 needs to run EmonESP firmware. The Huzzah modules sold via the shop are pre-loaded with EmonESP. For more info about EmonESP and to check for updates see [EmonESP Github](https://github.com/openenergymonitor/emonesp).

### MQTT

The emonESP firmware also supports publishing data to an MQTT broker. To use MQTT see the MQTT section on the EmonESP configuration page. You can enter a hostname, username, password and base topic to configure the module to post to an MQTT broker of your choice.

If you have an emonBase or EmonPi on your local network the default settings are:

**hostname:** emonpi<br>
**username:** emonpi<br>
**password:** emonpimqtt2016<br>
**base topic:** emon/emontx<br>

See [emonPi technical overview](/technical) and [MQTT](/technical/mqtt) User Guide pages for more info.
