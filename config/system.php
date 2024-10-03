<?php

return [
    'roles' => [
        'admin'     => 'Admin',
        'doctor'    => 'Doctor',
        'patient'   => 'Patient',
        'staff'     => 'Staff'
    ],
    'permissions' => [
        'dashboard' => [
            'index' => 'dashboard.index',
        ],
        'doctor' => [
            'index'     => 'doctor.index',
            'create'    => 'doctor.create',
            'edit'      => 'doctor.edit',
        ],
        'references' => [
            'index'     => 'references.index',
        ],
    ],
];