---
layout: page
title: Service Credentials
description: "Default username and password for emonPi,EmnBase and emonSD systems"
date: "2014-12-18 21:49"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

<style>.code {font-family:monospace; font-size:14px; background-color: #eee; padding: 20px; margin-bottom:20px}</style>

Default log-in credentials for emonPi/emonBase running latest [emonSD based SD card](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log).

### {% linkable_title SSH %}

To connect to emonPi / emonBase via ssh:

- **If running emonSD-30Oct18 or newer SSH is disabled by default**
- SSH can be enabled by either:
  - Creating a file called `ssh` in the FAT `/boot` partion on the SD card. This can be done externally using a card reader + PC or using a USB keyboard + HDMI screen to login to the Pi and create the ssh file: `sudo touch /boot/ssh`. Then reboot `sudo reboot`
  - Or selecting the `SSH Enable` LCD menu item then pressing and holding the emonPi LCD push-button:

*Once enabled, SSH can be disabled in the same way:*

<div class='videoWrapper'>
<iframe width="300" height="315" src="https://www.youtube.com/embed/sFwFamB-ifU" frameborder="0" allowfullscreen></iframe>
</div>

 - Linux / Mac : open terminal window `$ ssh pi@emonpi` or `$ ssh pi@<IP ADDRESS>`
 - Windows: use [Putty application](http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html)
 - Google search ['Raspberry Pi SSH'](http://lmgtfy.com/?q=raspberry+pi+ssh) for many tutorials, [Adafruit has a good guide](https://learn.adafruit.com/downloads/pdf/adafruits-raspberry-pi-lesson-6-using-ssh.pdf).


Credentials:

<div class="code">
<b>SSH Port:</b> 22<br>
<b>Username:</b> pi<br>
<b>Password:</b> emonpi2016<br><br>
<b>Old image password:</b> raspberry
</div>

Once logged in change password with:

<div class="code">
$ passwd
</div>

If you see the error: _Authentication token manipulation error_ when changing password, first mount the filesystem as read-write using `$rpi-rw`.

If you wish to disable SSH run:

<div class="code">
$ sudo /opt/openenergymonitor/emonpi/lcd/./disablessh.sh
</div>

## {% linkable_title MYSQL %}

<div class="code">
<b>username:</b> emoncms<br>
<b>password:</b> emonpiemoncmsmysql2016
</div>

## {% linkable_title MQTT %}

Mosquitto MQTT server: 

<div class="code">
<b>port:</b> 1883<br>
<b>username:</b> emonpi<br>
<b>password:</b> emonpimqtt2016
</div>

Generate a new password using:

<pre class="code">sudo mosquitto_passwd -c /etc/mosquitto/passwd emonpi</pre> 

Then restart mosquitto:

<pre class="code">sudo service mosquitto restart</pre>

If Mosquitto MQTT authentication details are changed they will also need to changed in:

<pre class="code">
/opt/openenergymonitor/emonpi/lcd/emonPiLCD.cfg
/etc/emonhub/emonhub.conf
/var/www/emoncms/settings.ini .. or:
/var/www/emoncms/settings.php
</pre>

## {% linkable_title NodeRED %}

*NodeRED is no longer installed as standard. It can be installed if required.*

<div class="code">
<b>port:</b> 1880<br>
<b>username:</b> emonpi<br>
<b>password:</b> emonpi2016
</div>

Change settings here:  `~/data/node-red/settings.js`


## {% linkable_title OpenHab %}

*OpenHab is no longer installed as standard. It can be installed if required.*

<div class="code">
<b>port:</b> 8080<br>
<b>username:</b> emonpi<br>
<b>password:</b> emonpi2016
</div>

Change settings here: `/etc/openhab/configurations/users.cfg`
