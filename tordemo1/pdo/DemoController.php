<?php
require './includes.php';

$connProfile = 'main';

$repoUser = new RepoMyGuests($connProfile);

$guests = $repoUser->selectGuest();

//foreach ($guests)
print_r($guests);





