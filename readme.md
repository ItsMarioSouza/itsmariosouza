# MeetJustine Info



## General Learnings
### CSS
- [Linker Center Underline >](http://tobiasahlin.com/blog/css-trick-animating-link-underlines/)
- [Touch/Mouse Media Queries >](https://css-tricks.com/touch-devices-not-judged-size/)

### ACF
- [Groups >](https://www.advancedcustomfields.com/resources/group/)
- [Nested Repeaters >](https://www.advancedcustomfields.com/resources/working-with-nested-repeaters/)
- [Options >](https://www.advancedcustomfields.com/resources/get-values-from-an-options-page/)
- [Flexible Layouts >](https://www.advancedcustomfields.com/resources/flexible-content/)
	- [Hiding empty fields >](https://www.advancedcustomfields.com/resources/hiding-empty-fields/)

### WordPress
- [Order/Arrange Posts w/ WP Field >](https://premium.wpmudev.org/blog/arrange-wordpress-posts-any-order/)
- [Order/Arrange Posts w/ ACF Field >](https://www.advancedcustomfields.com/resources/orde-posts-by-custom-fields/)
- [Add ACF Fields to Admin Column >](https://catapultthemes.com/add-acf-fields-to-admin-columns/)
- [Query Posts by ACF Field > ](https://www.advancedcustomfields.com/resources/query-posts-custom-fields/)
- [Password Protected for Custom Fields >](https://support.advancedcustomfields.com/forums/topic/hide-acf-if-password-protected/)
	- [WP Codex >](https://codex.wordpress.org/Using_Password_Protection#Protect_Custom_Fields)
- [Require / Include Files >](https://code.tutsplus.com/articles/how-to-include-and-require-files-and-templates-in-wordpress--wp-26419)


## To Do List
- Null

## Build Process
### Development
`gulp watch`
- Runs SASS
	- Writes Source Maps
	- SCSS > CSS
	- CSS > Prefixed CSS
- Boots BrowserSync
- Watches for all necessary file changes and reloads the browser on change
	- If any SCSS change – runs SASS (detailed above)
	- If any HTML change – runs partials
		- Injects Partials into template HTML files and builds HTML Files
	- If `main.js` change just reloads browser

### Build
`gulp build`
- Cleans CSS folder
- Runs Partials
- Runs SASS
- Minifies CSS + JS
- Copies the entire UX folder from `/front-end` to `/theme`


## Deployment
### Push To Prod
`dandelion deploy`
- Uses the `dandelion.yml file`
- Pushes the last locally committed changes to the production server
- Only takes files from the local theme folder and pushes changes to the theme folder on the server

### Other Useful Stuff
- `dandelion deploy --dry-run`
	- See what would have been pushed in terminal without pushing
- `dandelion deploy refs/heads/master`
	- Explicitly pushes only the master branch
- `dandelion --config=prod.yml deploy`
	- references another config file, `prod.yml`, not `dandelion.yml`
