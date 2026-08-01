# Solomons Ledger RPG Generators

A collection of PHP-powered generators for RPG tables, with a single web panel for NPC, Loot, Place, Romance, Company, Encounter, Scarcity, Mishap, and Critical Injury.

English is the default language standard for this project.

## How to run

1. Start a PHP server at the project root.
2. Open `index.php` in your browser.

Example:

```bash
php -S localhost:8000
```

Then open `http://localhost:8000`.

## Acceptance tests

The repository includes a lightweight acceptance runner that exercises the main page plus the JSON generator endpoints and writes a Markdown report with the result of each scenario.

Browser smoke coverage is provided through a shared Playwright session stored at `tests/playwright/.session/shared-session.json` and reused by the Playwright UI smoke script.

1. Start the PHP server from the project root.
2. Run the acceptance runner:

```bash
php tests/acceptance/run_acceptance.php --base-url=http://127.0.0.1:8000 --output=reports/acceptance/latest.md
```

To create the shared browser session directly:

```bash
node tests/playwright/create_shared_session.mjs --base-url=http://127.0.0.1:8000
```

To run the Playwright UI smoke check directly:

```bash
node tests/playwright/run_ui_smoke.mjs --base-url=http://127.0.0.1:8000
```

The runner exits with code `0` when all scenarios pass and `1` when any scenario fails.
The generated report is written to `reports/acceptance/latest.md` by default.

## Updates

The updates below are based on Git commit history and mirror the content in `UPDATES.md`.

### 2026-07-23
- feat: include new update logs
- feat: implement new Make camp and Sea Travel Mishaps
- feat: implement new Make camp and Sea Travel Mishaps

### 2026-07-10
- feat: implement base to mishaps

### 2026-07-08
- feat: implement scarcity speculations
- feat: implement scarcity generator

### 2026-07-05
- feat: include trade goods in loot generator
- feat: include top side menu
- feat: include injuries generator, include trade goods

### 2026-07-02
- feat: minification
