=== WP-Forge ===
Tags: light, black, white, one-column, two-columns, right-sidebar, custom-background, custom-header, custom-menu, editor-style, featured-images, full-width-template, microformats, post-formats, sticky-post, translation-ready
Requires at least: 4.3.1
Tested up to: 4.3.1
Stable tag: 5.5.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

///////////////////////////////////
// Description
///////////////////////////////////

WP-Forge is A WordPress Foundation theme that combinds two powerful platforms: WordPress, the leading open source blogging tool and content management system and ZURB's Foundation, the most advanced responsive front-end framework in the world. Foundation comes packed with all kinds of goodies. You get cool things like tooltips, modal popups, a slider, pricing tables and a whole lot more. By combining WordPress and Foundation you get a theme that makes creating websites fun and exciting again!

///////////////////////////////////
// Bundled Resources
///////////////////////////////////

	1. Normalize Css 3.0.3 (http://opensource.org/licenses/MIT)
	2. Foundation Framework 5.5.3 (Includes all the files located in the /js/foundation folder) - MIT License (https://github.com/zurb/foundation/blob/master/LICENSE) - This also includes the following bundled scripts located in the /js/vendor folder:
		1. FastClick - https://github.com/ftlabs/fastclick (http://opensource.org/licenses/MIT)*
		2. jQuery Cookie Plugin v1.4.1 https://github.com/carhartl/jquery-cookie*
		3. Modernizr v2.8.3 - Available under the BSD and MIT licenses: www.modernizr.com/license/*
		4. PlaceHolder v2.0.9 - MIT License (http://opensource.org/licenses/mit-license.php)*
		*Please note, the resources listed above are minified versions. Full versions are included in a folder called full_version inside of the vendor folder: /js/vendor/full_version
	3. Genericons 3.4.1 - GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
	4. Font-Awesome 4.4.0 - See all license for Font-Awesome https://fortawesome.github.io/Font-Awesome/license/

Using rem values 
=================
When you look at the style.css file you will notice that a majority of the values use rem (root em). I used the following tool to help with determining what rem value I needed to add:

https://offroadcode.com/prototypes/rem-calculator/

*When inputting a value for these divs, you can use px if that is what you are comfortable with. I do however recommend you use rem values to set the width of these divs.

///////////////////////////////////
// Installation
///////////////////////////////////

	1. In your admin panel, go to Appearance > Themes and click the Add New button.
	2. Either use the Search or Filter options to locate a Theme you would like to use or click upload and choose file, then select the theme's ZIP file. Click Install Now.
	3. Click Activate to use your new theme right away.
	4. Click Appearance -> Customize to start modifying your theme.
	5. In order to modify anything related to WordPress, you will need to make adjustments or add your own styles to style.css. In order to modify anything regarding Foundation, you need to make adjustments or add your own styles to foundation.css located in /css/foundation.css
	6. Get your theme up and running fast by visiting the WP-Forge Quick Start Guide: http://themeawesome.com/docs/wp-forge/

///////////////////////////////////
// Theme Customizer
///////////////////////////////////

WP-Forge makes use of the built in Theme Customizer. Once you have activated WP-Forge, go to Appearance -> Customize. The theme customizer of WP-Forge has ten (10) option panels. Each panel contains sections which allow you to modify WP-Forge.

///////////////////////////////////
// Header Options
///////////////////////////////////

This panel allows you to modify the different aspects of the Header portion of your theme. The Header Image and Site Title & Tagline are default sections in the Customizer. They are also available via Appearance - Header. The following sections are vilable:

	1. Header Content Area* - Change the width (default is 64rem) and background color of the header content area.
	2. Header Image - Upload a logo. 994 × 175 pixels is recommended.
	3. Site Identity - Change the title as well as the description of your site. Select to show or hide in the header. You can also upload a site icon.

///////////////////////////////////
// Background Image Options
///////////////////////////////////

This is the default panel of the customizer where you can upload an image to use for your themes background image. This section is also available via Appearance - Background. This section is standard in the customizer (part of WordPress core). The following sections are available:

	1. Background Image - You can upload an image to use for your site background. Once you have uploaded your image other options such as Background Repeat, Background Position and Background Attachment will appear.

///////////////////////////////////
// Main Menu Options
///////////////////////////////////

This panel deals with the main navigation area of WP-Forge. There are four sections available:

	1. Nav Content Area - Change the width (default is 64rem) and background color of the nav content area.
	2. Menu Selection - You can choose the type of menu to use with your theme. You can select Top-Bar (default) or Off-Canvas.
	3. Top-Bar Settings - You can change the settings associated with the Top-Bar menu. You can select the position of the menu and depending on what position you select, you can choose to show or hide the title area. You can also change the text that appears in the title area.
	4. Mobile Menu View - Allows you to select whether or not you want to use the Off-Canvas for mobile. Also allows you to change the text that appears next to the hamburger icon as well as position the hamburger icon.

///////////////////////////////////
// Color Options
///////////////////////////////////

The default Colors panel of the WordPress Customizer. This panel deals with the various colors associated with WP-Forge. The following sections are available:

	1. Default Colors - These are the default color settings for the custom header and custom background portion of your theme. These are standard in the customizer, meaning part of WordPress core.
	2. Header Link Colors - Change the link and hover colors of the Site Title section of your theme.
	3. Top-Bar Colors - Change the overall color, link, hover and active colors in the Top-Bar portion of your theme
	4. Off-Canvas Colors - Change the overall color, link, hover and active colors in the Off-Canvas portion of your theme
	5. Content Colors - Change text, link and hover colors in the Content section of your theme.
	6. Sidebar Colors - Change widget title, link and hover colors in the main sidebar area of your theme.
	7. Footer Sidebar Colors - Change widget title, link and hover colors in the Footer sidebar area of your theme.
	8. Footer Colors - Change normal text, link and hover colors in the Footer section of your theme.
	9. Button Colors - Change the color and hover colors of submit buttons of your theme.
	10. Back to Top Colors: Change the color and hover colors of the Back to Top button that appears in the lower right hand corner of the browser window when you scroll down.
	11. Social Menu Colors - Allows you to change the colora associated with the social links in the social menu.

///////////////////////////////////
// Front Page Options
///////////////////////////////////

The default Front Page panel of the WordPress Customizer. The following sections are available:

	1. Static Front Page - This is where you set up a front page for your theme. You can use either your latest blog posts or select a page.
	2. Show title on home page? - Allows you to hide the title of the page yu set as the home page. This section will appear if you select to use a page for the front of your site. Page must use the front-page template.

///////////////////////////////////
// Content Options
///////////////////////////////////

This panel deals with the appearance of posts. The following sections are available:

	1. Main Content Area* - Change the width (Default is 64rem) and the background color of the content area of your theme.
	2. Post Configuration - The following options are available:
		1. Show or hide categories? - Allows to show or hide the categories.
		2. Where to display categories? - Allows you to select where you want the categories a post is assigned to to be displayed. Will display only if Yes, show categories is selected.
		3. Display post meta? - Show or hide the post meta information that displays underneath post titles. If you choose to hide the popst meta, comments and edit button will still show.
		4. Show full post or excerpt - Choose to show full posts or post excerpts 
		5. Display post thumbnails? - Choose to show or hide post thumbnails for posts.
		6. Show single post view thumbnail? - Choose to show or hide post thumbnails in single post view.
		6. Display post tags - Choose to show or hide the tags a post is assigned to.
		7. Default Post Navigation or PageNavi? - Select to use default navigation for posts (i.e. Older posts - Newer Posts) or the built in page navigation.
	3. Content Potition - Choose to show the content section of the theme on the left side or the right side of the theme.

///////////////////////////////////
// Footer Sidebar Options
///////////////////////////////////

This panel deals the Footer Sidebar content area of the theme. The following sections are available:

	1. Footer Sidebar Content Width - Change the width (Default is 64rem).
	2. Footer Sidebar Background Color - Change the background color of the Footer Sidebar content area.

See: http://themeawesome.com/docs/wp-forge/footer-sidebar-section/

///////////////////////////////////
// Footer Options
///////////////////////////////////

This panel deals with the Footer Section of your theme. The following sections are in the Footer Panel:

	1. Footer Content Width* - Change the width (Default is 64rem) of the Footer Sidebar content area.
	2. Footer Content Background Color - Change the background color of the Footer Sidebar content area.
	3. Footer Text - Change the footer text of your theme and select the position in which you want it to appear (html is not allowed in the textarea. This is a security concern and part of WordPress standards.)
	4. Footer Content Position - Choose how you want to display the content in the footer area.

See: http://themeawesome.com/docs/wp-forge/footer-section/

///////////////////////////////////
// Menus
///////////////////////////////////

The Menu Customizer adds custom menu management to the Customizer. It allows you to live-preview changes to your menus before they're published. WP-Forge supports three menu locations: Main Menu, Footer Menu and Social Menu. After you create your menus, you can select which menu appears in each location.

Make sure you see the "Configure the Social Menu" below to set up your social menu.

///////////////////////////////////
// Widgets
///////////////////////////////////

Widgets are independent sections of content that can be placed into the sidebar areas of your theme. The following sections are available:

	1. Main Sidebar - Displays widgets in the blog area as well as pages.
	2. First Footer Widget Area - An optional widget area for your site footer (will only appear if a widget is added)
	3. Second Footer Widget Area - An second optional widget area for your site footer (will only appear if a widget is added)
	4. Third Footer Widget Area - An third optional widget area for your site footer (will only appear if a widget is added)

///////////////////////////////////
// Configure the Social Menu 
///////////////////////////////////

WP-Forge allows you display links to your social media profiles, like Twitter and Facebook, with icons. This menu is located in the footer portion of the theme.

	Set Up 
	============
	1. Create a new Custom Menu, and assign it to the Social Links Menu location.
	2. Add links to each of your social services using the Links panel (do not use pages).
	3. Icons for your social links will automatically appear if it's available.

Available icons: (Linking to any of the following sites will automatically display its icon in your social menu).

* Codepen
* Digg
* Dribbble
* Dropbox
* Facebook
* Flickr
* Foursquare
* GitHub
* Google+
* Instagram
* LinkedIn
* Email (mailto: links)
* Pinterest
* Pocket
* PollDaddy
* Reddit
* RSS Feed (URLs with /feed/)
* Spotify
* StumbleUpon
* Tumblr
* Twitch
* Twitter
* Vimeo
* WordPress
* YouTube

Social networks that aren't currently supported will be indicated by a generic share icon.

See: http://themeawesome.com/docs/wp-forge/social-menu-configuration/