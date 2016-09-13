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

    echo "<table border='1'>";
    echo "<tr><td>Name</td><td>Email</td></tr>";
    $last_date = 0;
    foreach($date_data as $date => $people) {
        foreach($people as $person) {
            if ($person->date === $last_date) {
                $i++;
            } else {
                $i = 1;
                $last_date = $person->date;
            }
            if ($person->newsletter) {
                echo "<tr><td>{$person->name}</td><td>{$person->email}</td></tr>";
            }
        }
    }
    echo "</table>";