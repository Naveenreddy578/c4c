# Layout Builder Sections Configuration

This module provides customization options for the Layout Builder sections. With
this module, you can display the Section titles to the end users, and provide css classes for them
allowing more customization for your sections.

For a full description of the module, visit the
[project page](https://www.drupal.org/project/layout_builder_sections_config).

Submit bug reports and feature suggestions, or track changes in the
[issue queue](https://www.drupal.org/project/issue/layout_builder_sections_config).


## Requirements

This module requires the following modules to be installed:

- Drupal core >= 9.5 || 10
- Layout Builder


## Installation

- Install the module as you would normally install a contributed Drupal module.
  [Visit](https://www.drupal.org/docs/8/extending-drupal-8/installing-contributed-modules) for further information.

- After installation, visit the Layout Builder configuration page to configure
  the module settings.

- You will now see the menu option
  `Configuration / Content Authoring / Layout Builder Sections Configuration`,
  it can be used to configure the custom classes data to your sections label.


## Use cases

- Display a section label on the view page
- Add custom CSS classes to a section label
- Add custom data attributes to a section


## Configuration

The module provides a config page
in `/admin/config/content/layout-builder-sections-config` where the fields that
are added to the section forms can be configured.


## Usage

- Once the module is enabled and configured, you can start using it on the
  Layout.
- When you add a new section, you will see a new field called
  "Show admin title on view display" where you can check to display the section administrative label on the view display.
- You will also see the selected styles on the displayed label.
- You might need to override the twig templates for your theme. If so, use
  the models provided on `layouts` folder.


## Support

This is a contrib module and as such, it's not officially supported by the
Drupal community. However, you can open an issue on the module's page on
drupal.org if you find any bugs or have any feature requests.


## Known issues

- The module includes additional configuration metadata on the sections saved
  after the module is installed. Those metadata is not automatically purged
  when you uninstall the module.
