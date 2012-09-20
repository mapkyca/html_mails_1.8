<p>
	Use importer:
	<select name="params[use_importer]">
		<option value="0">NO</option>
		<option value="1"<?php echo (elgg_get_plugin_setting('use_importer', 'html_mails')) ? 'selected="selected"' : '';?>>YES</option>
	</select>
	<br />
	Use invitefriends:
	<select name="params[use_invitefriends]">
		<option value="0">NO</option>
		<option value="1"<?php echo (elgg_get_plugin_setting('use_invitefriends', 'html_mails')) ? 'selected="selected"' : '';?>>YES</option>
	</select>
	<br />
	Use notifications:
	<select name="params[use_notifications]">
		<option value="0">NO</option>
		<option value="1"<?php echo (elgg_get_plugin_setting('use_notifications', 'html_mails')) ? 'selected="selected"' : '';?>>YES</option>
	</select>
</p>
