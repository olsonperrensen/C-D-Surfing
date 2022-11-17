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
