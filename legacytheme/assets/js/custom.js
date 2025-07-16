document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener("wpcf7invalid", function (event) {
    setTimeout(() => {
      const errorMessages = document.querySelectorAll(".wpcf7-not-valid-tip");

      console.log(errorMessages);
      errorMessages.forEach((message) => {
        console.log("in foreach");

        if (message.textContent.includes("Введено невірний контрольний код.")) {
          console.log("in check");

          message.textContent = "The entered CAPTCHA code is incorrect."; // Заменяем на английский
        }
      });
    }, 0);
  });

  const captchaField = document.querySelector('input[name="captcha-778"]'); // Замените на имя вашего поля CAPTCHA
  if (captchaField) {
    captchaField.setAttribute("placeholder", "Enter CAPTCHA code"); // Ваш placeholder
  }
});
