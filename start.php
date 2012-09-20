<?php
	/**
	 * Elgg 1.8 Compatible version of html_mails.
	 * This is an Elgg 1.8 compatible version of the html_mails elgg
	 * plugin originally created by http://www.condiminds.com/.
	 *
	 * I needed this for a project, but couldn't find a 1.8 version already, so...
	 *
	 * @copyright (C) Condiminds 2010-2011
	 * @licence GNU Public License version 2
	 * @link http://www.condiminds.com
	 * @link http://www.marcus-povey.co.uk
	 * @author emdagon, Marcus Povey <marcus@marcus-povey.co.uk>
	 */

	function html_mails_init(){
		global $CONFIG;
		if(elgg_get_plugin_setting('use_notifications', 'html_mails')){
			register_notification_handler("email", "html_mails_notify_handler");	
		}
		if(elgg_get_plugin_setting('use_invitefriends', 'html_mails')){
			elgg_register_action('invitefriends/invite', elgg_get_plugins_path(). 'html_mails/actions/invitefriends.php');
		}
	}

	function html_mails_notify_handler(ElggEntity $from, ElggUser $to, $subject, $message, array $params = NULL) {
		global $CONFIG;

		if (!$from) {
			throw new NotificationException(sprintf(elgg_echo('NotificationException:MissingParameter'), 'from'));
		}

		if (!$to) {
			throw new NotificationException(sprintf(elgg_echo('NotificationException:MissingParameter'), 'to'));
		}

		if ($to->email=="") {
			throw new NotificationException(sprintf(elgg_echo('NotificationException:NoEmailAddress'), $to->guid));
		}

		// Sanitise subject
		$subject = preg_replace("/(\r\n|\r|\n)/", " ", $subject); // Strip line endings

		// To
		$to = $to->email;

		// From
		$site = get_entity($CONFIG->site_guid);
		// If there's an email address, use it - but only if its not from a user.
		if ((isset($from->email)) && (!($from instanceof ElggUser))) {
			$from = $from->email;
		} else if (($site) && (isset($site->email))) {
			// Has the current site got a from email address?
			$from = $site->email;
		} else if (isset($from->url))  {
			// If we have a url then try and use that.
			$breakdown = parse_url($from->url);
			$from = 'noreply@' . $breakdown['host']; // Handle anything with a url
		} else {
			// If all else fails, use the domain of the site.
			$from = 'noreply@' . get_site_domain($CONFIG->site_guid);
		}

		if (is_callable('mb_internal_encoding')) {
			mb_internal_encoding('UTF-8');
		}
		$site = get_entity($CONFIG->site_guid);
		$sitename = $site->name;
		if (is_callable('mb_encode_mimeheader')) {
			$sitename = mb_encode_mimeheader($site->name,"UTF-8", "B");
		}

		$header_eol = "\r\n";
		if (
			(isset($CONFIG->broken_mta)) &&
			($CONFIG->broken_mta)
		) {
			// Allow non-RFC 2822 mail headers to support some broken MTAs
			$header_eol = "\n";
		}

		$from_email = "\"$sitename\" <$from>";
		if (strtolower(substr(PHP_OS, 0 , 3)) == 'win') {
			// Windows is somewhat broken, so we use a different format from header
			$from_email = "$from";
		}

		$headers = "From: $from_email{$header_eol}"
			. "Content-type: text/html; charset=iso-8859-1; format=flowed{$header_eol}"
			. "MIME-Version: 1.0{$header_eol}"
			. "Content-Transfer-Encoding: 8bit{$header_eol}";

		if (is_callable('mb_encode_mimeheader')) {
			$subject = mb_encode_mimeheader($subject,"UTF-8", "B");
		}

		// Format message
                
        /** Disabling tag stripping: Assume messages are valid HTML produced by template system 
			TODO: Filter tags in a nice way here */
		//$message = html_entity_decode($message, ENT_COMPAT, 'UTF-8'); // Decode any html entities
		//$message = strip_tags($message); // Strip tags from message
		
                $message = preg_replace("/(\r\n|\r)/", "\n", $message); // Convert to unix line endings in body
		$message = preg_replace("/^From/", ">From", $message); // Change lines starting with From to >From

		$body = elgg_view('html_mails/notifications',
			array(
				'message' => $message, //wordwrap($message), // Disabled: Formatting *should* be being handled via HTML, correct me if wrong.
				'wwwroot' => $CONFIG->wwwroot,
				'sitename' => $CONFIG->site->name
			)
		);

		return mail($to, $subject, $body, $headers);
	}

	elgg_register_event_handler('init','system','html_mails_init');

?>