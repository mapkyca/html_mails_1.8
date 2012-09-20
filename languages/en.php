<?php

	$english = array(
		'html_mails:invitefriends:message' =>

			'<h2>Congratulations!</h2>
			<p>You have been invited to join %s by %s.</p>
			<p>They included the following message:</p>
			<p>%s</p>
			<p>To join just click <a href="%s">here!</a></p>
			<p>You will automatically add them as a friend when you create your account.</p>',


		'html_mails:importer:html_message' =>

			'<h2>Congratulations!</h2>
			<p>You have been invited to join %s by %s.</p>
			<p>They included the following message:</p>
			<p>%s</p>
			<p>
				To join just click <a href="%s">here!</a>
			</p>',


		'html_mails:importer:plain_message' =>

			'Congratulations!
			You have been invited to join %s by %s.
			They included the following message:

			%s


			To join just navigate to %s'
	);

	add_translation("en",$english);
?>
