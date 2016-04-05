# OpenEnergyMonitor Guide Website

A clean responsive user guide website for OpenEnergyMonitor

Using all the shiny new toys: powered by Jekyll and the Oscalite theme. Hosted by GitHub and served over SSL/TSL by CloudFlare.

## Preview Jekyll website locally

| Command | Action |
|---|---|
| `rake preview` | Generate & Preview site on [http://localhost:4001](http://127.0.0.1:4001)
| `rake generate` | Generates static html in `/public`
| `rake deploy` | Deploys site to `gh-pages` branch
| `rake deploy rsync` | Deploys site via rsync over SSH



## Setup

_You need to have Ruby 2.x and bundler installed._

- [Ruby installation instructions](https://www.ruby-lang.org/en/documentation/installation/)

```bash
$ gem install bundler
```

```bash
$ git clone --recursive https://github.com/openenergymonitor/guide.git
$ cd guide
$ bundle
```
## Setup deploy to github pages

```
$ rake setup_github_pages
git@github.com:openenergymonitor/guide.git
```
After `rake deploy` site snapshot will be deployed to `gh-pages` branch where GitHub integrated Jekyll will perform some magic and website will appear:
[http://openenergymonitor.github.io/guide](http://openenergymonitor.github.io/guide)

## Use custom URLs

Add `CNAME` file with custom domain and point CNAME DNS to `openenergymonitor.github.io`
