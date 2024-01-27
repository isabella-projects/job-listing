<?php

/**
 * Get the base path 
 * 
 * @param string $path
 * @return string
 */
function basePath($path = '')
{
    return __DIR__ . "/{$path}";
}

/**
 * Load a view
 * @param string $name
 * @return void
 */
function loadView($name, $data = [])
{
    $viewPath = basePath("views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name} not found!'";
    }
}

/**
 * Load a partial
 * @param string $name
 * @return void
 */
function loadPartial($name)
{
    $partialPath = basePath("views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "View '{$name} not found!'";
    }
}

/**
 * Inspect a value(s)
 * 
 * @param mixed $value
 * @return void
 */
function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

/**
 * Inspect a value(s) and die
 * 
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

/**
 * Format the tags with uppercase
 *
 * @param mixed $tags
 * @return string
 */
function formatTags($tags)
{
    $tagArray = explode(',', $tags);
    $capitalizedTags = array_map('ucwords', $tagArray);
    return implode(', ', $capitalizedTags);
}

/**
 * Format salary with currency
 *
 * @param string $salary
 * @param string $currency
 * @return void
 */
function formatSalary($salary, $currency = 'EUR')
{
    $formattedSalary = number_format($salary, 0, '.', ',');

    $currencySymbols = [
        'EUR' => '€',
        'USD' => '$',
        'GBP' => '£',
        'BGR' => 'лв.',
    ];

    if ($currency === 'BGR') {
        return $formattedSalary . ' ' . $currencySymbols[$currency];
    } else {
        return $currencySymbols[$currency] . '' . $formattedSalary;
    }
}
