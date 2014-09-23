Build-Institute
===============

Custom WordPress template for Build Institute in Detroit.


**Custom Theme Shortcode**

####profiles-grid
Renders out a grid of alumni profiles.

Example: `[profiles-grid]`

####programs
Renders out a grid of programs.

Example: `[programs]`

####button
Renders a ghost button.

>**Parameters:**

>`url` *(Required)*<br />
>The URL the user goes to when they click on the button.

>`arrow` *(Optional)*<br />
>Can be either: `left` or `right`<br />
>Adds an arrow to the button on the left of the right.<br />
>Ideally, a left arrow implies a back, or returning to somewhere locally within the Build Institute website. The right arrow is better for an external link, implying you're leaving the website.

Sample usage:
`[button url="http://www.randallbruder.com" arrow="left"]Website[/button]`

![alt text](http://i.imgur.com/AOlXdOE.png "Button Example")

**Theme Features**

Ordered lists (numbered lists) are converted into expandable dropdowns. Ordered lists and bulleted lists can be nested within the parent ordered list, but will not become expandable dropdowns.

**Extras**

These shouldn't be necessary, but are preserved here in case they get deleted:

* For the Upcoming events footer, the template should be:
  
  ```
  <p>%start{M jS, Y—}{g:ia}%</p><h4>%event_title%</h4><p class="clamp">%event_excerpt%</p><p><a href="%event_url%">More Information</a></p>
  ```
	
* The Right Footer newsletter code should be:
  
  ```
  <a href="#"><div id="st-trigger-effects"><div data-effect="st-effect-5" id="menu-newsletter-footer">Sign up for our newsletter!</div></div></a>
  ```