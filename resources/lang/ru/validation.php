<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Последующие языковые строки содержат сообщения по умолчанию, используемые
    | классом, проверяющим значения (валидатором). Некоторые из правил имеют
    | несколько версий, например, size. Вы можете поменять их на любые
    | другие, которые лучше подходят для вашего приложения.
    |
    */
    'accepted'             => 'Вы должны принять <b>:attribute</b>.',
    'active_url'           => 'Поле <b>:attribute</b> содержит недействительный URL.',
    'after'                => 'В поле <b>:attribute</b> должна быть дата после :date.',
    'after_or_equal'       => 'В поле <b>:attribute</b> должна быть дата после или равняться :date.',
    'alpha'                => 'Поле <b>:attribute</b> может содержать только буквы.',
    'alpha_dash'           => 'Поле <b>:attribute</b> может содержать только буквы, цифры и дефис.',
    'alpha_num'            => 'Поле <b>:attribute</b> может содержать только буквы и цифры.',
    'array'                => 'Поле <b>:attribute</b> должно быть массивом.',
    'before'               => 'В поле <b>:attribute</b> должна быть дата до :date.',
    'before_or_equal'      => 'В поле <b>:attribute</b> должна быть дата до или равняться :date.',
    'between'              => [
        'numeric' => 'Поле <b>:attribute</b> должно быть между :min и :max.',
        'file'    => 'Размер файла в поле <b>:attribute</b> должен быть между :min и :max Килобайт(а).',
        'string'  => 'Количество символов в поле <b>:attribute</b> должно быть между :min и :max.',
        'array'   => 'Количество элементов в поле <b>:attribute</b> должно быть между :min и :max.',
    ],
    'boolean'              => 'Поле <b>:attribute</b> должно иметь значение логического типа.', // калька 'истина' или 'ложь' звучала бы слишком неестественно
    'confirmed'            => 'Поле <b>:attribute</b> не совпадает с подтверждением.',
    'date'                 => 'Поле <b>:attribute</b> не является датой.',
    'date_format'          => 'Поле <b>:attribute</b> не соответствует формату :format.',
    'different'            => 'Поля <b>:attribute</b> и :other должны различаться.',
    'digits'               => 'Длина цифрового поля <b>:attribute</b> должна быть :digits.',
    'digits_between'       => 'Длина цифрового поля <b>:attribute</b> должна быть между :min и :max.',
    'dimensions'           => 'Поле <b>:attribute</b> имеет недопустимые размеры изображения.',
    'distinct'             => 'Поле <b>:attribute</b> содержит повторяющееся значение.',
    'email'                => 'Поле <b>:attribute</b> должно быть действительным электронным адресом.',
    'file'                 => 'Поле <b>:attribute</b> должно быть файлом.',
    'filled'               => 'Поле <b>:attribute</b> обязательно для заполнения.',
    'exists'               => 'Выбранное значение для <b>:attribute</b> некорректно.',
    'image'                => 'Поле <b>:attribute</b> должно быть изображением.',
    'in'                   => 'Выбранное значение для <b>:attribute</b> ошибочно.',
    'in_array'             => 'Поле <b>:attribute</b> не существует в :other.',
    'integer'              => 'Поле <b>:attribute</b> должно быть целым числом.',
    'ip'                   => 'Поле <b>:attribute</b> должно быть действительным IP-адресом.',
    'ipv4'                 => 'Поле <b>:attribute</b> должно быть действительным IPv4-адресом.',
    'ipv6'                 => 'Поле <b>:attribute</b> должно быть действительным IPv6-адресом.',
    'json'                 => 'Поле <b>:attribute</b> должно быть JSON строкой.',
    'max'                  => [
        'numeric' => 'Поле <b>:attribute</b> не может быть более :max.',
        'file'    => 'Размер файла в поле <b>:attribute</b> не может быть более :max Килобайт(а).',
        'string'  => 'Количество символов в поле <b>:attribute</b> не может превышать :max.',
        'array'   => 'Количество элементов в поле <b>:attribute</b> не может превышать :max.',
    ],
    'mimes'                => 'Поле <b>:attribute</b> должно быть файлом одного из следующих типов: :values.',
    'mimetypes'            => 'Поле <b>:attribute</b> должно быть файлом одного из следующих типов: :values.',
    'min'                  => [
        'numeric' => 'Поле <b>:attribute</b> должно быть не менее :min.',
        'file'    => 'Размер файла в поле <b>:attribute</b> должен быть не менее :min Килобайт(а).',
        'string'  => 'Количество символов в поле <b>:attribute</b> должно быть не менее :min.',
        'array'   => 'Количество элементов в поле <b>:attribute</b> должно быть не менее :min.',
    ],
    'not_in'               => 'Выбранное значение для <b>:attribute</b> ошибочно.',
    'numeric'              => 'Поле <b>:attribute</b> должно быть числом.',
    'present'              => 'Поле <b>:attribute</b> должно присутствовать.',
    'regex'                => 'Поле <b>:attribute</b> имеет ошибочный формат.',
    'required'             => 'Поле <b>:attribute</b> обязательно для заполнения.',
    'required_if'          => 'Поле <b>:attribute</b> обязательно для заполнения, когда :other равно :value.',
    'required_unless'      => 'Поле <b>:attribute</b> обязательно для заполнения, когда :other не равно :values.',
    'required_with'        => 'Поле <b>:attribute</b> обязательно для заполнения, когда :values указано.',
    'required_with_all'    => 'Поле <b>:attribute</b> обязательно для заполнения, когда :values указано.',
    'required_without'     => 'Поле <b>:attribute</b> обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле <b>:attribute</b> обязательно для заполнения, когда ни одно из :values не указано.',
    'same'                 => 'Значение <b>:attribute</b> должно совпадать с :other.',
    'size'                 => [
        'numeric' => 'Поле <b>:attribute</b> должно быть равным :size.',
        'file'    => 'Размер файла в поле <b>:attribute</b> должен быть равен :size Килобайт(а).',
        'string'  => 'Количество символов в поле <b>:attribute</b> должно быть равным :size.',
        'array'   => 'Количество элементов в поле <b>:attribute</b> должно быть равным :size.',
    ],
    'string'               => 'Поле <b>:attribute</b> должно быть строкой.',
    'timezone'             => 'Поле <b>:attribute</b> должно быть действительным часовым поясом.',
    'unique'               => 'Такое значение поля <b>:attribute</b> уже существует.',
    'uploaded'             => 'Загрузка поля <b>:attribute</b> не удалась.',
    'url'                  => 'Поле <b>:attribute</b> имеет ошибочный формат.',
    /*
    |--------------------------------------------------------------------------
    | Собственные языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Здесь Вы можете указать собственные сообщения для атрибутов.
    | Это позволяет легко указать свое сообщение для заданного правила атрибута.
    |
    | http://laravel.com/docs/validation#custom-error-messages
    | Пример использования
    |
    |   'custom' => [
    |       'email' => [
    |           'required' => 'Нам необходимо знать Ваш электронный адрес!',
    |       ],
    |   ],
    |
    */
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Собственные названия атрибутов
    |--------------------------------------------------------------------------
    |
    | Последующие строки используются для подмены программных имен элементов
    | пользовательского интерфейса на удобочитаемые. Например, вместо имени
    | поля "email" в сообщениях будет выводиться "электронный адрес".
    |
    | Пример использования
    |
    |   'attributes' => [
    |       'email' => 'электронный адрес',
    |   ],
    |
    */
    'attributes'           => [
        //
    ],
];