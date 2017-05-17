<?php

/**
 * Country model config
 */

return [
    'title' => 'Countries',
    'single' => 'Country',
    'model' => '\Filmoteca\Models\Exhibitions\Country',

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'abbreviation' => array(
            'title' => 'Abbreviation'
        ),
        'name' => array(
            'title' => 'Name'
        )
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'abbreviation' => array(
            'title' => 'Abbreviation'
        ),
        'name' => array(
            'title' => 'Name'
        )
    ),
];
