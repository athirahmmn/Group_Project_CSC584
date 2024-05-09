const calendar = document.querySelector('.calendar tbody');
const startDateInput = document.getElementById('start-date');
const endDateInput = document.getElementById('end-date');

function generateCalendar(date) {
  const d = new Date(date);
  d.setDate(1);

  const month = d.getMonth();
  const year = d.getFullYear();

  const firstDay = d.getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();

  calendar.innerHTML = '';

  // Create table rows
  for (let i = 0; i < Math.ceil((firstDay + daysInMonth) / 7); i++) {
    const row = document.createElement('tr');

    // Create table cells
    for (let j = 0; j < 7; j++) {
      const cell = document.createElement('td');
      const day = (i * 7) + j - firstDay + 1;

      if (day > 0 && day <= daysInMonth) {
        cell.innerText = day;
        cell.addEventListener('click', () => selectDate(cell));
      } else {
        cell.classList.add('disabled');
      }

      row.appendChild(cell);
    }

    calendar.appendChild(row);
  }
}

function selectDate(cell) {
  const selectedDate = cell.innerText;
  const startDate = startDateInput.value;
  const endDate = endDateInput.value;

  if (!startDate) {
    startDateInput.