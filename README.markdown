# OpenEnergyMonitor Guide Website

[![Build Status](https://travis-ci.org/openenergymonitor/guide.svg?branch=master)](https://travis-ci.org/openenergymonitor/guide)

A clean responsive user guide website for OpenEnergyMonitor.

Using all the shiny new toys: powered by Jekyll and the Oscailte theme. Hosted by GitHub and served over SSL/TSL by CloudFlare.

**[Edit site using Prose editor](http://prose.io/#openenergymonitor/guide/edit/master/source)**

## Preview Jekyll website locally

| Command | Action |
|---|---|
| `rake generate preview` | Generate & Preview site on [http://localhost:4001](http://127.0.0.1:4001)
| `rake generate` | Generates static html in `/public`
| `rake deploy` | Deploys site to `gh-pages` branch
| `rake deploy rsync` | Deploys site via rsync over SSH

### Edit sidebar nav menu

`guide/source/_includes/asides/navigation_side.html`

## Setup

#### Install Ruby

Jekyll requires Ruby 2.x and bundler installed

To install Ruby:

1. First, update the packages index and install the packages required for the ruby-build tool to build Ruby from source:
```
sudo apt update
sudo apt install git curl libssl-dev libreadline-dev zlib1g-dev autoconf bison build-essential libyaml-dev libreadline-dev libncurses5-dev libffi-dev libgdbm-dev rbenv
```

2. Add $HOME/.rbenv/bin to the system PATH.
```
echo 'export PATH="$HOME/.rbenv/bin:$PATH"' >> ~/.bashrc
echo 'eval "$(rbenv init -)"' >> ~/.bashrc
source ~/.bashrc
```
3. Next, run the following curl command to install both rbenv and ruby-build:

`curl -fsSL https://github.com/rbenv/rbenv-installer/raw/HEAD/bin/rbenv-installer | bash`

4. Install the latest stable version of Ruby and set it as a default version with:

```
rbenv install 2.7.0
rbenv global 2.7.0
```

To list all available Ruby versions you can use: `rbenv install -l`

5. Verify that Ruby was properly installed by printing out the version number:

`ruby -v`

6. Install rubygems

`sudo apt-get install rubygems`

#### Install bundler and required gems

```
$ gem install bundler
$ git clone --recursive https://github.com/openenergymonitor/guide.git
$ cd guide
$ bundle
```

### Preview site locally

```
$ bundle exec rake generate preview
```

[https://localhost:4001](https://localhost:4001)

Full [Ruby installation instructions](https://www.ruby-lang.org/en/documentation/installation/)

***

### Deploy to GitHub Pages

This website is hosted using [GitHub Project pages](https://help.github.com/categories/github-pages-basics/). Github will serve the site from the `gh-pages` branch.

If this is the first time we publishing this site we neeed to create the `gh-pages` branch:

`git checkout --orphan gh-pages`

Once Octopress and rake Jekyll as been setup as described to generate the html and deploy site to `gh-pages` run

`$ bundle exec rake generate`

`$ bundle exec rake deploy`

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

Example `travis.yaml` to generate the site using `rake generate` then if generation is succesful deploy to `gh pages` branch with `rake deploy`:

```yaml
language: ruby
sudo: false
cache: bundler
script: bundle exec rake generate
after_success: bundle exec rake deploy
env:
  global:
    secure:  <encrypted GH token>

```

## Use custom URL's

Add `CNAME` file with custom domain and point CNAME DNS to `openenergymonitor.github.io`

## Credits

Thanks to @balloob from [home-assistant.io](http://home-assistant.io) for providing Octopress example. Home-assistant is an awesome open-sopurce Python3 home automation platform. See [blog post](http://openenergymonitor.blogspot.co.uk/2016/04/home-assistant-and-emonpi.html) for how to integrate with OpenEnergyMonitor emonPi

build
