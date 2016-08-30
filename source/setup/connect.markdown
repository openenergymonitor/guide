---
layout: page
title: Connect
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


<p class="note">
<b>Emoncms local:</b> Emoncms instance running locally on the emonPi
<br>
<b>Emoncms remote:</b> Emoncms.org cloud server.
</p>

### {% linkable_title 1. Connect Ethernet and USB power %}

![emonPi First Boot Ethernet](/images/setup/emonpi_ethernet_first_boot.png)

  - [1.2A USB power adapter recommended](http://shop.openenergymonitor.com/power-supplies/)

  - <p class="note"> Take care to connect the Ethernet to the socket on the same side as the USB sockets, not the RJ45 connector on the opposite side.</p>
  - The emonPi LCD display will display firmware version then scan for connected sensors. Once the Raspberry Pi has booted up, the LCD will display the IP address of the emonPi on the local network.
 - ![Ethernet Connected](/images/setup/Etherent_Connected.jpg)


### {% linkable_title 2. Enter the emonPis IP address into your web browser's address bar %}

- Browsing the hostname will work on some networks: [http://emonpi](http://emonpi)
- *If using an emonBase and hostname does not work, look up its IP address from your router or use the Fing Network Discovery tool on [Android](https://play.google.com/store/apps/details?id=com.overlook.android.fing&hl=en_GB) and [iOS](https://itunes.apple.com/gb/app/fing-network-scanner/id430921107?mt=8)*.


### {% linkable_title  3. Create local Emoncms user account %}

 {% img /images/setup/Emoncms_reg.png 250 %}

  - By default only a single (admin) account can be created on the local emonPi Emoncms. To enable multiple accounts edit Emoncms settings in `/var/www/emoncms/settings.php`

### {% linkable_title  4. Connect to WiFi (optional) %}

WiFi is optional and requires either a RaspberryPi 3 (integrated WiFi) or a USB WiFi dongle ([Edimax EW7811UN](http://shop.openenergymonitor.com/edimax-usb-wifi-adapter-ew-7811un/)).

*Note: All emonPis shipped June 2016 onwards will have a Raspberry Pi 3 as standard, emonPis with a Pi3 can be identified by a plastic end-plate(s). [See blog post](https://blog.openenergymonitor.org/2016/05/emonpi-raspberrypi3/).*

![Connect to Wifi](/images/setup/wifi9_0.png)

1. **Wifi config in *local Emoncms* : `Setup > Wi-Fi`**
 - Network scan should happen automatically.

2. **Check the box to select the network(s) you want to connect to**

3. **Enter PSK password**

4. **Hit `Save and Connect`**

After a few seconds information should refresh automatically to report `Status: Connected` and after a few more seconds the IP address should appear.

### {% linkable_title  Assign static IP (Optional & Advanced) %}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="/javascripts/showHide.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){
   $('.show_hide').showHide({
		speed: 100,  // speed you want the toggle to happen
		easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
		changeText: 0, // if you dont want the button text to change, set this to 0
		showText: 'View',// the button text to show when a div is closed
		hideText: 'Close' // the button text to show when a div is open
					 
	});
});
</script>

<button type="button" class="show_hide" href="#" rel="#slidingDiv">View</button>
<div id="slidingDiv" class="toggleDiv" style="display: none;">
    <p>If local static IP address is required the easiest way is to allow IP address to be given via DHCP then fix the IP address on the router. Not all routers support this.</p>

    <p>Alternatively to set a static IP address on the emonPi itself connect via SSH and edit /etc/network/interfaces. E.g the following commands will SSH into emonPi, create backup of the interfaces file then setup a static IP on Ethernet. For WiFi change eth0 to wlan0.</p>
    <pre>
    $ shh pi@192.168.X.X
    User: "pi" | Password: "emonpi2016"
    $ rpi-rw
    $ sudo cp /etc/network/interfaces /etc/network/backup_interfaces
    $ sudo nano /etc/network/interfaces
    <br>
    > Edit the file to be the following changing to suit your network: <br>
    auto lo
    iface lo inet loopback
    iface eth0 inet static
    address 10.0.1.96        # Static IP address
    netmask 255.255.255.0
    network 10.0.1.0
    broadcast 10.0.1.255
    gateway 10.0.1.254       # IP address gateway (router)
    <br>
    [CTRL + X] then Y to save and exit nano
    $rpi-ro
    </pre>
    <a href="http://www.modmypi.com/blog/tutorial-how-to-give-your-raspberry-pi-a-static-ip-address">Tutorial - How to give your Raspberry Pi a Static IP Address</a>


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
