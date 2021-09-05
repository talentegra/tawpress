=== Post Category Image With Grid and Slider ===
Contributors: wponlinesupport, anoopranawat, pratik-jain, piyushpatel123, ridhimashukla, patelketan
Tags: category, category image, post category image, post category image grid, post category image slider, customization, custom category image, category featured image, category grid, category slider, wponlinesupport
Requires at least: 3.5
Tested up to: 5.8
Author URI: https://www.essentialplugin.com
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Post Category Image With Grid and Slider plugin allow users to upload  category image and display in grid and slider. Also work with Gutenberg shortcode block. 

== Description ==

Post Category Image With Grid and Slider plugin allow users to upload  category image and display in grid and slider.

Check [Features and Demo](https://www.essentialplugin.com/pricing/) for additional information.

**Also work with Gutenberg shortcode block.** 

Once Post Category Image With Grid and Slider plugin activated,  go to **Category Image** -> and Select categories option where you want to add custom image upload

= This plugin features includes: =

* Category grid and Slider
* Custom image for category

= This plugin contain 2 shortcode: =

* Display **categories in grid** view
<code>[pci-cat-grid] --OR-- echo do_shortcode('[pci-cat-grid]');</code> 

* Display **categories in slider** view
<code>[pci-cat-slider] --OR-- echo do_shortcode('[pci-cat-slider]'); </code>

= Usage =

Go to Posts -> Categories to see Custom Category Image options

= You can use Following parameters with grid shortcode =

<code>[pci-cat-grid]</code> 

* **size:**
size="full" (Enter size of image. option are large, medium, thumbnail and full)
* **taxonomy:**
taxonomy="category" (Display Specific taxonomy.)
* **term_id:**
term_id="1" (Display Specific Category id. values are Comma separated Category Id. By Default is all.)
* **Order by categories:**
orderby="name" ( Accepts term fields ('name', 'slug', 'term_group', 'term_id', 'id', 'description') )
* **Order**
order="ASC" (Accepts 'ASC' (ascending) or 'DESC' (descending). Default 'ASC' )
* **hide_empty**
hide_empty="1" (Accepts 1|true or 0|false. Default 1|true. )
* **Grid columns :**
columns="3" (display category in grid )
* **Show title :**
show_title="true" (ie show category title or not. By default value is "true" Values are "true" and "false" )
* **Show count :**
show_count="true" (ie show category post count or not. By default value is "true" Values are "true" and "false" )
* **Show description :**
show_desc="true" (ie show category description or not. By default value is "true" Values are "true" and "false" )
* **Exclude Category:**
exclude_cat="" ( Exclude specific Category id. Values are Comma separated Category Id.)

= You can use Following parameters with slider shortcode =

<code>[pci-cat-slider]</code> 

* **size:**
size="full" (Enter size of image. option are large, medium, thumbnail and full)
* **taxonomy:**
taxonomy="category" (Display Specific taxonomy.)
* **term_id:**
term_id="1" (Display Specific Category id. values are Comma separated Category Id. By Default is all.)
* **Order by categories:**
orderby="name" ( Accepts term fields ('name', 'slug', 'term_group', 'term_id', 'id', 'description') )
* **Order**
order="ASC" (Accepts 'ASC' (ascending) or 'DESC' (descending). Default 'ASC' )
* **hide_empty**
hide_empty="1" (Accepts 1|true or 0|false. Default 1|true. )
* **Show title :**
show_title="true" (ie show category title or not. By default value is "true" Values are "true" and "false" )
* **Show count :**
show_count="true" (ie show category post count or not. By default value is "true" Values are "true" and "false" )
* **Show description :**
show_desc="true" (ie show category description or not. By default value is "true" Values are "true" and "false" )
* **Number of categories display at a time:**
slidestoshow="3" (Controls number of categories display at a time)
* **Number of categories slides at a time:**
slidestoscroll="1" (Controls number of categories rotate at a time)
* **Pagination and arrows:**
dots="false" arrows="false" (Hide/Show pagination and arrows. By defoult value is "true". Values are true OR false)
* **Autoplay and Autoplay Speed:**
autoplay="true" autoplay_interval="1000"
* **Slide Speed:**
speed="3000" (Control the speed of the slider)
* **loop:**
loop="true" ( By default value is "true". Values are true OR false)
* **Exclude Category:**
exclude_cat="" ( Exclude specific Category id. Values are Comma separated Category Id.)

= Post Category Image With Grid and Slider Features =
* Post Grid Shortcode, Post Slider Shortcode
* 1 Designs for Post Grid and Post Slider
* 10+ Shortcode parameter
* Post order and orderby parameter
* Include & Exclude specific category by category id
* 100% Responsive
* Slide RTL Support

= Pro Features =
> <strong>Premium Version</strong><br>
>
> * Post Grid Shortcode, Post Slider Shortcode
> * 10 Designs for Post Grid and Post Slider
> * 25+ Shortcode parameter
> * Wp Templating Feature Support
> * Wpbackery Support
> * Gutenberg Block Support
> * Elementor, Beaver, SiteOrigin Page Builder Support
> * Divi Page Builder Native Support
> * Fusion Page Builder (Avada) Native Support
> * Image height option
> * Limit, Post order, orderby and pagination parameter
> * Include & Exclude specific category by category id
> * Option to display child category
> * Custom CSS to override plugin CSS
> * 100% Responsive
> * Slide RTL Support
>
> Check [Demo and Features](https://www.essentialplugin.com/wordpress-plugin/post-category-image-grid-slider/) for additional information.
>

== Installation ==

1. Upload the 'post-category-image-with-grid-and-slider' folder to the '/wp-content/plugins/' directory.
2. Activate the 'post-category-image-with-grid-and-slider' list plugin through the 'Plugins' menu in WordPress.
3. Once activated go to Category Image -> and Select categories option where you want to add custom image upload.
4. Once activated go to Wp-Admin -> Posts -> Categories to see Custom Category Image options
5. To display use the TWO shortcodes

<code>[pci-cat-grid]</code> 

<code>[pci-cat-slider]</code> 

== Screenshots ==

1. Admin view showing category image.
2. Admin view showing category selection.
3. Output in Grid and Slider.

== Changelog ==

= 1.4.1 (23, Aug 2021) =
* [*] Updated all external links
* [*] Tweak - Code optimization and performance improvements.
* [*] Fixed - Blocks Initializer Issue.
* [*] Updated language file and json.

= 1.4 (19, Jan 2020) =
* [+] New - Added Gutenberg block support. Now use plugin easily with Gutenberg!
* [+] New - Added native shortcode support for Elementor, SiteOrigin and Beaver builder .
* [+] New - Added Divi page builder native support.
* [+] New - Added Fusion Page Builder (Avada) native support.
* [+] New - Click to copy the shortcode.
* [*] Tweak - Code optimization and performance improvements.

= 1.3.2 (14, July 2020) =
* [*] Follow WordPress Detailed Plugin Guidelines for Offload Media.
* [*] Minor code optimization.

= 1.3.1 (01 Jan 2020) =
* [*] Added new 'exclude_cat' parameter in both shortcodes.
* [*] Add new 'Upgrade to Pro' page in submenu with updated features list.

= 1.3 (21 Sep 2019) =
* [*] Tested with latest version of WordPress.
* [*] Updated redme file and update demo link.

= 1.2 (31 May 2019) =
* [*] Fixed some css issues for slider design.

= 1.1 (23 March 2018) =
* Note : If you are using v1.0.1 then please do not update this plugin OR first take backup before updating.
* [+] Re-structured complete plugin 

= 1.0.1 =
* Approved from WordPress

= 1.0 =
* Initial release.
