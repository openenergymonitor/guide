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

***

The [Emoncms backup module](https://github.com/emoncms/backup) can be used to backup Emoncms account data and import data from another Emoncms account. This process can also be used to migrate from an older emonPi / emonBase image to the latest image.

<p class="note">
Currently the Backup Module can only be used with Local Emoncms <strong>not</strong> Emoncms.org </p>

## Backup / Export

### Export from an older emonPi / emonBase

If the Backup module is not visible in the Local Emoncms menu then the emonPi / emonBase is running an older version e.g Emoncms V8.x.

<p class="note">
To check what software stack (emonSD pre-built SD card) version an emonPi is running see instructions on emonPi <a href="https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log">emonSD download repository and changelog</a>
</p>

To export data from an older emonPi:

1. Install the backup module by running `Admin > emonPi update` in Local Emoncms
2. Wait (up to) 60s for the update to begin and then another couple of minutes for it to complete; the update log page can be refreshed to view progress
3. Log-out then back into Local Emoncms
4. Backup module should now be visible under `Extras > Backup`
5. Follow Backup instructions below

### Backup

1. Click `Create Backup` (see screenshot below)
2. Wait for backup to be created, then refresh the page to view `Download Backup` link
3. Download `.tar.gz` compressed backup

![backup old data](/images/setup/export.png)

***

## Import / Restore

<p class='note warning'>
Importing / restoring a backup will overwrite <strong>ALL</strong> data in the current Emoncms account.
</p>

*Note: If a new emonSD pre-built-SDcard image has been written to an SD card larger than 4GB the read-write `~/data` partition should be expanded to fill the SD card to create sufficient space to import a backup. **Do not use Raspbian raspi-config**, instead [connect via SSH](/technical/credentials/#ssh)) and run `$ sudo emonSDexpand` and follow prompts.*

To import a backup:

1. Check available disk space in the data partition (`/home/pi/data`), see `Local Emoncms > Setup > Administration`
1. Select `.tar.gz` backup file
2. Wait for upload to complete
3. Click `Import Backup`
4. Check restore log (see below)
5. Log out then log back into Local Emocms using the imported account login credentials

<p class='note warning'>
Backup <b>tar.gz</b> filename cannot contain any spaces; e.g., if the same backup has been downloaded more than once: rename <b>'emoncms-backup-2016-04-23 (1).tar'</b> to <b>'emoncms-backup-2016-04-23.tar'</b> before uploading.
</p>


*`emonSDexpand` will run `~/usefulscripts/sdpart/./sdpart_imagefile` script, for more info see [Useful Scripts Readme](https://github.com/emoncms/usefulscripts#sdpart_imagefile)*

![Import](/images/setup/import.png)



### Successful import log example

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="/javascripts/showHide.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){


   $('.show_hide').showHide({
		speed: 100,  // speed you want the toggle to happen
		//easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
		changeText: 0, // if you dont want the button text to change, set this to 0
		showText: 'View',// the button text to show when a div is closed
		hideText: 'Close' // the button text to show when a div is open

	});


});

</script>


<button type="button" class="show_hide" href="#" rel="#slidingDiv">View</button>
<div id="slidingDiv" class="toggleDiv" style="display: none;">

<pre>
=== Emoncms import start ===
2019-10-18-08:21:15
Backup module version:
cat: /opt/emoncms/modules/backup/backup/module.json: No such file or directory
EUID: 1000
Reading /opt/emoncms/modules/backup/config.cfg....
Location of data databases: /var/opt/emoncms
Location of emonhub.conf: /etc/emonhub
Location of Emoncms: /var/www/emoncms
Backup destination: /opt/openenergymonitor/data
Backup source path: /opt/openenergymonitor/data/uploads
Starting import from /opt/openenergymonitor/data/uploads to /opt/openenergymonitor/data...
Image version: emonSD-17Oct19
new image
Backup found: emoncms-backup-2019-10-18.tar.gz starting import..
Read MYSQL authentication details from settings.php
Decompressing backup..
emoncms.sql
emonhub.conf
settings.ini
phpfina/
phpfina/165119.meta
phpfina/165146.dat
phpfina/165117.meta
phpfina/165148.dat
phpfina/165073.dat
phpfina/165139.dat
phpfina/165107.meta
phpfina/165072.meta
phpfina/165106.dat
phpfina/165134.dat
phpfina/165152.meta
phpfina/165154.dat
phpfina/165106.meta
phpfina/165157.meta
phpfina/165076.dat
phpfina/165087.dat
phpfina/3.meta
phpfina/165080.meta
phpfina/165128.dat
phpfina/165102.dat
phpfina/1.meta
phpfina/165138.meta
phpfina/165085.dat
phpfina/165153.meta
phpfina/165089.dat
phpfina/165113.meta
phpfina/165159.meta
phpfina/165138.dat
phpfina/165079.dat
phpfina/165159.dat
phpfina/165094.dat
phpfina/2.dat
phpfina/165088.meta
phpfina/165135.dat
phpfina/3.dat
phpfina/165095.dat
phpfina/165073.meta
phpfina/165137.dat
phpfina/165124.dat
phpfina/165081.meta
phpfina/165156.dat
phpfina/165110.dat
phpfina/165122.dat
phpfina/165136.dat
phpfina/165080.dat
phpfina/165104.meta
phpfina/165122.meta
phpfina/165092.meta
phpfina/165147.meta
phpfina/165088.dat
phpfina/165077.dat
phpfina/165154.meta
phpfina/2.meta
phpfina/165092.dat
phpfina/165124.meta
phpfina/165072.dat
phpfina/165133.dat
phpfina/165082.meta
phpfina/165113.dat
phpfina/165105.dat
phpfina/165152.dat
phpfina/1.dat
phpfina/165118.meta
phpfina/165096.dat
phpfina/165083.dat
phpfina/165074.meta
phpfina/165158.dat
phpfina/165074.dat
phpfina/165136.meta
phpfina/165134.meta
phpfina/165119.dat
phpfina/165146.meta
phpfina/165107.dat
phpfina/165150.dat
phpfina/165084.meta
phpfina/165093.meta
phpfina/165127.dat
phpfina/165149.meta
phpfina/165096.meta
phpfina/165091.dat
phpfina/165137.meta
phpfina/165127.meta
phpfina/165081.dat
phpfina/165148.meta
phpfina/165125.dat
phpfina/165131.dat
phpfina/165112.dat
phpfina/165086.dat
phpfina/165145.dat
phpfina/165147.dat
phpfina/165110.meta
phpfina/165145.meta
phpfina/165104.dat
phpfina/165076.meta
phpfina/165084.dat
phpfina/165102.meta
phpfina/165155.meta
phpfina/165139.meta
phpfina/165121.dat
phpfina/165149.dat
phpfina/165079.meta
phpfina/165077.meta
phpfina/165071.dat
phpfina/165123.meta
phpfina/165120.meta
phpfina/165157.dat
phpfina/165075.dat
phpfina/165153.dat
phpfina/165123.dat
phpfina/165125.meta
phpfina/165150.meta
phpfina/165103.dat
phpfina/165089.meta
phpfina/165118.dat
phpfina/165093.dat
phpfina/165083.meta
phpfina/165133.meta
phpfina/165135.meta
phpfina/165078.meta
phpfina/165156.meta
phpfina/165075.meta
phpfina/165151.meta
phpfina/165112.meta
phpfina/165155.dat
phpfina/165078.dat
phpfina/165085.meta
phpfina/165130.meta
phpfina/165140.dat
phpfina/165111.meta
phpfina/165082.dat
phpfina/165128.meta
phpfina/165130.dat
phpfina/165087.meta
phpfina/165111.dat
phpfina/165121.meta
phpfina/165090.dat
phpfina/165151.dat
phpfina/165086.meta
phpfina/165090.meta
phpfina/165158.meta
phpfina/165091.meta
phpfina/165103.meta
phpfina/165071.meta
phpfina/165132.dat
phpfina/165131.meta
phpfina/165117.dat
phpfina/165105.meta
phpfina/165140.meta
phpfina/165120.dat
phpfina/165132.meta
phpfina/165095.meta
phpfina/165094.meta
phpfiwa/
phptimeseries/
Removing compressed backup to save disk space..
Stopping services..
Emoncms MYSQL database import...
Import feed meta data..
Restore phpfina and phptimeseries data folders...
Import emonhub.conf > /etc/emonhub/emohub.conf
OK
Restarting emonhub...
Restarting feedwriter...
2019-10-18-08:26:56
=== Emoncms import complete! ===
</pre>
</div>

***

### Included in backup

- Emoncms account credentials
- Historic Feed data
- Input Processing config (only when migrating from Emoncms V9 > V9 setup)
- Dashboards
- MyElectric / MySolarPV app settings
- EmonHub config: `emonhub.conf`*

\* *Included in backup but not restored due to potential version conflicts: saved as `old.xxxx.xxx` in `~/data` for manual restore if required.*

### Not included in backup

- WiFi passcode & custom network config
- Custom NodeRED flows
- Custom openHAB settings
- Input processing setup if migrating from Emoncms V8, input processing will need to be re-creatred after import and new inputs should be logged to imported feeds

### How-to backup items not automatically included

- nodeRED custom flows: select all flows then `menu > export > clipboard` copy the JSON text
- Connect via SSH:
  - See [Technical > Service Credentials](technical/credentials/#ssh)
  - WiFi settings & password: backup copy: `~/data/wpa_supplicant.conf`
  - openHAB custom config: copy `~/data/open_openHab` folder

***

## Video Guide

<div class='videoWrapper'>
<iframe width="560" height="315" src="https://www.youtube.com/embed/5U_tOlsWjXM" frameborder="0" allowfullscreen></iframe>
</div>

<br>

## Troubleshooting

If you have any questions or if an error occures during the backup or import process please post in the [`Hardware > emonPi` category of the Community Forums](http://community.openenergymonitor.org/c/hardware/emonpi). Please provide as much infomation as possible e.g. backup / import logs and [emonSD version](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log).

Alternatively try and perform a manual import, see [Backup Module Readme](https://github.com/emoncms/backup).

***

### Next step: Applications:


- #### [Home Energy Monitor](/applications/home-energy/)

- #### [Solar PV Monitor](/applications/solar-pv/)

- #### [Integrations](/integrations) e.g openHAB, nodeRED etc
