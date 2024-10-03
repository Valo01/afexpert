function ajaxForm(obForm, link) {
    // устанавливаем функцию обработчик
    BX.bind(obForm, 'submit', BX.proxy(function(e) {
        // отменяем стандартное действие формы
        BX.PreventDefault(e);
        // очищаем вывод информации
        obForm.getElementsByClassName('error-msg')[0].innerHTML = '';
        obForm.getElementsByClassName('success-msg')[0].innerHTML = '';
        // объект для работы с Ajax
        let xhr = new XMLHttpRequest();
        // отправляем запрос к серверу 
        xhr.open('POST', link);
        // функция onload сработает, когда мы получим ответ
        xhr.onload = function() {
            // если ошибка, выводим алерт с ошибкой
            if (xhr.status != 200) {
                alert(`Ошибка ${xhr.status}: ${xhr.statusText}`);
            } else {
                // получаем ответа сервера в виде текста
                let json = JSON.parse(xhr.responseText)
                // если поля не заполнены
                if (! json.success) {
                    let errorStr = '';
                    for (let fieldKey in json.errors) {
                        errorStr += json.errors[fieldKey] + "<br>";
                    }
                    // ошибки вывести в элемент с классом error-msg
                    obForm.getElementsByClassName('error-msg')[0].innerHTML = errorStr;
                } 
                    // если сообщение отправленно
                    if ( json.success) {
                        let successStr = json.errors;
                    obForm.getElementsByClassName('success-msg')[0].innerHTML = successStr;
                    let successMsg = obForm.getElementsByClassName('success-msg')[0];
                    if (successMsg) {
                        var parentForm = successMsg.closest('form');           
                        if (parentForm) {
                            var inputsAndButton = parentForm.querySelectorAll('.modal__wrap-fields, .modal__btn-submit, .checkbox--privacy-policy');
                            inputsAndButton.forEach(function(element) {
                                element.style.display = 'none';
                            });
							var repitButton = parentForm.querySelectorAll('.modal__btn-repeat');
							repitButton.forEach(function(element) {
								element.style.display = 'grid';
							});
                        }
                    }
                }
            }
        };
        // передаем все данные из формы
        xhr.send(new FormData(obForm));
    }, obForm, link));
    }