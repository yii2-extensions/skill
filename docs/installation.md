# Installation guide

## Requirements

- Composer 2 and PHP 8.2+ for `llm/skills` 1.15.0.
- A coding agent that supports project skills, or a manual workflow that reads the complete bundle.
- A framework revision compatible with the selected workflow. Yii 22 requires PHP 8.3+ in the application.

The bundle itself has no runtime dependencies. Install the tool and bundle as application development dependencies.

## Composer setup

From the application root, create `skills.json` before enabling the plugin:

```json
{
    "target": ".agents/skills",
    "aliases": [".claude/skills"],
    "auto-sync": true,
    "vendor-sources": false,
    "dependencies": {
        "composer": {
            "trusted-replace": true,
            "trusted": ["yii2-extensions/skill"]
        }
    }
}
```

Install from Packagist:

```bash
composer config allow-plugins.llm/skills true
composer require --dev llm/skills:1.15.0 yii2-extensions/skill:^0.1
composer skills:show
```

This setup installs all twenty workflows, including their referenced resources. Subsequent `composer install` and
`composer update` operations synchronize the trusted bundle automatically. The selected package revision is recorded in
`composer.lock`. Package metadata alone does not install or enable the plugin.

Approve additional extension donors by their exact package names in `trusted`. Keep one donor for each skill name. See
[configuration](configuration.md) before adding external sources or existing client directories.

## Optional npx installation

For a selective installation, list the repository's skills first:

```bash
npx skills@1.7.2 add yii2-extensions/skill --list
npx skills@1.7.2 add yii2-extensions/skill --skill yii2-framework --agent codex
```

This workflow requires Node.js/npm separately. Choose the project's client and verify the selected source revision.

## Manual installation

Copy a complete `skills/<name>/` directory, including `references/`, into the client's project skill path. Keep its
`<name>/SKILL.md` structure and one effective copy per client. See [client paths](configuration.md#client-paths) and
[usage examples](examples.md) for discovery and activation checks.

[Back to documentation](../README.md#documentation)
