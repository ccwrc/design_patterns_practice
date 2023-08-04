<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * Small PHP app launched from the console.
 * Running the script from the current folder, type in console (PHP interpreter required): php SmallConsoleApp.php
 * Optional service selection from the command line (default: github): php SmallConsoleApp.php --service=service_name
 *
 * @link https://4programmers.net/PHP/Aplikacje_konsolowe_w_PHP convert app to executable version
 * @link https://developer.github.com/v3/git/refs/ API github docs
 * @link https://www.kerneldev.com/2017/12/16/how-to-build-a-command-line-application-using-php/ How to
 * build an app using the symfony component.
 */

//> Getting parameters from command line.
$defaultService = 'github';
$optionsFromCommandLine = getopt('', ['service::']);
$service = $optionsFromCommandLine['service'] ?? $defaultService;

echo 'Enter owner name: ';
$lineOwner = getLineFromStandardInput();

echo 'Enter repository name: ';
$lineRepository = getLineFromStandardInput();

echo 'Enter branch name: ';
$lineBranch = getLineFromStandardInput();
//< Getting parameters from command line.

//> Main app core
echo match ($service) {
    $defaultService => getLastShaFromGithub($lineOwner, $lineRepository, $lineBranch),
    default => "\n Unknown service '" . $service . "'\n",
};
//< Main app core.

//> More or less useful functions.
function getLineFromStandardInput(): string
{
    $handle = fopen('php://stdin', 'r');
    $line = htmlentities(trim(fgets($handle)), ENT_QUOTES, 'UTF-8');
    fclose($handle);

    return $line;
}

/**
 * @return string (SHA or error message)
 */
function getLastShaFromGithub(string $owner, string $repository, string $branch): string
{
    $options = [
        'http' => [
            'method' => 'GET',
            'header' => [
                'User-Agent: PHP'
            ],
            'ignore_errors' => true
        ]
    ];

    try {
        $context = stream_context_create($options);
        $content = file_get_contents("https://api.github.com/repos/" . $owner . "/" . $repository
            . "/git/refs/heads/" . $branch, false, $context);
    } catch (\Throwable $throwable) {
        echo 'Error: ' . $throwable->getMessage() . "\n";
        die;
    }

    if (false === $content) {
        return "\n You entered the wrong parameters, check them and try again. \n";
    }

    try {
        $decodedContent = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
        $result = $decodedContent->object->sha ?? $decodedContent->message ?? 'Error';
    } catch (\Throwable $throwable) {
        echo 'Error: ' . $throwable->getMessage() . "\n";
        die;
    }

    return $result . "\n";
}
//< More or less useful functions.
