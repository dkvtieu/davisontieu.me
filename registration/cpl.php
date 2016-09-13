<?php
    require_once('../lib/pop/pop.php');
    require_once('../cas.php');

    // aaahh, so crude, so few fucks given
    $acl = array("He", "Iouchtchenko", "Lai", "Williamson", "Wong");

    if (!in_array($uw_user['sn'], $acl)) {
        header('HTTP/1.0 401 Unauthorized');
        exit();
    }

    $q = Pop::obj('Query', 'Registrant');
    $date_data = $q->aggregate_by('date');

    echo "Date,ID,Name,Email,Newsletter\n";
    foreach($date_data as $date => $people) {
        foreach($people as $person) {
            echo $person->date . ',' . $person->id . ',' . $person->name . ',' . $person->email . ',' . $person->newsletter . "\n";
        }
    }

    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-type: text/x-csv");
    header("Content-Disposition: attachment; filename=dates.csv");