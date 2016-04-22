---
layout: page
title: "Log in credentials"
description: "dev2"
date: 2014-12-18 21:49
sidebar: false
comments: false
sharing: true
footer: true
---

Default log-in credentials for [pre-built emonPi/emonBase ready-to-go SD card](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Repository-&-Change-Log).

**Note: Before changing any password the root file-system will need to be put into Read Write mode with command `$rpi-rw`. When finished but file-sysem back to Read Only with `$rpi-ro`.**

# SSH

SSH: port 22 user,pass:`pi`,`emonpi2016`

Change with: `$ passwd`

## MYSQL

MYSQL: `root` user password is `emonpimysql2016` and mysql `emoncms` user password is `emonpiemoncmsmysql2016`


## Mosquitto MQTT

Mosquitto MQTT: port:1883 user,pass:`emonpi`,`emonpimqtt2016`

Generate a new password using `sudo mosquitto_passwd -c /etc/mosquitto/passwd <username>`. Then restart mosquitto `sudo service mosquitto restart`.

If Mosquitto password is change it will also need to changed in:

```
~/emonpi/lcd/emonPiLCD.py
~/data/emonhub.conf
/var/www/emoncms/settings.php
/etc/openhab/configurations/openhab.cfg
and node red using flows editor
```

**Caution changes to `emonPiLCD.py` and `settings.php` will be overwritten by emonPi update. Recommended to undertake manual *git pull(s)* to update instead.**

## NodeRED

NodeRED: port:1880 user,pass:`emonpi`,`emonpi2016`

change it here:  `~/data/node-red/settings.js`


## OpenHab

OpenHab port:8080 user,pass:`pi`,`emonpi2016`

change it here: `/etc/openhab/configurations/users.cfg`
