<!--- BEGIN HEADER -->
# Changelog

All notable changes to this project will be documented in this file.
<!--- END HEADER -->

## 2.1.0 - 2023-03-01

### Features

* Allow craft {{ nonce }} variable from Sherlock to be injected into the CSRF token script. (155f76)

### Bug Fixes


##### Ci

* Address some issues with testing since Craft 4 now only supports PHP 8.0.2+ (7d074d)

## 2.0.0 - 2022-11-16

### ⚠ BREAKING CHANGES

* Supports Craft 4 (6d1e64)

### Bug Fixes

* Add type declarations for Craft 4 support. (e0f393)
* Include composer allow plugin list. (cc6672)

## 1.1.0 - 2021-09-14
### Features

* Add block to postcode lookup to allow markup to be injected. (7c1b80)

### Bug Fixes

* Define empty value for option. (6ee135)

## 1.0.2 - 2021-09-13
### Bug Fixes

* Fix changelog. (96a1e9)
* Make address select name less specific and configurable. (334044)
* Make postcode lookup field less specific. (b3c3ea)

## 1.0.1 - 2021-09-07


### Bug Fixes

 * Remove hardcoded responses from API which were used for testing purposes.


## 1.0.0 - 2021-09-06


### Added

* Initial release
