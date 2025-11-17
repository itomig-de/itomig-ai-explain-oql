<?php
/*
 * Copyright (C) 2025 ITOMIG GmbH
 *
 * This file is part of iTop.
 *
 * iTop is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * iTop is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with iTop. If not, see <http://www.gnu.org/licenses/>
 */

namespace ItomigDw\ItomigAiExplainOql\Helper;

use Itomig\iTop\Extension\AIBase\Exception\AIResponseException;
use Itomig\iTop\Extension\AIBase\Service\AIService;
use MetaModel;

class AIOQLHelper
{
	public const MODULE_CODE = 'itomig-ai-explain-oql';
	private const INSTRUCTION_NAME = 'explain_oql';
	private const DEFAULT_PROMPT_PREFIX = 'Explain the following iTop OQL query in plain language.';

	/**
	 * Generates an explanation for the given OQL statement via the configured AI service.
	 *
	 * @param string $sOql
	 * @param \cmdbAbstractObject $oTargetObject Object that will receive the explanation
	 * @param string $sTargetAttCode Attribute code on the target object that will be filled with the explanation
	 *
	 * @throws AIResponseException
	 */
	public static function explainOQLQuery(string $sOql, \cmdbAbstractObject $oTargetObject, string $sTargetAttCode) : void
	{
		$oAIService = new AIService();

		// Register custom system prompt if configured for this module.
		$sSystemPrompt = MetaModel::GetModuleSetting(self::MODULE_CODE, 'system_prompt', '');
		if (is_string($sSystemPrompt) && trim($sSystemPrompt) !== '') {
			$oAIService->addSystemInstruction(self::INSTRUCTION_NAME, $sSystemPrompt);
		}

		// Determine the prefix that will precede every prompt sent to the AI backend.
		$sPromptPrefix = MetaModel::GetModuleSetting(self::MODULE_CODE, 'prompt_prefix', self::DEFAULT_PROMPT_PREFIX);

		// Compose the final prompt: prefix first, then the raw OQL query as required.
		$sPrompt = $sPromptPrefix . PHP_EOL . PHP_EOL . 'OQL:' . PHP_EOL . $sOql;

		$sExplanation = $oAIService->PerformSystemInstruction($sPrompt, self::INSTRUCTION_NAME);
        $oTargetObject->Set($sTargetAttCode, $sExplanation);
        $oTargetObject->DBWrite();
	}
}
