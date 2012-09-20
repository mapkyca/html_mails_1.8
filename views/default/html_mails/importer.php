<?php
switch($vars['provider']){
	case 'twitter':
	case 'facebook':
		echo sprintf(elgg_echo('html_mails:importer:plain_message'), $vars['sitename'], $vars['inviter'], $vars['message'], $vars['wwwroot']);
		break;
	default:
?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0"> 
	<tr> 
		<td colspan="3" align="left" valign="top"><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/bar.jpg" width="764" height="17" /></td>
	</tr>
	<tr>
		<td width="10" align="left" valign="top" bgcolor="#E8E8E6" style="border-left: 1px solid #c6c6c4"><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/spacer.gif" width="1" height="1" /></td>
		<td width="743" align="left" valign="top">
			<table width="743" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="205" rowspan="2" align="left" valign="top">
						<table width="204" border="0" cellspacing="0" cellpadding="0">
							<tr> 
								<td align="left" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/hamaca.jpg" alt="Community" width="205" height="399" /></td>
							</tr>
							<tr>
								<td height="18" align="left" valign="top" bgcolor="#FFFFFF"></td>
							</tr>
							<tr>
								<td height="10" align="right" valign="top" bgcolor="#90c030"><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/left-rail-rond.gif" width="196" height="10" /></td>
							</tr>
							<tr>
								<td align="center" valign="top" bgcolor="#90c030"><p>&nbsp;</p>
									<table width="100" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td><a href="http://www.condiminds.com" target="_blank"><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/condiminds.jpg" alt="condiminds" width="163" height="130" border="0" /></a></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td width="539" height="105" align="left" valign="top"><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/header-title.jpg" alt="New NotificationNew Notification" width="538" height="105" border="0" /></td>
				</tr>
				<tr>
					<td align="left" valign="top">
						<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; line-height:18px">
							<tr>
								<td width="50%" colspan="2" align="left" valign="top">
									<br />
									<p><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/hello.jpg" alt="Dear member," width="332" height="52" /></p>
									<p>&nbsp;</p>
								</td>
							</tr>
							<tr>
								<td width="50%" height="20" align="left" valign="middle">
									<span style=" margin-left:10px;padding-left: 10px;font-size:14px;font-weight:bold;color:#5d5c5c;font-family:arial;line-height:130%;">
										<?php echo sprintf(elgg_echo('html_mails:importer:html_message'), $vars['sitename'], $vars['inviter'], $vars['message'], $vars['wwwroot']); ?>
									</span>
								</td>
							</tr>
							<tr>
								<td width="50%" height="20" align="left" valign="middle">&nbsp;</td>
							</tr>
							<tr>
								<td width="50%" height="20" align="left" valign="middle">&nbsp;</td>
							</tr>
							<tr>
								<td width="50%" height="20" align="left" valign="middle"><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/bye.jpg" alt="The Community Manager," width="374" height="79" align="right" /></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td width="11" align="left" valign="top" bgcolor="#E8E8E6" style="border-right: 2px solid #c6c6c4; border-left: solid 1px #757573"><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/spacer.gif" width="1" height="1" /></td>
	</tr>
	<tr>
		<td colspan="3" align="left" valign="top"><img src="<?php echo $vars['wwwroot']; ?>mod/html_mails/graphics/bottom-bar.gif" width="764" height="17" /></td>
	</tr>
</table> 
<table width="651" border="0" align="center" cellpadding="10" cellspacing="0">
	<tr>
		<td align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px"><a href="http://www.condiminds.com" target="_blank" style="color:#333333; text-decoration:underline">HTML Mails Plugin developed by Condiminds</a> | <a href="http://www.elgg.org" target="_blank" style="color:#333333; text-decoration:underline">Powered by elgg</a></td>
	</tr>
</table>
<?php } ?>