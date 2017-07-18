$(document).ready(function () {
    window.cookieconsent.initialise({
	    "palette": {
	      "popup": {
	        "background": cookie_config['bgColor']
	      },
	      "button": {
	        "background": cookie_config['buttonColor']
	      }
	    },
	    "position": cookie_config['position'],
	    "static": cookie_config['static']
	});
});
