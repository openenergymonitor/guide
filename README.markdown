# OpenEnergyMonitor Guide Website

[![Build Status](https://travis-ci.org/openenergymonitor/guide.svg?branch=master)](https://travis-ci.org/openenergymonitor/guide)

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

### Auto deploy

[Travis CI](https://travis-ci.org) can be used to automate a deployment if the website succesfully builds afer a git push or pull reqest merge

**To Setup**

 - add `.travis.yaml` to repo
 - Create account & turn on Travis CI for the repo in the travis dashboard
 - Generate Github [personal token](https://github.com/settings/tokens)
 - Install Travis command line `gem install travis -v 1.8.2 --no-rdoc --no-ri`
 - Encypt token with `travis encrypt GH_TOKEN=XXXXXX`
 - Add encrypted token to `.travis.yaml`
 
Example to generate the site using `rake generate` then if generation is succesful deploy to `gh pages` branch with `rake deploy`:

```yaml
language: ruby
sudo: false
cache: bundler
script: rake generate
after_success:
- '[ "${TRAVIS_BRANCH}" = "master" ] && [ "${TRAVIS_PULL_REQUEST}" = "false" ] && rake deploy || true'
env:
  global:
  - GH_REF: github.com/username/repo.git
  - secure: <encrypted GH token>

```

## Use custom URLs

Add `CNAME` file with custom domain and point CNAME DNS to `openenergymonitor.github.io`

## Credits

Thanks to @balloob from [home-assistant.io](http://home-assistant.io) for providing Octopress example. Home-assistant is an awesome open-sopurce Python3 home automation platform. See [blog post](http://openenergymonitor.blogspot.co.uk/2016/04/home-assistant-and-emonpi.html) for how to integrate with OpenEnergyMonitor emonPi
