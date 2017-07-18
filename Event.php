<?php
namespace Plugin\CookieConsent;

class Event
{
    public static function ipBeforeController()
    {
    	if ( !ipAdminId()) {

        	ipAddCss('//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css');

        	$bgColor = ipGetOption('CookieConsent.bgColor');
	        if ($bgColor){
	        	$data['bgColor'] = $bgColor;
    	    } else {
    	    	$data['bgColor'] = '#000';
    	    }
			$buttonColor = ipGetOption('CookieConsent.buttonColor');
	        if ($buttonColor){
	           $data['buttonColor'] = $buttonColor;
    	    } else {
    	    	$data['buttonColor'] = '#f00';
    	    }
        	$position = ipGetOption('CookieConsent.position');
	        if ($position){
	        	switch ($position) {
	        		case 'Banner top':
	        			$position = 'top';
	        			break;
	        		case 'Banner top (pushdown)':
	        			$position = 'top';
	        			$static = true;
	        			break;
	        		case 'Banner bottom':
	        			$position = 'bottom';
	        			break;
	        		case 'Floating left':
	        			$position = 'bottom-left';
	        			break;
	        		case 'Floating right':
	        			$position = 'bottom-right';
	        			break;
	        		default :
	        			$position = 'top';
	        			break;
	        	}

    	    } else {
    	    	$position = 'top';
    	    	$static = false;
    	    }
    	    $data['position'] = $position;
    	    $data['static'] = $static;

        	ipAddJsVariable("cookie_config", $data);
        	ipAddJs('//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js');
        	ipAddJs('assets/CookieConsent.js');
        }
    }
}
