<?php
    include('site_includes.php');
    include('lib/pop/pop.php');

    $news = array(
        /* bad_news(
            "2016-05-07 Session is Cancelled",
            "The session has been cancelled due to scheduling conflicts."
        )
        , good_news(
            "Good news",
            "Half price membership starts June 17! &dollar;15!"
        )
        , good_news(
            "Halloween Fun Shoot 2014",
            "There will be a fun shoot happening <b>October 27th</b>! \nAll existing members welcome.\nThere will be no new member registrations / tryouts on the same day."
        )
        , good_news(
            "EOT Tournament, Winter 2016",
            "There will be an <a href='https://docs.google.com/document/d/1LrMy-QjuWsFx1bxO43EY--Aw8DSjJVZCqW-MY_Qu77I'>end-of-term competition</a> on <b>March 21st</b>, 6pm - 10pm! \nAll existing members welcome.\nThere is a participant limit of 24, so <a href='http://goo.gl/forms/YYSGvqIih8'>sign up</a> fast!"
        )
        , good_news(
            "Inter-University Archery Tournament (IUAT) 2014, Qualification Round",
            "There will be a qualification round happening <b>March 1st</b> for the IUAT this year! <br /> All existing members welcome to compete.<br /> Those wishing to compete must join us <b>March 1st at precisely 7:30pm</b>. <br /> Top 12 participants will be representing our university on <b>March 8th</b>."
        )
        , good_news(
            "Inter-University Archery Tournament (IUAT) 2015, Qualification Round",
            "There will be a qualification round happening <b>Feb 23rd</b> for the IUAT this year! <br /> All existing members welcome to compete.<br /> Those wishing to compete must join us <b>February 23rd at precisely 7:30pm</b>. <br /> Top 8 participants will be representing our university on <b>March 14th</b>.<br />See a rangemaster for more information."
        )*/
    );
?>

<p class="center">
    <strong>
        Welcome to the University of Waterloo Archery Club!
    </strong>
</p>

<p>
    Archery is a fun sport. It is easy to learn, but takes patience to master.<br />
    Free (mandatory) instruction is offered to new members. All members have access to club equipment.<br />
    More experienced archers can practice their skills in a relaxed or competitive setting.
    <br />
</p>

<?php echo join('', $news); ?>
<h1>
    &nbsp;<br />
    <?php echo term() . ' ' . year(); ?> Information
</h1>
<table>
    <tr>
        <th>Start date(s)</th>
        <td>
            <b>2016-05-02</b> (returning members)
            <br />
            <b>2016-05-09</b> (new members)
            <br />(You can also join any time during the term)
            <!-- br />(Missed the registration? You can also join after reading week.) -->
            <!-- br /><b>New members only</b>: <a href="registration/" class="btn">Reserve / Register</a -->
            <br />New members must complete a safety course on their first day.
            <!-- br />New members who joined can only attend the archery session of the same weekday the following week.
            <br / -->
            <br /><b>Returning members</b>: no registration required. No cap.
        </td>
    </tr>
    <tr>
        <th>End date</th>
        <td>
            <!-- b>TBA</b -->
            <b>2016-07-24</b>
        </td>
    </tr>
    <tr>
        <th>Location</th>
        <td>PAC, <b style="color:#9CF;">Blue South</b>, top floor</td>
    </tr>
    <tr>
        <th>Schedule</th>
        <td>
            <!-- b>TBA</b -->
            Mon: 19:30 - 22:30<br />
            Wed: 20:30 - 22:30<br />
            Sat: 10:00 - 13:00 (Advanced archers only)<br />
            Sun: 10:00 - 13:00<br />
        </td>
    </tr>
    <tr>
        <th>Open dates</th>
        <td>
            <table class="calendar month">
                <tr>
                    <th colspan="7">June <?php echo year(); ?></th>
                </tr>
                <tr>
                    <th>S</th>
                    <th>M</th>
                    <th>T</th>
                    <th>W</th>
                    <th>T</th>
                    <th>F</th>
                    <th>S</th>
                </tr>
                <tr class="week" rowspan="7">
                    <td class="day"></td>
                    <td class="day"></td>
                    <td class="day"></td>
                    <td class="day day-1 active">1</td>
                    <td class="day day-2">2</td>
                    <td class="day day-3">3</td>
                    <td class="day day-4 active">4</td>
                </tr>
                <tr class="week" rowspan="7">
                    <td class="day day-5 active">5</td>
                    <td class="day day-6 active">6</td>
                    <td class="day day-7">7</td>
                    <td class="day day-8">8</td>
                    <td class="day day-9">9</td>
                    <td class="day day-10">10</td>
                    <td class="day day-11">11</td>
                </tr>
                <tr class="week" rowspan="7">
                    <td class="day day-12">12</td>
                    <td class="day day-13">13</td>
                    <td class="day day-14">14</td>
                    <td class="day day-15">15</td>
                    <td class="day day-16">16</td>
                    <td class="day day-17">17</td>
                    <td class="day day-18">18</td>
                </tr>
                <tr class="week" rowspan="7">
                    <td class="day day-19">19</td>
                    <td class="day day-20">20</td>
                    <td class="day day-21">21</td>
                    <td class="day day-22">22</td>
                    <td class="day day-23">23</td>
                    <td class="day day-24">24</td>
                    <td class="day day-25 active">25</td>
                </tr>
                <tr class="week" rowspan="7">
                    <td class="day day-26 active">26</td>
                    <td class="day day-27 active">27</td>
                    <td class="day day-28">28</td>
                    <td class="day day-29 active">29</td>
                    <td class="day day-30">30</td>
                    <td class="day"></td>
                    <td class="day"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <th>Membership</th>
        <td>
            &dollar;20 / term<br />
            &dollar;15 / term (mid-term special)<br />
            &dollar;5 / night (<a href="faq.php#Fees">restrictions apply</a>)<br />
        </td>
    </tr>
    <tr>
        <th>Things to bring</th>
        <td>Please check <a href="faq.php#Bring">our FAQ</a> for a list.</td>
    </tr>
    <tr>
        <th>More information</th>
        <td>
            <p>Please check <a href="https://nike.uwaterloo.ca/Course/Search.aspx">here</a> before coming.</p>
            <p>Our archery course material can be found <a href="docs/UW%20Archery%20Rules.pdf">here</a>.</p>
        </td>
    </tr>
</table>

<script src="static/js/calendar_highlight_today.js"></script>
