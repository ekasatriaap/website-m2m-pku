/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

const ajaxMaster = (form, url, method = "POST") => {
  loaderPage(true);

  return new Promise((resolve, reject) => {
    $.ajax({
      url: url,
      type: method,
      data: new FormData(form),
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          iziToast.success({
            title: "Sukses..",
            message: response.message,
            position: "topRight",
          })
        } else {
          iziToast.warning({
            title: "Oops..",
            message: response.message,
            position: "topRight",
          })
        }

        resolve(response);
      },
      error: function (err) {
        handleError(err);
        reject(err);
      },
    })
      .done(function (z) {
        return false;
      })
      .always(function () {
        loaderPage(false);
      });
  });
};

const loaderPage = (load = false) => {
  if (load === true) {
    $(
      '<div loader_body ><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>'
    )
      .appendTo(document.body)
      .hide()
      .fadeIn(200);
  } else {
    $("[loader_body]").fadeOut(200, function () {
      $(this).remove();
    });
  }
};

const setInvalidFeedBack = (error, form, nameArrayKeyCustom = false) => {
  let errs = error.responseJSON?.errors;
  let splitName = "."; //
  let formInputan;

  cleanInvalidFeedBack(form);
  if (errs) {
    for (let [inputName, errorMessage] of Object.entries(errs)) {
      //jika name menggunakan key yang custom  semisal nama[0], nama[2], nama[5]
      if (nameArrayKeyCustom) {
        let splitArr = inputName.split(splitName);
        inputName = "";
        for (let index = 0; index < splitArr.length; index++) {
          if (index == 0) inputName += splitArr[index];
          else inputName += `[${splitArr[index]}]`;
        }

        formInputan = $(`[name^="${inputName}"]`);
      } else {
        // jika key tedapat ".", maka name berbentuk array, semisal: nama[]
        let keyInputan = 0;
        if (inputName.includes(splitName)) {
          let splitArr = inputName.split(splitName);
          keyInputan = splitArr[splitArr.length - 1];
          splitArr.splice(splitArr.indexOf(keyInputan), 1); // remove last Value
          inputName = splitArr[0];
        }

        formInputan = $(`[name^="${inputName}"]`);

        if (formInputan.length > 1) {
          formInputan = $(formInputan[keyInputan]); //reinit
        }
      }

      if (formInputan.hasClass("image-input")) {
        formInputan
          .closest(".image-input-pembungkus")
          .find(".image-input-messsage")
          .append(
            `<div class="text-danger invalid-message">${errorMessage}</div>`
          );
      } else {
        formInputan
          .addClass("is-invalid")
          .parent()
          .append(
            `<div class="invalid-feedback invalid-message">${errorMessage}</div>`
          );
      }
    }
  }

  return errs;
};

const cleanInvalidFeedBack = (form) => {
  $(form).find("input,select").removeClass("is-invalid");
  $(form).find(".invalid-message").remove();
};

const handleError = (err) => {
  if (err.status == 422) {
    toastr.error("Periksa kembali form yang bertanda merah!", err.status);
    return false;
  }

  if (err.status == 404) {
    toastr.error("Data tidak ditemukan!", err.status);
    return false;
  }

  if (err.responseJSON.message) {
    toastr.error(err.responseJSON.message, err.status);
    return false;
  }
};