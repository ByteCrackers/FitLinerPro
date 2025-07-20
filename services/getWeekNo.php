<?php 

function getWeekOfMonth($date = null) {
    // If no date is provided, use the current date
    $date = $date ? strtotime($date) : time();

    // Get the first day of the current month
    $startOfMonth = strtotime(date('Y-m-01', $date));

    // Get the day of the week the month starts on (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
    $startDayOfWeek = date('w', $startOfMonth); // 'w' gives the numeric day of the week

    // Get the current day of the month
    $dayOfMonth = date('j', $date); // 'j' gives the day of the month without leading zeros

    // Calculate the adjusted day number, including the day of the week offset
    $adjustedDate = $dayOfMonth + $startDayOfWeek;

    // Calculate the week number by dividing by 7 and rounding up
    $weekNumber = ceil($adjustedDate / 7);

    // Limit the week number to a maximum of 4
    return min($weekNumber, 4);
}

?>