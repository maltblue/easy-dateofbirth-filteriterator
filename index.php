<?php

// Or, using an anonymous function as of PHP 5.3.0
spl_autoload_register(function ($class) {
    include dirname(__FILE__) . '/library/' . str_replace('_', '/', $class) . '.php';
});

$dataList = array(
    array(
        'name' => 'John Citizen',
        'email' => 'johnc@citizen.org',
        'dob' => '1960-01-21',
        'location' => 'Brisbane, Qld, Australia',
        'active' => true
    ),
    array(
        'name' => 'Jane Citizen',
        'email' => 'janec@citizen.org',
        'dob' => '1970-10-21',
        'location' => 'Townsville, Qld, Australia',
        'active' => false
    ),
    array(
        'name' => 'Peter Walker',
        'email' => 'peterw@citizen.org',
        'dob' => '1975-04-21',
        'location' => 'Sydney, Nsw, Australia',
        'active' => false
    ),
    array(
        'name' => 'Wendy Hardworker',
        'email' => 'wendyh@citizen.org',
        'dob' => '1990-11-21',
        'location' => 'Melbourne, Vic, Australia',
        'active' => true
    ),
);

$dataIterator = new MaltBlue_Iterator_Filter_DateOfBirth(
    new ArrayIterator($dataList)
);
$dataIterator->setYearOfBirth("1976");

foreach ($dataIterator as $userDetail) {
    printf(
        "Name: %s | Email: %s | Date Of Birth: %s | Location: %s<br />",
        $userDetail["name"],
        $userDetail["email"],
        $userDetail["dob"],
        $userDetail["location"]
    );
}