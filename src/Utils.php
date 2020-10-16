<?php


namespace Dreamwear;

class Utils
{
    static function random_password()
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        return substr(str_shuffle($chars), 0, 13);
    }

    static function generateHtmlTemplate($receiver,$mdp)
    {
        return ' <html>
        <body>
        <div marginwidth="0" marginheight="0" style="padding:0">
		<div id="m_3077059555376374222m_-7224283504482334031wrapper" dir="ltr" style="background-color:#f7f7f7;margin:0;padding:70px 0;width:100%">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
<tbody><tr>
<td align="center" valign="top">
						<div id="m_3077059555376374222m_-7224283504482334031template_header_image">
							<p style="margin-top:0"><img src="https://ci6.googleusercontent.com/proxy/5Q8nSZSOyl8Zm9NL68ji8I12wn6lL6Gxa3wdxNMMbsALFZcolvPwZtaRBNKbDF_JW06KV0Xkpmsg-cS7AhtNwHJ4jQtDsQV-JA=s0-d-e1-ft#https://dreamwear.co/media/2020/09/Logo-Entete-Woo.png" alt="Dream Wear" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;max-width:100%;margin-left:0;margin-right:0" class="CToWUd"></p>						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="m_3077059555376374222m_-7224283504482334031template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
<tbody><tr>
<td align="center" valign="top">
									
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_3077059555376374222m_-7224283504482334031template_header" style="background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0"><tbody><tr>
<td id="m_3077059555376374222m_-7224283504482334031header_wrapper" style="padding:36px 48px;display:block">
												<h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">Bienvenue sur Dream Wear</h1>
											</td>
										</tr></tbody></table>

</td>
							</tr>
<tr>
<td align="center" valign="top">
									
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="m_3077059555376374222m_-7224283504482334031template_body"><tbody><tr>
<td valign="top" id="m_3077059555376374222m_-7224283504482334031body_content" style="background-color:#ffffff">
												
												<table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
<td valign="top" style="padding:48px 48px 32px">
															<div id="m_3077059555376374222m_-7224283504482334031body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">

<p style="margin:0 0 16px">Bonjour '.$receiver.'</p>
<p style="margin:0 0 16px">Merci d’avoir créé un compte sur Dream Wear. Votre identifiant est <strong>'.$receiver.'</strong>. Vous pouvez accéder à l’espace membre de votre compte pour visualiser vos commandes, changer votre mot de passe, et plus encore ici&nbsp;: <a href="https://dreamwear.co/mon-compte/" rel="nofollow noreferrer" style="color:#96588a;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://dreamwear.co/mon-compte/&amp;source=gmail&amp;ust=1602898096838000&amp;usg=AFQjCNHuPkhZ19H2dcNmvtkeq48X4dGZVQ">https://dreamwear.co/mon-<wbr>compte/</a></p>
		<p style="margin:0 0 16px">Votre mot de passe a été généré automatiquement&nbsp;: <strong>'.$mdp.'</strong></p>

<p style="margin:0 0 16px">Au plaisir de vous revoir prochainement sur notre boutique.</p>
															</div>
														</td>
													</tr></tbody></table>

</td>
										</tr></tbody></table>

</td>
							</tr>
</tbody></table>
</td>
				</tr>
<tr>
<td align="center" valign="top">
						
						<table border="0" cellpadding="10" cellspacing="0" width="600" id="m_3077059555376374222m_-7224283504482334031template_footer"><tbody><tr>
<td valign="top" style="padding:0;border-radius:6px">
									<table border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr>
<td colspan="2" valign="middle" id="m_3077059555376374222m_-7224283504482334031credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
												<p style="margin:0 0 16px">By Dream Wear Shop</p>
											</td>
										</tr></tbody></table>
</td>
							</tr></tbody></table>

</td>
				</tr>
</tbody></table><div class="yj6qo"></div><div class="adL">
</div></div><div class="adL">
	</div></div>
        </body>
    </html>';
    }
}
