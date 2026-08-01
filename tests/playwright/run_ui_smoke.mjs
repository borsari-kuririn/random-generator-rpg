import path from 'node:path';
import { chromium } from 'playwright';
import { createSharedSession, defaultSessionFile, parseArgs } from './session.mjs';

const options = parseArgs(process.argv.slice(2));
const baseUrl = (options['base-url'] ?? 'http://127.0.0.1:8000').replace(/\/$/, '');
const sessionFile = options['session-file']
  ? path.resolve(options['session-file'])
  : defaultSessionFile;

const checks = [];

function record(name, passed, detail) {
  checks.push({ name, passed, detail });
}

try {
  await createSharedSession({ baseUrl, sessionFile });

  const browser = await chromium.launch({ headless: true });

  try {
    const context = await browser.newContext({ storageState: sessionFile });
    const page = await context.newPage();
    await page.goto(baseUrl, { waitUntil: 'domcontentloaded' });
    await page.waitForSelector('[data-generator-panel="home"]');

    const sharedMarker = await page.evaluate(() => localStorage.getItem('playwright.sharedSession'));
    const sharedSessionRestored = sharedMarker === 'random-generator-rpg';
    record('shared-session-restored', sharedSessionRestored, `localStorage marker: ${sharedMarker ?? 'null'}`);

    const homeVisible = await page.locator('[data-generator-panel="home"]').evaluate((element) => !element.classList.contains('is-hidden'));
    record('home-panel-visible', homeVisible, 'Home panel should be visible on first load.');

    await page.click('[data-menu-target="critical-injury"]');
    await page.waitForFunction(() => {
      const panel = document.querySelector('[data-generator-panel="critical-injury"]');
      return panel instanceof HTMLElement && !panel.classList.contains('is-hidden');
    });

    const criticalMenuPressed = await page.getAttribute('[data-menu-target="critical-injury"]', 'aria-pressed');
    record('critical-menu-active', criticalMenuPressed === 'true', `aria-pressed=${criticalMenuPressed}`);

    await page.selectOption('[data-critical-injury-category]', 'slash');
    await page.fill('[data-critical-injury-dice1]', '2');
    await page.fill('[data-critical-injury-dice2]', '3');
    await page.click('[data-critical-injury-lookup-button]');
    await page.waitForFunction(() => {
      const field = document.querySelector('[data-critical-injury-field="injury"]');
      return field instanceof HTMLElement && field.textContent !== '-';
    });

    const injuryName = (await page.textContent('[data-critical-injury-field="injury"]'))?.trim() ?? '';
    const diceRoll = (await page.textContent('[data-critical-injury-field="dice_roll"]'))?.trim() ?? '';
    record('critical-injury-rendered', injuryName.length > 0 && injuryName !== '-', `injury=${injuryName}`);
    record('critical-injury-dice-roll', diceRoll === '23', `dice_roll=${diceRoll}`);

    const ok = checks.every((check) => check.passed);
    process.stdout.write(`${JSON.stringify({ ok, baseUrl, sessionFile, checks })}\n`);
    process.exit(ok ? 0 : 1);
  } finally {
    await browser.close();
  }
} catch (error) {
  record('playwright-execution', false, error instanceof Error ? error.message : String(error));
  process.stdout.write(`${JSON.stringify({ ok: false, baseUrl, sessionFile, checks })}\n`);
  process.exit(1);
}