Scribe
===========

Scribe is an Omeka theme built on top of the styleless, barebones From Scratch theme provided on the [Omeka.org website](http://omeka.org/add-ons/themes/from-scratch/). It uses the Twitter Bootstrap front-end framework and depends on the forked [plugin-Scripto](https://github.com/ui-libraries/plugin-Scripto) plugin. The goal of Scribe is to provide a clean, thumbnail oriented transcription view for any number of Omeka image collections. Its focus is on guiding users to easy transcription tasks rather than collection management features.
 
Scribe makes use of several jQuery plugins and components.
 
1.    [bxSlider](http://bxslider.com/)
2.    [Bootstrap jQuery plugins](http://twitter.github.com/bootstrap/javascript.html): dropdowns, tooltips, buttons, tabs 
3.    [Bootstrap components](http://twitter.github.com/bootstrap/components.html): breadcrumbs, thumbnails, progress bars, alerts 	
4.    [Google Web Fonts](http://www.google.com/webfonts)     	
 
As an Omeka theme, it follows the standard Zend Framework view structure. Each file in the themes directory will override its corresponding file in the application directory. If there is no file in the themes directory then the default application file will be used.
 

Therefore:
 
	themes/scribe 

will override

	application/views/scripts

<strong>Files of note:</strong>

	config.ini
Adds a custom field to the theme configuration page in the admin panel. Collection order for the index page can be set here by providing a comma delimited list of collection ids.
 
	common/header.php 
This is where the main path is set and libraries (jQuery, Google fonts) are loaded. The header also calls the Scripto plugin to allow for the account login on each page.
 
	collection/show.php 
This file displays all items in the collection. The set_items_for_loop function sorts based on the sort weight number set in the Dublin Core: Audience field. Progress bar logic is determined by reading the Scripto metadata fields ‘Percent Needs Review’ and ‘Percent Completed’. Stacked progress bars are set with the resulting numbers.
 
	items/show.php 
This file read the transcription status from Scripto and applies an appropriate label. ‘label-important’ for “Completed”, ‘label-warning’ for “Needs Review”, and ‘label-success’ for “Completed” (ironically).
 
	scripto/index/transcribe.php 
The main transcription page. Many scripto/mediawiki features are hidden by default for simplicity (such as the discussion tool) but can easily be incorporated back in.