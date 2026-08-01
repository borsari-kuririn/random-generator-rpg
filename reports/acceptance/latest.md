# Acceptance Test Report

- Generated: 2026-08-01 21:46:04 UTC
- Base URL: http://127.0.0.1:8000
- Total scenarios: 14
- Passed: 14
- Failed: 0

| Scenario | Result | HTTP | Duration |
| --- | --- | --- | --- |
| home-page-loads | PASS | 200/200 | 48.30 ms |
| npc-api-default | PASS | 200/200 | 2.17 ms |
| loot-api-pocket | PASS | 200/200 | 4.05 ms |
| books-api-default | PASS | 200/200 | 1.59 ms |
| place-api-default | PASS | 200/200 | 14.98 ms |
| romance-api-default | PASS | 200/200 | 12.90 ms |
| company-api-default | PASS | 200/200 | 11.79 ms |
| encounter-api-default | PASS | 200/200 | 12.64 ms |
| scarcity-api-default | PASS | 200/200 | 18.26 ms |
| mishap-api-valid-d66 | PASS | 200/200 | 14.84 ms |
| mishap-api-invalid-dice | PASS | 400/400 | 13.18 ms |
| critical-injury-valid-d66 | PASS | 200/200 | 18.71 ms |
| critical-injury-invalid-dice | PASS | 400/400 | 13.04 ms |
| playwright-ui-shared-session | PASS | 0/0 | 5490.49 ms |

## home-page-loads

- Description: Home page renders the generator shell and all major panel hooks.
- Request: /
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 48.30 ms
- Checks:
  - All assertions passed.

## npc-api-default

- Description: NPC API returns a valid character payload with required fields.
- Request: /api/generate_npc.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 2.17 ms
- Checks:
  - All assertions passed.

## loot-api-pocket

- Description: Loot API returns a bundle with coins, hook, and at least one item.
- Request: /api/generate_loot.php?source=pocket
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 4.05 ms
- Checks:
  - All assertions passed.

## books-api-default

- Description: Storyline/Lore books API returns a book tied to a major collection.
- Request: /api/generate_storyline_lore_book.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 1.59 ms
- Checks:
  - All assertions passed.

## place-api-default

- Description: Place API returns a place card with core descriptive fields.
- Request: /api/generate_place.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 14.98 ms
- Checks:
  - All assertions passed.

## romance-api-default

- Description: Romance API returns a pair with relationship details and partner data.
- Request: /api/generate_romance.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 12.90 ms
- Checks:
  - All assertions passed.

## company-api-default

- Description: Company API returns a company sheet with the expected stats and hook.
- Request: /api/generate_company.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 11.79 ms
- Checks:
  - All assertions passed.

## encounter-api-default

- Description: Encounter API returns a creature encounter with combat-facing fields.
- Request: /api/generate_encounter.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 12.64 ms
- Checks:
  - All assertions passed.

## scarcity-api-default

- Description: Scarcity API returns market metadata and at least one priced item.
- Request: /api/generate_scarcity.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 18.26 ms
- Checks:
  - All assertions passed.

## mishap-api-valid-d66

- Description: Mishap API resolves a specific D66 request into a matching table entry.
- Request: /api/generate_mishap.php?table=magic&dice1=1&dice2=1
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 14.84 ms
- Checks:
  - All assertions passed.

## mishap-api-invalid-dice

- Description: Mishap API rejects out-of-range dice values with a 400 error.
- Request: /api/generate_mishap.php?table=magic&dice1=0&dice2=9
- Result: PASS
- Expected HTTP: 400
- Actual HTTP: 400
- Duration: 13.18 ms
- Checks:
  - All assertions passed.

## critical-injury-valid-d66

- Description: Critical injury API resolves a slash D66 request into the expected injury shape.
- Request: /api/critical_injury.php?category=slash&dice1=2&dice2=3
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 18.71 ms
- Checks:
  - All assertions passed.

## critical-injury-invalid-dice

- Description: Critical injury API rejects invalid dice values with a 400 error.
- Request: /api/critical_injury.php?category=slash&dice1=0&dice2=7
- Result: PASS
- Expected HTTP: 400
- Actual HTTP: 400
- Duration: 13.04 ms
- Checks:
  - All assertions passed.

## playwright-ui-shared-session

- Description: Playwright creates a shared browser session and uses it for a critical injury UI smoke check.
- Request: node tests/playwright/run_ui_smoke.mjs --base-url="http://127.0.0.1:8000" --session-file="tests/playwright/.session/shared-session.json"
- Result: PASS
- Expected HTTP: 0
- Actual HTTP: 0
- Duration: 5490.49 ms
- Checks:
  - All assertions passed.

