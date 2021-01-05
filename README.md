# wp-functions
Additional functions to add (or import) into WordPress functions.php for additional behaviors and shortcodes. Works with ACF.

Currently includes:

# Date shortcode
Using [year] in PHP code will automatically return current year. 
Useful for footer copyrights without manual updating.

# Call to Action (CTA) shortcode
Allows for use of specified shortcode to subsitute in a Title and Body.
Usage is as follows: [callout-cta title="" body=""]
Typing the above, with appropriate text alongside 'title' and 'body' will return a CTA.
This CTA can be styled using CSS as well, as the output is wrapped in a div with its own class.

# Author block shortcode
Generates a section for an author block on a page.
Usage is as follows (example):
[callout-author auth="Jason Hubsch" bio="Digital media specialist with emphasis on web development & coding across all creative applications. Also experienced in video editing & production for the web." image="https://via.placeholder.com/150?text=placeholder" twitter="jasonhubsch" linkedin="jasonhubsch"]
Current output includes classes for styling with CSS. 
Both these classes and the code output itself can be modified as needed to suit your specific needs.

# Review block shortcode
This functions the same way as the Author block shortcode, except it is designed to output info related to review information.
Usage follows same as Author shortcode above, except the items in the specified array are swapped in.

# Custom class on all pages
This is used to add a field to specify a class for a page. By doing this, you can target elements on that specific page.
While this can already be done using the page-id, this method allows you to specify a class, which can also be repeated on other pages.

# Gravity Forms submission message
Sometimes, submitting a Gravity Form refreshes the page. If your form is below the fold, a user would have to scroll down to see the submission message.
This code snippet makes the page scroll down to that submission message automatically upon form submission.

