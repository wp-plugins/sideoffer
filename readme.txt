=== SideOffer ===
Contributors: HeavyDigital
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VA3ZX5ZPCYHXY
Tags: action, ad, advertising, admin, business, call to action, contact, contact form 7, content, content marketing, conversion optimization, cta, email, form, inbound, inbound marketing, leads, lead generation, marketing, offer, pop up, pop out, popout, popup, promotion, side, side bar, side tab, sidebar, sidetab, slide, slide out, slideout, slider, tab, tab slider
Requires at least: 3.0
Tested up to: 3.4.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

SideOffer is a sliding side tab designed to generate leads & increase conversions by displaying a highly visible call to action for your users

== Description ==

You need to get your offer or call to action noticed, and this plugin can help. A slick side tab pop-out slider with fully customizable graphics, [SideOffer](http://www.HeavyDigital.net/plugins/sideoffer/  "SideOffer Homepage") is designed to help increase leads and conversions by allowing you to present your offer in a persistant side tab on every page of your site, giving your users more opportunity to take notice and take action! 

SideOffer was developed to help strengthen and sustain your inbound marketing and conversion optimization efforts. You could collect emails for your newsletter, offer a free download or make your contact form available on every page. How you use it is up to you, but the net result is the same: By making it easier for your users to act on your offer, you grow your funnel, and generate more inbound leads! 

We're firm believers in eating our own dog food, and we've been using this on our client sites, as well as our own, testing, optimizing and revising this plugin to make it as user friendly as possible.

Features include: 

*	Easy and Interactive Setup with real-time visual feedback
*	Anchor link triggering via inclusion the "sideoffer" class
*	Custom Background Graphics ([PSD Source Included](http://www.HeavyDigital.net/wp-content/plugins/sideoffer/images/sideoffer/sideoffer-bg.zip "PSD Source File")) 

Future Improvements

* Fully customizable pure CSS side tab


If you have questions, comments or feature requests feel free to [contact us](http://www.HeavyDigital.net/contact/ "Contact Us") 

Support requests should be made on the [SideOffer Support Forum](http://wordpress.org/support/plugin/sideoffer "SideOffer Support Forum") 

Stay in the know: [Become a fan of Heavy Digital on Facebook!](http://www.facebook.com/HeavyDigital  "Facebook: Heavy Digital")   

Be sure to check out our site [www.HeavyDigital.net](http://www.HeavyDigital.net/  "Heavy Digital Homepage")

== Installation ==

1. Upload the `sideoffer` directory  to `/wp-content/plugins/`
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the plugin through the top level SideOffer menu item (Near the bottom)
1. Optional: Edit the included PSD to reflect the aesthetic of your site
1. Optional: Include `<a href="javascript:void(0);" class="sideoffer">Links</a>` on your site to trigger the SideOffer

== Screenshots  ==

1. SideOffer UI Side Tab (Live on HeavyDigital.net)
2. SideOffer Configuration Options

== Frequently Asked Questions == 

= SideOffer works on the admin screen, but not on my site = 

The most likely cause is a JavaScript error somewhere in your site. Usually this is caused by a 3rd party plugin. Use the JavaScript console in your browser to identify the issue. Unfortunately we cannot troubleshoot issues with 3rd party plugins, so you should contact the author of that plugin for a fix. If the problem is with the SideOffer code please post in the [SideOffer Support Forum](http://wordpress.org/support/plugin/sideoffer "SideOffer Support Forum") with the following details:

* Site URL
* SideOffer Background Images URL
* WordPress Version
* Plugin Version

Include as many other relevent details as you can so we can try to pinpoint the problem.

= My shortcode doesn't work on the admin screen = 

This is due to a limitation in `do_shortcode()`. Your shortcode will execute properly on the front-end of the site.

== Changelog ==

= 1.0.3 =
* Optimized PSD file and default background graphic (Signifcantlly smaller file sizes, better PSD organization)

= 1.0.2 =
* Bug: Added `wp_enqueue_script('jQuery');` (Oops!)
* Bug: Omitted `hd_sideoffer_bg()` (Unneceserry to filter out site_url, & was breaking installs in subdirectories)

= 1.0.1 =
* Added "Active but not live" admin message
* Bug Fixes (Missing `esc_attr()`,`$capability=manage_options`)

= 1.0 =
* Initial Release
