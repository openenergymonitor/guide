---
layout: page
title: Firmware Modification
description: Compiling Firmware
date: '2014-12-18 21:49'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The emonTx, emonTH and emonPi all use an ATmega328p 8-bit AVR microprocessor. This AVR microprocessor is Arduino compatible. You may want to modify and re-compile the firmware.

See [Resources page](/technical/resources) for links to firmware repositories for all OpenEnergyMonitor units.  

***

 **A [USB to UART adapter](https://shop.openenergymonitor.com/programmers) is required to upload to emonTx / emonTH. Any 5v FTDI adapter can also be used.**

 Note: The method of compiling and uploading firmware is identical for the emonTx and emonTH. To upload firmware to the emonPi this can either be done by compiling locally then flashing .hex file (in the `.pioenvs` folder in the project dir if using platformIO) then using avrdue on the emonPi to upload ([see emonPi avrdude upload script](https://github.com/openenergymonitor/emonpi/blob/master/firmware/compiled/update) or compiling and uploading using PlatformIO directly on the emonPi ([see blog post](https://blog.openenergymonitor.org/2016/06/platformio/).

### Using Arduino IDE

Either PlatformIO or Arduino IDE can be used to compile and upload the firmware. This example will use PlatformIO since we consider it the easiest method. If you wish to use Arduino IDE see [this Learn article](https://learn.openenergymonitor.org/electricity-monitoring/arduino-ide/windows10ide).

### Using PlatformIO

> PlatformIO is an open-source ecosystem for IoT development.

> Cross-platform build system, IDE integration and continuous testing. Arduino, Espressif, ARM and mbed compatible.

[**platformio.org**](https://platformio.org)

See our [blog post introducing PlatformIO](https://blog.openenergymonitor.org/2016/06/platformio/).


#### 1. Install PlatformIO IDE

PlatformIO IDE is built on [Atom](https://atom.io) open-source *'hackable text editor for the 21st century'* built by the GitHub. See [PlatformIO IDE Install guide](http://docs.platformio.org/en/latest/ide/atom.html#ide-atom) for more info.

*Note: skip this section if your would prefer to use PaltformIO via it's excellent command-line interface*

These install steps have been tested to work on Linux, Mac and Windows.

- [Download and install PlatformIO IDE](http://platformio.org/platformio-ide)

If running windows:
- Python will also need to be installed, see [PlatformIO IDE install-guide](http://platformio.org/platformio-id) *
- [USB to UART adapter windows drivers](http://www.silabs.com/products/mcu/Pages/USBtoUARTBridgeVCPDrivers.aspx) will need to be installed



![Download PlatfomIO](/images/technical/pio-ide-download.png)

The first time Atom IDE is opened after a few seconds PlatformIO will finish the installation and then display its home page.

![Install PlatfomIO](/images/technical/pioide-installing.png)

![Download PlatfomIO](/images/technical/pioopen.png)

##### Open emonTx Firmware

- Download [emonTx Firmware GitHub repo](https://github.com/openenergymonitor/emontx3) either via git clone or downloading the zip and extracting. 
- From the PlatformIO Home screen in Atom IDE choose `Open Project (1)*`
- Navigate to the standard emonTx Firmware `emontx3/firmware` then chosen `open`
- You should see the emonTx firmware files in the file-tree on the right-hand-side of the editor


##### Compile Firmware

- Once change has been made save then file then compile with PlatformIO by clicking `Compile (2)`
 - If this is the first time the code has been compiled PlatformIO will ask if you want to install all the required libs that are specified in `platformio.ini`. See [PlatformIO library manager](http://platformio.org/lib).

##### 5. Upload Firmware

- If code compiles successfully upload the firmware by clicking on `Upload (3)`
 - Note: A [USB to UART cable](https://shop.openenergymonitor.com/programmers) is required to upload to emonTx / emonTH
- After successful upload check nodeID has changed by viewing serial output, click `Serial Monitor (4)` and choose `115200 baud`.

***

## PlatformIO Command Line

PlatformIO works great from the commandline, follow these instructions to install and run platformIO from the commandline. See the excellent [PlatformIO Quick Start Guide](http://docs.platformio.org/en/latest/quickstart.html) for more info.

### 1. Install PlatformIO via commandline

The easiest way if running Linux is to use the install script, this installs pio via python pip and installs pip if not present. See [PlatformIO installation docs](http://docs.platformio.org/en/latest/installation.html#installer-script):

`$ sudo python -c "$(curl -fsSL https://raw.githubusercontent.com/platformio/platformio/master/scripts/get-platformio.py)"`

### 2. Clone emonTx / emonPi repo

We'll use the emonTx (V3 discrete sampling) as an example here but the steps are exactly the same for emonPi.

**emonTx V3**

```
$ git clone https://github.com/openenergymonitor/emontx3`
$ cd emontx3/firmware
```

**emonPi**

```
$ git clone https://github.com/openenergymonitor/emonpi`
cd emonpi/firmware
```

### 3. Compile with PlatformIO CLI

`$ pio run`

### 4. Upload with PlatformIO CLI

`$ pio run -t upload`

*The first time platformIO is run it will ask to install the required libraries  and avr toolchain. The required libraries are defined in platformio.ini in the project folder.*

### 4. View serial port with PlatformIO CLI

`$ pio device monitor`

For more PlatformIO commandline love see [PlatformIO getting started](http://docs.platformio.org/en/latest/quickstart.html)
