# OpenEnergyMonitor Guide Website

[![Build Status](https://travis-ci.org/openenergymonitor/guide.svg?branch=master)](https://travis-ci.org/openenergymonitor/guide)

A clean responsive user guide website for OpenEnergyMonitor

Using all the shiny new toys: powered by Jekyll and the Oscalite theme. Hosted by GitHub and served over SSL/TSL by CloudFlare.

**[Edit site using Prose editor](http://prose.io/#openenergymonitor/guide/edit/master/source)**

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


### Deploy to GitHub Pages

This website is hosted using [GitHub Project pages](https://help.github.com/categories/github-pages-basics/). Github will serve the site from the `gh-pages` branch.

If this is the first time we publishing this site we neeed to create the `gh-pages` branch:

`git checkout --orphan gh-pages`

Once Octopress and rake Jekyll as been setup as described to generate the html and deploy site to `gh-pages` run

`$ rake generate`
`$ rake deploy`

In a few moments site will be live:

[http://openenergymonitor.github.io/guide](http://openenergymonitor.github.io/guide)

We then use [CloudFlare](https://www.cloudflare.com) as the DNS which serves the pages via secure HTTPS. On our domain (see custom domain below)

[https://guide.openenergymonitor.org](https://guide.openenergymonitor.org)


### Auto deploy on commit trigger

In the deploy example above the site is generated locally then pushed to github pages. It's possible to automate this build to make everything happen (by magic!) in the cloud:

[Travis CI](https://travis-ci.org) with [rake-jekyll](https://github.com/jirutka/rake-jekyll) can be used to automate a deployment of the website (build + push commit to `gh-pages`) afer a git push or pull reqest merge to `master`

**To Setup**

 - Create account & turn on Travis CI for the repo in the travis dashboard
 - Generate Github [personal token](https://github.com/settings/tokens) or use
  - `curl -u 'your_github_name' -d '{ "scopes": [ "public_repo"], "note": "Travis access"}' https://api.github.com/authorizations `
  - Install Travis command line `gem install travis`
  - Encypt token and add to `travis.yaml` by running the following in website dir: `$ travis encrypt GH_TOKEN=XXXXXX --add env.global`
 
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
