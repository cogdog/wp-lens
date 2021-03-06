# HTML5 Up Lens Theme for Wordpress

-----
*If this kind of stuff has any value to you, please consider supporting me so I can do more!*

[![Support me on Patreon](http://cogdog.github.io/images/badge-patreon.png)](https://patreon.com/cogdog) [![Support me on via PayPal](http://cogdog.github.io/images/badge-paypal.png)](https://paypal.me/cogdog)

----- 


A configurable Wordpress Theme version of [HTML5up Highlights Theme](https://html5up.net/lens) made for the internet by [@cogdog](http://cog.dog). It creates a beautiful way to share and organize photos like this

![Screenshot of Theme](screenshot.png "Screenshot of Theme")

You can see a demo version at http://lab.cogdogblog.com/lens/

All photos are represented via posts using featured images. Photos can be navigated slide show like from the large buttons or from the right side set of thumbnails.

As a WordPress theme, this site is not limited to the hard coded number of photos in the original template (it adds pagination links), plus they can be organized by category, tag, post date displayed via a widget on the right side.

## Examples

* demo version http://lab.cogdogblog.com/lens/
* Moments (Shawn White) http://shawn.earth/moments/
* My Recent Pics https://lens.nostorynorm.com/

## Installing from Scratch

Install this theme on any self hosted Wordpress site. No luck on Wordpress.com, get a real web hosting package. 

You should download a ZIP file of this GitHub Repo (that's via the green **Clone or Download*" button above as a file `wp-lens-master.zip`). 

The zip can be uploaded directly to your site via **Add Themes** in the Wordpress dashboard. Of you run into size upload limits or just prefer going old school like me, unzip the package and ftp the entire folder into your `wp-content/themes` directory.

## Updating the Theme

If you have ftp/sftp access to your site (or this can be done in a cpanel file manager), simply upload the new theme files to the `wp-content/themes` directory that includes the older version theme. 

For those that lack direct file upload access or maybe that idea sends shivers down the spine, upload and activate the [Easy Theme and Plugin Upgrades](https://wordpress.org/plugins/easy-theme-and-plugin-upgrades/) plugin -- this will allow you to upload a newer version of a theme as a ZIP archive, the same way you add a theme by uploading.

## Adding Images

Images are merely posts- upload your photos are featured images; they should be all least 1200px wide and 750px wide. Enter the title and a caption up to 100 words in length.

Customize the area below the images by adding widgets.

### Social Media Icons

This theme supports the use of a plugin for adding to the footer a  menu of social media links.

> **NOTE** Previous versions of the themes used the [Font Awesome 4 Menus](https://wordpress.org/plugins/font-awesome-4-menus/) plugin, which is not compatible with the latest set of [Font Awesome icons](https://fontawesome.com/icons) I have built an update to this plugin in you want access to a larger set of icons. You will also need to add `fab` to the menu class names (see below)

To have a customized set of icon links on the front of the site, download, install and activate the [Font Awesome 5 Menus](https://github.com/cogdog/font-awesome-5-menus) plugin. This allows you to add an icon to any menu item.

From the Wordpress Dashboard look under **Appearances** for **Menus**. Click **create a new menu**  name it whatever you like -- `social` is  a good choice. Under  **Menu Settings** next to **Display Location** check the box for `Social Media`. 

To add a social media (or any link), open the panel for **Custom Link**. 

![](images/add-custom-link.jpg "Adding Menu Items Links")

Enter a title for the site and provide the URL that points to your content on that site. Add as many as you like. You can drag and drop them to change the order.

To set the icon, you must first enable the visibility of CSS classes for each menu item.  Click **Screen Options** in the upper right, and check the box for **CSS Classes**.

![](images/screen-options.jpg "Enabling screen options for menus")

Open an item in your Social Menu and you will now see a field for entering CSS Class names. You have the choice to add from [well over 1400 icons in the Font Awesome free collection](https://fontawesome.com/icons?d=gallery&m=free). Find the name of the icon you wish to use, and enter it's all of it's class names as listed,

For example these are the class names to render the icon for typical social media sites (these should be all lower case):

* fab fa-twitter
* fab fa-facebook
* fab fa-youtube
* fab fa-linkedin
* fab fa-instagram
* fab fa-flickr

With the Font Awesome icons, you can add any site you wish to be in your footer and pick the icon you prefer.

**Save** your menu and check out the spiffy icons in the footer.

![](images/with-social-media-icons.jpg "")

In addition, if you want to provide a tool tip hover for the icons, look again under  **Screen Options** and enable the option for **Title Attribute**. This adds another editable field to add the tooltip text.

![](images/menu-title-attribute.jpg "")

# Using Shortcuts

The original theme comes with keyboard shortcuts to navigate through your photos, try the arrow keys to navigate among the displayed set of photos. The `esc` key toggles between full screen and normal view modes.

WP-Lens comes with two extra ones:

* `~` returns to the first page of photos (the site's home page)
* `del` / `backspace` will take you to the last page of photos (if there is one)

# Update History

* v 0.1 Sept 23, 2018 First version hatched
* v 0.2 Oct 29, 2018 shortcut keys added to navigate to top and bottom of all photo pages

 

