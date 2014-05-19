<?php

// Create array to hold list of todo items
$items = array();

// List array items formatted for CLI
function list_items($list){
    $result = "";
    foreach ($list as $key => $value){
        $result .= "[" . ($key + 1) ."] $value\n";
    }
    return $result;
}

// Get STDIN, strip whitespace and newlines,
// and convert to uppercase if $upper is true
function get_input($upper = false){

    // Return filtered STDIN input
    $result = trim(fgets(STDIN));
    return $upper ? strtoupper($result) : $result;
}

function sort_menu($items){

    echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered: ';
    $input = get_input(TRUE);

    switch($input){
        case 'A':
            sort($items);
            break;
        case 'Z':
            rsort($items);
            break;
        case 'O':
            ksort($items);
            break;
        case 'R':
            krsort($items);
            break;
    }

    return $items;
}

// The loop!
do {
    // Echo the list produced by the function
    echo list_items($items);

    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ort items, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);

    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = get_input();
    } elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = get_input();
        // Remove from array
        unset($items[$key - 1]);
    } elseif ($input == 'S'){
        $items = sort_menu($items);
    }
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);



// Return string of list items separated by newlines.
    // Should be listed [KEY] Value like this:
    // [1] TODO item 1
    // [2] TODO item 2 - blah
    // DO NOT USE ECHO, USE RETURN
    // loop through through the list for foreach
    // foreach($list as key => $value)