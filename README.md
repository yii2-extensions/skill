# Yii agent skills

Portable Yii 22 application, subsystem and Yii 2.0-to-22 migration skills.
This bundle is separate from `yiisoft/yii2` and has no runtime dependencies.

## Install in an application

Bootstrap `llm/skills` once in the application, with explicit project trust.
Create `skills.json` before installing the plugin:

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

Until this package is registered on Packagist, declare its VCS repository:

```bash
composer config repositories.yii2-skill vcs https://github.com/yii2-extensions/skill
composer config allow-plugins.llm/skills true
composer require --dev llm/skills:1.15.0 yii2-extensions/skill:dev-main
composer skills:show
```

Subsequent `composer install` and `composer update` synchronize the trusted
bundle automatically. Codex and OpenCode read `.agents/skills`; Claude Code
uses its alias. No Node.js installation is required. Metadata alone does not
install or enable the plugin. Add extension package names to the explicit trust
list when their skills are also wanted.

Sync overwrites donor-owned files and retains retired files until deliberate
cleanup. Its automatic hook reports synchronization failures without failing
Composer; inspect `composer skills:show` and use an explicit
`composer skills:update` when a failing exit code is required. Set `auto-sync`
to `false` to opt out; `--no-scripts` is not a verified opt-out with Composer 2.10.3.

### Optional npx installation

```bash
npx skills@1.7.2 add yii2-extensions/skill --list
npx skills@1.7.2 add yii2-extensions/skill --skill yii2-framework --agent codex
```

## Available skills

`composer skills:show` lists discovered donor skills and synchronization status.
That is distinct from a coding agent's native discovery and activation.

| Skill                                                                | Workflow                                                                                                                                                                                                                                                          |
| -------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| [yii2-autoload-di](skills/yii2-autoload-di/SKILL.md)                 | Configure Yii 22.0 Composer autoloading, dependency injection, application components, and bootstrap wiring. Use for class resolution or object lifetime changes; not general project scaffolding.                                                                |
| [yii2-caching](skills/yii2-caching/SKILL.md)                         | Configure or repair Yii 22.0 data, query, fragment, page, and HTTP caching with correct keys and invalidation. Use for cache behavior or backend upgrades; not general performance tuning or lock coordination.                                                   |
| [yii2-console-commands](skills/yii2-console-commands/SKILL.md)       | Implement Yii 22.0 console controllers, argument binding, options, command output, and exit behavior. Use for CLI commands and automation; not web actions or automatically executing maintenance commands.                                                       |
| [yii2-data-widgets](skills/yii2-data-widgets/SKILL.md)               | Implement Yii 22.0 data providers, pagination, sorting, GridView, ListView, and DetailView. Use for data listing and display contracts; not replacing the application UI framework.                                                                               |
| [yii2-database-migrations](skills/yii2-database-migrations/SKILL.md) | Implement Yii 22.0 queries, ActiveRecord persistence, database compatibility, and migrations. Use for SQL/schema or record lifecycle changes; not form UI or database server administration.                                                                      |
| [yii2-events-behaviors](skills/yii2-events-behaviors/SKILL.md)       | Implement Yii 22.0 component events and reusable behaviors, including record lifecycle behaviors. Use for attachment, handler ordering, and lifecycle effects; not general dependency injection or background jobs.                                               |
| [yii2-files-uploads](skills/yii2-files-uploads/SKILL.md)             | Implement Yii 22.0 uploaded-file validation, storage, and download responses. Use for file lifecycle and path handling; not general asset bundle publication or server administration.                                                                            |
| [yii2-forms-validation](skills/yii2-forms-validation/SKILL.md)       | Implement Yii 22.0 model input loading, scenarios, validation, ActiveForm, and client validation strategies. Use for form correctness and mass assignment; not general ActiveRecord query design.                                                                 |
| [yii2-framework](skills/yii2-framework/SKILL.md)                     | Use when creating or changing a Yii 22.0 app, including setup, controllers, ActiveRecord, forms, tests.                                                                                                                                                           |
| [yii2-i18n-formatting](skills/yii2-i18n-formatting/SKILL.md)         | Change Yii 22.0 translations, message sources, locale formatting, and timezone handling. Use for localized content and values; not language-prefixed routing owned by a separate extension.                                                                       |
| [yii2-logging-errors](skills/yii2-logging-errors/SKILL.md)           | Configure Yii 22.0 logging, profiling, PSR-3 adapters, and exception rendering. Use for diagnostic delivery and error contracts; not an unsolicited monitoring stack replacement.                                                                                 |
| [yii2-mail](skills/yii2-mail/SKILL.md)                               | Implement Yii 22.0 message composition, mail views, transport integration, and delivery-result handling. Use for application email code; not sending real messages without task authorization.                                                                    |
| [yii2-mutex](skills/yii2-mutex/SKILL.md)                             | Implement Yii 22.0 mutex-based coordination with correct lock scope, acquisition failure, and release. Use for critical sections or concurrent workers; not ordinary caching or database transactions.                                                            |
| [yii2-rest-apis](skills/yii2-rest-apis/SKILL.md)                     | Implement Yii 22.0 REST resource actions, authentication, serialization, filtering, and HTTP contracts. Use for APIs built on yii rest; not ordinary HTML controller routing.                                                                                     |
| [yii2-security-access](skills/yii2-security-access/SKILL.md)         | Implement Yii 22.0 identity authentication, access filters, RBAC, and cryptographic API usage. Use for login or permission behavior; not an unsolicited full security audit.                                                                                      |
| [yii2-sessions-cookies](skills/yii2-sessions-cookies/SKILL.md)       | Configure or repair Yii 22.0 sessions, cookies, CSRF state, and session storage. Use for browser state lifecycle and session backend upgrades; not general login or RBAC implementation.                                                                          |
| [yii2-testing-fixtures](skills/yii2-testing-fixtures/SKILL.md)       | Create or repair Yii 22.0 application tests and database fixtures using the existing test runner. Use for fixture lifecycle and test isolation; not automatically installing a template test stack.                                                               |
| [yii2-upgrade-22](skills/yii2-upgrade-22/SKILL.md)                   | Assess or carry out an existing application's upgrade from Yii 2.0.x to Yii 22.0, including dependency blockers, applicable breaking changes, and staged verification. Use for the cross-version transition, not a new app or an isolated change already on 22.0. |
| [yii2-views-assets](skills/yii2-views-assets/SKILL.md)               | Change Yii 22.0 views, layouts, asset bundles, JavaScript registration, and frontend integration. Use for rendering and asset delivery; not model validation or choosing a new UI framework.                                                                      |
| [yii2-web-routing-actions](skills/yii2-web-routing-actions/SKILL.md) | Implement or repair Yii 22.0 web routes, controller actions, standalone actions, and action filters. Use for dispatch and request binding; not REST resource design or console commands.                                                                          |

## Maintain the bundle

Edit each complete `skills/<name>/` directory here. Keep referenced resources
portable and preserve the skill names and public documentation URLs. Run:

```bash
php tools/check.php
composer validate --strict
composer archive --format=zip --dir=artifacts
```

The documentation site imports this repository at a recorded revision.
It publishes copied bundles unchanged and renders human-readable skill pages.
Reading a SKILL.md or installing a bundle does not prove native agent activation.

## License

[BSD-3-Clause](LICENSE). See [NOTICE.md](NOTICE.md) for source attribution.
