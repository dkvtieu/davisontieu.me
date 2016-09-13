// Find and parse the calendar to highlight the current day.
// @0
(function () {
    var months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November',
            'December'
        ],
        now = new Date(),
        calTitle = months[now.getMonth()] + ' ' + now.getFullYear(),
        dayNum = now.getDate(),

        // Find the calendar.
        calDays,
        cals = document.getElementsByClassName('calendar'),
        cal,
        i;

    for (i = 0; i < cals.length; i++) {
        var headings = cals[i].getElementsByTagName('th');

        for (var j = 0; j < headings.length; j++) {
            if (calTitle == headings[j].innerHTML) {
                cal = cals[i];
                break;
            }
        }

        if (cal) {
            break;
        }
    }

    if (!cal) {
        // Can't find the calendar for this month.
        return;
    }

    // Find the day within the calendar.
    calDays = cal.getElementsByTagName('td');

    for (i = 0; i < calDays.length; i++) {
        if (dayNum == calDays[i].innerHTML) {
            calDays[i].className += ' today';
            return;
        }
    }
})();