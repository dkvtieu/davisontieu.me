<?php
    require_once('../lib/pop/pop.php');
    require_once('../cas.php');

    const REG_CAP = 25;

    function weekday($yyyymmdd) {
        // http://stackoverflow.com/a/11402488
        return date('l', strtotime($yyyymmdd));
    }

    function cmp($a, $b) {
        // bullshit
        return (count($a) - count($b));
    }

    if (sizeof ((array) $uw_user) <= 0) {
        Pop::debug("Could not communicate with the CAS server.");
        exit();
    }

    // all dates (will filter later)
    // TODO: if the date is in the past, remove it
    $reg_dates = array(
        '2015-09-14',
        '2015-09-16',
        '2015-09-21',
        '2015-09-23'
    );

    $now = new DateTime();

    $form_error = '';

    $q = Pop::obj('Query', 'Registrant');
    $date_data = $q->aggregate_by('date');

    // remove past dates.
    foreach ($reg_dates as $reg_date) {
        if (new DateTime($reg_date) < $now) {
            $reg_dates = array_diff($reg_dates, array($reg_date));
        }
    }


    // remove full dates.
    foreach ($date_data as $k => $date) {
        if (sizeof($date) >= REG_CAP) {
            $reg_dates = array_diff($reg_dates, array($k));
        }
    }

    // pre-select least occupied date.
    // !! won't pre-select until all dates have at least one participant.
    uasort($date_data, 'cmp');
    // $freest_date = array_keys($date_data)[0];
    // $freest_date = $date_data[0];
    $free_dates = array_keys($date_data);
    $freest_date = $free_dates[0];  // retarded php
    if ($freest_date === null) {
        $freest_date = $reg_dates[0];
    }

    if (isset($uw_user) & !isset($_POST['submit'])) {
        // when hardly possible, pre-fill some fields.
        if (isset($uw_user['name'])) {
            $_POST['name'] = $uw_user['name'];
        }
        if (isset($uw_user['mail'])) { // mail, not email
            $_POST['email'] = $uw_user['mail'];
        }
        if (isset($uw_user['phone'])) {
            $_POST['phone'] = $uw_user['phone'];
        }
    } else if (!isset($uw_user)) {
        $uw_user = array();
    }

    if (isset($_POST) && isset($_POST['submit']) && isset($_POST['id'])) {
        $registrants_on_day = $q->filter('date ==', $_POST['date'])->count();
        if ($registrants_on_day < REG_CAP) {
            $info = array(
                'id' => (int)$_POST['id'],
                'name' => substr($_POST['name'], 0, 60),
                'email' => substr($_POST['email'], 0, 60),
                'date' => substr($_POST['date'], 0,
                                 10), // 2013-00-00 = 10 chars
                'newsletter' => substr($_POST['newsletter'], 0, 10)
            );
            if ($info['id'] > 20000000 && $info['id'] < 40000000) {
                $matches = array();
                preg_match('/^\w+\s+\w+/', $info['name'],
                           $matches); // at least one space
                if (sizeof($matches) > 0) {
                    $matches = array();
                    if (in_array($info['date'], $reg_dates)) {
                        $new_guy = new Registrant();
                        $new_guy->id = $info['id'];
                        $new_guy->name = $info['name'];
                        $new_guy->email = $info['email'];
                        $new_guy->date = $info['date'];
                        $new_guy->newsletter = $info['newsletter'];

                        $new_guy->put();
                        $registrants_on_day++;

                        try {
                            // mail('lpppppl@gmail.com', // , s38wong@gmail.com',
                            mail('lpppppl@gmail.com, s38wong@gmail.com',
                                 'New registrant',
                                 $new_guy->to_string() .
                                 "\n\n" .
                                 var_export($uw_user, true) .
                                 "\n\n" .
                                 "Keep this email in case CSClub goes down." .
                                 "\n" .
                                 "Current count for that day: $registrants_on_day");
                        } catch (Exception $e) {
                            // nothing
                            mail('lpppppl@gmail.com',
                                 'Registration system error', $e->getMessage());
                            $form_error = $e->getMessage();
                        }
                    } else {
                        $form_error = 'Please don\'t mess with our system.';
                    }
                } else {
                    $form_error = 'Invalid name.';
                }
            } else {
                $form_error = 'Invalid ID. If you are an alumnus or staff member from the 1990s, come talk to us.';
            }
        } else {
            $form_error = 'No more spots for that day. Pick another date.';
        }
    }
?>
<!-- we are actually in a div here, not in head. -->
<script src="../static/js/jquery-1.8.2.min.js"></script>
<script src="../static/js/bootstrap.js"></script>
<style type="text/css">
    fieldset {
        border: none;
    }
    .control-group {
        padding: 10px 0;
    }
    .control-label {
        font-weight: bold;
    }
    .control-group input {
        margin-left: -5px;
        padding: 7px;
    }
</style>

<form method="post" class="inner_frame form-horizontal">
    <h1>New Member Registration</h1>
    <?php if (sizeof($reg_dates) >= 1) { ?>
        <fieldset>
            <p>New members only.
                <span class="text-warning">
                    Returning members need not apply.
                </span>
            </p>
            <?php if (isset($_POST['id'])) { ?>
                <?php if ($form_error) { ?>
                    <p class="bad news">
                        <p class="label label-important">Error</p>
                        <?php echo $form_error; ?>
                    </p>
                <?php } else { ?>
                    <p class="good news">
                        <p class="label label-success">Success</p>
                        Looks good. You're down for a spot. See you on the day.
                    </p>
                <?php } ?>
            <?php } else { ?>
                <p>
                    This form can only be submitted once.
                    Email us in case of a mistake.
                </p>
            <?php } ?>
            <hr>
            <div class="control-group">
                <label class="control-label">UWID number:</label>
                <div class="controls">
                    <input name="id" type="number" required="required"
                            placeholder="e.g. 23456789"
                            max="35000000"
                            min="20000000"
                            value="<?php if (isset($_POST['id'])) {echo $_POST['id']; } ?>" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Name on your UWID:</label>
                <div class="controls">
                    <input name="name" type="text" required="required"
                            maxlength="60"
                            placeholder="(we check)"
                            value="<?php if (isset($_POST['name'])) {echo $_POST['name']; } ?>" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Orientation day:</label>
                <?php foreach ($reg_dates as $date) { ?>
                    <div class="radio controls">
                        <input type="radio" name="date" value="<?php echo $date; ?>"
                            <?php
                                if ($_POST['date']) {
                                    if ($_POST['date'] === $date) {
                                        ?>
                                            checked="checked"
                                        <?php
                                    }
                                } else if ($freest_date === $date) {
                                    ?>
                                        checked="checked"
                            <?php } ?>
                        >
                        <?php echo $date; ?> (<?php echo weekday($date); ?>)
                    </div>
                <?php } ?>
                <div class="controls">
                    <span class="help-inline">
                        &nbsp; <br />
                        Once chosen, you must attend on your selected day. <br>
                        You can only attend this same weekday on the following week.
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email:</label>
                <div class="controls">
                    <input name="email" type="email" required="required"
                            maxlength="60"
                            value="<?php if (isset($_POST['email'])) {echo $_POST['email']; } ?>" />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="checkbox" name="newsletter"
                        <?php if ($_POST['newsletter']) { ?>
                            checked="checked"
                        <?php } ?>
                    />
                    Get cancellation alerts and event emails this term
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Notice:</label>
                <div class="controls">
                    <ul>
                        <li>First come, first served.</li>
                        <li>Late attendance means forfeiture.</li>
                        <li><b>Bring (25 dollars) and your ID (WatCard). </b><br>
                            Failure to do so also means forfeiture.</li>
                        <li>There are no "free try-outs."</li>
                    </ul>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input name="submit" type="submit" class="btn" />
                </div>
            </div>
        </fieldset>
    <?php } else { ?>
        <p>
            We're currently full! Please schedule an appointment with 
            <a href="/exec.php">us</a> later this term.
        </p>
    <?php } ?>
</form>