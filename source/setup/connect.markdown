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

### [Next step: Install &raquo;](/setup/install/)

#  First Boot

<p class="note">
<b>This guide assumes using emonPi / emonBase pre-built SD card.</b>
</p>

This SD card can be [purchased from the shop](http://shop.openenergymonitor.com/pre-loaded-emonsd-microsd-card-for-raspberry-pi/) or downloaded:

- [Pre-build SD card download & Change Log](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Repository-&-Change-Log)
- [Instructions to flash image to SD card (RaspberryPi)](https://www.raspberrypi.org/documentation/installation/installing-images/README.md)

*The emonPi runs Emoncms data logging web-app locally from emonPi's internal web sever.        Using Emoncms data can be logged locally to the emonPi's SD card and (optionally) posted remotely to [Emoncms.org](https://emoncms.org) cloud server.*


<p class="note">
<b>Emoncms local:</b> Emoncms instance running locally on the emonPi
<br>
<b>Emoncms remote:</b> Emoncms.org cloud server.
</p>

## 1. Connect Ethernet and USB power

![emonPi First Boot Etherent](/images/setup/emonpi_ethernet_first_boot.png)

  - [1.2A USB power adapter recommended](http://shop.openenergymonitor.com/power-supplies/)

  - <p class='note warning'> Take care to connect Ethernet to the socket on the same side as the USB sockets, NOT the RJ45 connector on the opposite side.</p>
  - The emonPi LCD display will start by cycling through information about what is connected to it. Once the Raspberry Pi has booted up, the LCD will display the IP address of the emonPi on your local network.
 - ![Ethernet Connected](/images/setup/Etherent_Connected.jpg)


## 2. **Enter emonPi IP-address in your web browser address bar**

- Browsing the hostname will work on some networks: [http://emonpi](http://emonpi)
- *If using an emonBase and hostname does not work, lookup it's IP address from your router or use Fing Network Discovery tool on [Android](https://play.google.com/store/apps/details?id=com.overlook.android.fing&hl=en_GB) and [iOS](https://itunes.apple.com/gb/app/fing-network-scanner/id430921107?mt=8)*.


## 3. **Create local Emoncms user account**

 {% img /images/setup/Emoncms_reg.png 250 %}

  - By default only a single (admin) account can be created on local emonPi Emoncms. To enable multiple accounts edit Emoncms settings in `/var/www/emoncms/settings.php`

## 4. Connect to WiFi (optional)

WiFi is optional and requires either a RaspberryPi3 (integrated WiFi) or a USB WiFi dongle ([Edimax EW7811UN](http://shop.openenergymonitor.com/edimax-usb-wifi-adapter-ew-7811un/)).

![Connect to Wifi](/images/setup/wifi9_0.png)

1. **Wifi config in *local Emoncms* : `Setup > Wi-Fi`**
 - Network scan should happen automatically.

2. **Check the box to select the network(s) you want to connect to**

3. **Enter PSK password**

4. **Hit `Save and Connect`**

After a few seconds info should refresh automatically to report `Status: Connected` and after a few more seconds IP address should appear.

## 5. Update

**UPDATE HIGHLY RECOMMENDED:** Now your emonPi is connected to a network this would be a good time to pull in any new updates: `Setup > Admin > Update`

## 6. Shutdown

Shutdown emonPi by press-and-holding the shutdown button on the side, with a paper clip for 5 seconds then waiting 30s for unit to fully shutdown.

{% img /images/setup/emonPi_shutdown.png 200 %}

<p class='note warning'>
Unplugging power from the emonPi without properly shutting down can result in a corrupted SD card.
</p>

The emonPi is now ready to be physically installed and sensors connected.

### [Next step: Install &raquo;](/setup/install/)

### Video Guide
<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/77WEj9Q6JEE" frameborder="0" allowfullscreen></iframe>
</div>
