---
layout: page
title: "Compiling and Uploading AVR Firmware using PlatformIO"
description: "Compiling Firmware"
date: 2014-12-18 21:49
sidebar: true
comments: false
sharing: true
footer: true
---

The emonTx, emonTH and emonPi all use a ATmega328p 8-bit AVR microprocessor. This microprocessor is Arduino compatible. You may want to modify and re-compile the firmware for one of the following reasons:

- Modify the firmware to add custom feature e.g support a new type of sensor etc.
- Change the RF nodeID e.g. if you want to use nodeID's than are possible to configure via the hardware DIP switches (more than 2x emonTx V3 units, or more than 4x emonTH units)

## Example: Change emonTx V3 RF nodeID

The process of editing, compiling and uploading firmware is best explained with an example. In this example we will change the emonTx V3 node ID, this is useful if we want to connect more than 4x emonTx V3 units to a single emonPi / emonBase.

### Use Arduino IDE

### Use PlatformIO




![Download PlatfomIO](/images/technical/pio-ide-download.png)


![Install PlatfomIO](/images/technical/pioide-installing.png)


![Dowhload PlatfomIO](/images/technical/pioopen.png)
