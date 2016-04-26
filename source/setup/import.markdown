---
layout: page
title: "Import / Backup"
description: "Import data from existing emonPi Emoncms accounts"
date: 2015-03-08 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

### [&laquo; Previous step: Add Temperature Nodes](/setup/emonth/)

The [Emoncms backup module](https://github.com/emoncms/backup) can be used to backup Emoncms account data and import for another Emoncms account. This process can be used to migrate from an older emonPi / emonBase image to the latest image.

#### Included in backup

- Feed data
- Input processing settings
- Dashboards
- MyElectric / MySolarPV app settings
- EmonHub `emonhub.conf`*
- Emocms `settings.php`*

\* *Inluded in backup but not restored due to potential version confilcts: saved as `old.xxxx.xxx` in `~/data` for manual restore if required*

#### Not included in backup

- WiFi settings & passwrod
- nodeRED flows
- Custom openHAB settings
 
## Backup / Export

![backup old data](/images/setup/low-write-17june15-backup.png)

### Backing up items not automaticlly included

- Wifi settings & password: backup `~/data/wpa_supplicant.conf`
- nodeRED flows: select all flows then hit `menu > export > clipboard` then copy the JSON text and save to a file
- openHAB custom config: backup `~/data/open_openHab` folder

## Import / Restore

![Import](/images/setup/import1.png)

<p class='note warning'>
Backup <b>tar.gz</b> filename cannot contain any spaces e.g if same backup has been downloaded twice <b>'emoncms-backup-2016-04-23 (1).tar'</b> > rename to <b>'emoncms-backup-2016-04-23.tar'</b> before uploading.
</p>


<div class="container">
  <h3>Succesfull import log</h3>
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">View example</button>
  <div id="demo" class="collapse">


    === Emoncms import start ===
    Sat 23 Apr 00:42:28 UTC 2016
    Reading ~/backup/config.cfg....
    Location of mysql database: /home/pi/data
    Location of emonhub.conf: /home/pi/data
    Location of emoncms.conf: /home/pi/data
    Location of Emoncms: /var/www/emoncms
    Backup destination: /home/pi/data
    Backup source path: /home/pi/data/uploads
    Starting import from /home/pi/data/uploads to /home/pi/data...
    Image version: emonSD-29Mar16
    new image
    Backup found: emoncms-backup-2016-04-23.tar.gz starting import..
    Decompressing backup..
    Removing compressed backup to save disk space..
    Wipe any current data from account..
    Restore phpfina and phptimeseries data folders...
    Emoncms MYSQL database import...
    Import emonhub.conf > /home/pi/data/old.emohub.conf
    Import emoncms.conf > /home/pi/data/old.emoncms.conf
    Start with fresh config: copy NEW default emonpi.emonhub.conf:
    cp /home/pi/emonhub/conf/emonpi.default.emonhub.conf /home/pi/data/emonhub.conf
    OK
    Update Emoncms Database
    ["ALTER TABLE dashboard MODIFY `height` int(11) Default '600'","ALTER TABLE dashboard MODIFY `main` tinyint(1) Default '0'","ALTER TABLE dashboard MODIFY `public` tinyint(1) Default '0'","ALTER TABLE dashboard MODIFY `published` tinyint(1) Default '0'","ALTER TABLE dashboard MODIFY `showdescription` tinyint(1) Default '0'","ALTER TABLE `dashboard` ADD `backgroundcolor` varchar(6) NOT NULL DEFAULT 'EDF7FC'","ALTER TABLE feeds MODIFY `time` int(10);","ALTER TABLE feeds MODIFY `value` double;","ALTER TABLE `feeds` ADD `processList` text NOT NULL","ALTER TABLE input MODIFY `time` int(10);","ALTER TABLE users MODIFY `salt` varchar(32);","ALTER TABLE users MODIFY `timezone` varchar(64) Default 'UTC';"]
    Restarting emonhub...
    Restarting feedwriter...
    Sat 23 Apr 00:42:39 UTC 2016


  </div>
</div>
<br>
=== Emoncms import complete! ===
## Video Guide

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/5U_tOlsWjXM" frameborder="0" allowfullscreen></iframe>


### &laquo; Next step: See Applications >

**For application specific configuration:**
[Home Energy Monitor](/applications/home-energy/)
[Solar PV Monitor](/applications/solar-pv/)
[Advanced]((/applications/advanced) e.g openHAB, nodeRED etc
