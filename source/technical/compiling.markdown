---
layout: page
title: Compiling and Uploading AVR Firmware using PlatformIO
description: Compiling Firmware
date: '2014-12-18 21:49'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

The emonTx, emonTH and emonPi all use a ATmega328p 8-bit AVR microprocessor. This AVR microprocessor is Arduino compatible. You may want to modify and re-compile the firmware for one of the following reasons:

- Modify the firmware to add custom feature e.g support a new type of sensor etc.
- **Change the RF nodeID** e.g. To use more than 2x emonTx V3 units, or more than 4x emonTH units on a single network the nodeID's must be set manually in the firmware since more nodeID's are required than is possible to set using the on-board hardware DIP switches.

*Note: The 433Mhz RF networks supports node ID's in the range of 1-29, RF nodeID must be unique to each unit on the same network. A corresponding node decoder entry must be created for each node in `emonhub.conf`. See [configuring EmonHub config](https://github.com/openenergymonitor/emonhub/blob/emon-pi/configuration.md)

## Example: Change emonTx V3 RF nodeID

The process of editing, compiling and uploading firmware is best explained with an example. In this example we will change the emonTx V3 node ID, this is useful if we want to connect more than 4x emonTx V3 units to a single emonPi / emonBase.

### Using Arduino IDE

Either PlatformIO or Arduino IDE can be used to compile and upload the firmware. This example will use PlatformIO since we consider it the easiest method. If you wish to use Arduino IDE see [Setting Up the Arduino Environment](https://openenergymonitor.org/emon/buildingblocks/setting-up-the-arduino-environment).

### Using PlatformIO

> PlatformIO is an open-source ecosystem for IoT development.

> Cross-platform build system, IDE integration and continuous testing. Arduino, Espressif, ARM and mbed compatible.

See our [blog post introducing PlatformIO](https://blog.openenergymonitor.org/2016/06/platformio/).


#### 1. Install PlatformIO IDE

PlatformIO IDE is built on [Atom](https://atom.io) open-source *'hackable text editor for the 21st century'* built by the GitHub. See [PlatformIO IDE Install guide](http://docs.platformio.org/en/latest/ide/atom.html#ide-atom) for more info.

*Note: skip this section if your would prefer to use PaltformIO via it's excellent command-line interface*

These install steps have been tested to work on Linux, Mac and Windows.

- [Download and install PlatformIO IDE](http://platformio.org/platformio-ide)

*Note: if your running windows Python will also need to be installed, see [PlatformIO IDEinstall guide](http://platformio.org/platformio-id)*

![Download PlatfomIO](/images/technical/pio-ide-download.png)

The first time Atom IDE is opened after a few seconds PlatformIO will finish the installation and then display its home page.

![Install PlatfomIO](/images/technical/pioide-installing.png)

![Download PlatfomIO](/images/technical/pioopen.png)

##### 2. Open emonTx Firmware

- Download [emonTx Firmware GitHub repo](github.com/openenergymonitor/emontxFirmware/) either via git clone or downloading the zip and extracting.
- From the *PlatformIO Home page* in Atom IDE choose `Open Project (1)*`
- Navigate to the standard emonTx Firmware `emonTxFirmware/emonTxV3/RFM/emonTxV3.4/emonTxV3_4_DiscreteSampling` then chosen `open`
- You should see the emonTx firmware files in the file tree on the RHS of the editor


##### 3. Change node ID

- Using the atom file-tree open `src/src.ino` this is the main emonTx firmware file
- Change `byte nodeID = 8;` (currently line 128) to be a different number e.g. `byte nodeID = 29;`
  - 29 is recommended since this does not conflict with any other nodeID's
  - Switching the DIP switch 1 on the emonTx will subtract 1 from the nodeID in the firmware e.g. 29 will be come 28 if DIP switch 1 = ON. See [emonTx Setup for more info](http://guide.openenergymonitor.org/setup/emontx/)

##### 4. Compile Firmware

- Once change has been made save then file then compile with PlatformIO by clicking `Compile (2)`
 - If this is the first time the code has been compiled PlatformIO will ask if you want to install all the required libs that are specified in `platformio.ini`. See [PlatformIO library manager](http://platformio.org/lib).

##### 5. Upload Firmware

- If code compiles successfully upload the firmware by clicking on `Upload (3)`
 - Note: A [USB to UART cable](https://shop.openenergymonitor.com/programmers) is required to upload to emonTx / emonTH
- After successful upload check nodeID has changed by viewing serial output, click `Serial Monitor (4)` and choose `9600 baud`.



## PlatformIO Command Line

PlatformIO works great from the commandline, follow these instructions to install and run platformIO from the commandline. See the excellent [PlatformIO Quick Start Guide](http://docs.platformio.org/en/latest/quickstart.html) for more info.

### 1. Install PlatformIO via commandline

The easiest way if running Linux is to use the install script, this installs pio via python pip and installs pip if not present. See [PlatformIO installation docs](http://docs.platformio.org/en/latest/installation.html#installer-script):

`$ sudo python -c "$(curl -fsSL https://raw.githubusercontent.com/platformio/platformio/master/scripts/get-platformio.py)"`

### 2. Clone emonTx / emonPi repo

We'll use the emonTx (V3 discrete sampling) as an example here but the steps are exactly the same for emonPi.

**emonTx V3**

```
$ git clone https://github.com/openenergymonitor/emonTxFirmware`
$ cd emonTxFirmware/emonTxV3/RFM/emonTxV3.4/emonTxV3_4_DiscreteSampling
```

**emonPi**

```
$ git clone https://github.com/openenergymonitor/emonpi`
cd emonpi/firmware
```

### 3. Compile with PlatformIO

`$ platformIO run`

or shorthand for the lazy

`$ pio run`

**That's it!** That's all that's needed to setup pio from scratch and compile emonTx firmware :-D

The first time platformIO is run it will ask to install the required libraries  and avr toolchain. The required libraries are defined in platformio.ini in the project folder.
