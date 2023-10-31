const isLeapYear = (year) => {
  return (
    (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
    (year % 100 === 0 && year % 400 === 0)
  );
};

const getFebDays = (year) => {
  return isLeapYear(year) ? 29 : 28;
};

let calendar = document.querySelector('.calendar');
const month_names = [
  'មករា',
  'កុម្ភៈ',
  'មិនា',
  'មេសា',
  'ឧសភា',
  'មិថុនា',
  'កក្កដា',
  'សីហា',
  'កញ្ញា',
  'តុលា',
  'វិច្ឆិកា',
  'ធ្នូ'
];

let month_picker = document.querySelector('#month-picker');
const dayTextFormate = document.querySelector('.day-text-formate');
const timeFormate = document.querySelector('.time-formate');
const dateFormate = document.querySelector('.date-formate');

month_picker.onclick = () => {
  month_list.classList.remove('hideonce');
  month_list.classList.remove('hide');
  month_list.classList.add('show');
  dayTextFormate.classList.remove('showtime');
  dayTextFormate.classList.add('hidetime');
  timeFormate.classList.remove('showtime');
  timeFormate.classList.add('hideTime');
  dateFormate.classList.remove('showtime');
  dateFormate.classList.add('hideTime');
};

const generateCalendar = (month, year) => {
  let calendar_days = document.querySelector('.calendar-days');
  calendar_days.innerHTML = '';
  let calendar_header_year = document.querySelector('#year');
  let days_of_month = [
      31,
      getFebDays(year),
      31,
      30,
      31,
      30,
      31,
      31,
      30,
      31,
      30,
      31,
  ];

  let currentDate = new Date();

  month_picker.innerHTML = month_names[month];

  calendar_header_year.innerHTML = year;

  let first_day = new Date(year, month);

  for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {

      let day = document.createElement('div');

      if (i >= first_day.getDay()) {
          day.innerHTML = i - first_day.getDay() + 1;

          if (i - first_day.getDay() + 1 === currentDate.getDate() &&
              year === currentDate.getFullYear() &&
              month === currentDate.getMonth()
          ) {
              day.classList.add('current-date');
          }
      }
      calendar_days.appendChild(day);
  }
};

let month_list = calendar.querySelector('.month-list');
month_names.forEach((e, index) => {
  let month = document.createElement('div');
  month.innerHTML = `<div>${e}</div>`;

  month_list.append(month);
  month.onclick = () => {
      currentMonth.value = index;
      generateCalendar(currentMonth.value, currentYear.value);
      month_list.classList.replace('show', 'hide');
      dayTextFormate.classList.remove('hideTime');
      dayTextFormate.classList.add('showtime');
      timeFormate.classList.remove('hideTime');
      timeFormate.classList.add('showtime');
      dateFormate.classList.remove('hideTime');
      dateFormate.classList.add('showtime');
  };
});

(function () {
  month_list.classList.add('hideonce');
})();

document.querySelector('#pre-year').onclick = () => {
  --currentYear.value;
  generateCalendar(currentMonth.value, currentYear.value);
};
document.querySelector('#next-year').onclick = () => {
  ++currentYear.value;
  generateCalendar(currentMonth.value, currentYear.value);
};

let currentDate = new Date();
let currentMonth = { value: currentDate.getMonth() };
let currentYear = { value: currentDate.getFullYear() };
generateCalendar(currentMonth.value, currentYear.value);

// =============== Start Show Correct Date Time ===============
const todayShowDate = document.querySelector('.date-formate');
const khmerDayNames = [
  'អាទិត្យ',
  'ច័ន្ទ',
  'អង្គារ',
  'ពុធ',
  'ព្រហស្បត្តិ៍',
  'សុក្រ',
  'សៅរ៍'
];

const currshowDate = new Date();
const day = khmerDayNames[currshowDate.getDay()];
const month = month_names[currshowDate.getMonth()];

const formattedDate = `${day}, ${month} ${currshowDate.getDate()}, ${currshowDate.getFullYear()}`;

todayShowDate.textContent = formattedDate;
// =============== Stop Show Correct Date Time ===============


// =============== Start Show Correct Time ===============
const todayShowTime = document.querySelector('.time-formate');

setInterval(() => {
  const timer = new Date();
  const option = {
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric',
  };
  const formateTimer = new Intl.DateTimeFormat('km', option).format(timer);
  let time = `${`${timer.getHours()}`.padStart(
      2,
      '0'
  )}:${`${timer.getMinutes()}`.padStart(
      2,
      '0'
  )}: ${`${timer.getSeconds()}`.padStart(2, '0')}`;
  todayShowTime.textContent = formateTimer;
}, 1000);
// ===============Stop Show Correct Time ===============




// ===============Start Modal popup create account ===============

  $('#create-new-acc').on('click', () => {
    $('#Modal-Popup-Create-New-Account').modal('show');
  });


  // Start choose image
  $('#chooseImage').on('change', function () {
    var input = this;
    var image = $('#showImageChoose');

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        image.attr('src', e.target.result).css({
          'border-radius': '50%',
          'width': '150px',
          'height': '150px'
        });
      };

      reader.readAsDataURL(input.files[0]);
    }
  });

  $('#SelectImage').on('click', function () {
    $('#chooseImage').click();
  });
  // End choose image


  // Start show and hide password
  $('#hide-show-password').on('click', () => {
    var passwordInput = $('#admin-password');
    var toggleButton = $('#hide-show-password');

    if (passwordInput.attr('type') === 'password') {
        passwordInput.attr('type', 'text');
        toggleButton.html('<i class="fa-solid fa-eye-slash"></i>'); // Change to hide icon
    } else {
        passwordInput.attr('type', 'password');
        toggleButton.html('<i class="fa-solid fa-eye"></i>'); // Change to show icon
    }
  });
  // End show and hide password

  // Function to check if all input fields are filled and passwords match
  function checkInputs() {
    var adminName = $('#admin-name').val();
    var adminPassword = $('#admin-password').val();
    var adminPasswordConfirm = $('#admin-password-confirm').val();

    // Check if all fields are filled and passwords match
    var isValid = adminName !== '' && adminPassword !== '' && adminPassword === adminPasswordConfirm;

    // Enable/disable the submit button based on validation result
    $('#save-info').prop('disabled', !isValid);
  }

  // Event handler for input changes
  $('input').on('input', checkInputs);

// ===============Stop Modal popup create account ===============



// ===============Start Modal popup Update info ===============
$('#edit-info').on('click', () => {
  $('#Modal-Popup-Update-Info').modal('show');
});

// Start choose image
$('#chooseImage-new').on('change', function () {
  var input = this;
  var image = $('#showImageChoose-new');

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      image.attr('src', e.target.result).css({
        'border-radius': '50%',
        'width': '150px',
        'height': '150px'
      });
    };

    reader.readAsDataURL(input.files[0]);
  }
});

$('#SelectImage-new').on('click', function () {
  $('#chooseImage-new').click();
});
// End choose image


// Start show and hide password
$('#hide-show-password-new').on('click', () => {
  var passwordInput = $('#admin-password-new');
  var toggleButton = $('#hide-show-password-new');

  if (passwordInput.attr('type') === 'password') {
      passwordInput.attr('type', 'text');
      toggleButton.html('<i class="fa-solid fa-eye-slash"></i>'); // Change to hide icon
  } else {
      passwordInput.attr('type', 'password');
      toggleButton.html('<i class="fa-solid fa-eye"></i>'); // Change to show icon
  }
});
// End show and hide password

// Function to check if all input fields are filled and passwords match
function checkInputsNew() {
  var adminNameNew = $('#admin-name-new').val();
  var adminPasswordNew = $('#admin-password-new').val();
  var adminPasswordConfirmNew = $('#admin-password-new-confirm').val();

  // Check if all fields are filled and passwords match
  var isValidNew = adminNameNew !== '' && adminPasswordNew !== '' && adminPasswordNew === adminPasswordConfirmNew;

  // Enable/disable the submit button based on validation result
  $('#save-info-new').prop('disabled', !isValidNew);
}

// Event handler for input changes
$('input').on('input', checkInputsNew);

// ===============End Modal popup Update info ===============



// ===============Start Logout ===============
  $('#logout').on('click', function () {
    const message = confirm('តើ​អ្នក​ប្រាកដ​ជា​ចង់​ចេញ?');

    if(message){
      window.location.href ='../index.php';
    }

  });
// ===============Start Logout ===============
