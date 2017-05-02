<?php 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function mg_send($to, $subject, $message) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	// curl_setopt($ch, CURLOPT_USERPWD, 'api:key-fbb6f449d1b52d4a2113e4c3984fe9e6');
	curl_setopt($ch, CURLOPT_USERPWD, 'api:key-56c023d43b741996ecf84bc554a9d050');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$plain = $message;

	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	// curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/sandboxd73863a1aede4e0e956d1e442fff7505.mailgun.org/messages');
	curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/sandbox51f2b7ec903e468eb8fd59e7471c68ac.mailgun.org/messages');
	curl_setopt($ch, CURLOPT_POSTFIELDS, array('from' => 'referal@hugo.nl',
		'to' => $to,
		'subject' => $subject,
		'html' => $message,
		'text' => $plain
	));

	$j = json_decode(curl_exec($ch));
	$info = curl_getinfo($ch);
	curl_close($ch);

	return $j;
}

function hugo_submit_referral() {
	$da_email = isset( $_POST[ 'da-email' ] ) ? $_POST[ 'da-email' ] : '';
	$da_naam = isset( $_POST[ 'da-naam' ] ) ? $_POST[ 'da-naam' ] : '';
	$da_plaats = isset( $_POST[ 'da-plaats' ] ) ? $_POST[ 'da-plaats' ] : '';
	$da_praktijk = isset( $_POST[ 'da-praktijk' ] ) ? $_POST[ 'da-praktijk' ] : '';
	$e_email = isset( $_POST[ 'e-email' ] ) ? $_POST[ 'e-email' ] : '';
	$e_naam = isset( $_POST[ 'e-naam' ] ) ? $_POST[ 'e-naam' ] : '';
	$e_tel = isset( $_POST[ 'e-tel' ] ) ? $_POST[ 'e-tel' ] : '';
	$p_gebdatum = isset( $_POST[ 'p-gebdatum' ] ) ? $_POST[ 'p-gebdatum' ] : '';
	$p_geslacht = isset( $_POST[ 'p-geslacht' ] ) ? $_POST[ 'p-geslacht' ] : '';
	$p_naam = isset( $_POST[ 'p-naam' ] ) ? $_POST[ 'p-naam' ] : '';
	$p_ras = isset( $_POST[ 'p-ras' ] ) ? $_POST[ 'p-ras' ] : '';
	$p_soort = isset( $_POST[ 'p-soort' ] ) ? $_POST[ 'p-soort' ] : '';
	$hg_verwijzing = isset( $_POST[ 'hg-verwijzing' ] ) ? $_POST[ 'hg-verwijzing' ] : '';
	$contact_via = isset( $_POST[ 'contact-via' ] ) ? $_POST[ 'contact-via' ] : '';
	
	$msg = '<p>Beste Hugo,</p>';
	$msg .= '<p>Hierbij verwijs ik door:</p>';
	$msg .= '<ul>';
	if ($p_naam !== '') {$msg .= '<li>patient: '.$p_naam.'</li>';};
	if ($p_soort !== '') {$msg .= '<li>soort: '.$p_soort.'</li>';};
	if ($p_ras !== '') {$msg .= '<li>ras: '.$p_ras.'</li>';};
	if ($p_gebdatum !== '') {$msg .= '<li>geboortedatum: '.$p_gebdatum.'</li>';};
	if ($p_geslacht !== '') {$msg .= '<li>geslacht: '.$p_geslacht.'</li>';};
	$msg .= '</ul>';
	if ($hg_verwijzing !== '') {$msg .= '<p>Het gaat om het volgende: '.$hg_verwijzing.'</p>';};
	if ($contact_via == 'email') {
		$contact = 'e-mail?';
	} else {
		$contact = 'de telefoon?';
	}
	$msg .= '<p>Kun je contact opnemen met de eigenaar via '.$contact.'</p>';
	$msg .= '<ul>';
	if ($e_naam !== '') {$msg .= '<li>naam: '.$e_naam.'</li>';};
	if ($e_email !== '') {$msg .= '<li>e-mail: '.$e_email.'</li>';};
	if ($e_tel !== '') {$msg .= '<li>tel: '.$e_tel.'</li>';};
	$msg .= '</ul>';
	$msg .= '<p>Vriendelijke groet,<br>';
	if ($da_naam !== '') {$msg .= $da_naam.'<br>';};
	if ($da_praktijk !== '') {$msg .= $da_praktijk;};
	if ($da_plaats !== '') {$msg .= ', '.$da_plaats;};
	if ($da_email !== '') {$msg .= '<br>'.$da_email;};
	$msg .= '</p>';

	$sbjt = 'Verwijzing - '. $da_praktijk;	
	$response = mg_send('bart@moreawesome.co', $sbjt, $msg);
	// $response = mg_send('emiel@workshoplive.nl', $sbjt, $msg);
	echo $response->message;
	die();
}
?>