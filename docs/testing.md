# Testing

This skills-only package has a repository quality workflow, but no PHP test suite or runtime package checks.

## Repository quality checks

Make actionlint (with its ShellCheck helper), codespell, EditorConfig Checker, markdownlint-cli2, Prettier and
YAMLlint available on `PATH`, then run the checks configured for this repository:

```bash
composer quality
```

The workflow configures codespell, EditorConfig Checker, markdownlint-cli2 and Prettier from `.github/linters/`
and the repository root. Its reusable quality workflow supplies default YAMLlint rules and checks `.github`.

For hosted CI, report the workflow result separately; it checks GitHub Actions syntax, spelling, EditorConfig, Markdown,
Markdown/YAML formatting and YAML. The repository does not define PHPUnit, PHPStan, dependency-check or mutation jobs.

[Back to documentation](../README.md#documentation)
