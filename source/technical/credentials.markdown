---
layout: page
title: Service Credentials
description: dev2
date: "2014-12-18 21:49"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

<figure><a href="https://github.com/openenergymonitor/emonpi/raw/master/docs/emonPi_System_Diagram.png">
<img src="https://github.com/openenergymonitor/emonpi/raw/master/docs/emonPi_System_Diagram.png" alt="emonPi Architecture Overview">
<figcaption style="text-align:center;"><i>Fig.1 - emonPi Architecture Overview</i></figcaption>
</a>
</figure>

***

Default log-in credentials for latest [pre-built emonPi/emonBase ready-to-go SD card](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log).

**Note: Before changing any password the root file-system will need to be put into Read Write mode with command `$rpi-rw`. When finished put the file-system back to Read Only with `$rpi-ro`.**

## {% linkable_title SSH %}

To connect to emonPi / emonBase via ssh:

 - Linux / Mac : open terminal window `$ ssh pi@emonpi` or `$ ssh pi@<IP ADDRESS>`
 - Windows: use [Putty application](http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html)
 - Google search ['Raspberry Pi SSH'](http://lmgtfy.com/?q=raspberry+pi+ssh) for many tutorials, [Adafruit has a good guide](https://learn.adafruit.com/downloads/pdf/adafruits-raspberry-pi-lesson-6-using-ssh.pdf)

**SSH: port 22 user,pass:`pi`,`emonpi2016`**

*On older emonSD images ssh password is `raspberry`, see emonSD [repository & changelog](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log)*

Once logged in change password with: `$ passwd`

In case you're getting error _Authentication token manipulation error_ when changing password, first mount the filesystem as read-write using `$rpi-rw`.

## {% linkable_title MYSQL %}

MYSQL: `root` user password is `emonpimysql2016` and mysql `emoncms` user password is `emonpiemoncmsmysql2016`

Note: On newer versions of mysql root access is disabled. 


## {% linkable_title MQTT %}

Mosquitto MQTT server: port:1883 user,pass:`emonpi`,`emonpimqtt2016`

Generate a new password using `sudo mosquitto_passwd -c /etc/mosquitto/passwd <username>`. Then restart mosquitto `sudo service mosquitto restart`.

If Mosquitto MQTT authentication details are changed they will also need to changed in:

```bash
~/emonpi/lcd/emonPiLCD.py
~/data/emonhub.conf
/var/www/emoncms/settings.php
~/oem_openHab/openHab.cfg (symlined to /etc/openhab/configurations/openhab.cfg)
and node red using flows editor
```

**Caution changes to `emonPiLCD.py` and `settings.php` will be overwritten by emonPi update. Recommended to undertake manual *git pull(s)* to update instead.**

## {% linkable_title NodeRED %}

NodeRED: port:1880 user,pass:`emonpi`,`emonpi2016`

change it here:  `~/data/node-red/settings.js`


## {% linkable_title OpenHab %}

OpenHab port:8080 user,pass:`pi`,`emonpi2016`

change it here: `/etc/openhab/configurations/users.cfg`
