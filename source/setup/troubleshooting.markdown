---
layout: page
title: "Troubleshooting"
description: "Troubleshooting issues deugging"
date: 2015-03-08 21:36
sidebar: true
comments: false
sharing: true
footer: true
---

### [&laquo; Previous step: Connect](/setup/connect/)

### [Next step: Log Remotely &raquo;](/setup/remote/)


# Under Consutruction

## Incorrect time on LCD display

It's important that the emonPi has the correct time. If required timezone should be set in Emoncms and on the Raspberry Pi (see below). The emonPi requires an active interent connection at bootup to obtain current time from NTP. After correct time has been obtained the soft-ntp function *should* be able to keep valid time even if interent connection is lost. See [NTP Time Fix](https://github.com/emoncms/emoncms/blob/master/docs/RaspberryPi/read-only.md#ntp-time-fix) for more info.

Press LCD push-button until `uptime` page is displayed. If time is not correct:

 - Check emonPi has a connection to the internet
 - Try a reboot
 - If time is still incorrect:
 - Connect Via SSH
 - Run `$ sudo rapi-config` select `Internationalisation Options` and set local timezone
 - Check time is correct by running `$ date`
 - If time is STILL not correct try:
 - Check emonpi has an active internet connection `$ wget google.com` should connect succesfully
 - `$ sudo service ntp restart`
 - Check time with `$ date`
 - If time is sitll not correct please post on our [Community Forums](http://community.openenergymonitor.org)

<br>

***

### [Next step: Log Remotely &raquo;](/setup/remote/)



