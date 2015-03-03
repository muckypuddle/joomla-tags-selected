joomla-tags-selected
====================
Show a list of content items tagged with one or more tags (originally forked from [here](https://github.com/lasinducharith/joomla-tags-selected)).

* Filter content by one or more tags
* Filter content by one or more content types (article, category, weblink...)
* Limit max number of content items shown
* Choose between matching all or any of the selected tags
* Order results by title, creation or modification date, in either direction

Installation
------------
1. Download the zip archive.
2. Login to Joomla administrator area, then click **Extensions** > **Extensions Manager**.
4. Select **Upload Package File**, browse to the zip, then click **Upload and Install**.
5. And you're done.

Options
-------
The module has a few options

### Basic Options
* **Tags**: Select one or more tags to filter content by
* **Content Types**: Select one or more content types to show
* **State**: Filter items shown by state (published, unpublished or both)
* **Max Items**: Select the max number of items to show
* **Include Children?**: Include results from child tags of those selected
* **Tag Filter Logic**: Select whether results needs to match all tags, or just any of them 
* **Order**: Select criteria to order results
* **Order Direction**: Select ordering direction (A-Z, Z-A etc.)

### Display Options
* **Show Content Types**: Select whether to include a header with the name of the content type selected (or a list if more than 1 content type selected)
* **Show Author**: Select whether to show the content item's author
* **Show Date**: Select whether to show the a date for the content item
* **Date Option**: Select the type of date to show, if any (created, published or modified)

Layouts
-------
* **default.php**: Items shown in an unordered list
* **readmore.php**: Items shown with a header (the item title) and its content

Credits
-------
Kicked off by [asinducharith](https://github.com/lasinducharith).

Developed by [Mucky Puddle](http://www.muckypuddle.com).

