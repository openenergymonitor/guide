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

<figure><a href="https://github.com/openenergymonitor/emonpi/raw/master/docs/emonPi_System_Diagram.png">
<img src="https://github.com/openenergymonitor/emonpi/raw/master/docs/emonPi_System_Diagram.png" alt="emonPi Architecture Overview">
<figcaption style="text-align:center;"><i>Fig.1 - emonPi Architecture Overview</i></figcaption>
</a>
</figure>

***

If you are experiancing issues please post on our community form, see [Help page](/help).

Debugging issues often involves connecting via SSH to restart services and view log files see:

### [Technical > Credentials > Connect Via SSH](/technical/credentials/#ssh)

## {% linkable_title Feeds / Inputs not Updating %}

There are a number of things to check if feeds are not updating:

### {% linkable_title 1. emonHub %}

- Is emonhub running?
   - `$ sudo service emonhub status`
   - `$ sudo service emonhub restart`

- Is emonHub posting to MQTT?
  - Check log file
  - Local Emoncms > emonHub > Emonhub logger
  - `$ tail /var/log/emonhub/emonhub.log`

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

<button type="button" class="show_hide" href="#" rel="#slidingDiv">View Example Log</button>
<div id="slidingDiv" class="toggleDiv" style="display: none;">
    <p>Example emonhub log file at startup </pre></p>

<pre>
 INFO     MainThread EmonHub emonHub 'emon-pi' variant v1.1
 INFO     MainThread Opening hub...
 INFO     MainThread Logging level set to DEBUG
 <br>
 <b>Connecting to emonPi / RFM69Pi and setting frequency & network group:</b>
 INFO     MainThread Creating EmonHubJeeInterfacer 'RFM2Pi'
 DEBUG    MainThread Opening serial port: /dev/ttyAMA0 @ 38400 bits/s
 INFO     MainThread RFM2Pi device firmware version & configuration: not available
 INFO     MainThread Setting RFM2Pi frequency: 433 (4b)
 INFO     MainThread Setting RFM2Pi group: 210 (210g)
 INFO     MainThread Setting RFM2Pi quiet: 0 (0q)
 INFO     MainThread Setting RFM2Pi baseid: 5 (5i)
 INFO     MainThread Setting RFM2Pi calibration: 230V (1p)
 DEBUG    MainThread Setting RFM2Pi subchannels: ['ToRFM12']
 DEBUG    MainThread Interfacer: Subscribed to channel' : ToRFM12
 DEBUG    MainThread Setting RFM2Pi pubchannels: ['ToEmonCMS']
 DEBUG    MainThread Interfacer: Subscribed to channel' : ToRFM12
 <br>
 <b>Connecting to localhost Mosquitto MQTT server:</b>
 INFO     MainThread Creating EmonHubMqttInterfacer 'MQTT'
 INFO     MainThread MQTT Init mqtt_host=127.0.0.1 mqtt_port=1883 mqtt_user=emonpi
 DEBUG    MainThread MQTT Subscribed to channel' : ToEmonCMS
 INFO     MainThread Creating EmonHubEmoncmsHTTPInterfacer 'emoncmsorg'
 DEBUG    MainThread emoncmsorg Subscribed to channel' : ToEmonCMS
 DEBUG    RFM2Pi     device settings updated: E i5 g210 @ 433 MHz USA 0
 INFO     MQTT       Connecting to MQTT Server
 INFO     MQTT       connection status: Connection successful
 DEBUG    MQTT       CONACK => Return code: 0
 <br>
 <b>Example Receiving Data from emonPi (Node 5 Default) and posting to emon/ MQTT topics:</b>
 DEBUG    RFM2Pi     1 NEW FRAME : OK 5 39 0 0 0 39 0 139 90 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 (-0)
 DEBUG    RFM2Pi     1 Timestamp : 1463221555.59
 DEBUG    RFM2Pi     1 From Node : 5
 DEBUG    RFM2Pi     1    Values : [39, 0, 39, 231.79, 0, 0, 0, 0, 0, 0, 0]
 INFO     RFM2Pi     Publishing: emon/emonpi/power1 39
 INFO     RFM2Pi     Publishing: emon/emonpi/power2 0
 INFO     RFM2Pi     Publishing: emon/emonpi/power1pluspower2 39
 INFO     RFM2Pi     Publishing: emon/emonpi/vrms 231.79
 INFO     RFM2Pi     Publishing: emon/emonpi/t1 0
 INFO     RFM2Pi     Publishing: emon/emonpi/t2 0
 INFO     RFM2Pi     Publishing: emon/emonpi/t3 0
 INFO     RFM2Pi     Publishing: emon/emonpi/t4 0
 INFO     RFM2Pi     Publishing: emon/emonpi/t5 0
 INFO     RFM2Pi     Publishing: emon/emonpi/t6 0
 INFO     RFM2Pi     Publishing: emon/emonpi/pulsecount 0
 INFO     RFM2Pi     Publishing: emon/emonpi/rssi 0
 INFO     RFM2Pi     Publishing: emonhub/rx/5/values 39,0,39,231.79,0,0,0,0,0,0,0
 INFO     RFM2Pi     Publishing: emonhub/rx/5/rssi 0
 DEBUG    RFM2Pi     1 adding frame to buffer => [1463221555, 5, 39, 0, 39, 231.79, 0, 0, 0, 0, 0, 0, 0]
 DEBUG    RFM2Pi     1 Sent to channel' : ToEmonCMS
<br>
<b>Example Receiving Data from emonTH (Node 20) and posting to emon/ MQTT topics:</b>
 DEBUG    RFM2Pi     27138 NEW FRAME : OK 20 170 0 0 0 106 2 26 0 (-59)
 DEBUG    RFM2Pi     27138 Timestamp : 1463330495.4
 DEBUG    RFM2Pi     27138 From Node : 20
 DEBUG    RFM2Pi     27138    Values : [17, 0, 61.800000000000004, 2.6]
 DEBUG    RFM2Pi     27138      RSSI : -59
 INFO     RFM2Pi     Publishing: emon/emonth2/temperature 17
 INFO     RFM2Pi     Publishing: emon/emonth2/external temperature 0
 INFO     RFM2Pi     Publishing: emon/emonth2/humidity 61.8
 INFO     RFM2Pi     Publishing: emon/emonth2/battery 2.6
 INFO     RFM2Pi     Publishing: emon/emonth2/rssi -59
 INFO     RFM2Pi     Publishing: emonhub/rx/20/values 17,0,61.8,2.6
 INFO     RFM2Pi     Publishing: emonhub/rx/20/rssi -59
 DEBUG    RFM2Pi     27138 adding frame to buffer => [1463330495, 20, 17, 0, 61.800000000000004, 2.6, -59]
 DEBUG    RFM2Pi     27138 Sent to channel' : ToEmonCMS

<br>
<b>Example posting data to remote https://emoncms.org:</b>
INFO     emoncmsorg sending: https://emoncms.org/input/bulk.json?apikey=E-M-O-N-C-M-S-A-P-I-K-E-Y&data=[[1463330761,5,40,0,40,228.20000000000002,0,0,0,0,0,0,0],[1463330766,5,38,0,38,229,0,0,0,0,0,0,0],[1463330771,5,41,0,41,229.03,0,0,0,0,0,0,0],[1463330776,5,38,0,38,228.18,0,0,0,0,0,0,0],[1463330781,5,38,0,38,228.21,0,0,0,0,0,0,0],[1463330786,5,36,0,36,229.16,0,0,0,0,0,0,0]]&sentat=1463330789
 DEBUG    emoncmsorg acknowledged receipt with 'ok' from https://emoncms.org
 INFO     emoncmsorg sending: https://emoncms.org/myip/set.json?apikey=E-M-O-N-C-M-S-A-P-I-K-E-Y


</pre>
</div>

### {% linkable_title 2. Emoncms MQTT Input Service %}

- Is Emoncms MQTT Input Service running?
  - `$ sudo service mqtt_input status`
  - `$ sudo service mqtt_input restart`
- Check Emoncms logfile
  - Local Emoncms > Setup > Administration > Emoncms log
  - `$ tail /var/log/emoncms.log`

### {% linkable_title 3. Incorrect system time %}

It's important that the emonPi has the correct time. If required timezone should be set in Emoncms Account page and on the Raspberry Pi (see below). The emonPi requires an active Internet connection at bootup to obtain current time from NTP. After correct time has been obtained the soft-ntp function *should* be able to keep valid time even if Internet connection is lost. See [NTP Time Fix](https://github.com/emoncms/emoncms/blob/master/docs/RaspberryPi/read-only.md#ntp-time-fix) for more info. If using an emonPi for a long period with no web connection it's recommended to [add a hardware Real-Time-Clock (RTC)](https://wiki.openenergymonitor.org/index.php/EmonPi#Adding_a_Real_Time_Clock_.28RTC.29).


- Check time on emonPi LCD display, press LCD push-button until `uptime` page is displayed
  - `$ date`

To set timezone:

- In Emoncms: `Local Emoncms > Setup > My Account > Timezone`

- On Raspberry Pi (Linux system time):
   - Check emonPi has a connection to the internet
   - Try a reboot
   - If time is still incorrect, then force manual NTP update:
   - [Connect Via SSH](/technical/credentials/#ssh)
   - Run `$ sudo rapi-config` select `Internationalisation Options` and set local timezone
   - Check time is correct by running `$ date`
   - If time is STILL not correct try:
   - Check emonpi has an active Internet connection `$ wget google.com` should connect successfully
   - `$ sudo service ntp restart`
   - Check time with `$ date

### {% linkable_title 4. Disk space %}

Check available disk space in the data partition (`/home/pi/data`) by looking at the graph at the bottom of:
`Local Emoncms > Setup > Administration`

<br>

***

## {% linkable_title Emoncms Local Password Reset %}

If the password for the local Emoncms account has been forgotten this can be reset by [connecting in via ssh](/technical/credentials/#ssh) then running:

`$ php ~/usefulscripts/resetpassword.php`

It then asks for the userid (default:1) and for a new password or option to auto generate. Example:

```
=======================================
EMONCMS PASSWORD RESET
=======================================
Select userid, or press enter for default:
Using default user 1
Enter new password, or press enter to auto generate:
Auto generated password: 9f7599c8da
```

## {% linkable_title Factory Reset %}

**Caution: this will delete ALL Emoncms data**

```shell
$ sudo su
$ ~/emonpi/./factoryreset
```
