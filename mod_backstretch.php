<?php
/**
 * @package     mod_backstretch
 * @subpackage  mod_backstretch
 *
 * @copyright   Copyright (C) 2014 J-Guru.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_BASE . '/modules/mod_backstretch/helper.php';

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_backstretch', $params->get('layout', 'default'));
