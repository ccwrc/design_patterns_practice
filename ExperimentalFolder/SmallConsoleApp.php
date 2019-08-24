<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * Small PHP app launched from the console.
 * Running the script from the current folder type in console (PHP interpreter required): php SmallConsoleApp.php
 * Optional service selection from the command line (default: github): php SmallConsoleApp.php --service=service_name
 *
 * @link https://4programmers.net/PHP/Aplikacje_konsolowe_w_PHP convert app to executable version
 * @link https://developer.github.com/v3/git/refs/ API github docs
 */

// getting parameters from command line
$optionsFromCommandLine = getopt('', ['service::']);
$service = $optionsFromCommandLine['service'] ?? 'github';

echo 'Enter owner name: ';
$lineOwner = getLineFromStandardInput();

echo 'Enter repository name: ';
$lineRepository = getLineFromStandardInput();

echo 'Enter branch name: ';
$lineBranch = getLineFromStandardInput();
// end (getting parameters from command line)

switch ($service) {
    case 'github':
        echo getLastShaFromGithub($lineOwner, $lineRepository, $lineBranch);
        break;
    default:
        echo 'Unknown service \'' . $service . '\'';
}

// more or less useful functions
function getLineFromStandardInput(): string
{
    $handle = fopen('php://stdin', 'r');
    $line = htmlentities(trim(fgets($handle)), ENT_QUOTES, 'UTF-8');
    fclose($handle);

    return $line;
}

function getLastShaFromGithub(string $owner, string $repository, string $branch): string
{
    try {
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => [
                    'User-Agent: PHP'
                ]
            ]
        ];

        $context = stream_context_create($options);
        // TODO: erease @
        $content = @file_get_contents("https://api.github.com/repos/" . $owner . "/" . $repository . "/git/refs/heads/" . $branch . "", false, $context);
        $decoded = json_decode($content);
        $message = $decoded->object->sha . "\n";
    } catch (\Throwable $throwable) {
        $message = "Something more or less went wrong: \n" . $throwable->getMessage() . "\n";
    }

    return $message;
}
