<?php
/**
 * @package     mod_backstretch
 * @subpackage  mod_backstretch
 *
 * @copyright   Copyright (C) 2014 J-Guru.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_backstretch
 *
 * @package     mod_backstretch
 * @subpackage  mod_backstretch
 * @since       1.0.0
 */
class ModBackstretchHelper
{
	public static function loadJS($params){
		
		$doc = JFactory::getDocument();
		$list_images	=	json_decode( $params->get('list_images', ''));
		
		if(count($list_images->src) && is_array($list_images->src)){
			
			$doc->addScript('media/mod_backstretch/js/jquery.backstretch.js');
			
			$head_script[]	=	'jQuery(document).ready(function(){';
			$head_script[]	=	'jQuery.backstretch([';
			
								
			foreach ($list_images->src as $key => $img_name) {
				$img_url = 'media/mod_backstretch/images/'.$img_name;
				$head_script[]	=	'"'.$img_url.'",';
			}
			$duration = (int) 1000 * $params->get('slideshow_duration');
			$fade_speed =  $params->get('fade_speed');
			
			$head_script[]	=	'],';
			$head_script[]	=	'{';
			$head_script[]	=	'fade: "'.$fade_speed.'",';
			$head_script[]	=	'duration: '.$duration.',';
			$head_script[]	=	'centeredX: '.($params->get('centerX') == 1 ? 'true' : 'false').',';
			$head_script[]	=	'centeredY: '.($params->get('centerY') == 1 ? 'true' : 'false').'';
			$head_script[]	=	'}';
			$head_script[]	=	'); });';
			
			$doc->addScriptDeclaration(implode(" ", $head_script));
		}
		
	}
}
