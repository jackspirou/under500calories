# Bootstrap TouchCarousel - _Feel's good!_
[![Bower version](https://badge.fury.io/bo/bootstrap-touch-carousel.png)](http://badge.fury.io/bo/bootstrap-touch-carousel)

__A drop-in perfection for [Twitter Bootstrap's Carousel (v3)](http://getbootstrap.com/javascript/#carousel) to enable gestures on touch devices.__
The Plugin uses [hammer.js, A javascript library for multi-touch gestures](http://eightmedia.github.io/hammer.js/) to enable touch gestures that feels awesome. If you just have a touch device handy, visit the [demo](http://ixisio.github.io/bootstrap-touch-carousel/) and feel it by yourself.



## TOC

* [Features](#features)
* [The TouchCarousel in Action](#the-touchcarousel-in-action)
* [Quick start: Get the plugin](#quick-start--get-the-plugin)
* [Plugin Options](#plugin-options)
* [How it works](#how-it-works)
* [Contributing](#contributing)
* [Changelog](#changelog)
* [Feature Requests / Future Tasks](#feature-requests--future-tasks)
* [Copyright and license](#copyright-and-license)




## Features

* Supported gestures: `dragleft` `dragright` `swipeleft` `swiperight`
* Optimized layout for touch devices
* Build with Less & Grunt
* No extra initializations




## The TouchCarousel in Action

* [Aktion-Mensch.de Magazin](https://www.aktion-mensch.de/magazin/fokus/boxer.html)
* *(Ping me, or send a PR if you too are using the TouchCarousel in the wild.)*




## Quick start: Get the plugin

Three quick start options are available:

- [Download the latest release](https://github.com/ixisio/bootstrap-touch-carousel/archive/master.zip)
- Clone the repo: `git clone git://github.com/ixisio/bootstrap-touch-carousel.git`
- Install with Bower: `bower install bootstrap-touch-carousel`.
- Add as Bootstrap git submodule `git submodule add git://github.com/ixisio/bootstrap-touch-carousel.git /vendor/your-sm`





## Plugin Options

Have a look at the original bootstrap carousel documentation, the options are mostly the same. <br>
[http://getbootstrap.com/javascript/#carousel](http://getbootstrap.com/javascript/#carousel)

### interval

* Type: `Number` `Boolean`
* Default `false`

The amount of time to delay between automatically cycling an item. If false, carousel will not automatically cycle.

`data-interval="2000"`

### toughness

* Type: `Number`
* Default `0.25`

Dragging toughness of first and last carousel item.

`data-toughness="0.5"`





## How it works

This jQuery Plugin is designed to add touch-support to your existing bootstrap carousel. The only thing you have to do, is to load these files into your existing Bootstrap project:

* `/dist/js/bootstrap-touch-carousel.js`
* `/dist/css/bootstrap-touch-carousel.css`

Read more about this plugin works here: [http://andreasklein.org/articles/bootstrap-touch](http://andreasklein.org/articles/bootstrap-touch)





## Contributing

Please read through the official twbs [contributing guidelines](https://github.com/twbs/bootstrap/blob/master/CONTRIBUTING.md). Included are directions for opening issues, coding standards, and notes on development.

Moreover, if your pull request contains JavaScript patches or features, you must include relevant unit tests.

Editor preferences are available in the editor config for easy use in common text editors. Read more and download plugins at [editorconfig.org](http://editorconfig.org).

### Compiling CSS and JavaScript

> Bootstrap uses [Grunt](http://gruntjs.com/) with convenient methods for working with the framework. It's how we compile our code, run tests, and more. To use it, install the required dependencies as directed and then run some Grunt commands.

[See twbs docs](https://github.com/twbs/bootstrap/blob/master/README.md)

### Available Grunt Tasks

* `grunt` Default tasks watches for JavaScript & LESS Changes
* `grunt build` creates a distribution build
* `grunt test` provides some qunit tests
* `grunt bump` release management





## Changelog

**0.7.1**
* Update for better documentation
* Register as bower package

**0.7.0**
* Disable when with only 1 slide [#6](https://github.com/ixisio/bootstrap-touch-carousel/issues/6)
* Add new Grunt Task `grunt-bump` for release management. [vojtajina/grunt-bump](https://github.com/vojtajina/grunt-bump)

**0.6.0**
* fixes indicators touch sensitivity [#9](https://github.com/ixisio/bootstrap-touch-carousel/issues/9)
* code refactoring

**0.5.0**
* add resize/orientation events and resize the carousel to its parent element width [#5](https://github.com/ixisio/bootstrap-touch-carousel/issues/5)
* Some minor bugfixes
* update docs

**0.3.0**
* Update to grunt@0.4.2

**0.2.0**
* MSPointer benchmarks
* fixes [#3](https://github.com/ixisio/bootstrap-touch-carousel/issues/3), touch optimizes indicator pills
* [#2](https://github.com/ixisio/bootstrap-touch-carousel/issues/2), display captions on portait orientation iPad
* Create some unittest with qunit
* Documentation

**0.1.0**
* Initial Commit - provides the basic functionality.





## Feature Requests / Future Tasks

* Disable / Stop initialization if there is only one item [#6](https://github.com/ixisio/bootstrap-touch-carousel/issues/6)
* Endless Loops (wrap)
* ~~Live Resize~~ fixed in v0.5.0 [#5](https://github.com/ixisio/bootstrap-touch-carousel/issues/5)
* Hammer.js custom build (use only whats required)
* ~~MSPointer: Support pointer and gesture events. Tests needed!~~
    Works perfectly! See hammer.js [compatibility table](https://github.com/EightMedia/hammer.js/wiki/Compatibility)
* ~~Optimize indicator pills for touch~~ done! [#3](https://github.com/ixisio/bootstrap-touch-carousel/issues/3)
* ~~Better Documentation~~ fixed in v0.7.1 [#20](https://github.com/ixisio/bootstrap-touch-carousel/pull/20)
* Unit Tests (qunit)
* ~~Register as [bower](http://bower.io) component~~ fixed in v0.7.1 [#20](https://github.com/ixisio/bootstrap-touch-carousel/pull/20)




## Copyright and license

Copyright (c) 2014 ixisio Licensed under the MIT license.
