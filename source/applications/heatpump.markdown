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

EmonPi and EmonTx general setup guides:

- [Install emonPi](/setup/install/)
- [Install emonTx & emonBase](/setup/install-emontx/)
- [Install emonTx & ESP8266](/setup/esp8266-adapter-emontx/)

It is also possible to measure the electricity consumption with higher accuracy using a pulse output from an electricity meter, modbus output from an SDM120/220 DIN rail mounted meter or IrDA interface from an Elster A100C.

- [+ Add Optical Pulse Sensor](/setup/optical-pulse-sensor/)
- Reading from an SDM120-MOD using emonPi/emonBase
- Reading from an Elster A100C IrDa interface with an Arduino Nano

### Level 2: System temperatures:

Since the performance of a heat pump is greatly affected by the working temperatures, it is very useful to monitor the following system temperatures:

1. The water flow and return temperature from the heat pump unit.
2. For air-source heat pumps: The outside air temperature.
3. For ground-source heat pumps: The source inlet and outlet temperatures.
4. The hot water cylinder temperature (top and bottom).

The EmonTx and EmonPi units both support temperature sensing using one-wire DS18B20 temperature sensors.

- [Reading from multiple DS18B20 temperature sensors using an EmonTx or EmonPI](/setup/temperature-sensors/)

*The theoretical performance of a heat pump is given by the Carnot COP equation, see [Learn: A very simple heat pump model](https://learn.openenergymonitor.org/sustainable-energy/building-energy-model/heatpumpmodel). For an air-source heatpump measuring the water flow temperature and the outside air temperature can be used to estimate the expected COP. Many heat pumps provide an indication of expected COP at different ambient air and water temperatures in their datasheets.*

### Level 3: Flow rate & Heat metering:

The COP of a heat pump can be measured more accurately by measuring the heat output in addition to the electrical input. This can be done by either interfacing with a heat meter using MBUS or a pulse counter (e.g: Sontex 531 or Kamstrup 402), or a flow meter with an analog voltage output (Grundfos or Sika Vortex Flow Meter.

- Heatpump Monitor setup guide

#### Heatpump Monitor Development board


