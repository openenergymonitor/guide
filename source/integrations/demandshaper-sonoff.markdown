---
layout: page
title: Sonoff WiFi Smart Plug scheduling
description: Sonoff WiFi Smart Plug scheduling
date: '2020-02-28 11:20'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The following guide covers setup of the Sonoff S20 WiFi Smart Plug and [Emoncms DemandShaper module](/integrations/demandshaper/) for smart scheduling based on day-ahead forecasts for the best time to use power.

**Potential applications:** De-humidifiers, Ebike battery charging. Note that Sonoff S20 smart plugs have a 10A maximum current capacity and a standby power draw of ~1W.

![emonevse_hub.png](/images/integrations/demandshaper/sonoffs20/sonoffs20_hub.png)

**You will need:**

- Sonoff S20 WiFi Smart plug running latest [EmonESP firmware](https://github.com/openenergymonitor/EmonESP).
- emonBase or emonPi base-station running [emonSD-17Oct19 or newer](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log#emonsd-17oct19-stable).
- USB Power supply and micro-USB cable for base-station.

#### Setting up your emonBase or emonPi base-station

Start by setting up your emonBase or emonPi following the [Software Setup > Connect](/setup/connect/) guide. Create an local emoncms account on your emonBase/emonPi and run the software updater from the Admin page to make sure that you have the latest software.

#### Setting up your WiFi Smart Plug

1\. Plug your smart plug into an electrical socket. The light on the plug will show green for 3 seconds followed by a short off period and then a couple of very short flashes. This indicates that the plug is working and has created a WIFI Access Point.

2\. The WIFI Access Point should appear in your laptop or phones available WIFI networks, the SSID will contain the name smartplug followed by a number e.g: 'smartplug1'.

3\. Connect to this network, open an internet browser and enter the following address:

**[http://192.168.4.1](http://192.168.4.1)**

![EmonESP1.png](/images/integrations/demandshaper/sonoffs20/EmonESP1.png)

4\. Select the WIFI network you wish to connect to, enter the passkey and click connect. 

The green light on the smartplug will now turn on again. If the connection is successful you will see 10 very fast consecutive flashes. 

5\. The web interface will also show that the module has connected and its IP address:

![EmonESP2.png](/images/integrations/demandshaper/sonoffs20/EmonESP2.png)

**Failed Connection**<br>
If the smartplug fails to connect to the selected WIFI network the green LED will stay on with a slight pulsing rythym for 30 seconds before the plug automatically resets and tries again. To re-enter setup mode hold the button on the front of the smartplug down while the green LED is on.

---

#### Pairing the Smart Plug with your emonBase/emonPi

With the smartplug WIFI settings configured connect back to you home network, login to the local emoncms on your emonBase/emonPi and navigate to the DemandShaper module:

![demandshaper1](/images/integrations/demandshaper/sonoffs20/demandshaper1.png)

After a couple of minutes a notice will appear asking whether to allow device at the given ip address to connect:

![demandshaper2](/images/integrations/demandshaper/sonoffs20/demandshaper2.png)

Click allow and wait a couple of minutes for the device to appear. If it does not appear, try refreshing the page.

![demandshaper3](/images/integrations/demandshaper/sonoffs20/demandshaper3.png)

*What happened here?:*

1. *The smart plug discovers the emonbase/emonpi automatically by listening out for the periodic UDP packet published by the emonbase/emonpi, enabled by the UDP broadcast script and triggered by keeping the demandshaper page open*
2. *Clicking on Allow provides the smart plug with the MQTT authentication details from the emonbase/emonpi automatically as part of a pairing process.* 
3. *After connecting to MQTT the smartplug sent a descriptor message that automatically created and configured an emoncms device based on the smartplug device template in the emoncms device module*

---

#### Using the DemandShaper

**Option 1: Turn On/Off directly**<br>
The most basic mode of operation, turn on/off device from the interface:

![demandshaper3.png](/images/integrations/demandshaper/sonoffs20/demandshaper4.png)

**Tip:** The smartplug can be turned on and off at the plug as well by clicking the push button on the front of the smartplug. Refresh the page to see changes in the dashboard.

**Option 2: Use the smart scheduler**<br>
Enter the period and end time of the schedule you wish to set and the demand shaper module will do the rest, automatically optimising the schedule for the lowest cost or lowest carbon time.

![demandshaper3.png](/images/integrations/demandshaper/sonoffs20/demandshaper3.png)

**Option 3: Set a manual timer:**<br>
Set a manual timer for specific run times:

![demandshaper4.png](/images/integrations/demandshaper/sonoffs20/demandshaper5.png)
