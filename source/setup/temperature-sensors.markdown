---
layout: page
title: + Add Temperature Sensors
description: Add Temperature Sensors
date: '2020-10-27 18:50'
sidebar: true
comments: false
sharing: true
footer: true
published: true
---

Both the emonPi and emonTx support temperature sensing using DS18B20 one-wire digital temperature sensors. The standard firmware on the emonPi supports up to 6x temperature sensors and the emonTx up to 3x temperature sensors. 

Both the emonPi and the emonTx have a special RJ45 socket to which either a single RJ45 DS18B20 temperature sensor can be connected directly or multiple sensors can be connected via either a RJ45 breakout board or terminal block breakout board. Alternatively the terminal block on the emonTx can be used for wired connection.

**Example 1: emonPi with 4x temperature sensors and a RJ45 breakout**

![800px-Emonpi_ds18b20_rj45.JPG](/images/setup/800px-Emonpi_ds18b20_rj45.JPG)

- [Shop: RJ45 Encapsulated DS18B20 temperature sensor](http://shop.openenergymonitor.com/rj45-encapsulated-ds18b20-temperature-sensor/)
- [Shop: emonPi / emonTx RJ45 Expander for DS18B20 & Pulse Sensors](https://shop.openenergymonitor.com/rj45-expander-for-ds18b20-pulse-sensors/)
- [An RJ45 coupler can be used to extend RJ45 sensor cables.](http://www.sheepwalkelectronics.co.uk/product_info.php?cPath=26&products_id=36)

**Example 2: emonTx with 4x temperature sensors and a terminal block breakout**

![EmonTx_RJ45_DS18B20.jpg](/images/setup/EmonTx_RJ45_DS18B20.jpg)

- [Shop: Encapsulated DS18B20 temperature sensor](http://shop.openenergymonitor.com/encapsulated-ds18b20-temperature-sensor/)
- [Shop: emonPi / emonTx RJ45 to Terminal Block Breakout for DS18B20](https://shop.openenergymonitor.com/rj45-to-terminal-block-breakout-for-ds18b20/)

**EmonTx Power Supply**<br>
When using multiple temperature sensors and or an optical pulse sensor with the emonTx it is recommended to power the emonTx via a 5V USB rather than AC-AC adapter due to increased power requirement. An AC-AC adapter can still be used to provide an AC voltage reference. 

**EmonTx Low power battery mode**<br>
In order to save power when running on batteries, the emonTx V3 supports switching off of the DS18B20 in-between readings and performing the temperature conversion while the ATmega328 is sleeping. To do this, power (3.3 V) is supplied to the DS18B20's power pin from Dig19 (ADC5), this digital pin is switched off between readings. (This facility is available only if the temperature sensors are connected via the terminal block.) The data connection from the DS18B20 is connected to Dig5, this I/O pin has a 4K7 pull-up resistor on-board as required by the DS18B20. 

**RJ45 Pinout**<br>
The RJ45 implements a standard pinout used by other manufacturers of DS18B20 temperate sensing hardware such as Sheep Walker Electronics.

![RJ45-Pin-out.png](/images/setup/RJ45-Pin-out.png)

*Note: The RJ45 socket does not support power supply switching via Dig19 (ADC5) as described above.*

**Terminal Block Connection (EmonTx only)**<br>
To connect an external DS18B20 to the emonTx V3 screw terminal block, connect the **black** wire to GND, **red** to 'ADC5 / Dig19 / DS18B20 PWR' and **white** to 'Dig 5 / DS18B20 Data / PWM':

![emontx_ds18b20_terminal_block.jpg](/images/setup/emontx_ds18b20_terminal_block.jpg)

**Further reading**<br>
If you are using temperature sensors with heating systems such as heat pumps the following blog post by John Cantor provides a number of useful mounting suggestions: [John Cantor's Blog: Temperature sensors for monitoring heat pumps](http://johncantorheatpumps.blogspot.co.uk/2015/06/temperature-sensing-with.html)
