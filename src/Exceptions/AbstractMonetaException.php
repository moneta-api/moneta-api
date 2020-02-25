<?php

namespace AvtoDev\MonetaApi\Exceptions;

use Throwable;

abstract class AbstractMonetaException extends \Exception
{
    protected $codes = [
        '100' => 'Сервис временно недоступен',

        '100.1' => 'Указанные данные уже существуют',

        '100.2' => 'Вы работаете с устаревшими данными',

        '100.3' => 'Ошибки в профиле данной учетной единицы:unitId',

        '100.4' => 'Ошибки в счетах данной учетной единицы: unitId',

        '100.5' => 'Ошибки в структуре данной учетной единицы:unitId',

        '200' => 'Ошибка валидации XSD схемы',

        '300.1' => 'Неверное имя пользователя и пароль',

        '300.2' => 'В доступе отказано',

        '300.3' => 'В доступе отказано',

        '300.4.1' => 'У Вас нет доступа к указанному шаблону',

        '300.4.2' => 'Доступ к заказу запрещён',

        '300.4.3' => 'Доступ к операции запрещён',

        '300.4.4' => 'Данный счет нельзя редактировать',

        '300.4.5' => 'Запрещено создавать профиль с указанным типом',

        '300.5' => 'Пользователь не найден',

        '300.6' => 'Нельзя изменять подтвержденные данные. Одно из значений,'
                   . " которое Вы пытаетесь изменить, имеет статус 'подтвержденное'",

        '400.1.1' => 'Проведение операции невозможно',

        '400.1.2' => 'Операция ожидает подтверждения',

        '400.1.3' => 'Операция в процессе обработки',

        '400.1.4' => 'Операция в обработке',

        '400.1.5' => 'Оплата отменена',

        '400.1.6' => 'Данная операция уже оплачена',

        '400.1.7' => 'Проведение операции невозможно',

        '400.1.8.1' => 'Невозможно сделать возврат так как операция не завершена',

        '400.1.8.2' => 'Невозможно сделать возврат операции. Получатель не принимает платежи',

        '400.1.8.3' => 'Невозможно сделать возврат операции',

        '400.1.8.4' => 'Невозможно сделать возврат операции',

        '400.1.9' => 'Ошибка при взаимодействии с внешней системой получателя платежа',

        '400.1.10' => 'Перечисление на заданный счёт получателя невозможно либо указана неверная сумма',

        '400.1.11' => 'Счет заблокирован',

        '400.1.12' => 'Недостаточно средств для перевода',

        '400.1.13' => 'Нельзя отменить данную операцию',

        '400.1.14' => 'Последний платежный пароль зарезервирован для'
                      . ' получения новой последовательности платежных паролей',

        '400.1.15' => 'Закончился срок действия кода протекции',

        '400.1.16' => 'Сумма в запросе не должна быть больше суммы в операции',

        '400.1.17' => 'Ошибка при взаимодействии с внешней системой плательщика',

        '400.1.18' => 'Сумма в заказе не совпадает с проверочной суммой',

        '400.1.19' => 'Операция с таким внешним идентификатором находится в обработке или выполнена.'
                      . ' Проведение еще одной операции с таким внешним идентификатором невозможно',

        '400.1.20' => 'Нет прав на проведение операции',

        '400.1.21' => 'Операция заморожена',

        '400.1.22' => 'Выставленный счет к оплате недействителен',

        '400.1.23' => 'Срок действия платежного пароля истек',

        '400.1.24' => 'Рекуррентный платеж невозможен',

        '400.1.25' => 'Повторная попытка оплаты с другим номером карты невозможна,'
                      . ' транзакция отменена, вы можете оплатить еще раз, будет создана другая транзакция',

        '400.2' => 'Операция поставлена в обработку',

        '400.2.1' => 'Операция поставлена в очередь на обработку',

        '400.2.1.1' => 'Проведение операции невозможно',

        '400.2.2' => 'Операция поставлена в очередь на обработку',

        '400.2.2.1' => 'Проведение операции невозможно',

        '400.2.3' => 'Операция поставлена в очередь на обработку',

        '400.2.3.1' => 'Проведение операции невозможно',

        '400.2.4' => 'Превышены ограничения по сумме перечислений',

        '400.2.4.1' => 'Превышены ограничения по сумме перечислений',

        '400.2.5' => 'Операция поставлена в очередь на обработку',

        '400.2.5.1' => 'Проведение операции невозможно',

        '400.2.6' => 'Превышены ограничения по сумме перечислений',

        '400.2.6.1' => 'Превышены ограничения по сумме перечислений',

        '400.2.7' => 'Операция поставлена в очередь на обработку',

        '400.2.7.1' => 'Проведение операции невозможно',

        '400.2.7.2' => 'Недопустимое назначение платежа',

        '400.2.7.3' => 'Недопустимое описание операции',

        '400.2.7.4' => 'Оплата возможна только с российских карт с поддержкой 3DSecure',

        '400.2.7.5' => 'Оплата возможна только с российских или 3DSecure карт',

        '400.2.7.6' => 'Оплата возможна только с карт с поддержкой 3DSecure',

        '400.2.7.7' => 'Данную операцию могут совершать только идентифицированные пользователи Монета.Ру.'
                       . ' Для прохождения упрощенной идентификации укажите в личном кабинете:'
                       . ' ФИО, паспортные данные, ИНН, СНИЛС, номер мобильного телефона',

        '400.2.7.8' => 'Оплата с данной карты невозможна.'
                       . ' Действует ограничение по стране, банк которой выпустил данную карту',

        '400.2.8.1' => 'Ошибка во время шифрования данных',

        '400.2.8.2' => 'Ошибка во время расшифровки данных',

        '500' => 'Ошибки при валидации данных',

        '500.1' => 'Обработка невозможна. Не найдены необходимые объекты',

        '500.1.1' => 'Указанный счет не существует',

        '500.1.2' => 'Не найден счет с псевдонимом: alias',

        '500.1.3' => 'Не найден счет с номером: "accountId"',

        '500.1.4' => 'Счет не найден',

        '500.1.5' => 'Операция не найдена',

        '500.1.6' => 'Не найден счет плательщика',

        '500.1.7' => 'Не найден счет получателя',

        '500.1.8' => 'Документ не найден',

        '500.1.8.1' => 'Недопустимое имя файла. Поддерживаемые форматы: jpg,png,bmp,pdf,doc,odt',

        '500.1.9' => 'Данные пользователя не найдены',

        '500.1.10' => 'Неверный ID заказа',

        '500.1.11' => 'Неверный ID операции',

        '500.1.12' => 'Шаблон с указанным ID не найден',

        '500.1.13' => 'В указанном шаблоне нет таких параметров',

        '500.1.14' => 'Пользователь не найден',

        '500.1.15' => 'Неверный идентификатор структуры',

        '500.1.16' => 'Значение параметра SOURCEACCOUNTID должно быть равно номеру счета, к которому есть доступ',

        '500.1.17' => 'Значение параметра SOURCEACCOUNTID должно быть равно либо'
                      . ' {TARGETACCOUNTID}, либо номеру счета, к которому есть доступ',

        '500.1.18' => 'Данные находятся в архиве и не могут быть получены в данный момент',

        '500.1.18.1' => 'Данные находятся в архиве и не могут быть получены в данный момент.'
                        . ' Укажите дату позднее dd.mm.yyyy',

        '500.1.19' => 'Банковские реквизиты не найдены',

        '500.1.20' => 'Не указан ID банковских реквизитов',

        '500.1.21' => 'У пользователя не установлен Публичный идентификатор',

        '500.1.22' => 'Данные Secure Token не найдены',

        '500.1.23' => 'Обработка невозможна. Не найдены необходимые свойства объекта',

        '500.2' => 'Неверное значение передаваемого параметра',

        '500.2.1' => 'Элемент element_name обязателен для заполнения',

        '500.2.2' => 'Обязательное поле',

        '500.2.3' => 'The element_name element is required',

        '500.2.4' => 'The element_name element must be null',

        '500.2.5' => 'The element_name element must be null or empty',

        '500.2.6' => 'The element_name and element_name values do not match in the request and response',

        '500.2.7' => 'Неверный формат',

        '500.2.7.1' => 'Неверный формат логической переменной: *',

        '500.2.7.2' => 'Неверный формат числа: *',

        '500.3.1.1' => 'Неверный платежный пароль',

        '500.3.1.2' => 'Указанная сумма некорректна',

        '500.3.1.3' => 'Счет плательщика задан неправильно',

        '500.3.1.4' => 'Счет получателя задан неправильно',

        '500.3.1.5' => 'Сумма плательщика задана неправильно',

        '500.3.1.6' => 'Сумма получателя задана неправильно',

        '500.3.1.7' => 'Сумма не должна превышать amount currency',

        '500.3.1.8' => 'Сумма должна быть больше amount currency',

        '500.3.1.9' => 'Невозможно определить - является ли переданная сумма суммой плательщика или получателя',

        '500.3.1.10' => 'Нельзя использовать поле transactionId, если transactional = true',

        '500.3.1.11' => 'Введен неверный код протекции',

        '500.3.1.12' => 'TransactionId не сходится с OperationInfo.ID',

        '500.3.1.13' => 'Сумма должна быть больше нуля',

        '500.3.1.17' => 'Необходимо указать сумму. Сумма должна быть положительным числом',

        '500.3.1.18' => 'Данный идентификатор операции уже существует',

        '500.3.1.19' => 'Слишком много транзакций',

        '500.3.1.20' => 'В пакетном режиме нельзя проводить операции с внешними платежными системами',

        '500.3.1.21' => 'Не задана сумма заказа',

        '500.3.1.22' => 'Не задан внутренний идентификатор заказа',

        '500.3.1.23' => 'В операции указан другой внешний идентификатор плательщика',

        '500.3.1.24' => 'В операции указан другой внешний идентификатор получателя',

        '500.3.1.25' => 'Необходимо ввести номер карты',

        '500.3.1.26' => 'Необходимо ввести срок действия карты',

        '500.3.1.27' => 'Необходимо ввести код CVV2/CVC2',

        '500.3.1.28' => 'Неверный формат номера карты',

        '500.3.1.29' => 'Неверный формат срока действия карты (MM/YYYY)',

        '500.3.1.30' => 'Неверный формат кода CVV2/CVC2 (3 цифры)',

        '500.3.1.31' => 'В одном пакетном запросе нельзя выполнить проведение'
                        . ' новой операции и подтверждение существующей операции',

        '500.3.1.32' => 'Нельзя установить код CVV2/CVC2 при создании инвойса',

        '500.3.1.33' => 'Неверный формат имени владельца карты(латинские буквы, имя и фамилия через пробел)',

        '500.3.1.34' => 'Данный запрос не поддерживает работу в одной транзакции'
                        . ' (transactional = true). Используйте transactional = false',

        '500.3.1.35' => 'Необходимо ввести владельца карты',

        '500.3.1.36' => 'Для работы с данными полями необходима PCI DSS сертификация',

        '500.3.1.37' => 'Карта с истекшим сроком действия',

        '500.3.1.38' => 'Слишком длинное имя владельца карты (максимум кол-во символов: *)',

        '500.3.2.1' => 'Неверный предыдущий платёжный пароль,поэтому вы не можете сохранить новый пароль',

        '500.3.2.2' => 'Не указан псевдоним счета',

        '500.3.2.3' => 'Неверно задан тип удостоверения личности',

        '500.3.2.4' => 'Неизвестный тип профиля',

        '500.3.2.5' => 'Неверная дата рождения',

        '500.3.2.6' => 'Неверное значение пола',

        '500.3.2.7' => 'Неверный формат номера телефона',

        '500.3.2.8' => 'Неверный формат e-mail',

        '500.3.2.9' => 'Длина платежного пароля меньше 5 символов',

        '500.3.2.10' => 'Платёжный пароль больше 32 символов',

        '500.3.2.11' => 'Платежный пароль должен состоять только из цифр',

        '500.3.2.12' => 'Неверно задан URL',

        '500.3.2.13' => 'URL должен начинаться с http[s]:// или template://',

        '500.3.2.14' => 'Псевдоним счета должен быть уникальным.'
                        . ' У вас уже есть другой счет с таким псевдонимом:accountId',

        '500.3.2.15' => 'Ошибки при валидации полей документа',

        '500.3.2.16' => 'Фамилия - обязательное поле',

        '500.3.2.17' => 'Имя - обязательное поле',

        '500.3.2.18' => 'Слишком длинный Псевдоним. Максимальная длина 64 символа',

        '500.3.2.19' => 'Пользователи системы не должны быть моложе 14лет',

        '500.3.2.20' => 'Дата рождения должна быть больше 1900 года',

        '500.3.2.21' => 'Требуется корректный 10-значный или 12-значный ИНН',

        '500.3.2.21.1' => 'Требуется корректный 10-значный ИНН',

        '500.3.2.21.2' => 'Требуется корректный 12-значный ИНН',

        '500.3.2.22' => 'Неверно указана страна для региона',

        '500.3.2.23' => 'Неверно указан регион для города',

        '500.3.2.24' => 'Укажите номер телефона в международном формате (например, 71234567890)',

        '500.3.2.25' => 'Неверный адрес сайта. Пример правильного написания: http://www.site.com или http://site.com',

        '500.3.2.26' => 'Неверно задан email. Пример правильного написания: email@company.ru',

        '500.3.2.27' => 'Название организации - обязательное поле',

        '500.3.2.28' => 'ФИО руководителя - обязательное поле',

        '500.3.2.29' => 'Нельзя создать запрещающее правило для данного пользователя',

        '500.3.2.30' => 'Неверный идентификатор статуса',

        '500.3.2.31' => 'Такой псевдоним уже существует',

        '500.3.2.32' => "'Баланс меньше' указан неверно",

        '500.3.2.33' => 'Не установлен ни один из прав доступа',

        '500.3.2.34' => 'Укажите другой счет в качестве прототипа',

        '500.3.2.35' => 'Указанный счет ссылается на другой счет-прототип. Укажите другой счет',

        '500.3.2.36' => 'Нельзя создать счет в данной валюте или с данным типом',

        '500.3.2.37' => 'Можно использовать только для счетов со статическим платежным паролем',

        '500.3.2.38' => 'Неверный формат шаблона. Шаблон должен'
                        . ' быть в формате: template://template_id?param_name=param_value',

        '500.3.2.39' => 'Указанный счет имеет другой тип. Укажите другой счет',

        '500.3.2.40' => 'Нельзя перенести структуру в саму себя',

        '500.3.2.41' => 'Невозможно провести идентификацию',

        '500.3.2.42' => 'Неверный код идентификации',

        '500.3.2.43' => 'Адрес регистрации - обязательное поле',

        '500.3.2.44' => 'Дата рождения - обязательное поле',

        '500.3.2.45' => 'Нельзя изменять подтвержденное свойство',

        '500.3.2.46' => 'Неверно указан СНИЛС',

        '500.3.2.47' => 'Не указан сотовый телефон',

        '500.3.2.48' => 'Телефон уже подтвержден',

        '500.3.2.48.1' => 'Подтверждение телефона уже отменено',

        '500.3.2.49' => 'Сообщение не содержит подстановки {CODE}',

        '500.3.2.50' => 'Слишком большая длина sms сообщения',

        '500.3.2.51' => 'Неверный код подтверждения',

        '500.3.2.51.1' => 'Неверный код отмены подтверждения',

        '500.3.2.52.1' => 'Необходим корректный БИК (9 цифр) в поле "*"',

        '500.3.2.52.2' => 'Номер расчётного счёта не корректный в поле "*". Введите правильный номер',

        '500.3.2.52.3' => 'Указанный счёт предназначен для обслуживания'
                          . ' физического лица в поле "*". Нельзя использовать его в целях приёма платежей',

        '500.3.2.52.4' => 'Введён БИК, соответствующий РКЦ Банка России.'
                          . ' В этом случае поле "Корреспондентский счёт" не заполняется',

        '500.3.2.52.5' => 'Номер корреспондентского счёта не корректный. Введите правильный номер',

        '500.3.2.52.6' => 'Необходим корректный КБК (число до 20 знаков) в поле "*"',

        '500.3.2.52.7' => 'Необходим корректный ОКТМО (8 или 11 значное число) в поле "*"',

        '500.3.2.52.8' => 'Необходим корректный КПП (9-значное число) в поле "*"',

        '500.3.2.52.9' => 'Укажите SWIFT в корректном формате (8 или 11 символов - заглавные латинские буквы и цифры)',

        '500.3.2.52.10' => 'Укажите IBAN в корректном формате в поле'
                           . ' "*" (от 5 до 40 символов - заглавные латинские буквы и цифры)',

        '500.3.2.53' => 'Нельзя выбрать данный тип платежного пароля',

        '500.3.2.54' => 'Требуемое поле - "element_name"',

        '500.3.2.55' => 'Слишком длинное значение в поле "element_name". Предел: "length"',

        '500.3.2.56' => 'Поле не может быть пустым - "element_name"',

        '500.3.2.57' => 'Неверный формат Secure Token',

        '500.3.2.58' => 'Закончился срок действия Secure Token',

        '500.3.2.59.1' => 'Неправильная подпись формы оплаты',

        '500.3.2.59.2' => 'Подпись на форме оплаты обязательна',

        '500.3.2.60' => 'Нельзя менять тип учетных единиц у записей данного вида',

        '500.3.2.61' => 'Неверный тип счета',

        '500.3.2.62.1' => 'Данный счет нельзя заблокировать, потому что он не является активным',

        '500.3.2.63.1' => 'Данный счет нельзя разблокировать, потому что он не заблокирован',

        '500.3.2.63.2' => 'Разблокировать счет невозможно, так как ранее'
                          . ' Вами не был указан секретный вопрос. Обратитесь в службу поддержки',

        '500.3.2.63.3' => 'Разблокировать счет невозможно, так как ранее'
                          . ' Вами не был указан ответ на секретный вопрос. Обратитесь в службу поддержки',

        '500.3.2.63.4' => 'Данный счет не является блокированным',

        '500.3.2.63.5' => 'Данный счет не может быть автоматически разблокирован. Обратитесь в службу поддержки',

        '500.3.2.63.6' => 'Возможность использовать ответ на секретный'
                          . ' вопрос заблокирована на один час. Попробуйте позднее или обратитесь в службу поддержки',

        '500.3.2.63.7' => 'Возможность использовать платежный пароль'
                          . ' для активации счета заблокирована на один час.'
                          . ' Попробуйте позднее или обратитесь в службу поддержки',

        '500.3.2.63.8' => 'Неправильный ответ на вопрос',

        '500.3.2.64.1' => 'Неверно указан Тип интерфейса',

        '500.3.2.64.2' => 'Неверно указан список платежных систем',

        '500.3.2.64.3' => 'Неверно задана платежная система по умолчанию',

        '500.3.2.64.4' => 'Неверно указан HTTP метод',

        '500.3.2.64.5' => 'Неверно указан Target',

        '500.3.2.64.6' => 'Превышено допустимое количество символов',

        '500.3.2.65.1' => 'Неверный формат URL',

        '500.3.2.65.2' => 'Ошибка установки соединения',

        '500.3.2.65.3' => 'Срок действия серверного сертификата истек',

        '500.3.2.65.4' => 'Ошибка проверки центра сертификации серверного  сертификата',

        '500.3.2.65.5' => 'Срок действия серверного сертификата еще не начался',

        '500.3.3.1' => 'Сумма "от" больше суммы "до"',

        '500.3.3.2' => 'Дата "от" больше даты "до"',

        '500.3.3.3' => 'Максимальный интервал просмотра истории'
                       . ' операций составляет 30 дней. Измените дату начала или конца периода просмотра',

        '500.3.3.4' => 'Сумма не может быть отрицательной',

        '500.3.3.5' => 'Если задана сумма, то следует указать валюту',

        '500.3.3.6' => 'Неверно задан тип суммы операции',

        '500.3.3.7' => 'Неверно задан код валюты',

        '500.3.3.8' => 'Не указан период',

        '500.3.3.9' => 'Указан неверный период',

        '500.3.3.10' => 'Указан неверный тип операции',

        '500.3.3.11' => 'Период просмотра финансовых потоков не может быть больше 3 месяцев',

        '500.3.3.12' => 'Дата "начала периода" больше даты "конца периода"',

        '500.3.3.13' => 'Период просмотра Итогов по месяцам с "деталями по дням" не может быть больше месяца',

        '500.3.3.14' => 'Период просмотра финансовых потоков с "деталями по дням" не может быть больше месяца',

        '500.3.3.15' => 'Период просмотра операций не может быть больше одного года',

        '500.3.3.16' => 'Платеж с идентичного счета невозможен',

        '500.4.1.1' => 'Указанный вами лицевой счет не найден в реестре'
                       . ' начислений. Проверьте корректность лицевого счета или обратитесь к поставщику услуг',

        '500.4.1.2' => 'Некорректный формат поля "*"',

        '500.4.2.1' => 'Не указана сумма',

        '500.4.2.2' => 'Сумма платежа должна быть в пределах от * до *',

        '500.4.2.3' => 'Данное начисление уже оплачено',

        '500.4.2.4' => 'Начислений по данному запросу не обнаружено',

        '500.4.2.5' => 'Ошибка контрольной суммы, проверьте правильность ввода УИН *',

        '500.4.2.6' => 'Ошибка поиска начисления',

        '500.4.4.1' => 'Не найден провайдер товаров или услуг',

        '500.4.4.2' => 'Данный провайдер отключен',

        '500.4.4.3' => 'Произошла ошибка в системе ГИС ГМП. Просим Вас повторить запрос позже',

        '500.4.4.4' => 'Провайдер "*" не поддерживает данный способ вызова',

        '500.4.4.5' => 'Произошла ошибка в системе расчёта стоимости ОСАГО. Просим Вас повторить запрос позже',

        '500.5.1' => 'Счёт к списанию и счёт к зачислению не должны совпадать',

        '500.5.2' => 'Вы не имеете доступ ни к одному из счетов',

        '500.5.3' => 'Создание шаблона операции невозможно',

        '500.5.4' => 'Название не должно превышать * символов',

        '500.5.5' => 'Метки могут содержать слова, цифры, символы "_"и "-", пробел',

        '500.5.6' => 'Превышено допустимое количество символов водной из меток',

        '500.5.7' => 'Сумма должна быть больше нуля',

        '500.5.8' => 'Шаблон не может быть регулярным платежом',

        '500.5.9' => 'Дата и время выполнения указаны раньше текущего времени',

        '23500.5.10' => 'Дата не соответствует последнему дню месяца',

        '500.5.11' => 'Дата окончания выполнения указана раньше даты начала',

        '500.5.12' => 'Дата окончания выполнения указана раньше текущего времени',

        '500.5.13' => 'Количество часов в уведомлении о статусе платежа должно быть больше нуля',

        '500.5.14' => 'Неверный тип суммы',

        '500.5.15' => 'Минимальное значение суммы должно быть положительным числом',

        '500.5.16' => 'Максимальное значение суммы должно быть больше нуля',

        '500.5.17' => 'Максимальное значение суммы должно быть больше её минимального значения',

        '500.5.18' => 'Значение остатка баланса должно быть больше нуля',

        '500.5.19' => 'Определите, как минимум, одну из границ интервала',

        '500.5.20' => 'Неверный шаблон',

        '500.6.1.1' => 'Отсутствуют банковские реквизиты',

        '500.6.1.2' => 'Отсутствуют подтвержденные банковские реквизиты',

        '500.6.1.3' => 'Неверные банковские реквизиты',

        '500.6.1.4' => 'Укажите расчетный счет, на который хотите перевести средства',

        '500.6.1.5' => 'Укажите наименование банка, в котором находится Ваш расчетный счет',

        '500.6.1.6' => 'Укажите БИК банка, в котором находится Ваш расчетный счет',

        '500.6.1.7' => 'Укажите корреспондентский счет банка, в котором находится Ваш расчетный счет',

        '500.6.1.8' => 'Укажите получателя',

        '500.6.1.9' => 'Неверный индекс документа. Укажите в корректном формате',

        '500.6.1.10' => 'Неверный идентификатор плательщика. Укажите в корректном формате',

        '500.6.1.11' => 'Должен быть указан УИН (индекс документа) или идентификатор плательщика',

        '500.6.1.12' => 'Укажите ИНН получателя или ИНН банка',

        '500.6.1.13' => 'Укажите номер договора',

        '500.6.1.14' => 'Неверный номер расчетного счета. Укажите номер в корректном формате (20 цифр)',

        '500.6.1.15' => 'Перевод на счет 40821* невозможен. Пожалуйста,укажите другой счет получателя',

        '500.6.1.16' => 'Неверный БИК банка. Укажите БИК в корректном формате (9 цифр)',

        '500.6.1.17' => 'Указанный БИК банка отсутствует в справочнике',

        '500.6.1.18' => 'Указанные БИК банка и счет не соответствуют друг другу',

        '500.6.1.19' => 'Неверный корреспондентский счет банка. Укажите счет в корректном формате (20 цифр)',

        '500.6.1.20' => 'Неверный КПП. Укажите в корректном формате (9 цифр)',

        '500.6.1.21' => 'Неверный КБК. Укажите в корректном формате (20 цифр)',

        '500.6.1.22' => 'Неверный OKTMO. Укажите в корректном формате (2-8 или 11 цифр)',

        '500.6.1.23' => 'параметры КПП, КБК и ОКТМО должны либо присутствовать все сразу, либо отсутствовать',

        '500.6.1.24' => 'Неверное наименование получателя. Укажите в корректном формате',

        '500.6.1.25' => 'Неверный ИНН. Укажите ИНН получателя (12 цифр) или ИНН банка (10 цифр)',

        '500.6.1.26' => 'Количество символов в наименовании получателя(*) превышает максимальное (*)',

        '500.6.1.27' => 'Количество символов в поле (*) превышает максимальное (*)',

        '500.6.1.28' => 'Количество символов в назначении платежа'
                        . ' (*) превышает максимальное (*) для указанной валюты вывода',

        '500.6.1.29' => 'Неверный формат назначения платежа',

        '500.6.1.30' => 'Укажите номер карты',

        '500.6.1.31' => 'Нельзя использовать латинские буквы',

        '500.6.1.32' => 'Поле "Наименование получателя" или "Назначение платежа" должно содержать "*"',

        '500.6.1.33' => 'Вывод на данный счет запрещен для анонимных пользователей',

        '500.6.1.34' => 'Неверный SWIFT банка. Укажите в корректном формате (8 цифр или латинских букв)',

        '500.6.1.35' => 'Неверный IBAN банка. Укажите в корректном формате (5..40 цифр и/или заглавных латинскихбукв)',

        '500.6.1.36' => 'Указанный SWIFT банка отсутствует в справочнике',

        '500.6.1.37' => 'Указанный БИК российского банка посредника отсутствует в справочнике',

        '500.6.1.38' => 'Неверный SWIFT международного банка'
                        . ' посредника. Укажите в корректном формате (8 цифр или латинских букв)',

        '500.6.1.39' => 'Указанный SWIFT международного банка посредника отсутствует в справочнике',

        '500.6.1.40' => 'Укажите номер платежного поручения',

        '500.6.1.41' => 'Укажите дату платежного поручения',

        '500.6.1.42' => 'Номер платежного поручения не должен заканчиваться тремя нулями',

        '500.6.2.1' => 'Укажите номер счета, на который вы хотите перечислить средства',

        '500.6.2.2' => 'Неверный номер счета. Укажите номер счета в QIWI (11 или 12 цифр)',

        '500.7.1' => 'Во время прохождения упрощённой'
                     . ' идентификации возникли ошибки. Обратитесь в службу поддержки МОНЕТА.РУ',

        '500.7.2' => 'Упрощённая идентификация не проведена.' .
                     ' Закончился срок ожидания результатов проверки.'
                     . ' Для прохождения Упрощённой идентификации следует сделать еще один запрос',

        '500.7.3' => 'Данные пользователя не прошли проверку в ЕСИА',

        '500.7.4' => 'Для прохождения упрощённой идентификации укажите паспортные данные.'
                     . ' Указанный Вами документ не является действующим паспортом',

        '500.7.5' => 'Сотовый телефон не подтвержден',

        '500.7.6' => 'Вами предоставлена недостаточно полная информация о себе. Для прохождения упрощённой'
                     . ' идентификации укажите в личном кабинете:'
                     . ' ФИО, паспортные данные, ИНН, СНИЛС, номер мобильного телефона',

        '500.7.7' => 'Автоматическая упрощённая идентификация доступна только для граждан России',

        '500.7.8' => 'Найдены похожие профили со статусом "Упрощённая идентификация".'
                     . ' Обратитесь в службу поддержки МОНЕТА.РУ',

        '500.7.9' => 'Не хватает или подтверждены не все персональные данные, необходимые для упрощённой идентификации',

        '500.7.10' => 'Документ удостоверяющей личность не прошел проверку подтверждения достоверности.'
                      . ' Обратитесь в службу поддержки МОНЕТА.РУ',

        '500.7.11' => 'Пользователь уже имеет статус "Упрощённая идентификация"',

        '500.7.12' => 'Невозможно провести Упрощённую идентификацию',

        '500.8' => 'Ошибка во внешней системе СМЭВ: *',

        '500.8.4769.1' => 'Единая система идентификации и аутентификации(ЕСИА) не отвечает на запрос.'
                          . ' Просим Вас повторить запрос позже',

        '500.8.4769.2' => 'Во время выполнения запроса в Единой системе идентификации и аутентификации (ЕСИА)'
                          . ' произошла ошибка',

        '500.9.1' => 'Асинхронная задача не найдена',

        '500.9.2' => 'Данная задача не поддерживает асинхронную обработку',

        '500.9.3' => 'Несоответствие контекста асинхронного запроса и результата',

        '500.9.4' => 'Запрос может быть вызван только в асинхронном режиме.'
                     . ' Используйте AsyncRequest для работы с данным запросом',
    ];

    /**
     * Код ошибки пришедший от монеты.
     *
     * @var string
     */
    protected $monetaExceptionCode;

    /**
     * Код ошибки который должен быть подставлен по умолчанию.
     *
     * @var int
     */
    protected $httpExceptionCode;

    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        if ($code) {
            $this->monetaExceptionCode = $code;
            if ($message !== $this->codes[$code]) {
                $message .= '. ' . $this->codes[$code];
            }
        }
        parent::__construct($message, $this->httpExceptionCode, $previous);
    }

    /**
     * @return string
     */
    public function getMonetaExceptionCode()
    {
        return $this->monetaExceptionCode;
    }
}