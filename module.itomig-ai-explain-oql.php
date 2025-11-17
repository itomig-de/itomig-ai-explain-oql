<?php
//
// iTop module definition file
//

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'itomig-ai-explain-oql/1.0.0',
	array(
		// Identification
		//
		'label' => 'OQL Explaining by AI (ITOMIG GmbH)',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'itomig-ai-base/25.2.1',
        ),
		'mandatory' => false,
		'visible' => true,

		// Components
		//
		'datamodel' => array(
			'model.itomig-ai-explain-oql.php',
			'vendor/autoload.php',
			'src/Hook/ExplainOqlPopupMenuExtension.php',
		),
		'webservice' => array(
			
		),
		'data.struct' => array(
			// add your 'structure' definition XML files here,
		),
		'data.sample' => array(
			// add your sample data XML files here,
		),
		
		// Documentation
		//
		'doc.manual_setup' => '', // hyperlink to manual setup documentation, if any
		'doc.more_information' => '', // hyperlink to more information, if any 

		// Default settings
		//
			'settings' => array(
				'system_prompt' => <<<PROMPT
You are an experienced iTop consultant. Explain OQL queries to end users in concise, clear language. Highlight the queried classes, key filters, joins, and returned attributes. Mention parameter placeholders if present, but do not output code.
PROMPT,
			),
		)
	);
