<?php

declare(strict_types=1);

/**
 * Lightweight acceptance runner for the Solomons Ledger RPG Generators app.
 *
 * Usage:
 *   php tests/acceptance/run_acceptance.php --base-url=http://127.0.0.1:8000 --output=reports/acceptance/latest.md
 */

final class AcceptanceResult
{
    public function __construct(
        public readonly string $id,
        public readonly string $description,
        public readonly bool $passed,
        public readonly string $request,
        public readonly int $expectedStatus,
        public readonly int $actualStatus,
        public readonly array $messages,
        public readonly float $durationMs
    ) {
    }
}

$options = getopt('', ['base-url::', 'output::']);

$baseUrl = isset($options['base-url']) && is_string($options['base-url'])
    ? rtrim($options['base-url'], '/')
    : 'http://127.0.0.1:8000';

$outputPath = isset($options['output']) && is_string($options['output'])
    ? $options['output']
    : 'reports/acceptance/latest.md';

$playwrightSessionFile = 'tests/playwright/.session/shared-session.json';

$scenarios = [
    [
        'id' => 'home-page-loads',
        'description' => 'Home page renders the generator shell and all major panel hooks.',
        'path' => '/',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $body = $response['body'];

            return assertContains($body, 'Solomons Ledger Generators', $messages)
                && assertContains($body, 'data-menu-target="npc"', $messages)
                && assertContains($body, 'data-menu-target="critical-injury"', $messages)
                && assertContains($body, 'data-generator-panel="mishap"', $messages);
        },
    ],
    [
        'id' => 'npc-api-default',
        'description' => 'NPC API returns a valid character payload with required fields.',
        'path' => '/api/generate_npc.php',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            return assertOkPayload($json, 'npc', $messages)
                && assertHasKeys($json['npc'], ['name', 'culture', 'race', 'class', 'role', 'level', 'hook'], 'npc', $messages)
                && assertTrue(is_numeric($json['npc']['level']), 'NPC level must be numeric.', $messages);
        },
    ],
    [
        'id' => 'loot-api-pocket',
        'description' => 'Loot API returns a bundle with coins, hook, and at least one item.',
        'path' => '/api/generate_loot.php?source=pocket',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            if (!assertOkPayload($json, 'loot', $messages)) {
                return false;
            }

            $loot = $json['loot'];
            $item = is_array($loot['items'] ?? null) && isset($loot['items'][0]) && is_array($loot['items'][0])
                ? $loot['items'][0]
                : null;

            return assertHasKeys($loot, ['source', 'rarity', 'coins', 'items', 'hook'], 'loot', $messages)
                && assertTrue(is_array($loot['items']) && count($loot['items']) > 0, 'Loot items must be a non-empty array.', $messages)
                && assertTrue($item !== null, 'First loot item must exist.', $messages)
                && assertHasKeys($item ?? [], ['name', 'type', 'value', 'detail', 'condition'], 'loot.items[0]', $messages);
        },
    ],
    [
        'id' => 'place-api-default',
        'description' => 'Place API returns a place card with core descriptive fields.',
        'path' => '/api/generate_place.php',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            return assertOkPayload($json, 'place', $messages)
                && assertHasKeys($json['place'], ['name', 'type', 'state', 'occupants', 'main_danger', 'notable_find', 'adventure_hook'], 'place', $messages);
        },
    ],
    [
        'id' => 'romance-api-default',
        'description' => 'Romance API returns a pair with relationship details and partner data.',
        'path' => '/api/generate_romance.php',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            if (!assertOkPayload($json, 'romance', $messages)) {
                return false;
            }

            $romance = $json['romance'];
            $partner = is_array($romance['partners'] ?? null) && isset($romance['partners'][0]) && is_array($romance['partners'][0])
                ? $romance['partners'][0]
                : null;

            return assertHasKeys($romance, ['title', 'tone', 'drama', 'history', 'relationship_stage', 'partners'], 'romance', $messages)
                && assertTrue(is_array($romance['partners']) && count($romance['partners']) === 2, 'Romance payload must contain two partners.', $messages)
                && assertHasKeys($partner ?? [], ['name', 'gender', 'preference', 'style'], 'romance.partners[0]', $messages);
        },
    ],
    [
        'id' => 'company-api-default',
        'description' => 'Company API returns a company sheet with the expected stats and hook.',
        'path' => '/api/generate_company.php',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            return assertOkPayload($json, 'company', $messages)
                && assertHasKeys($json['company'], ['name', 'kind', 'size', 'stability', 'structure', 'wealth', 'hook'], 'company', $messages);
        },
    ],
    [
        'id' => 'encounter-api-default',
        'description' => 'Encounter API returns a creature encounter with combat-facing fields.',
        'path' => '/api/generate_encounter.php',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            return assertOkPayload($json, 'encounter', $messages)
                && assertHasKeys($json['encounter'], ['name', 'category', 'count', 'movement', 'weapon', 'damage_type', 'hook'], 'encounter', $messages);
        },
    ],
    [
        'id' => 'scarcity-api-default',
        'description' => 'Scarcity API returns market metadata and at least one priced item.',
        'path' => '/api/generate_scarcity.php',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            if (!assertOkPayload($json, 'scarcity', $messages)) {
                return false;
            }

            $scarcity = $json['scarcity'];
            $item = is_array($scarcity['items'] ?? null) && isset($scarcity['items'][0]) && is_array($scarcity['items'][0])
                ? $scarcity['items'][0]
                : null;

            return assertHasKeys($scarcity, ['event_name', 'event_description', 'scarcity_level', 'average_change', 'items'], 'scarcity', $messages)
                && assertTrue(is_array($scarcity['items']) && count($scarcity['items']) > 0, 'Scarcity items must be a non-empty array.', $messages)
                && assertHasKeys($item ?? [], ['name', 'category', 'adjusted_price', 'change_percent', 'reason'], 'scarcity.items[0]', $messages);
        },
    ],
    [
        'id' => 'mishap-api-valid-d66',
        'description' => 'Mishap API resolves a specific D66 request into a matching table entry.',
        'path' => '/api/generate_mishap.php?table=magic&dice1=1&dice2=1',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            if (!assertOkPayload($json, 'mishap', $messages)) {
                return false;
            }

            return assertHasKeys($json['mishap'], ['table', 'table_label', 'dice1', 'dice2', 'dice_roll', 'entry'], 'mishap', $messages)
                && assertTrue(($json['mishap']['dice_roll'] ?? null) === 11, 'Expected mishap dice_roll to equal 11.', $messages)
                && assertHasKeys(is_array($json['mishap']['entry'] ?? null) ? $json['mishap']['entry'] : [], ['dice', 'result', 'effect', 'severity'], 'mishap.entry', $messages);
        },
    ],
    [
        'id' => 'mishap-api-invalid-dice',
        'description' => 'Mishap API rejects out-of-range dice values with a 400 error.',
        'path' => '/api/generate_mishap.php?table=magic&dice1=0&dice2=9',
        'expected_status' => 400,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            return assertErrorPayload($json, $messages)
                && assertContains((string)($json['error'] ?? ''), 'between 1 and 6', $messages);
        },
    ],
    [
        'id' => 'critical-injury-valid-d66',
        'description' => 'Critical injury API resolves a slash D66 request into the expected injury shape.',
        'path' => '/api/critical_injury.php?category=slash&dice1=2&dice2=3',
        'expected_status' => 200,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            if (!assertOkPayload($json, 'injury', $messages)) {
                return false;
            }

            return assertHasKeys($json, ['category', 'dice_roll', 'injury'], 'critical_injury', $messages)
                && assertTrue(($json['dice_roll'] ?? null) === 23, 'Expected critical injury dice_roll to equal 23.', $messages)
                && assertHasKeys(is_array($json['injury'] ?? null) ? $json['injury'] : [], ['injury', 'lethal', 'effects', 'time_limit', 'healing_time'], 'critical_injury.injury', $messages);
        },
    ],
    [
        'id' => 'critical-injury-invalid-dice',
        'description' => 'Critical injury API rejects invalid dice values with a 400 error.',
        'path' => '/api/critical_injury.php?category=slash&dice1=0&dice2=7',
        'expected_status' => 400,
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            return assertErrorPayload($json, $messages)
                && assertContains((string)($json['error'] ?? ''), 'Invalid parameters', $messages);
        },
    ],
    [
        'id' => 'playwright-ui-shared-session',
        'description' => 'Playwright creates a shared browser session and uses it for a critical injury UI smoke check.',
        'request' => sprintf('node tests/playwright/run_ui_smoke.mjs --base-url=%s --session-file=%s', escapeshellarg($baseUrl), escapeshellarg($playwrightSessionFile)),
        'expected_status' => 0,
        'runner' => 'command',
        'validator' => static function (array $response, array &$messages): bool {
            $json = decodeJsonBody($response['body'], $messages);
            if ($json === null) {
                return false;
            }

            if (!assertTrue(($json['ok'] ?? null) === true, 'Playwright smoke result must set ok=true.', $messages)) {
                return false;
            }

            if (!isset($json['checks']) || !is_array($json['checks'])) {
                $messages[] = 'Playwright smoke result must include a checks array.';
                return false;
            }

            $allPassed = true;
            foreach ($json['checks'] as $check) {
                $name = is_array($check) && isset($check['name']) ? (string)$check['name'] : 'unnamed-check';
                $passed = is_array($check) && (($check['passed'] ?? false) === true);
                $detail = is_array($check) && isset($check['detail']) ? (string)$check['detail'] : '';
                if (!$passed) {
                    $messages[] = sprintf('Playwright check failed: %s (%s)', $name, $detail);
                    $allPassed = false;
                }
            }

            return $allPassed;
        },
    ],
];

$results = [];
foreach ($scenarios as $scenario) {
    $results[] = runScenario($baseUrl, $scenario);
}

$outputDirectory = dirname($outputPath);
if (!is_dir($outputDirectory)) {
    mkdir($outputDirectory, 0777, true);
}

$report = renderMarkdownReport($baseUrl, $results);
file_put_contents($outputPath, $report);

$failedCount = count(array_filter($results, static fn (AcceptanceResult $result): bool => !$result->passed));
$passedCount = count($results) - $failedCount;

fwrite(STDOUT, sprintf("Acceptance report written to %s\n", $outputPath));
fwrite(STDOUT, sprintf("Passed: %d, Failed: %d\n", $passedCount, $failedCount));

exit($failedCount === 0 ? 0 : 1);

function runScenario(string $baseUrl, array $scenario): AcceptanceResult
{
    if (($scenario['runner'] ?? 'http') === 'command') {
        return runCommandScenario($scenario);
    }

    $messages = [];
    $startedAt = microtime(true);
    $response = request($baseUrl . $scenario['path']);
    $durationMs = round((microtime(true) - $startedAt) * 1000, 2);

    $statusMatches = $response['status'] === $scenario['expected_status'];
    if (!$statusMatches) {
        $messages[] = sprintf('Expected HTTP %d but received HTTP %d.', $scenario['expected_status'], $response['status']);
    }

    $validator = $scenario['validator'];
    $payloadValid = $validator($response, $messages);

    return new AcceptanceResult(
        $scenario['id'],
        $scenario['description'],
        $statusMatches && $payloadValid,
        $scenario['path'],
        $scenario['expected_status'],
        $response['status'],
        $messages,
        $durationMs
    );
}

function runCommandScenario(array $scenario): AcceptanceResult
{
    $messages = [];
    $startedAt = microtime(true);
    $response = runCommand((string)$scenario['request']);
    $durationMs = round((microtime(true) - $startedAt) * 1000, 2);

    $statusMatches = $response['status'] === $scenario['expected_status'];
    if (!$statusMatches) {
        $messages[] = sprintf('Expected exit code %d but received %d.', $scenario['expected_status'], $response['status']);
    }

    $validator = $scenario['validator'];
    $payloadValid = $validator($response, $messages);

    return new AcceptanceResult(
        $scenario['id'],
        $scenario['description'],
        $statusMatches && $payloadValid,
        $scenario['request'],
        $scenario['expected_status'],
        $response['status'],
        $messages,
        $durationMs
    );
}

function request(string $url): array
{
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'ignore_errors' => true,
            'header' => "Accept: application/json\r\nUser-Agent: acceptance-runner\r\n",
            'timeout' => 10,
        ],
    ]);

    $body = @file_get_contents($url, false, $context);
    $headers = $http_response_header ?? [];
    $status = parseStatusCode($headers);

    if ($body === false) {
        $body = '';
    }

    return [
        'status' => $status,
        'headers' => $headers,
        'body' => $body,
    ];
}

function runCommand(string $command): array
{
    $descriptorSpec = [
        0 => ['pipe', 'r'],
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ];

    $process = proc_open($command, $descriptorSpec, $pipes, dirname(__DIR__, 2));

    if (!is_resource($process)) {
        return [
            'status' => 1,
            'headers' => [],
            'body' => json_encode(['ok' => false, 'checks' => [['name' => 'command-launch', 'passed' => false, 'detail' => 'Could not start command.']]]),
        ];
    }

    fclose($pipes[0]);
    $stdout = stream_get_contents($pipes[1]);
    $stderr = stream_get_contents($pipes[2]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    $exitCode = proc_close($process);

    $body = trim($stdout);
    if ($body === '') {
        $body = json_encode([
            'ok' => false,
            'checks' => [[
                'name' => 'command-output',
                'passed' => false,
                'detail' => trim($stderr) !== '' ? trim($stderr) : 'Command produced no stdout.',
            ]],
        ]);
    }

    return [
        'status' => $exitCode,
        'headers' => [],
        'body' => $body,
    ];
}

function parseStatusCode(array $headers): int
{
    if ($headers === []) {
        return 0;
    }

    if (preg_match('/HTTP\/\S+\s+(\d{3})/', $headers[0], $matches) === 1) {
        return (int)$matches[1];
    }

    return 0;
}

function decodeJsonBody(string $body, array &$messages): ?array
{
    $decoded = json_decode($body, true);

    if (!is_array($decoded)) {
        $messages[] = 'Response body is not valid JSON.';
        return null;
    }

    return $decoded;
}

function assertOkPayload(array $payload, string $key, array &$messages): bool
{
    return assertTrue(($payload['ok'] ?? null) === true, 'Top-level ok flag must be true.', $messages)
        && assertTrue(array_key_exists($key, $payload), sprintf('Top-level payload key "%s" must exist.', $key), $messages)
        && assertTrue(is_array($payload[$key]), sprintf('Top-level payload key "%s" must be an object/array.', $key), $messages);
}

function assertErrorPayload(array $payload, array &$messages): bool
{
    return assertTrue(($payload['ok'] ?? null) === false, 'Top-level ok flag must be false.', $messages)
        && assertHasKeys($payload, ['error'], 'error payload', $messages);
}

function assertHasKeys(array $payload, array $keys, string $label, array &$messages): bool
{
    $passed = true;

    foreach ($keys as $key) {
        if (!array_key_exists($key, $payload)) {
            $messages[] = sprintf('%s is missing key "%s".', $label, $key);
            $passed = false;
            continue;
        }

        $value = $payload[$key];
        if ($value === null || $value === '') {
            $messages[] = sprintf('%s key "%s" must not be empty.', $label, $key);
            $passed = false;
        }
    }

    return $passed;
}

function assertContains(string $haystack, string $needle, array &$messages): bool
{
    $passed = str_contains($haystack, $needle);

    if (!$passed) {
        $messages[] = sprintf('Expected response to contain "%s".', $needle);
    }

    return $passed;
}

function assertTrue(bool $condition, string $message, array &$messages): bool
{
    if (!$condition) {
        $messages[] = $message;
    }

    return $condition;
}

function renderMarkdownReport(string $baseUrl, array $results): string
{
    $generatedAt = gmdate('Y-m-d H:i:s') . ' UTC';
    $passedCount = count(array_filter($results, static fn (AcceptanceResult $result): bool => $result->passed));
    $failedCount = count($results) - $passedCount;
    $lines = [
        '# Acceptance Test Report',
        '',
        sprintf('- Generated: %s', $generatedAt),
        sprintf('- Base URL: %s', $baseUrl),
        sprintf('- Total scenarios: %d', count($results)),
        sprintf('- Passed: %d', $passedCount),
        sprintf('- Failed: %d', $failedCount),
        '',
        '| Scenario | Result | HTTP | Duration |',
        '| --- | --- | --- | --- |',
    ];

    foreach ($results as $result) {
        $lines[] = sprintf(
            '| %s | %s | %d/%d | %.2f ms |',
            $result->id,
            $result->passed ? 'PASS' : 'FAIL',
            $result->actualStatus,
            $result->expectedStatus,
            $result->durationMs
        );
    }

    foreach ($results as $result) {
        $lines[] = '';
        $lines[] = sprintf('## %s', $result->id);
        $lines[] = '';
        $lines[] = sprintf('- Description: %s', $result->description);
        $lines[] = sprintf('- Request: %s', $result->request);
        $lines[] = sprintf('- Result: %s', $result->passed ? 'PASS' : 'FAIL');
        $lines[] = sprintf('- Expected HTTP: %d', $result->expectedStatus);
        $lines[] = sprintf('- Actual HTTP: %d', $result->actualStatus);
        $lines[] = sprintf('- Duration: %.2f ms', $result->durationMs);
        $lines[] = '- Checks:';

        if ($result->messages === []) {
            $lines[] = '  - All assertions passed.';
            continue;
        }

        foreach ($result->messages as $message) {
            $lines[] = sprintf('  - %s', $message);
        }
    }

    $lines[] = '';

    return implode(PHP_EOL, $lines) . PHP_EOL;
}