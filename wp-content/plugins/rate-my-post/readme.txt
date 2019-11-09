=== Rate my Post - WP Post Rating ===
Contributors: blazk
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HJH3AS8TP8FEC&source=url
Tags: Rate Post, Rate Page, Star Rating, Post Feedback, Page Feedback, Responsive Star Rating, Lightweight Post Rating, Ajax Post Rating, Post Rating Analytics, Post Rating, Rich Snippet
Requires at least: 4.7.0
Tested up to: 5.3
Stable tag: 2.10.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows visitors to rate your posts/pages and send you private feedback about each post or page.

== Description ==

Rate my Post is a lightweight, responsive and free WordPress rating plugin which allows you to quickly and easily add rating widgets to your posts and pages. You can add rating widget to your posts and pages with a shortcode or automatically in plugin settings (every post/every page, below the content). The plugin also comes with results widget which can be added automatically, above the content of your posts, or manually with a shortcode.

The plugin has also stats section where you can see how many votes each post/page received and what is its average rating. It also allows you to change ratings from backend and supports structured data for rich snippets. Analytics section allows you to see the details about each vote on your website.

What sets Rate my Post apart from other WordPress rating plugins is its simplicity, performance and impact on engagement. It works with any page cache plugin and is probably the most customizable free WordPress rating plugin.

The plugin also features Top Rated Posts widget which displays top rated posts according to your settings.

It does not require any web development skills. However, the plugin is also perfect for developers as it comes with neat hooks. Check out the [documentation](https://blazzdev.com/documentation/rate-my-post-documentation/) to learn more. Furthermore, the plugin is based on the [WordPress Plugin boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate) for a standardized, organized and object-oriented codebase.

**Rating Widget Features:**

1. Choose between different types of rating widget: Stars, Thumbs, Hearts, Smileys and Trophies

2. Add rating widget to any page/post with shortcode: [ratemypost]

3. Add rating widget to all posts or pages with one click in settings

4. Option to show results above post/page content or add results manually with shortcode: [ratemypost-result]

5. Option to automatically include rating and result widget to custom post types

6. Exclude ratings from certain pages and posts - such as About Us page etc.

7. All texts and colors can be easily changed in plugin settings

8. Option to add structured data for Rich Snippets to be displayed in search engines

9. Option to get email when a post is rated

10. Option to prevent accidental votes on mobile

11. Prevent double votes with cookies

12. Analytics section with data about votes, average ratings and feedbacks

13. Enables you to manipulate votes from backend - you can set what role is required to manipulate votes in the backend

14. Option to hide average rating

15. Option to color the stars in rating widget with average rating

16. Option to show half stars

17. Option to show descriptive ratings while users hover on stars

18. Option to disable headings for compatibility with table of contents plugins

19. Option to track votes with Google Analytics - tested with GA Google Analytics, MonsterInsights and Google Analytics by ShareThis plugins, but might also work with others.

20. Option  to track votes with Matomo

21. You can define what is a negative rating to use the feedback widget and social widget

22. Option to enable reCAPTCHA v3 protection

23. Option to show results/stars on archive pages

24. Option to allow only logged in users to rate

25. Option to prevent double votes via IP addresses

**Feedback Widget Features:**

1. Optional feature - you can enable it or disable it

2. After negative vote (you define what is a negative vote), displays the feedback widget

3. Users who give you bad rating can help you improve your post

4. Feedback is not posted publicly - it is available only to you

5. Option to get an email if somebody leaves you feedback

6. Option to only count negative votes if feedback is left

**Social Widget Features:**

1. Optional feature - you can enable it or disable it

2. Shows "follow us on social media" after positive vote

3. You add URLs to your social media profiles in settings

4. Option to show social share links instead of social follow links

**Top Rated Posts Widget:**

1. Optional feature - you can enable it under Appearance - Widgets

2. Select how many posts to show

3. Select minimum average rating required

4. Option to show featured image

5. Option to show star rating

**Why use Rate my Post?**

1. Increase engagement

2. Get feedback and improve posts/pages

3. Get more followers on social media

4. It's responsive, lightweight and simple to use

5. It's probably the most customizable free WordPress rating plugin

6. It uses AJAX and thus works super fast

7. It's compatible with caching plugins

8. It supports structured data for rich snippets

9. It works with multilingual websites

10. AMP compatibility (BETA)

11. reCAPTCHA v3 protection

12. Migration tools - easily migrate from kk Star Ratings, YASR or WP-PostRatings

**Translations:**

1. German translations thanks to the great German community [see contributors](https://translate.wordpress.org/locale/de/default/wp-plugins/rate-my-post/)

2. Portuguese (Brazil) translations thanks to Douglas [douglasferraz89](https://profiles.wordpress.org/douglasferraz89/)

3. Spanish (Costa Rica) translations thanks to Mario [marbaque](https://profiles.wordpress.org/marbaque/)

4. Spanish (Spain) translations thanks to Javier Esteban [nobnob](https://wordpress.org/support/users/nobnob/)

== Installation ==

1. Unzip the plugin file
2. Upload the folder `rate-my-post` and it's contents to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Click Rate my Post in the main menu or add the shortcode [ratemypost]


== Frequently Asked Questions ==

= Support? =
For support use the support forum, but please do read the guidelines before posting.
= Does it work with caching plugins? =
The plugin works with all caching plugin. If you are using caching plugin other than WP Super Cache, LiteSpeed Cache, WP Fastest Cache, WP Rocket or SG Optimizer, you should enable AJAX load results in the advanced settings.
= What can be rated? =
The plugin allows visitors to rate posts, pages and custom post types. It is not possible to rate archives (categories etc.) as the ratings are stored in the post meta.
= The rating widget is displayed multiple times =
This typically happens with various "page builder" themes. In such cases it's best to include the rating widget with the shortcode [ratemypost] instead of using the automatic option. If that's too much work, you can add it directly to the template of your theme. See the procedure in the [documentation](https://blazzdev.com/documentation/rate-my-post-documentation/) under Troubleshooting -> The “Add rating widget to all posts” feature is not working.
= Can I have more than one rating widget on a single web page? =
Currently it's not possible to have more than one rating widget on a single web page. Nevertheless, this will be changed in the future versions.
= Where do I find the documentation =
The documentation is available [here](https://blazzdev.com/documentation/rate-my-post-documentation/).
= The vote count and average rating are not correct on page load =
Such issues typically appear due to caching. If you are encountering such issues enable Ajax load results in the advanced settings.
= The plugin stopped working after the update =
If you encounter problems with the plugin after an update, first clear the cache (page cache, minify cache, CDN cache such as CloudFlare etc.). Then open an incognito window and see if the problem has been solved. In case it hasn't don't hesitate to contact me via the support forum.
= I can't save the settings =
If you have trouble saving the settings, clear your browser cache. Such problems typically appear after the update because the browser is still serving old files from cache.
= Does it work with multilingual websites? =
Yes, the plugin is fully compatible with multilingual websites. If you are using the plugin on a multilingual website enable Multilingual website compatibility mode in the advanced settings and then translate strings through your plugin for translations.
= Do I have to translate the plugin if my website uses language other than English? =
Not necessarily because the plugin allows you to customize all frontend strings in the settings. However, backend strings can only be translated with translation files.
= Does this plugin show rich snippets? =
The plugin adds structured data for rich snippets, if you enable this option in the settings. Note that since September 2019 Google Shows rich snippets only for the following structured data types: Product, Book, Course, CreativeWorkSeason, CreativeWorkSeries, Episode, Game, LocalBusiness, MediaObject, Movie, MusicPlaylist, MusicRecording, Organization, Recipe, HowTo, SoftwareApplication and Event. The plugin supports all these structured data types except HowTo, SoftwareApplication and Event. These can be added with a filter, but this does require some web development skills. See the [documentation](https://blazzdev.com/documentation/rate-my-post-documentation/) for more information.
= Which structured data type should I choose? =
You should choose structured data type that fits your blog posts. If your blog posts are recipes than choose Recipe; if they are courses select Course etc. In case your blog posts don't fit any structured data type, than you are according to Google Guidelines not eligible for rich snippets. Learn more about this [here](https://webmasters.googleblog.com/2019/09/making-review-rich-results-more-helpful.html).
= Rich snippets are not showing =
If rich snippets are not showing check that structured data is valid [here](https://search.google.com/structured-data/testing-tool). If it's valid than search engines probably don't trust your website enough to show rich snippets. You can fix that by producing high-quality content.

== Screenshots ==

1. Ratings in posts/pages
2. After vote, if feedback is enabled
3. After vote, if social is enabled
4. Plugin Settings
5. Plugin Customization
6. Plugin Stats
7. Manipulate Votes

== Changelog ==

= 2.10.2 =
* The plugin is now compatible with Divi theme

= 2.10.1 =
* Improvement: Strings in emails are now internationalized
* Bug fix: Custom results text feature didn't work unless "ajax load results" was enabled
* Bug fix: Fixed some warnings for older versions of PHP
* Bug fix: Better compatibility with wpautop

= 2.10.0 =
* Improvement: Ajax is no longer used on page load unless enabled in the advanced settings. You SHOULD ENABLE Ajax Load if you are using caching plugin OTHER THAN: WP Super Cache, LiteSpeed Cache, WP Fastest Cache, WP Rocket or SG Optimizer
* Improvement: Prevent accidental votes now applies also to non-touch devices (see documentation to apply only to mobile)
* Improvement: Filters for email subjects and texts
* Improvement: Uses custom font for better performance (before FontAwesome was used)
* Improvement: Modernizr is no longer used
* Updated js-cookie library to version 2.2.1
* Added link to the documentation in the about section

= 2.9.2 =
* Fix: Included the supported structured data types for rich snippets
* Fix: Some strings were not translatable
* Improvement: Filter for email
* Improvement: Hooks were added to AMP template
* Improvement: Option to also show results on the front page or main blog page

= 2.9.1 =
* Bug fix: Migration from KK star ratings did not work with KK star ratings version 3.x.x
* Added LinkedIn social share icon

= 2.9.0 =
* Bug fix: Archive pages stars appeared also in widgets and such
* New feature: Option to prevent double votes via IP

= 2.8.1 =
* Bug fix: Saving settings did not work on some installations
* Bug fix: Don't show rating/results widget on AMP pages unless AMP compatibility is enabled
* Bug fix: Escape html for structured data
* Updated POT file

= 2.8.0 =
* New feature: Analytics submenu - see details about each vote
* Improvement: Define minimum votes for the top rated posts widget
* Improvement: Stats have been moved into submenu
* Improvement: About plugin section
* Other minor improvements and bug fixes

= 2.7.0 =
* Improvement: Redesigned feedback functionality
* New feature: Delete each feedback
* New feature: Migration tools for YASR and WP-PostRatings
* Other minor improvements and bug fixes

= 2.6.0 =
* Bug Fix: Feedback widget not working with social share icons enabled
* Developer feature: Hooks in social widget and feedback widget
* Developer feature: Rating icon class filter
* Developer feature: Function to output the stars for any post
* Developer feature: Function to get top rated posts
* Improvement: Queries use less memory
* Improvement: Support for half stars on category pages
* New feature: Option to align the rating widget
* New feature: Trending posts widget

= 2.5.0 =
* New feature: Option to show ratings on archive pages
* New feature: Option to allow only logged in users to vote
* New feature: Option to add social share links instead of social follow links
* Bug Fix: Backslashes in texts
* Functions for developers and new hooks
* Improved code

= 2.4.0 =
* New feature: Set who can manipulate votes
* New feature: Option to enable reCAPTCHA v3 protection
* New feature: Migration tool for kk StarRatings
* Bug Fix: Do not revert ratings on post update
* Bug fix: Rich snippet was added to AMP
* Other minor bug fixes

= 2.3.0 =
* New feature: AMP compatibility (BETA)
* New feature: New types of rating widget (smileys and trophies)
* New feature: Filters for strings in all widgets
* Improvement: Enhanced security
* Improvement: Prevent cache issues on save settings
* Other minor improvements and bug fixes

= 2.2.1 =
* Bug fix: Different handling of cookies as current implementation in rare cases (server configurations) caused errors in case that too many cookies were present in user's browser
* Bug fix: Modernizr library is optional as it conflicts with some themes
* Other minor bug fixes

= 2.2.0 =
* New feature: Automatically add rating and/or result widget to custom post types
* New feature: Option to only count negative votes if feedback is left
* New feature: Option to prevent accidental votes on mobile (button to confirm rating)
* New feature: Event tracking via Matomo thanks to smik2002
* Improvement: Feedback can be easily deleted by clicking a button in meta box
* Improvement: Better compatibility with older browsers such as IE
* New feature: Option to delete all plugin data on uninstall
* Improvement: Added non-minified js and css for developers - not used by the plugin
* User request: Add class to rating widget if cookie is present
* Portuguese (Brazil) translations thanks to douglasferraz89

= 2.1.3 =
* Bug fix: iOS requires double tap if hover texts are enabled
* Bug fix: Custom hover color does not disappear after the click if custom rated color is not inserted
* User request: Append class to the main div after rating so that the whole widget can be easily hidden after vote
* Improvement: Stars stay highlighted only until the response from server is sent back (if highlight the stars feature is enabled)
* Improvement: Improved stats section - search and sorting
* Minor bug fixes

= 2.1.2 =
* Improvement: Vote count and links to posts in emails
* Improvement: Option to not load FontAwesome
* Improvement: Compatibility with FontAwesome autoreplace (icons to SVGs)
* Improvement: Better compatibility with various themes
* Improvement: Event tracking with Google Analytics (tested with GA Google Analytics, MonsterInsights and Google Analytics by ShareThis plugins)
* Bug fix: On mobile hover-color of stars does not disappear after vote until user taps somewhere else
* German translations thanks to Stefan (smik2002)

= 2.1.1 =
* Fix: Added missing POT file for translations
* Fix: Support for multilingual websites
* Improvement: Custom thank you text is displayed after vote
* Improvement: Interaction with the rating widget is not possible after vote
* Improvement: Stars stay highlighted after vote (only if "color the stars in rating widget" option is disabled)
* Improvement: Option to disable headings in rating widget
* Improvement: Option to display descriptive rating under the stars on hover (tooltips have been discontinued)

= 2.1.0 =
* Improvement: Rewritten frontend ajax
* New feature: Recalculate vote count and average rating after vote (enabled by default, but can be disabled)
* New feature: Set border color, border radius, border width, background color and stars spacing
* New feature: Customizable vote count and average rating text
* New feature: Supports half stars
* Minor improvements

= 2.0.2 =
* Minor improvements
* Bug fix: On some websites the rating widget did not show

= 2.0.1 =
* Bug fix: Plugin crashed on some server configurations

= 2.0.0 =
* Rewritten in OOP for easier scalability
* New feature: In addition to stars, supports thumbs and hearts
* New feature: Change stars, thumbs or hearts size
* New feature: Change stars, thumbs or hearts color
* New feature: Option to not show the results in rating widget
* New feature: Define what is negative and what is positive rating

= 1.1.6 =
* Bug fix: Option to color the stars in rating widget works only if results widget is enabled

= 1.1.5 =
* Option to color the stars in rating widget according to the post rating

= 1.1.4 =
* Structured data for rich snippets
* Results widget (shortcode or automatically before every post's content)
* Security improvements

= 1.1.3 =
* Compatibility with custom post types

= 1.1.2 =
* Does not allow to submit empty feedback
* Custom notice if the feedback is empty
* Allows you to reset ratings

= 1.1.1 =
* Fixed "division by zero" warning

= 1.1.0 =
* Customize section allows you to customize plugin to your liking (strings, font size, margin etc.)
* Exclude from feature allows you to exclude ratings from certain pages and posts
* Disable cookie feature
* Supports Instagram, Twitter and Linkedin
* Other minor improvements

= 1.0 =
* Initial release
