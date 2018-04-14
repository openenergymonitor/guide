---
layout: page
title: "Emoncms API"
description: "Emoncms API"
date: 2014-12-18 21:49
sidebar: true
comments: false
sharing: true
footer: true
---
## Emoncms API docs

The  API is the same for remote [Emoncms.org](https://emoncms.org) and local Emoncms (running on emonPi). To get started on the EmonPi, read /var/www/emoncms/readme.md or browse to http://127.0.0.1/emoncms/feed/api.

For a local EmonCMS system, just replace `emoncms.org` with `<EMONPI_LOCAL_IP_ADDDRESS>/emoncms`. For instance http://127.0.0.1/emoncms.
* [Emoncms Input API](https://emoncms.org/site/api#input)
* [Emoncms Feed API](https://emoncms.org/site/api#feed)

When trying to read a value, you'll notice that authentication is required.
```
pi@emonpi(ro):~$ wget -qO- "http://127.0.0.1/emoncms/feed/timevalue.json?id=1"
{"success":false,"message":"Username or password empty"}pi@emonpi(ro):~$ 
```

Visit https://emoncms.org/site/api# for more information on authentication. Retrieve the API keys from http://127.0.0.1/emoncms/feed/api. For this example, the read only key is ok.
```
pi@emonpi(ro):~$ APIKEY=put_your_api_key_here
pi@emonpi(ro):~$ wget -qO- "http://127.0.0.1/emoncms/feed/timevalue.json?id=1&apikey=$APIKEY"
{"time":1523695587,"value":32}pi@emonpi(ro):~$ 
```

If you specify an invalid feed id, you'll get an error message.
```
pi@emonpi(rw):~$ wget -qO- "http://127.0.0.1/emoncms/feed/timevalue.json?id=3&apikey=$APIKEY"
{"success":false,"message":"Feed does not exist"}
```
Check your feed list id against the EmonCMS web interface at http://127.0.0.1/emoncms/feed/list
