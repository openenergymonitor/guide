---
layout: page
title: "Advanced"
description: "Community maintained list of different ways to use Home Assistant."
date: 2015-10-08 19:05
sidebar: true
comments: false
sharing: true
footer: true
regenerate: true
---

# Advanced Topics

{% assign advanced = site.advanced | sort: 'title' %}
{% assign categories = advanced | map: 'advanced_category' | uniq | sort %}

{% for category in categories %}
### {% linkable_title {{ category }} %}

  {% if category == 'Automation Examples' %}

  {% elsif category == 'Full configuration.yaml examples' %}
Some users keep a public scrubbed copy of their `configuration.yaml` to learn from.
  {% elsif category == '' %}

  {% endif %}

  {% for recipe in advanced %}
    {% if recipe.ha_category == category %}
      {% if recipe.ha_external_link %}
  * [{{recipe.title}} <i class="icon-external-link"></i>]({{recipe.ha_external_link}})
      {% else %}
  * [{{recipe.title}}]({{recipe.url}})
      {% endif %}
    {% endif %}
  {% endfor %}
{% endfor %}