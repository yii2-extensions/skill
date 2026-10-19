# Usage examples

## Choose a workflow

Use the [skill catalog](../skills/README.md) to select the scope that matches the task:

| Task                                                     | Workflow                   |
| -------------------------------------------------------- | -------------------------- |
| Configure an ActiveForm and its server/client validation | `yii2-forms-validation`    |
| Change a query or prepare a database migration           | `yii2-database-migrations` |
| Assess an existing Yii 2.0 application's upgrade         | `yii2-upgrade-22`          |
| Work across several parts of a Yii 22 application        | `yii2-framework`           |

Inspect donor availability and synchronization status from the application root:

```bash
composer skills:show
```

This lists installed or declared sources and target status. It is separate from the coding agent's native discovery
and activation, and is not an internet catalog.

## Invoke a skill

Start a fresh client session in the application root and confirm the relevant skill is listed.
For example, with the form workflow installed:

- Codex: invoke `$yii2-forms-validation` or select it in the skill picker.
- Claude Code: invoke `/yii2-forms-validation`.
- OpenCode: request its native skill tool with the workflow name.
- Copilot in VS Code: select the workflow in the client skill interface.

Ask for a small task, inspect the loaded instructions and changed files, and run the application's existing checks.
File installation, client discovery, instruction loading, and a correct task result are distinct observations.

For an upgrade, establish installed and locked versions, runtime requirements, and affected application behavior
before following the migration checkpoints. The skill does not authorize live migrations or deployments.
