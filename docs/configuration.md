# Configuration guide

## Package trust

Keep `llm/skills` permission in the consuming application's Composer configuration. In `skills.json`,
`trusted-replace: true` replaces implicit trust in direct dependencies and built-in providers with the exact names
listed in `dependencies.composer.trusted`. Keep `vendor-sources: false` unless package-declared external sources
have been reviewed separately.

Explicit Git and local-directory sources are trusted by declaration and are not locked by `composer.lock`.
Pin a checked tag or commit when using them. Remove an older framework source when adopting this common package
so that two donors do not provide the same skill name.

## Client paths

| Client                    | Project path                                                           |
| ------------------------- | ---------------------------------------------------------------------- |
| Codex                     | `.agents/skills/<name>/SKILL.md`                                       |
| Claude Code               | `.claude/skills/<name>/SKILL.md`                                       |
| OpenCode                  | `.agents/skills/<name>/SKILL.md` or `.opencode/skills/<name>/SKILL.md` |
| GitHub Copilot in VS Code | `.agents/skills/<name>/SKILL.md` or `.github/skills/<name>/SKILL.md`   |

The default setup uses `.agents/skills` as the generated target and `.claude/skills` as its alias.
Resolve any existing real directory before configuring an alias at that path. Keep configuration and the Composer
lockfile in the application's normal version-control workflow; keep generated copies separate from authored skills.

## Synchronization and cleanup

With `auto-sync: true`, dependency installs and updates copy donor-owned files into the target.
Local changes to those files are overwritten. Local extras, retired files, and retired skill directories may remain
until deliberate cleanup. The plugin reads installed dependency files; a lock-only update does not synchronize the
vendor tree with its desired resolution.

Inspect the state with:

```bash
composer skills:show
```

The automatic hook reports synchronization failures without failing Composer. When a failing exit code is needed,
for example in CI, run:

```bash
composer skills:update
```

Set `auto-sync` to `false` to disable the hook. With the evaluated llm/skills 1.15.0 and Composer 2.10.3 combination,
`--no-scripts` still synchronized skills; it is not a verified opt-out. `--no-plugins` disables plugin execution.

Preview cleanup before accepting deletion:

```bash
composer skills:update --clean --dry-run
```

Unscoped cleanup can also remove manually authored skill directories. Review the preview and keep authored
instructions outside the generated target.
