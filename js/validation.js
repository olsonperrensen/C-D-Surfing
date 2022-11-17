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
