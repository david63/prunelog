# Prune Log extension for phpBB

Adds a configurable option to once a day remove log file entries after n days.

[![Build Status](https://travis-ci.com/david63/prunelog.svg?branch=master)](https://travis-ci.com/david63/prunelog)
[![License](https://poser.pugx.org/david63/prunelog/license)](https://packagist.org/packages/david63/prunelog)
[![Latest Stable Version](https://poser.pugx.org/david63/prunelog/v/stable)](https://packagist.org/packages/david63/prunelog)
[![Latest Unstable Version](https://poser.pugx.org/david63/prunelog/v/unstable)](https://packagist.org/packages/david63/prunelog)
[![Total Downloads](https://poser.pugx.org/david63/prunelog/downloads)](https://packagist.org/packages/david63/prunelog)

## Minimum Requirements
* phpBB 3.2.0
* PHP 5.4

## Install
1. [Download the latest release](https://github.com/david63/prunelog/archive/3.2.zip) and unzip it.
2. Unzip the downloaded release and copy it to the `ext` directory of your phpBB board.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Look for `Prune Log` under the Disabled Extensions list and click its `Enable` link.

## Usage
1. Navigate in the ACP to `General -> Board Settings -> Prune log file days`.
2. Set the number of days..

## Uninstall
1. Navigate in the ACP to `Customise -> Manage extensions`.
2. Click the `Disable` link for `Prune Log`.
3. To permanently uninstall, click `Delete Data`, then delete the prunelog folder from `phpBB/ext/david63/`.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2019 - David Wood