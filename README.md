# BP Fields Package
A pack of Joomla! 3 custom fields plugins.

## Note
This package is still under development therefore there is no release file. It should be ready in few weeks.

## Currently ready plugins:

### BP Checkbox
Checkbox that allows you to use WYSIWYG editor to prepare checkbox label. Helpful when creating "Terms of use" checkboxes
cause of GDPR law.

### BP Fileslist
Dropdown list of files in provided directory. Allows you to show list of all (not only media) files in provided directory.
Useful to create attachments functionality to articles.

## Build
To build installation packages stright from repo you have to clone it and have `composer` installed globaly.

Then do as follows:
- `composer install`
- `composer build`
- Your installation zip files should now be read in `/.build` directory.
