<?php
    /**
     * Site-wide template functions
     */

    function month($name=false) {
        if ($name) {
            return date("F");
        }
        return date("n");
    }

    function year() {
        return date("Y");
    }

    // template function
    function term() {
        switch (month()) {
        case 1:
        case 2:
        case 3:
        case 4:
            return "Winter";
            break;
        case 5:
        case 6:
        case 7:
        case 8:
            return "Spring";
            break;
        default:
            return "Fall";
        }
    }

    /**
     * Prints news divs
     * @param string $type
     * @param string $msg
     */
    function news($type='good', $title='', $msg='') {
        $buffer = "<div class='$type news'>";

        if ($title !== '') {
            $buffer .= "<h3>$title</h3>";
        }

        if ($msg !== '') {
            $msg = nl2br($msg);
            $buffer .= "<div>$msg</div>";
        }

        $buffer .= "</div>";

        return $buffer;
    }

    function good_news($title='Good news', $msg='') {
        return news('good', $title, $msg);
    }

    function bad_news($title='Bad news', $msg='') {
        return news('bad', $title, $msg);
    }