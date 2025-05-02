
    document.addEventListener('DOMContentLoaded', function () {
    const allTimers = document.querySelectorAll('.block-limited__timer');

    if (!allTimers.length) return;

    // Show all timers
    allTimers.forEach(timer => timer.style.display = 'flex');

    function getDeadlinePST() {
    const now = new Date();
    const pstNow = new Date(now.toLocaleString("en-US", { timeZone: "America/Los_Angeles" }));
    const deadline = new Date(pstNow);
    deadline.setHours(23, 59, 59, 999);
    return deadline;
}

    function updateTimer() {
    const now = new Date();
    const pstNow = new Date(now.toLocaleString("en-US", { timeZone: "America/Los_Angeles" }));
    const deadline = getDeadlinePST();
    const diff = deadline - pstNow;

    let h = '00', m = '00', s = '00';

    if (diff > 0) {
    h = String(Math.floor(diff / (1000 * 60 * 60))).padStart(2, '0');
    m = String(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
    s = String(Math.floor((diff % (1000 * 60)) / 1000)).padStart(2, '0');
}

    // Update all blocks
    document.querySelectorAll('.timer-hours').forEach(el => el.textContent = h);
    document.querySelectorAll('.timer-minutes').forEach(el => el.textContent = m);
    document.querySelectorAll('.timer-seconds').forEach(el => el.textContent = s);

    setTimeout(updateTimer, 1000);
}

    updateTimer();
});

