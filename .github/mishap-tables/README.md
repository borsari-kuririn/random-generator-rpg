# Mishap Table Specs

This folder stores local Markdown specs for mishap tables.

These files are intended to be consumed by the `RPG Image Table Generator` agent when implementing or extending generators in code.

## Required Format

Each file must include YAML frontmatter and a `## Rows` section.

Frontmatter keys:
- `id`: table key suggestion in `snake_case`
- `label`: display label
- `source`: citation or origin
- `dice`: dice notation (`D66`, `D6`, etc.)
- `version`: integer spec version

Rows table columns (exact order):
- `dice`
- `result`
- `effect`
- `severity`
- `notes`

## Example Filename

- `make-camp.md`
- `sea-travel.md`
- `mystic-rituals.md`

## Consumption Notes

The implementation agent should:
1. Read the Markdown spec.
2. Map each row to `includes/mishap_generator.php` row objects.
3. Register the table in `rg_get_mishap_tables()`.
4. Validate generated output via `api/generate_mishap.php`.
