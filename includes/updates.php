<?php

declare(strict_types=1);

function rg_render_updates_html(string $markdownPath): string
{
    if (!is_file($markdownPath)) {
        return '<p class="updates-empty">No updates file found.</p>';
    }

    $raw = (string)file_get_contents($markdownPath);
    if ($raw === '') {
        return '<p class="updates-empty">No updates available yet.</p>';
    }

    $lines = preg_split('/\r\n|\r|\n/', $raw) ?: [];
    $html = [];
    $currentListOpen = false;

    foreach ($lines as $line) {
        $trimmed = trim($line);

        if ($trimmed === '' || str_starts_with($trimmed, '# ')) {
            continue;
        }

        if (str_starts_with($trimmed, '## ')) {
            if ($currentListOpen) {
                $html[] = '</ul>';
                $currentListOpen = false;
            }

            $dateLabel = htmlspecialchars(substr($trimmed, 3), ENT_QUOTES, 'UTF-8');
            $html[] = '<h3 class="updates-date">' . $dateLabel . '</h3>';
            continue;
        }

        if (str_starts_with($trimmed, '- ')) {
            if (!$currentListOpen) {
                $html[] = '<ul class="updates-list">';
                $currentListOpen = true;
            }

            $item = htmlspecialchars(substr($trimmed, 2), ENT_QUOTES, 'UTF-8');
            $html[] = '<li>' . $item . '</li>';
        }
    }

    if ($currentListOpen) {
        $html[] = '</ul>';
    }

    if (count($html) === 0) {
        return '<p class="updates-empty">No updates available yet.</p>';
    }

    return implode("\n", $html);
}
