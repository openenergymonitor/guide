---
layout: page
title: Connect
description: "Connect to network & create account"
date: "2015-03-08 21:36"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

### [&laquo; Previous step: Required Hardware](/setup/)

##  First Boot

### Create Local Emoncms account

By default Emoncms data logging app runs locally on the emonPi's web sever. Data can be logged locally to the emonPi's SD card and (optionally) posted remotly to Emoncms.org cloud server.

The first step is to create an account with **local Emoncms**.

<p class="note">
Emoncms local: Emoncms instance running locally on the emonPi
<br>
Emoncms remote: Emoncms.org cloud server.
</p>

1. **Connect the Ethernet and 5V USB power**
  - [1.2A USB power adapter recommended](http://shop.openenergymonitor.com/power-supplies/)
  - ![emonPi First Boot Etherent](/images/setup/emonpi_ethernet_first_boot.png)
  - <p class='note warning'> Take care to connect Ethernet to the socket on the same side as the USB sockets, NOT the RJ45 connecter on the opposite side.</p>
  - The emonPi LCD display will start by cycling through information about what is connected to it. Once the Raspberry Pi has booted up, the LCD will display the IP address of the emonPi on your local network.
 - ![Etherent Connected](/images/setup/etherent_Connected.jpg)


2. **Enter emonPi IP Address in your web browser address bar**
- (Browsing the hostname will work on some networks: [http://emonpi](http://emonpi))
- ![emonPi IP](/images/setup/Etherent_Connected.jpg)
 - *If using an emonBase, you will need to look at your router's IP address table or use a tool such as Fing Network Discovery to find the emonBase IP address, if browsing to the hostname does not work.*


3. **Create Emoncms local user account**
  - ![Emoncms create account](/images/setup/Emoncms_reg.png)
  - <p class='note'> By default only a single (admin) account can be created on local emonPi Emoncms. To enable multiple accounts edit Emoncms settings in `/var/www/emoncms/settings.php` </p>

### Connect to WiFi (optional)

WiFi is optional and requires either a RaspberryPi3 (integrated WiFi) or a USB WiFi dongle ([Edimax EW7811UN](http://shop.openenergymonitor.com/edimax-usb-wifi-adapter-ew-7811un/)).

1. Wifi config in *local Emoncms* : `Setup > Wi-Fi`
 - ![Connect to Wifi](/images/setup/wifi-config.png)
 - Network scan should happen automatically.

2.) Check the box to select the network(s) you want to connect to

3.) Enter PSK password

4.) Hit `Save and Connect`

After a few seconds info should refresh automatically to report `Status: Connected` and after a few more seconds IP address should appear.

### Update

**UPDATE HIGHLY RECOMMENDED:** Now your emonPi is connected to a network this would be a good time to pull in any new updates: `Setup > Admin > Update`

### Shutdown

Shutdown emonPi by press-and-holding the shutdown button on the side, with a paper clip for 5 seconds then waiting 30s for unit to fully shutdown.

![emonPi Shutdown](/images/setup/emonPi_shutdown.png)

<p class='note warning'>
Unplugging power from the emonPi without properly shutting down can result in a corrupted SD card.
</p>

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/77WEj9Q6JEE" frameborder="0" allowfullscreen></iframe>
</div>


### [Next step: Log Locally &raquo;](/setup/local/)
