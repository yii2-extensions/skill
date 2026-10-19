<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$manifest = json_decode(file_get_contents($root . '/composer.json'), true, flags: JSON_THROW_ON_ERROR);
if ($manifest['name'] !== 'yii2-extensions/skill' || ($manifest['extra']['skills']['source'] ?? null) !== 'skills') {
    throw new RuntimeException('Invalid package identity or skill source.');
}
$skills = glob($root . '/skills/*/SKILL.md');
if (count($skills) !== 20) {
    throw new RuntimeException('Expected all twenty framework skill bundles.');
}
$files = 0;
foreach ($skills as $file) {
    $name = basename(dirname($file));
    $text = file_get_contents($file);
    if (!preg_match('/^name:\s*' . preg_quote($name, '/') . '$/m', $text) || !preg_match('/^description:\s*\S.+$/m', $text)) {
        throw new RuntimeException('Invalid skill frontmatter: ' . $name);
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(dirname($file), FilesystemIterator::SKIP_DOTS));
    foreach ($iterator as $resource) {
        if ($resource->isLink() || !$resource->isFile()) {
            throw new RuntimeException('Skill resources must be ordinary files.');
        }
        if (preg_match('~/(internal|vendor|node_modules|fixtures|results)/~', $resource->getPathname())) {
            throw new RuntimeException('Private or installed resources must not ship.');
        }
        ++$files;
    }
}
echo 'Validated ' . count($skills) . ' skills and ' . $files . " portable resource files.\n";
