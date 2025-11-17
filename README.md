# itomig-ai-explain-oql

Provide instant, human-readable explanations for iTop Phrasebook queries by connecting the query editor with the AI backend shipped in the [`itomig-ai-base`](https://github.com/itomig-de/itomig-ai-base) extension. The module is authored and maintained by ITOMIG GmbH.

## Features
- Adds an *Explain (by AI)* popup action to every `QueryOQL` object in the Phrasebook.
- Sends the selected OQL statement to the configured AI provider and stores the explanation back on the query record.
- Ships with a default system prompt optimised for functional administrators while still allowing full customisation via module settings.

## Requirements
- iTop installation with the `itomig-ai-base v25.2.1` enabled and configured (API key, model, …). The extension is published at [github.com/itomig-de/itomig-ai-base](https://github.com/itomig-de/itomig-ai-base.git).
- Access to an AI provider supported by `itomig-ai-base` (public or hosted by your own).

## Installation
1. Download the latest release archive from the repository and extract it into either `extensions/itomig-ai-explain-oql/` inside your iTop installation.
2. Ensure file ownership and permissions match the rest of your iTop modules.
3. Run the iTop setup wizard (CLI or web) to detect the new module and trigger the compilation step.
4. Verify that both **AI Base** and **AI Explain OQL** are listed as installed modules under *Administration → System Information*.

## Configuration
All tunables are standard iTop module settings. Add them to `conf/production/config-itop.php` (or the relevant environment configuration) inside the `'itomig-ai-explain-oql'` array:

```php
'itomig-ai-explain-oql' => array(
    // Optional: override the system prompt registered with the AI backend.
    'system_prompt' => 'You are an experienced iTop administrator. Explain OQL queries clearly and concisely.',

    // Optional: attribute code on QueryOQL objects that receives the AI response.
    'target_attribute' => 'description',
),
```

When a setting is omitted the helper falls back to its built-in defaults (`src/Helper/AIOQLHelper.php:31` and `ajax.explain-oql.php:23`).

## Usage
1. Open any Phrasebook query (`QueryOQL`) in iTop.
2. Click on *Actions → Explain (by AI)*.
3. The request is sent asynchronously. On success the page reloads and the configured attribute (default: `description`) contains the generated explanation.
4. If the AI backend returns an error, a popup displays the translated error message defined in `en.dict.itomig-ai-explain-oql.php`.

## Development Notes
- Hooks that must always be loaded are listed in [`module.itomig-ai-explain-oql.php`](module.itomig-ai-explain-oql.php:25), matching the ITOMIG extension guidelines.
- Composer’s PSR-4 autoloader is already configured (`composer.json`). Run `composer dump-autoload -o` after adding new classes under `src/`.
- Translations for the popup action live in `en.dict.itomig-ai-explain-oql.php` and `de.dict.itomig-ai-explain-oql.php`. iTop discovers these automatically during compilation.
- For an in-depth walkthrough on building your own AI-enabled iTop module using the shared base component, follow the public tutorial: [Implementing iTop AI extensions with itomig-ai-base](https://wiki.itomig.de/itomig-code/itomig-ai-base/tutorial-ai-extension-implementation).

## License
Distributed under the terms of the GNU Affero General Public License v3.0.
