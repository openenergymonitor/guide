---
layout: page
title: "Heat Pump Monitoring"
description: "Heat Pump Monitoring"
date: 2020-08-27 14:28
sidebar: true
comments: false
sharing: true
footer: true
---

The OpenEnergyMonitor system can be used to monitor the performance of heat pumps. The following covers a number of different configurations of the system from basic to more advanced monitoring.

![HeatpumpMonitoring](/images/applications/heatpump/hpdata.png)

### Level 1: Electricity Consumption:

At a basic level it is possible to use either the EmonTx or the EmonPi to monitor the electrical consumption of a heat pump by clipping a CT sensor around the supply to the unit. This provides detailed 10s resolution power consumption graphs as well as cumulative energy consumption in kWh on a daily/monthly/annual basis. It's possible to use the power graphs to gain a basic insight into potential issues such as excessive cycling.

To install an EmonPi or EmonTx follow the general setup guides here, clip the CT sensor around either the insulated line or neutral cable for the heat pump rather than the whole house cable.

- [Install emonPi](/setup/install/)
- [Install emonTx & emonBase](/setup/install-emontx/)
- [Install emonTx & ESP8266](/setup/esp8266-adapter-emontx/)

It is also possible to measure the electricity consumption with higher accuracy using a pulse output from an electricity meter, modbus or mbus output from an SDM120 DIN rail mounted meter or IrDA interface from an Elster A100C.

- [+ Add Pulse Counting](/setup/pulse-counting/)
- [Reading from an SDM120-MOD using emonPi/emonBase](/integrations/emonhub-interfacers)
- [Forum post: Reading from multiple MBUS meters with the EmonHub MBUS interfacer (including the SDM120-MBUS electricity meter)](https://community.openenergymonitor.org/t/reading-from-multiple-mbus-meters-with-the-emonhub-mbus-interfacer/18159)
<!--- Reading from an Elster A100C IrDa interface with an Arduino Nano (Coming soon)-->

### Level 2: System temperatures:

Since the performance of a heat pump is greatly affected by the working temperatures, it is very useful to monitor the following system temperatures:

1. The water flow and return temperature from the heat pump unit.
2. For air-source heat pumps: The outside air temperature.
3. For ground-source heat pumps: The source inlet and outlet temperatures.
4. The hot water cylinder temperature (top and bottom).

The EmonTx and EmonPi units both support temperature sensing using one-wire DS18B20 temperature sensors, see the following setup guide for examples of how to connect up temperature sensors:

- [Reading from multiple DS18B20 temperature sensors using an EmonTx or EmonPI](/setup/temperature-sensors/)

*The theoretical performance of a heat pump is given by the Carnot COP equation, see [Learn: A very simple heat pump model](https://learn.openenergymonitor.org/sustainable-energy/building-energy-model/heatpumpmodel). For an air-source heatpump measuring the water flow temperature and the outside air temperature can be used to estimate the expected COP. Many heat pumps provide an indication of expected COP at different ambient air and water temperatures in their datasheets.*

### Level 3: Flow rate & Heat metering:

The COP of a heat pump can be measured more accurately by measuring the heat output in addition to the electrical input. This can be done by either interfacing with a heat meter using MBUS (e.g: Sontex 531 or Kamstrup 402) or a pulse counter, or a flow meter with an analog voltage output (Grundfos or Sika Vortex Flow Meter).

- A heat meter with a pulse output can be connected to either the EmonTx or the EmonPi, see: [+ Add Pulse Counting](/setup/pulse-counting)
<!--- Using the analog input on a EmonTx or EmonPi to interface with an analog voltage output from a Grundfos or Sika Vortex Flow Meter-->
- Using our [MBUS to UART](https://shop.openenergymonitor.com/m-bus-to-uart-converter/) reader development board that plugs into a EmonPi or EmonBase. Setup and emonhub interfacer configuration documentation is available here: [MBUS Reader for Electric and Heat meters](/integrations/emonhub-interfacers). We also have a ESP8266 WiFi version of this board in development see: [GitHub: WiFi_MBUS_Reader](https://github.com/openenergymonitor/HeatpumpMonitor/tree/master/Hardware/WiFi_MBUS_Reader).

#### Heatpump Monitor Development boards

#### New: RaspberryPi & MBUS based heat pump monitor

<img src="/images/applications/heatpump/pimbusreader.jpeg" style="max-width:300px; float:right; margin-left:20px">

This is a new heat pump monitor board designed specifically for interfacing with MID standard electricity and heat meters via MBUS. It has a RaspberryPi at it's core running our emonSD image enabling local or/and remote logging and data visualisation.

[**Forum post:** Reading from multiple MBUS meters with the EmonHub MBUS interfacer (including the SDM120-MBUS electricity meter)](https://community.openenergymonitor.org/t/reading-from-multiple-mbus-meters-with-the-emonhub-mbus-interfacer/18159)

<div style="clear:both"></div><br><br>

#### Through-hole heat pump monitor kit

<img src="/images/applications/heatpump/hpmon.jpg" style="max-width:300px; float:right">

An alternative option to a EmonTx or EmonPi based heat pump monitor is our heat pump monitor development kit, which combines CT based energy monitoring with an MBUS reader, Elster A100C IrDa input, DS18B20 temperature sensing inputs and ESP8266 WiFi connectivity. The board is currently only available as a through-hole kit that requires assembly and soldering. For more information, assembly and installation guides see: <br>
[https://github.com/openenergymonitor/HeatpumpMonitor](https://github.com/openenergymonitor/HeatpumpMonitor)
