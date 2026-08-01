import path from 'node:path';
import { createSharedSession, defaultSessionFile, parseArgs } from './session.mjs';

const options = parseArgs(process.argv.slice(2));
const baseUrl = (options['base-url'] ?? 'http://127.0.0.1:8000').replace(/\/$/, '');
const sessionFile = options['session-file']
  ? path.resolve(options['session-file'])
  : defaultSessionFile;

try {
  const result = await createSharedSession({ baseUrl, sessionFile });
  process.stdout.write(`${JSON.stringify(result)}\n`);
} catch (error) {
  process.stderr.write(`${error instanceof Error ? error.stack ?? error.message : String(error)}\n`);
  process.exit(1);
}