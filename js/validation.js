if (window.location.href.includes('signup.php')) {
  const validation = new JustValidate('#signup');
  validation
    .addField('#fullName', [
      {
        rule: 'required',
      },
    ])
    .addField('#email', [
      {
        rule: 'required',
      },
      {
        rule: 'email',
      },
      {
        validator: (value) => () => {
          // USE AJAX
          return fetch('validate-email.php?email=' + encodeURIComponent(value))
            .then((res) => {
              return res.json();
            })
            .then((json) => {
              return json.vrij;
            });
        },
        errorMessage:
          'someone already has an account at our site with this email',
      },
    ])
    .addField('#zipcode', [
      {
        rule: 'required',
      },
      {
        rule: 'number',
      },
      {
        rule: 'minNumber',
        value: 1000,
      },
      {
        rule: 'maxNumber',
        value: 10000,
      },
    ])
    .addField('#lookingFor', [
      {
        rule: 'required',
      },
    ])
    .addField('#password', [
      {
        rule: 'required',
      },
      {
        rule: 'password',
      },
    ])
    .addField('#passwordConfirmation', [
      {
        validator: (value, fields) => {
          return value === fields['#password'].elem.value;
        },
        errorMessage: 'Both passwords should be matching.',
      },
    ])
    .onSuccess((event) => {
      mForm = document.getElementById('signup').submit();
    });
}
if (window.location.href.includes('login.php')) {
  const validation = new JustValidate('#login');
  validation
    .addField('#email', [
      {
        rule: 'required',
      },
      {
        rule: 'email',
      },
    ])
    .addField('#password', [
      {
        rule: 'required',
      },
    ])
    .onSuccess((event) => {
      mForm = document.getElementById('login').submit();
    });
}
if (window.location.href.includes('ads.php')) {
  const validation = new JustValidate('#formAdvanced');
  validation
    .addField('#minAge', [
      {
        validator: (value, fields) => {
          maxAge = parseInt($('#maxAge').val());
          return parseInt(value) <= maxAge;
        },
        errorMessage: `Fix: Shoule be less than Max Age`,
      },
    ])
    .onSuccess((event) => {
      breed = $('#breed').val();
      gender = $('#gender').val();
      minAge = $('#minAge').val();
      maxAge = $('#maxAge').val();
      size = $('#size').val();
      color = $('#color').val();
      healthcare = $('#healthcare').val();
      // alert(
      //   `${breed} - ${gender} - ${minAge} - ${maxAge} - ${size} - ${color} - ${healthcare}`
      // );
      fetch(
        'validate-pet-search.php?breed=' +
          encodeURIComponent(breed) +
          '&gender=' +
          encodeURIComponent(gender) +
          '&minAge=' +
          encodeURIComponent(minAge) +
          '&maxAge=' +
          encodeURIComponent(maxAge) +
          '&size=' +
          encodeURIComponent(size) +
          '&color=' +
          encodeURIComponent(color) +
          '&healthcare=' +
          encodeURIComponent(healthcare)
      )
        .then((res) => {
          return res.text();
        })
        .then((text) => {
          alert(text);
          $('.individual-ad').hide();
          if (text.startsWith('<div class="individual-ad')) {
            $('#filteredPets').html(text);
          } else {
            $('#filteredPets').html(
              "<p class='bg-light text-center'>No results were found.</p>"
            );
          }
        });
    });
}
