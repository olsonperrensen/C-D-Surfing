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
  const validation = new JustValidate('#petsearch');
  validation.addField('#petinput', [
    {
      validator: (value) => () => {
        // USE AJAX
        return fetch(
          'validate-pet-search.php?q=' + encodeURIComponent(value)
        ).then((res) => {
          document.write(res.json());
          return res.json();
        });
      },
      errorMessage: 'We do not have breeds like this yet. Come back soon.',
    },
  ]);
}
