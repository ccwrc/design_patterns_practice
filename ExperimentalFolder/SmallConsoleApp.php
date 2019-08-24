<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * Small PHP app launched from the console.
 * Running the script from the current folder type in console (PHP interpreter required): php SmallConsoleApp.php
 * @link https://4programmers.net/PHP/Aplikacje_konsolowe_w_PHP convert app to executable version
 * @link https://developer.github.com/v3/git/refs/ API github docs
 */

// getting parameters from command line
$optionsFromCommandline = getopt('', ['service::']);
$service = $optionsFromCommandline['service'] ?? 'github';

function getLineFromStandardInput(): string
{
    $handle = fopen ('php://stdin','r');
    $line = htmlentities(trim(fgets($handle)), ENT_QUOTES, 'UTF-8');
    fclose($handle);

    return $line;
}

echo 'Enter owner name: ';
$lineOwner = getLineFromStandardInput();

echo 'Enter repository name: ';
$lineRepository = getLineFromStandardInput();

echo 'Enter branch name: ';
$lineBranch = getLineFromStandardInput();
// end (getting parameters from command line)

$options = [
    'http' => [
        'method' => 'GET',
        'header' => [
            'User-Agent: PHP'
        ]
    ]
];

$context = stream_context_create($options);
$content = file_get_contents("https://api.github.com/repos/ccwrc/road_rage/git/refs/heads/master", false, $context);
$decoded = json_decode($content);
echo 'Last SHA is: ' . $decoded->object->sha . "\n";
