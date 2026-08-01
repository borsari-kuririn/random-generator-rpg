# Acceptance Test Report

- Generated: 2026-08-01 18:50:31 UTC
- Base URL: http://127.0.0.1:8000
- Total scenarios: 13
- Passed: 13
- Failed: 0

| Scenario | Result | HTTP | Duration |
| --- | --- | --- | --- |
| home-page-loads | PASS | 200/200 | 31.68 ms |
| npc-api-default | PASS | 200/200 | 13.67 ms |
| loot-api-pocket | PASS | 200/200 | 15.37 ms |
| place-api-default | PASS | 200/200 | 13.77 ms |
| romance-api-default | PASS | 200/200 | 20.67 ms |
| company-api-default | PASS | 200/200 | 12.36 ms |
| encounter-api-default | PASS | 200/200 | 12.90 ms |
| scarcity-api-default | PASS | 200/200 | 15.05 ms |
| mishap-api-valid-d66 | PASS | 200/200 | 14.76 ms |
| mishap-api-invalid-dice | PASS | 400/400 | 2.78 ms |
| critical-injury-valid-d66 | PASS | 200/200 | 12.49 ms |
| critical-injury-invalid-dice | PASS | 400/400 | 20.33 ms |
| playwright-ui-shared-session | PASS | 0/0 | 2812.28 ms |

## home-page-loads

- Description: Home page renders the generator shell and all major panel hooks.
- Request: /
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 31.68 ms
- Checks:
  - All assertions passed.

## npc-api-default

- Description: NPC API returns a valid character payload with required fields.
- Request: /api/generate_npc.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 13.67 ms
- Checks:
  - All assertions passed.

## loot-api-pocket

- Description: Loot API returns a bundle with coins, hook, and at least one item.
- Request: /api/generate_loot.php?source=pocket
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 15.37 ms
- Checks:
  - All assertions passed.

## place-api-default

- Description: Place API returns a place card with core descriptive fields.
- Request: /api/generate_place.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 13.77 ms
- Checks:
  - All assertions passed.

## romance-api-default

- Description: Romance API returns a pair with relationship details and partner data.
- Request: /api/generate_romance.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 20.67 ms
- Checks:
  - All assertions passed.

## company-api-default

- Description: Company API returns a company sheet with the expected stats and hook.
- Request: /api/generate_company.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 12.36 ms
- Checks:
  - All assertions passed.

## encounter-api-default

- Description: Encounter API returns a creature encounter with combat-facing fields.
- Request: /api/generate_encounter.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 12.90 ms
- Checks:
  - All assertions passed.

## scarcity-api-default

- Description: Scarcity API returns market metadata and at least one priced item.
- Request: /api/generate_scarcity.php
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 15.05 ms
- Checks:
  - All assertions passed.

## mishap-api-valid-d66

- Description: Mishap API resolves a specific D66 request into a matching table entry.
- Request: /api/generate_mishap.php?table=magic&dice1=1&dice2=1
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 14.76 ms
- Checks:
  - All assertions passed.

## mishap-api-invalid-dice

- Description: Mishap API rejects out-of-range dice values with a 400 error.
- Request: /api/generate_mishap.php?table=magic&dice1=0&dice2=9
- Result: PASS
- Expected HTTP: 400
- Actual HTTP: 400
- Duration: 2.78 ms
- Checks:
  - All assertions passed.

## critical-injury-valid-d66

- Description: Critical injury API resolves a slash D66 request into the expected injury shape.
- Request: /api/critical_injury.php?category=slash&dice1=2&dice2=3
- Result: PASS
- Expected HTTP: 200
- Actual HTTP: 200
- Duration: 12.49 ms
- Checks:
  - All assertions passed.

## critical-injury-invalid-dice

- Description: Critical injury API rejects invalid dice values with a 400 error.
- Request: /api/critical_injury.php?category=slash&dice1=0&dice2=7
- Result: PASS
- Expected HTTP: 400
- Actual HTTP: 400
- Duration: 20.33 ms
- Checks:
  - All assertions passed.

## playwright-ui-shared-session

- Description: Playwright creates a shared browser session and uses it for a critical injury UI smoke check.
- Request: node tests/playwright/run_ui_smoke.mjs --base-url="http://127.0.0.1:8000" --session-file="tests/playwright/.session/shared-session.json"
- Result: PASS
- Expected HTTP: 0
- Actual HTTP: 0
- Duration: 2812.28 ms
- Checks:
  - All assertions passed.

