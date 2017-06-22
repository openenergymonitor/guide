---
layout: page
title: 1. Connect
description: Connect to network & create account
date: '2015-03-08 21:36'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---
### [&laquo; Previous step: Required Hardware](/setup/)

### [Next step: Install &raquo;](/setup/install/)

***

### {% linkable_title First Boot %}

<p class="note">
<b>This guide assumes you are using an emonPi / emonBase pre-built SD card.</b>
</p>

This SD card can be [purchased from the shop](http://shop.openenergymonitor.com/pre-loaded-emonsd-microsd-card-for-raspberry-pi/) or downloaded:

- [Pre-build SD card download & Change Log](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log)
- [Instructions to flash image to SD card (RaspberryPi)](https://www.raspberrypi.org/documentation/installation/installing-images/README.md)

*The emonPi runs the Emoncms data logging web-app locally from emonPi's internal web sever. Using Emoncms data can be logged locally to the emonPi's SD card and (optionally) posted remotely to the [Emoncms.org](https://emoncms.org) cloud server.*


**Emoncms local:** Emoncms instance running locally on the emonPi
**Emoncms remote:** Emoncms.org cloud server

<p class="note">
<b>emonPi / emonBase purchased before July 2017 do not have the ability to broadcast a setup WiFi access point. For older units please follow '1b' instructions to connect temporary via Ethernet then connect to local WiFi if required.</b>
<br>
</p>

emonPi can be connected to the internet via Ethernet or WiFi, or operate in stand-alone WiFi access point mode.

### {% linkable_title 1a. Connect to WiFi %}

*Note: All emonPi's purchased during or after July 2017 have the ability to broadcast a WiFi access point and display a setup wizard to connect to local WiFi. For older units skip to [instructions 1b](#1b-connect-to-ethernet). RaspberryPi 3 is required for WiFi AP*

![emonPi WiFi](/images/setup/emonpi_wifi.png)

- Connect 5V USB power [(1.2A USB power adapter recommended)](http://shop.openenergymonitor.com/power-supplies/)
- After a couple of minutes the emonPi will broadcast a Wifi access point (AP) called `emonPi` with password `emonpi2016`
- Connect to `emonPi` WiFi network then either browse to hostname: [http://emonpi](http://emonpi) or [http://emonpi.local](http://emonpi.local) or IP address [http://192.168.42.1](http://192.168.42.1)
- emonPi network setup wizard should now be displayed:

![emonpi-network-wizard1](/images/setup/emonpi-network-wizard1.png)

- Follow setup wizard to connect to local WiFi network:

*Note: If required emonPi can operate in Wifi AP mode without any network connection. If operating in AP mode use of a [RTC (real-time-clock)](https://wiki.openenergymonitor.org/index.php/EmonPi#Adding_a_Real_Time_Clock_.28RTC.29) is highly recommended to keep system time.*

![emonpi-network-wizard2](/images/setup/emonpi-network-wizard2.png)

![emonpi-network-wizard3](/images/setup/emonpi-network-wizard3.png)

- After selecting local WiFi network and entering password the emonPi will turn off its own WiFi AP then reboot and try and connect to local WiFi network.

*Note: if connection fails e.g. incorrect password, follow [instructions 1b](#1b-connect-to-ethernet) to connect temporary via Ethernet and use the Emoncms WiFi setup as detailed in [step 4](#4-connect-to-wifi-optional)*

![emonpi-network-wizard4](/images/setup/emonpi-network-wizard4.png)


### {% linkable_title 1b. Connect to Ethernet %}

![emonPi First Boot Ethernet](/images/setup/emonpi_ethernet_first_boot.png)

  - [1.2A USB power adapter recommended](http://shop.openenergymonitor.com/power-supplies/)

  - <p class="note"> Take care to connect the Ethernet to the socket on the same side as the USB sockets, not the RJ45 connector on the opposite side.</p>
  - The emonPi LCD display will display firmware version then scan for connected sensors. Once the Raspberry Pi has booted up, the LCD will display the IP address of the emonPi on the local network.
 - ![Ethernet Connected](/images/setup/Etherent_Connected.jpg)


### {% linkable_title 2. Connect to emonPi via local network %}

- Browsing the hostname will work on some networks: [http://emonpi](http://emonpi) or [http://emonpi.local](http://emonpi.local)
- If hostname does not work on your network, enter the IP address shown on the emonPi LCD into your browsers address bar
- *If using an emonBase and hostname does not work, look up its IP address from your router or use the Fing Network Discovery tool on [Android](https://play.google.com/store/apps/details?id=com.overlook.android.fing&hl=en_GB) and [iOS](https://itunes.apple.com/gb/app/fing-network-scanner/id430921107?mt=8)*.


### {% linkable_title  3. Create local Emoncms user account %}

 {% img /images/setup/Emoncms_reg.png 250 %}

  - By default only a single (admin) account can be created on the local emonPi Emoncms. To enable multiple accounts edit Emoncms settings in `/var/www/emoncms/settings.php`

### {% linkable_title  4. Connect to WiFi (optional) %}

**Note: if emonPi has been already connect to local Wifi using network setup wizard (see above) then skip this section.

![Connect to Wifi](/images/setup/wifi9_0.png)

1. **Wifi config in *local Emoncms* : `Setup > Wi-Fi`**
 - Network scan should happen automatically.

2. **Check the box to select the network(s) you want to connect to**

3. **Enter PSK password**

4. **Hit `Save and Connect`**

After a few seconds information should refresh automatically to report `Status: Connected` and after a few more seconds the IP address should appear.

### {% linkable_title  Assign static IP (Optional & Advanced) %}


<button type="button" class="show_hide" href="#" rel="#slidingDiv">View</button>

<div id="slidingDiv" class="toggleDiv" style="display: none;">
    <p>If local static IP address is required the easiest way is to allow IP address to be given via DHCP then fix the IP address on the router. Not all routers support this.</p>

    <p>Alternatively to set a static IP address on the emonPi itself connect via SSH and edit /etc/network/interfaces. E.g the following commands will SSH into emonPi, create backup of the interfaces file then setup a static IP on Ethernet. For WiFi change eth0 to wlan0.</p>
    <pre>
    $ shh pi@192.168.X.X
    User: "pi" | Password: "emonpi2016"
    $ rpi-rw
    $ sudo cp /etc/dhcpcd.conf /etc/backup_dhcpcd.conf
    $ sudo nano /etc/dhcpcd.conf
    <br>
    > Append to the end of dhcpcd.conf (change to suit your network and interface reqiuired static IP): <br>

    interface eth0
    static ip_address=192.168.0.10/24
    static routers=192.168.0.1
    static domain_name_servers=192.168.0.1

    interface wlan0
    static ip_address=192.168.0.200/24
    static routers=192.168.0.1
    static domain_name_servers=192.168.0.1
    <br>
    [CTRL + X] then Y to save and exit nano
    $ sudo reboot
    </pre>
    <a href="http://www.modmypi.com/blog/tutorial-how-to-give-your-raspberry-pi-a-static-ip-address">For more info see Tutorial - How to give your Raspberry Pi a Static IP Address</a>
    <p> If required the changes above to dhcpcd.conf can be made by inserting the SD card into a Linux computer and editing the file directly if working offline.</p>


</div>

<br>


### {% linkable_title 5. Connect via 3G GSM (optional) %}

Huawei HiLink 3G USB GSM/3G dongle modems are supported. Connection should be automatic and LCD will display connection status. (*Tested with Huawei E3231 and E3131*).

{% img /images/setup/3g.jpg 200 %}


[GSM Documentation](https://github.com/openenergymonitor/huawei-hilink-status) \| [WiFi Access -point setup (dev)](https://github.com/openenergymonitor/emonpi/tree/master/wifiAP)

### {% linkable_title 6. Update %}

**UPDATE HIGHLY RECOMMENDED:** Now your emonPi is connected to a network this would be a good time to pull in any new updates: `Setup > Admin > Update`

### {% linkable_title  6. Shutdown %}

Shut down the emonPi by holding down the shutdown button for 5 seconds, then wait 30 seconds for unit to fully shut down.

{% img /images/setup/emonPi_shutdown.png 200 %}

<p class='note warning'>
Unplugging power from the emonPi without following the correct shutdown procedure can result in a corrupted SD card.
</p>

The emonPi is now ready to be physically installed and the sensors connected.

<br>

### Video Guide
<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/77WEj9Q6JEE" frameborder="0" allowfullscreen></iframe>
</div>

***

### [Next step: Install &raquo;](/setup/install/)
