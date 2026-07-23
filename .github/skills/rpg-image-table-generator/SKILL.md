---
name: rpg-image-table-generator
description: "Use when the user provides an image, screenshot, or photo of a table and wants it turned into a generator in this project. This skill is specific to the Solomons Ledger RPG Generators codebase and should be used to extract table structure, then implement or update the matching PHP include, API endpoint, frontend wiring, and styling in the existing project pattern."
user-invocable: true
---

# RPG Image Table Generator

Use this skill when a table appears in an image and the goal is to turn it into a working generator inside this project.

## Project Scope

This repository uses a simple PHP-first generator architecture:

- Generator logic lives in `includes/*.php`.
- JSON endpoints live in `api/*.php`.
- The main UI is assembled in `index.php`.
- Frontend behavior lives in `assets/js/*.js`.
- Section-specific styles live in `assets/css/*.css`.

When the image matches an existing generator family, extend the current pattern instead of creating a separate flow.

## What To Do

1. Read the image carefully and identify the table structure.
2. Extract rows, headers, dice ranges, notes, exceptions, and visual grouping.
3. Convert the content into structured data that fits this project.
4. Map the table to the right implementation area:
   - new generator data inside `includes/`
   - a new or updated JSON endpoint in `api/`
   - UI controls or result cards in `index.php`
   - fetch/render logic in `assets/js/`
   - layout or spacing tweaks in `assets/css/`
5. Keep the implementation consistent with the existing generators already in the repo.
6. Validate the result against the source image and the app output.

## Implementation Rules

- Prefer reusing the current generator pipeline over inventing a new one.
- Preserve the table's meaning first; match visual layout only when it affects comprehension.
- Expand dice ranges into discrete lookup entries when that fits the project pattern.
- If the image is unclear, make the smallest reasonable assumption and call out the ambiguity.
- Keep changes focused on the touched generator family.

## Good Outcome

A successful use of this skill usually produces:

- a parsed table structure from the image
- the generator code or data module created in the repo
- any required API or UI integration
- a short validation note confirming the table matches the image
