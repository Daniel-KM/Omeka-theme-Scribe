Scribe (theme for Omeka)
===========

Scribe is an [Omeka] theme. The 1.5 release is built on top of the styleless,
barebones [From Scratch] theme provided on the Omeka.org website. The 2.0
release is an adaptation of this theme for Omeka 2.0 using the public default
theme of Omeka and view files of [Scripto] plugin.

It uses the Twitter Bootstrap front-end framework and depends on the forked
[Scripto] plugin. The goal of Scribe is to provide a clean, thumbnail-oriented
transcription view for any number of Omeka image collections. Its focus is on
guiding users to easy transcription tasks rather than collection management
features. Visit the page [DIYHistory code] for an overview of the technology
stack and implementation information.


Structure
---------

Scribe makes use of several jQuery plugins and components.

1. [bxSlider]
2. [Bootstrap jQuery plugins]: dropdowns, tooltips, buttons, tabs
3. [Bootstrap components]: breadcrumbs, thumbnails, progress bars, alerts
4. [Google Web Fonts]

As an Omeka theme, it follows the standard Zend Framework view structure. Each
file in the themes directory will override its corresponding file in the
application directory. If there is no file in the themes directory then the
default application file will be used. Therefore:

    themes/scribe

will override

    application/views/scripts


Files of note
-------------

* config.ini
Adds a custom field to the theme configuration page in the admin panel.
Collection order for the index page can be set here by providing a comma
delimited list of collection ids.

* common/header.php
This is where the main path is set and libraries (jQuery, Google fonts) are
loaded. The header also calls the Scripto plugin to allow for the account login
on each page.

* collection/show.php
This file displays all items in the collection. The set_items_for_loop function
sorts based on the sort weight number set in the Scripto:Weight field.
Progress bar logic is determined by reading the Scripto metadata fields ‘Percent
Needs Review’ and ‘Percent Completed’. Stacked progress bars are set with the
resulting numbers.

* items/show.php
This file read the transcription status from Scripto and applies an appropriate
label. ‘label-important’ for “Completed”, ‘label-warning’ for “Needs Review”,
and ‘label-success’ for “Not Started".

* scripto/index/transcribe.php
The main transcription page. Many scripto/mediawiki features are hidden by
default for simplicity (such as the discussion tool) but can easily be
incorporated back in.


Warning
-------

Use it at your own risk.

It's always recommended to backup your files and database so you can roll back
if needed.


Troubleshooting
---------------

See online [scribe issues].


License
-------

This plugin is published under [GNU/GPL].

This program is free software; you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation; either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
details.

You should have received a copy of the GNU General Public License along with
this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.


Contact
-------

Current maintainers:
* [University of Iowa Libraries]

This theme From Scratch has been built by [Center for History & New Media].
[University of Iowa Libraries] has forked it to integrate its plugin Scripto.The
fork of this theme has been upgraded for Omeka 2.0 for [École des Mines ParisTech].


Copyright
---------

* Copyright Center for History and New Media, 2008-2012
* Copyright Matthew Butler, 2012-2013 [mbutler]
* Copyright Daniel Berthereau, 2013-2014 [Daniel-KM]


[Omeka]: https://omeka.org
[From Scratch]: http://omeka.org/add-ons/themes/from-scratch/
[Scripto]: https://github.com/ui-libraries/plugin-Scripto
[DIYHistory code]: http://diyhistory.lib.uiowa.edu/code.html
[bxSlider]: http://bxslider.com/
[Bootstrap jQuery plugins]: http://twitter.github.com/bootstrap/javascript.html
[Bootstrap components]: http://twitter.github.com/bootstrap/components.html
[Google Web Fonts]: http://www.google.com/webfonts
[GNU/GPL]: https://www.gnu.org/licenses/gpl-3.0.html "GNU/GPL v3"
[scribe issues]: https://github.com/ui-libraries/scribe/issues
[Center for History & New Media]: http://chnm.gmu.edu
[University of Iowa Libraries]: http://www.lib.uiowa.edu
[Daniel-KM]: https://github.com/Daniel-KM "Daniel Berthereau"
[mbutler]: https://github.com/mbutler
[École des Mines ParisTech]: http://bib.mines-paristech.fr
