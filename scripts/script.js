// Автоматическое свёртывание спойлеров
function onToggle(event) {
  if (event.target.open) {
    document.querySelectorAll(".side_panel > form > details[open]").forEach((el) => {
      // Исключаем из перебора елемент который мы только что открыли
      if (el === event.target) {
        return;
      }

      // Закрываем все остальные елементы <details>
      el.open = false;
      var radio = document.querySelector('input[type=radio]:checked');
      radio.checked = false;
    });
  }
}

// Вешаем наблюдатель на все елементы <details> внутри акордиона
document
  .querySelectorAll(".side_panel > form > details")
  .forEach((el) => el.addEventListener("toggle", onToggle));