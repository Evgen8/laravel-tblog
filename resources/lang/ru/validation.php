<?php

return [

    'unique'               => 'Пользователь с таким :attribute уже зарегистрирован!',
    'confirmed'            => 'Пароли не индентичны!',
    'required'             => 'Поле с Вашим :attribute обязательно для ввода.',

    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'Пароль должен содержать не менее 6 символов',
        'array'   => 'The :attribute must have at least :min items.',
    ],

    'attributes' => [
        'phone' => 'номером телефона',
        'email' => 'email-ом'
    ],

    'email' => 'Введите корректный email!',
];