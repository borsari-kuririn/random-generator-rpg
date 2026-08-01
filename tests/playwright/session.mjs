import fs from 'node:fs/promises';
import path from 'node:path';
import { chromium } from 'playwright';

export const defaultSessionFile = path.resolve('tests/playwright/.session/shared-session.json');

export function parseArgs(argv) {
  const options = {};

  for (const argument of argv) {
    if (!argument.startsWith('--')) {
      continue;
    }

    const [rawKey, rawValue] = argument.slice(2).split('=');
    options[rawKey] = rawValue ?? 'true';
  }

  return options;
}

export async function ensureDirectory(filePath) {
  await fs.mkdir(path.dirname(filePath), { recursive: true });
}

export async function createSharedSession({ baseUrl, sessionFile = defaultSessionFile }) {
  await ensureDirectory(sessionFile);

  const browser = await chromium.launch({ headless: true });

  try {
    const context = await browser.newContext();
    const page = await context.newPage();
    await page.goto(baseUrl, { waitUntil: 'domcontentloaded' });
    await page.waitForSelector('[data-generator-panel="home"]');
    await page.evaluate(() => {
      localStorage.setItem('playwright.sharedSession', 'random-generator-rpg');
      localStorage.setItem('playwright.sessionCreatedAt', new Date().toISOString());
    });
    await context.storageState({ path: sessionFile });

    return {
      ok: true,
      baseUrl,
      sessionFile,
      message: 'Shared Playwright session created successfully.'
    };
  } finally {
    await browser.close();
  }
}