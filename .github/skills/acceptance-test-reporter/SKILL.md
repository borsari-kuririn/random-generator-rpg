---
name: acceptance-test-reporter
description: "Use when the user wants to run acceptance tests for Solomons Ledger RPG Generators and write a Markdown report with the result of each scenario. This skill is specific to this repository and should execute the local acceptance runner, extend missing scenarios when needed, and save the report to a .md file."
user-invocable: true
---

# Acceptance Test Reporter

Use this skill when the goal is to run acceptance tests for this repository and produce a Markdown report that records the result of every scenario.

## Project Scope

This repository is a PHP-first web app with JSON endpoints and one main page:

- Generator logic lives in `includes/*.php`.
- JSON endpoints live in `api/*.php`.
- The main UI is rendered by `index.php`.
- Frontend behavior lives in `assets/js/*.js`.
- The acceptance runner lives in `tests/acceptance/run_acceptance.php`.

## What To Do

1. Confirm PHP is available.
2. Start or reuse a local PHP server from the repository root, normally on `http://127.0.0.1:8000`.
3. Run the acceptance runner:

   ```bash
   php tests/acceptance/run_acceptance.php --base-url=http://127.0.0.1:8000 --output=reports/acceptance/latest.md
   ```

4. Read the generated Markdown report and summarize the failing or passing scenarios for the user.
5. If the requested product area is not covered, extend `tests/acceptance/run_acceptance.php` with the smallest new scenario that covers it, then rerun the same command.

## Rules

- Prefer extending the existing acceptance runner over adding a separate test framework.
- Keep scenario assertions stable and contract-focused.
- Validate both success and failure behavior where the endpoint already exposes input validation.
- Always write the final scenario results to a Markdown file under `reports/acceptance/` unless the user asks for another path.

## Good Outcome

A successful use of this skill usually produces:

- a running local PHP app
- an executed acceptance test pass over the app's core scenarios
- a Markdown report containing the result of each scenario
- a concise summary of failures, gaps, or newly added coverage