<?php
/**
 * Localized data
 *
 * @copyright   Copyright (C) 2023 ITOMIG GmbH
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:RegularReportRule' => 'Regel für regelmäßigen Bericht',
	'Class:RegularReportRule+' => 'Definiert einen regelmäßig ausgeführten Mail-Bericht auf Basis einer OQL-Abfrage oder einer Audit-Domäne.',
	'Class:RegularReportRule/Attribute:name' => 'Name',
	'Class:RegularReportRule/Attribute:name+' => 'Anzeigename der Regel.',
	'Class:RegularReportRule/Attribute:description' => 'Beschreibung',
	'Class:RegularReportRule/Attribute:description+' => 'Freitext für zusätzliche Informationen.',
	'Class:RegularReportRule/Attribute:status' => 'Status',
	'Class:RegularReportRule/Attribute:status+' => 'Aktivieren oder deaktivieren Sie die Regel.',
	'Class:RegularReportRule/Attribute:status/Value:active' => 'Aktiv',
	'Class:RegularReportRule/Attribute:status/Value:inactive' => 'Inaktiv',
	'Class:RegularReportRule/Attribute:interval' => 'Intervall',
	'Class:RegularReportRule/Attribute:interval+' => 'Ausführungsfrequenz des Berichts.',
	'Class:RegularReportRule/Attribute:interval/Value:daily' => 'Täglich',
	'Class:RegularReportRule/Attribute:interval/Value:weekly' => 'Wöchentlich',
	'Class:RegularReportRule/Attribute:interval/Value:monthly' => 'Monatlich',
	'Class:RegularReportRule/Attribute:next_exec_date' => 'Nächstes Ausführungsdatum',
	'Class:RegularReportRule/Attribute:next_exec_date+' => 'Geplantes Ausführungsdatum (schreibgeschützt).',
	'Class:RegularReportRule/Attribute:query_id' => 'Abfrage',
	'Class:RegularReportRule/Attribute:query_id+' => 'OQL-Abfrage, welche die Berichtsdaten liefert.',
	'Class:RegularReportRule/Attribute:query_name' => 'Abfragename',
	'Class:RegularReportRule/Attribute:query_name+' => 'Anzeigename der verknüpften Phrasebook-Abfrage.',
	'Class:RegularReportRule/Attribute:auditdomain_id' => 'Audit-Domäne',
	'Class:RegularReportRule/Attribute:auditdomain_id+' => 'Audit-Domäne, aus der die Daten gezogen werden.',
	'Class:RegularReportRule/Attribute:auditdomain_name' => 'Audit-Domänenname',
	'Class:RegularReportRule/Attribute:auditdomain_name+' => 'Anzeigename der Audit-Domäne.',
	'Class:RegularReportRule/Error:NoDataSourceSelected' => 'Bitte wählen Sie mindestens eine Datenquelle (Audit-Domäne oder Abfrage).',
	'Menu:RegularReportRules' => 'Regelmäßige Berichtsregeln',
	'Menu:RegularReportRules+' => 'Liste aller Regeln für regelmäßige Mail-Berichte.',
    'RegularReportRule:general' => 'Allgemeine Informationen',
    'RegularReportRule:config' => 'Konfiguration',

	'Class:QueryOQL:Action:ExplainByAI' => 'Erläutern (per KI)',
	'Class:QueryOQL:Action:ExplainByAI+' => 'Erstellt mit dem konfigurierten KI-Dienst eine verständliche Erklärung der OQL-Abfrage.',
	'Class:QueryOQL:Action:ExplainByAI:Error' => 'Die KI-Erklärung konnte nicht erzeugt werden. Bitte später erneut versuchen.',

));
