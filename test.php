<?php include ('template.php'); ?>

<h1>The 10-metre test</h1>
<p>
    Existing members enjoy a free certified scoring for the 18-metre target. Once you pass, you can shoot at the 18-metre targets. 
    <br />Rules:
</p>
<ol style="display:block;max-width:80%;text-align:left;">
    <li>Shoot the 10-metre targets.</li>
    <li>With or without fancy bows, we score you the same way.</li>
    <li>Pick your favourite equipment - you cannot swap bows and/or arrows during the competition!</li>
    <li>10 rounds per competition. There will be one practice round before the first scoring round.</li>
    <li>Score per arrow ranges from 1 to 10. There are also M (<b>M</b>iss, 0 pts) to X (bullseye, 10 pts)</li>
    <li>If an arrow hits a target's boundary lines (i.e. the line between where you would score 4 and 5), the higher score is counted.</li>
    <li>3 arrows per round. If you shoot more than 3, the lowest-scored 3 will be counted for the round.</li>
    <li>If an arrow bounces off the target, but made a dent on the target, the score of the dent will be counted. Do not shoot another arrow - rule 7 still applies.</li>
    <li>If an arrow bounces off the target, but did not make a dent on the target, 0 will be counted for that arrow. Do not shoot another arrow - rule 7 still applies.</li>
    <li>Touching arrows on the target, yours or otherwise, without permission will result in 0 points for your round.</li>
    <li>Tempering with other competitor's private equipment will result in disqualification.</li>
    <li>Violation of range regular safety rules will also result in disqualification.</li>
</ol>

<?php
    $content = ob_get_contents (); ob_end_clean ();
    page_out (array ('content'=>$content));
?>
