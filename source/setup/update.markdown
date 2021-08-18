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

For most updates it's possible to use the emonCMS update mechanism available in the emonCMS Admin section. This downloads the latest version of emonCMS and all installed modules.

We also periodically release a [new emonSD image](https://github.com/openenergymonitor/emonpi/wiki/emonSD-pre-built-SD-card-Download-&-Change-Log) along with a fully updated version of the base OS and emonCMS software, new images sometimes include more substantial changes to partition and directory structure that are harder to update via the standard update method. We recommend upgrading to new images when they become available to ensure your system is fully up-to-date.

### {% linkable_title emonPi/emonbase Update %}

1. Login to emonCMS and navigate to Setup > Admin
2. Click on dropdown selector next to 'Full Update' button to expand all update options.
3. To update all components click on 'Full Update'
4. To update specific parts, select as required (The database update is included as part of the full update and emonCMS update).

![emonCMS Update](/images/setup/emonCMS_update.png)

**Troubleshooting**

If the update fails the first time, make a record of the update log and try again. If this does not solve the problem and you would like help to proceed further please let us know on the forums [http://community.openenergymonitor.org](http://community.openenergymonitor.org). Please provide as much information as possible including the update log and Server Information (Click on the button 'Copy as Markdown' next to Server Information on the Admin page and paste the result without further formatting in your post).

### {% linkable_title Upgrading to a new emonSD image %}

The most straightforward method of upgrading to a new emonSD image is to start with a new SD card, keep your existing emonPi/emonBase SD card as a backup to which you can revert if needed and then plug the old SD card into the emonPi/emonBase using a USB SD card reader and import the data directly. 

This process is documented in the import guide here:

[Guide: Import](https://guide.openenergymonitor.org/setup/import/).
