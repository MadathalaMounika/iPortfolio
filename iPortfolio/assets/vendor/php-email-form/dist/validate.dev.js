"use strict";

function php_email_form_submit(thisForm, action, formData) {
  fetch(action, {
    method: 'POST',
    body: formData,
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error("".concat(response.status, " ").concat(response.statusText, " ").concat(response.url));
    }
  }).then(function (data) {
    thisForm.querySelector('.loading').classList.remove('d-block');

    if (data.success) {
      thisForm.querySelector('.sent-message').classList.add('d-block');
      thisForm.reset();
    } else {
      throw new Error(data.error ? data.error : 'Form submission failed and no error message returned from: ' + action);
    }
  })["catch"](function (error) {
    displayError(thisForm, error);
  });
}

function displayError(thisForm, error) {
  thisForm.querySelector('.loading').classList.remove('d-block');
  thisForm.querySelector('.error-message').innerHTML = error.message;
  thisForm.querySelector('.error-message').classList.add('d-block');
}
//# sourceMappingURL=validate.dev.js.map
