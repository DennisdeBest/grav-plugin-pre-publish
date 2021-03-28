# Pre Publish Plugin

**This README.md file should be modified to describe the features, installation, configuration, and general usage of the plugin.**

The **Pre Publish** Plugin is an extension for [Grav CMS](http://github.com/getgrav/grav). Only display pages if the published at date is more then the current datetime

## Installation

Installing the Pre Publish plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](http://learn.getgrav.org/advanced/grav-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install pre-publish

This will install the Pre Publish plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/pre-publish`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `pre-publish`. You can find these files on [GitHub](https://github.com/dennisdebest/grav-plugin-pre-publish) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/pre-publish
	
> NOTE: This plugin is a modular component for Grav which may require other plugins to operate, please see its [blueprints.yaml-file on GitHub](https://github.com/dennisdebest/grav-plugin-pre-publish/blob/master/blueprints.yaml).

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/pre-publish/pre-publish.yaml` to `user/config/plugins/pre-publish.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
filter:
  items:              #Set the pages on which you want this plugin to go through the child collection and remove pages where the published_date is inferior to the current date
    '@page': /blog
```

Note that if you use the Admin Plugin, a file with your configuration named pre-publish.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

## Usage

This plugin will allow you to set pages to be published at a specific time. 
If a page that is part of the collection of one of the pages in the filter, and it is set as **published: true**
remove it from the collection if it has a **published_date** greater than the current date.

## To Do

- [ ] Add cache

