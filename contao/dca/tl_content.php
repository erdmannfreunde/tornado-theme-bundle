<?php

declare(strict_types=1);

/*
 * Inhaltselement "Zitat" – Zitattext, Autor, Zusatzzeile, Bewertung und
 * optionales Bild (Bildoptionen wie beim Text-Element über die
 * addImage-Subpalette des Cores). Feldnamen wie im Zitat-Element von SOLO.
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['quote'] = '{type_legend},type,headline;{text_legend},quote_text,quote_author,quote_meta,quote_rating;{image_legend},addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['quote_text'] = array(
	'inputType' => 'textarea',
	'eval'      => array('mandatory' => true, 'basicEntities' => true, 'tl_class' => 'clr'),
	'sql'       => "text NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['quote_author'] = array(
	'inputType' => 'text',
	'eval'      => array('maxlength' => 255, 'tl_class' => 'w50'),
	'sql'       => "varchar(255) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['quote_meta'] = array(
	'inputType' => 'text',
	'eval'      => array('maxlength' => 255, 'tl_class' => 'w50'),
	'sql'       => "varchar(255) NOT NULL default ''",
);

// Leer = keine Sterne
$GLOBALS['TL_DCA']['tl_content']['fields']['quote_rating'] = array(
	'inputType' => 'select',
	'options'   => array('1', '2', '3', '4', '5'),
	'default'   => '5',
	'eval'      => array('includeBlankOption' => true, 'tl_class' => 'w50'),
	'sql'       => "char(1) NOT NULL default ''",
);
