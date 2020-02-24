---
layout: page
title: Update & Upgrade
description: emonSD Update & Upgrade
date: "2020-01-07 18:15"
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

For most updates it's possible to use the emoncms update mechanism available in the emoncms Admin section. This downloads the latest version of emoncms and all installed modules.

We also periodically release a [new emonSD image](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log) along with a fully updated version of the base OS and emoncms software, new images sometimes include more substantial changes to partition and directory structure that are harder to update via the standard update method. We recommend upgrading to new images when they become available to ensure your system is fully up-to-date.

### {% linkable_title emonPi/emonbase Update %}

1. Login to emoncms and navigate to Setup > Admin
2. Click on dropdown selector next to 'Full Update' button to expand all update options.
3. To update all components click on 'Full Update'
4. To update specific parts, select as required (The database update is included as part of the full update and emoncms update).

![Emoncms Update](/images/setup/emoncms_update.png)

**Troubleshooting**

If the update fails the first time, make a record of the update log and try again. If this does not solve the problem and you would like help to proceed further please let us know on the forums [http://community.openenergymonitor.org](http://community.openenergymonitor.org). Please provide as much information as possible including the update log and Server Information (Click on the button 'Copy as Markdown' next to Server Information on the Admin page and paste the result without further formatting in your post).

### {% linkable_title Upgrading to a new emonSD image %}

The most straightforward method of upgrading to a new emonSD image is to start with a new SD card, keep your existing emonPi/emonBase SD card as a backup to which you can revert if needed and then plug the old SD card into the emonPi/emonBase using a USB SD card reader and import the data directly. 

For an alternative single SD card upgrade method see the export/import archive method covered here: [Guide: Backup](https://guide.openenergymonitor.org/setup/import/).

#### 1. Prepare a new card

It is a good idea to start with a new SD Card to minimise risk of disk errors from previous use, though reuse should also be fine if lightly used. A 16Gb card should suffice; EmonCMS is very efficient in the way it stores it's data.

There are 2 options for a new card:

1. Purchase a new card with the image preinstalled, from the [OEM Store](https://shop.openenergymonitor.com/emonsd-pre-loaded-raspberry-pi-sd-card/).
2. Burn/flash a new image to an SD Card. To do this:
    1. Download image from the [Release Page](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log#download-11-gb).
    1. Follow the guide on the Raspbian docs to [flash the image](https://www.raspberrypi.org/documentation/installation/installing-images/README.md). This covers a method for most OSs.

#### 2. Initial boot

1. Shutdown your existing system by clicking on Shutdown on the emoncms Admin page, after 30s remove the USB power cable to fully power down.
2. Remove your existing SD card (you will need this SD card again in a moment).
3. Insert the new SD card & power up the device. Then wait, wait, wait, make a cup of coffee, wait, wait, wait… (lots of updates etc) - really do not rush this part it does take a while.
4. If you do not have a wired ethernet connection you will need to [setup your WiFi](https://guide.openenergymonitor.org/setup/connect/#1a-connect-to-wifi). **Note** the updates will not happen until after you have connected the Pi to the Internet.

Once the initial update and setup is complete, you can proceed to import your data.

#### 3. Restoring your system

1. Place the old SD card in an SD card reader and plug into any of the USB ports on the emonPi/emonBase running the new image.
2. From the EmonCMS login page, click register and create a temporary user. Once the import is complete the original user details will be used.
3. Navigate to Setup > Backup
4. Click `Import from USB drive` to start import process
5. Once the import is complete, log out and back into the EmonCMS page with the original user details

![USB Import](/images/setup/usb_import.png)
