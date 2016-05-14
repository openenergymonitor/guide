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

# Under Construction

If you are experiancing issues please contact us, see [Help page](/help)

## {% linkable_title Feeds / Inputs not Updating %}

There are a number of things to check if feeds are not updating:

### {% linkable_title emonHub %}

- Is emonhub running?
   - $ sudo service emonhub status
   - $ sudo service emonhub restart

- Is emonHub posting to MQTT?
   - See example emonhub log (In Local Emoncms: Setup > EmonHub > emonHub log View):

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
    <p>Example emonhub log file /var/log/emonhub/emonhub.log</p>
  
<pre>
2016-05-14 10:25:48,454 INFO     MainThread EmonHub emonHub 'emon-pi' variant v1.1
2016-05-14 10:25:48,455 INFO     MainThread Opening hub...
2016-05-14 10:25:48,455 INFO     MainThread Logging level set to DEBUG
2016-05-14 10:25:48,456 INFO     MainThread Creating EmonHubJeeInterfacer 'RFM2Pi'
2016-05-14 10:25:48,458 DEBUG    MainThread Opening serial port: /dev/ttyAMA0 @ 38400 bits/s
2016-05-14 10:25:50,463 INFO     MainThread RFM2Pi device firmware version & configuration: not available
2016-05-14 10:25:50,464 INFO     MainThread Setting RFM2Pi frequency: 433 (4b)
2016-05-14 10:25:51,466 INFO     MainThread Setting RFM2Pi group: 210 (210g)
2016-05-14 10:25:52,468 INFO     MainThread Setting RFM2Pi quiet: 0 (0q)
2016-05-14 10:25:53,470 INFO     MainThread Setting RFM2Pi baseid: 5 (5i)
2016-05-14 10:25:54,472 INFO     MainThread Setting RFM2Pi calibration: 230V (1p)
2016-05-14 10:25:55,475 DEBUG    MainThread Setting RFM2Pi subchannels: ['ToRFM12']
2016-05-14 10:25:55,476 DEBUG    MainThread Interfacer: Subscribed to channel' : ToRFM12
2016-05-14 10:25:55,476 DEBUG    MainThread Setting RFM2Pi pubchannels: ['ToEmonCMS']
2016-05-14 10:25:55,477 DEBUG    MainThread Interfacer: Subscribed to channel' : ToRFM12
2016-05-14 10:25:55,478 INFO     MainThread Creating EmonHubMqttInterfacer 'MQTT'
2016-05-14 10:25:55,480 INFO     MainThread MQTT Init mqtt_host=127.0.0.1 mqtt_port=1883 mqtt_user=emonpi
2016-05-14 10:25:55,483 DEBUG    MainThread MQTT Subscribed to channel' : ToEmonCMS
2016-05-14 10:25:55,486 INFO     MainThread Creating EmonHubEmoncmsHTTPInterfacer 'emoncmsorg'
2016-05-14 10:25:55,488 DEBUG    MainThread emoncmsorg Subscribed to channel' : ToEmonCMS
2016-05-14 10:25:55,489 DEBUG    RFM2Pi     device settings updated: E i5 g210 @ 433 MHz USA 0
2016-05-14 10:25:55,585 INFO     MQTT       Connecting to MQTT Server
2016-05-14 10:25:55,588 INFO     MQTT       connection status: Connection successful
2016-05-14 10:25:55,589 DEBUG    MQTT       CONACK => Return code: 0
2016-05-14 10:25:55,593 DEBUG    RFM2Pi     1 NEW FRAME : OK 5 39 0 0 0 39 0 139 90 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 (-0)
2016-05-14 10:25:55,597 DEBUG    RFM2Pi     1 Timestamp : 1463221555.59
2016-05-14 10:25:55,597 DEBUG    RFM2Pi     1 From Node : 5
2016-05-14 10:25:55,598 DEBUG    RFM2Pi     1    Values : [39, 0, 39, 231.79, 0, 0, 0, 0, 0, 0, 0]
2016-05-14 10:25:55,599 INFO     RFM2Pi     Publishing: emon/emonpi/power1 39
2016-05-14 10:25:55,600 INFO     RFM2Pi     Publishing: emon/emonpi/power2 0
2016-05-14 10:25:55,601 INFO     RFM2Pi     Publishing: emon/emonpi/power1pluspower2 39
2016-05-14 10:25:55,602 INFO     RFM2Pi     Publishing: emon/emonpi/vrms 231.79
2016-05-14 10:25:55,604 INFO     RFM2Pi     Publishing: emon/emonpi/t1 0
2016-05-14 10:25:55,605 INFO     RFM2Pi     Publishing: emon/emonpi/t2 0
2016-05-14 10:25:55,606 INFO     RFM2Pi     Publishing: emon/emonpi/t3 0
2016-05-14 10:25:55,607 INFO     RFM2Pi     Publishing: emon/emonpi/t4 0
2016-05-14 10:25:55,608 INFO     RFM2Pi     Publishing: emon/emonpi/t5 0
2016-05-14 10:25:55,609 INFO     RFM2Pi     Publishing: emon/emonpi/t6 0
2016-05-14 10:25:55,610 INFO     RFM2Pi     Publishing: emon/emonpi/pulsecount 0
2016-05-14 10:25:55,611 INFO     RFM2Pi     Publishing: emon/emonpi/rssi 0
2016-05-14 10:25:55,613 INFO     RFM2Pi     Publishing: emonhub/rx/5/values 39,0,39,231.79,0,0,0,0,0,0,0
2016-05-14 10:25:55,614 INFO     RFM2Pi     Publishing: emonhub/rx/5/rssi 0
2016-05-14 10:25:55,615 DEBUG    RFM2Pi     1 adding frame to buffer => [1463221555, 5, 39, 0, 39, 231.79, 0, 0, 0, 0, 0, 0, 0]
2016-05-14 10:25:55,616 DEBUG    RFM2Pi     1 Sent to channel' : ToEmonCMS
2016-05-14 10:25:55,691 INFO     MQTT       on_subscribe
</pre>
</div>
   
### {% linkable_title Emoncms MQTT Input Service %}

### {% linkable_title Incorrect system time %}

**Check time on emonPi LCD display**

It's important that the emonPi has the correct time. If required timezone should be set in Emoncms Account page and on the Raspberry Pi (see below). The emonPi requires an active Internet connection at bootup to obtain current time from NTP. After correct time has been obtained the soft-ntp function *should* be able to keep valid time even if Internet connection is lost. See [NTP Time Fix](https://github.com/emoncms/emoncms/blob/master/docs/RaspberryPi/read-only.md#ntp-time-fix) for more info. If using an emonPi for a long period with no web connection it's recomended to [add a hardware Real-Time-Clock](https://wiki.openenergymonitor.org/index.php/EmonPi#Adding_a_Real_Time_Clock_.28RTC.29).

Press LCD push-button until `uptime` page is displayed. If time is not correct:

 - Check emonPi has a connection to the internet
 - Try a reboot
 - If time is still incorrect:
 - [Connect Via SSH](/technical/credentials/#ssh)
 - Run `$ sudo rapi-config` select `Internationalisation Options` and set local timezone
 - Check time is correct by running `$ date`
 - If time is STILL not correct try:
 - Check emonpi has an active Internet connection `$ wget google.com` should connect succesfully
 - `$ sudo service ntp restart`
 - Check time with `$ date`
 - If time is sill not correct please post on our [Community Forums](http://community.openenergymonitor.org)

<br>

***
