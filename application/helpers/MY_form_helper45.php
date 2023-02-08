<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter NuCaptcha Form Helpers Extension
 *
 * @package		CodeIgniter NuCaptcha Plugin
 * @subpackage	Helpers
 * @category	Helpers
 * @author		NuCaptcha Inc.
 * @link		http://www.nucaptcha.com
 * @version     1.0.11417
 * @license     See included license.txt
 */

// ------------------------------------------------------------------------

/**
 * NuCaptcha field
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	string
 * @return	string
 */

// Include the NuCaptcha Client Library
// Get the latest version here: http://docs.nucaptcha.com/download/api
require_once 'nucaptcha/php/leapmarketingclient.php';

if( !defined('LM_PLATFORM') )
{
	// Let NuCaptcha know we're running from CodeIgniter
	define('LM_PLATFORM', sprintf('codeigniter %s,nucaptcha %s', CI_VERSION, Leap::GetVersion()));
}

if ( ! function_exists('form_nucaptcha'))
{
	function form_nucaptcha($data = '', $extra = '')
	{
		$CI =& get_instance();

		$defaults = array(
			'user_data' => null,
			'use_ssl' => false,
			'campaign_profile' => null,
			'purpose' => Leap::PURPOSE_ACTION,
			'language' => Leap::LANGUAGE_ENGLISH,
			
			'focus_input' => false,
			'tabindex' => null,
			'position' => Leap::POSITION_LEFT
		);

		Leap::SetClientKey($CI->config->item('nucaptcha_clientkey'));

		$params = is_array($data) ? array_merge($defaults, $data) : $defaults;
		$t = Leap::InitializeTransaction( 
				$params['user_data'], 
				$params['use_ssl'], 
				$params['campaign_profile'], 
				$params['purpose'], 
				$params['language'] 
		);

		if( Leap::GetErrorCode() != LMEC_OK )
		{
			// keep track of the error
			log_message('error', 'NuCaptcha returned an invalid token response, ' .
						Leap::GetErrorCode() . ', ' . Leap::GetErrorString() );
		}

		// We can track this in a session our a database if we want,
		// but for simplicity, store it encrypted in a hidden form field
		$pdata = $t->GetPersistentDataForPublicStorage('');

		$nchtml = $t->GetWidget(
				false, // ignore
				$params['focus_input'],
				$params['position'],
				null,  // ignore
				'default',
				$params['tabindex']
		);

		// Wrap the NuCaptcha widget in an outer div
		$attr = array_intersect_key(array_merge($defaults, $data), array('id' => true, 'class' => true));
		return '<div '._parse_form_attributes($attr, array()).$extra.'>' .
				'<input type="hidden" name="ncpd" id="ncpd" value="' . $pdata . '" >'.
				$nchtml . 
			   '</div>';
	}
}

/* End of file MY_form_helper.php */
/* Location: ./application/helpers/MY_form_helper.php */
