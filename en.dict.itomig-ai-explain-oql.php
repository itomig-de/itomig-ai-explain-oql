<?php
/**
 * Localized data
 *
 * @copyright   Copyright (C) 2023 ITOMIG GmbH
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

Dict::Add('EN US', 'English', 'English', array(
	'Class:RegularReportRule' => 'Regular report rule',
	'Class:RegularReportRule+' => 'Defines a scheduled mail report based on an OQL query or an audit domain.',
	'Class:RegularReportRule/Attribute:name' => 'Name',
	'Class:RegularReportRule/Attribute:name+' => 'Display name of the rule.',
	'Class:RegularReportRule/Attribute:description' => 'Description',
	'Class:RegularReportRule/Attribute:description+' => 'Free text for additional context.',
	'Class:RegularReportRule/Attribute:status' => 'Status',
	'Class:RegularReportRule/Attribute:status+' => 'Enable or disable the rule.',
	'Class:RegularReportRule/Attribute:status/Value:active' => 'Active',
	'Class:RegularReportRule/Attribute:status/Value:inactive' => 'Inactive',
	'Class:RegularReportRule/Attribute:interval' => 'Interval',
	'Class:RegularReportRule/Attribute:interval+' => 'Frequency at which the report is sent.',
	'Class:RegularReportRule/Attribute:interval/Value:daily' => 'Daily',
	'Class:RegularReportRule/Attribute:interval/Value:weekly' => 'Weekly',
	'Class:RegularReportRule/Attribute:interval/Value:monthly' => 'Monthly',
	'Class:RegularReportRule/Attribute:next_exec_date' => 'Next execution date',
	'Class:RegularReportRule/Attribute:next_exec_date+' => 'Scheduled execution date (read only).',
	'Class:RegularReportRule/Attribute:query_id' => 'Query',
	'Class:RegularReportRule/Attribute:query_id+' => 'OQL query delivering the report data.',
	'Class:RegularReportRule/Attribute:query_name' => 'Query name',
	'Class:RegularReportRule/Attribute:query_name+' => 'Display name of the linked phrasebook query.',
	'Class:RegularReportRule/Attribute:auditdomain_id' => 'Audit domain',
	'Class:RegularReportRule/Attribute:auditdomain_id+' => 'Audit domain providing the report data.',
	'Class:RegularReportRule/Attribute:auditdomain_name' => 'Audit domain name',
	'Class:RegularReportRule/Attribute:auditdomain_name+' => 'Display name of the audit domain.',
	'Class:RegularReportRule/Error:NoDataSourceSelected' => 'Select at least one data source (audit domain or query).',
	'Menu:RegularReportRules' => 'Regular report rules',
	'Menu:RegularReportRules+' => 'Browse and manage scheduled mail report rules.',
    'RegularReportRule:general' => 'General Information',
    'RegularReportRule:config' => 'Configuration',

	'Class:QueryOQL:Action:ExplainByAI' => 'Explain (by AI)',
	'Class:QueryOQL:Action:ExplainByAI+' => 'Generate a natural language explanation using the configured AI service.',
	'Class:QueryOQL:Action:ExplainByAI:Error' => 'The AI explanation could not be generated. Please try again later.',
));
