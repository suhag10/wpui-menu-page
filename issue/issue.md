# issue <img src="https://em-content.zobj.net/source/apple/391/bug_1f41b.png" alt="" width="30">

WordPress internationalisation admin pages issue - i18n

1. The main menu page is all right
2. The submenu page enqueue scripts are not loaded
3. The submenu pages have a slug that automatically translates and converts it to URLs

**1. The main menu page is all right**
> <img src="screenshot-01.png" alt="" width="49%">
> <img src="screenshot-02.png" alt="" width="49%">


**2. The submenu page enqueue scripts are not loaded**
> <img src="screenshot-03.png" alt="" width="49%">
> <img src="screenshot-04.png" alt="" width="49%">


**3. The submenu pages have a slug that automatically translates and converts it to URLs - die($hook).**

```php
add_action('admin_enqueue_scripts', 'admin_enqueue_scripts');
function admin_enqueue_scripts( $hook ) {
    die( $hook ); // Check-in page slug
}
```
> <img src="screenshot-05.png" alt="" width="49%">
> <img src="screenshot-06.png" alt="" width="49%">
