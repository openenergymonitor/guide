---
layout: page
title: Import / Backup
description: Import data from existing emonPi Emoncms accounts
date: "2015-03-08 21:36"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

### [&laquo; Previous step: Add Temperature Nodes](/setup/emonth/)

The [Emoncms backup module](https://github.com/emoncms/backup) can be used to back-up Emoncms account data and import data from another Emoncms account. This process can also be used to migrate from an older emonPi / emonBase image to the latest image.

**Currently the Backup Module can only be used with Local Emoncms not Emoncms.org**

 
## Backup / Export

### Export from older emonPi / emonBase

If the Backup module is not visible in Local Emoncms menu then the emonPi / emonBase is running an old version e.g Emoncms V8.x.

*To check what software stack (emonSD pre-built SD card) version an emonPi is running see instructions on emonPi [emonSD repository and changelog](github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Repository-&-Change-Log)*

To export data from an older emonPi / emonBase:

1. Install the backup module by running `Admin > emonPi update` in Local Emoncms
2. Wait (up to) 60s for the update to begin and then another couple of minutes for the update to complete; the update log page can be refreshed to view progress
3. Log-out of, then back in, to Local Emoncms
4. Backup module should now be visible under `Extras > Backup`
5. Click `Create Backup`
6. Wait for backup to be created, then refresh the page to view `Download Backup` link



![backup old data](/images/setup/low-write-17june15-backup.png)






## Import / Restore



![Import](/images/setup/import1.png)

<p class='note warning'>
Backup <b>tar.gz</b> filename cannot contain any spaces e.g if same backup has been downloaded twice <b>'emoncms-backup-2016-04-23 (1).tar'</b> > rename to <b>'emoncms-backup-2016-04-23.tar'</b> before uploading.
</p>


### Successful import log example

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

<pre>
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
    === Emoncms import complete! ===
</pre>
</div>


#### Included in backup

- Feed data
- Input Processing config
- Dashboards
- MyElectric / MySolarPV app settings
- EmonHub config: `emonhub.conf`*
- Emoncms config: `settings.php`*

\* *Included in backup but not restored due to potential version conflicts: saved as `old.xxxx.xxx` in `~/data` for manual restore if required.*

#### Not included in backup

- WiFi settings & passcode
- Custom NodeRED flows
- Custom openHAB settings

#### How-to backup items not automatically included

- nodeRED custom flows: select all flows then `menu > export > clipboard` copy the JSON text
- Connect via SSH:
  - See [Technical > Service Credentials](/technical/credentials/)
  - WiFi settings & password: backup copy: `~/data/wpa_supplicant.conf`
  - openHAB custom config: copy `~/data/open_openHab` folder

## Video Guide

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/5U_tOlsWjXM" frameborder="0" allowfullscreen></iframe>
</div>

<br>

### Next step: See Applications:



#### [Home Energy Monitor](/applications/home-energy/)

#### [Solar PV Monitor](/applications/solar-pv/)

#### [Advanced](/applications/advanced) e.g openHAB, nodeRED etc
