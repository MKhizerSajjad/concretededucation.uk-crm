<?php
use App\Models\Setting;

function statusReturn($prefix, $statuses, $status = null, $type = null)
{
    if(isset($statuses[$prefix])) {
        $statusArray = $statuses[$prefix];

        return isset($statusArray[$status])
            ? ($type === 'badge' ? $statusArray[$status][1] : $statusArray[$status][0])
            : ($type === 'badge' ? array_column($statusArray, 1) : array_column($statusArray, 0));

    } else {
        return 'Unknown'; // Or handle the case when $prefix is not found in $statuses
    }
}

function getGenStatus($prefix, $status = null, $type = null)
{
    $statuses = [
        'general'=> [
            '1' => ['Active', '<span class="badge bg-primary">Active</span>'],
            '2' => ['Inactive', '<span class="badge bg-warning">Inactive</span>']
        ],
        'user'=> [
            '1' => ['Active', '<span class="badge bg-primary">Active</span>'],
            '2' => ['Inactive', '<span class="badge bg-warning">Inactive</span>'],
            '3' => ['Suspended', '<span class="badge bg-danger">Suspended</span>']
        ],
        'service'=> [
            '1' => ['Prioritized', '<span class="badge bg-success">Prioritized</span>'],
            '2' => ['Active', '<span class="badge bg-primary">Active</span>'],
            '3' => ['Inactive', '<span class="badge bg-warning">Inactive</span>'],
        ],
        'bool'=> [
            '1' => ['Yes', '<span class="badge bg-primary">Yes</span>'],
            '2' => ['No', '<span class="badge bg-warning">No</span>']
        ]
    ];

    return statusReturn($prefix, $statuses, $status, $type );
}

function getUser($prefix, $status = null, $type = null)
{
    $statuses = [
        'type'=> [
            '1' => ['Admin', '<span class="badge bg-info">Admin</span>'],
            '2' => ['Manager', '<span class="badge bg-warning">Manager</span>'],
            '3' => ['Technician', '<span class="badge bg-secondary">Technician</span>'],
            '4' => ['Customer', '<span class="badge bg-success">Customer</span>']
        ],
        'title'=> [
            '1' => ['Mr.', '<span class="badge bg-info">Mr.</span>'],
            '2' => ['Mrs.', '<span class="badge bg-warning">Mrs.</span>'],
            '3' => ['Ms.', '<span class="badge bg-secondary">Ms.</span>'],
        ],
        'gender'=> [
            '1' => ['Male', '<span class="badge bg-info">Male</span>'],
            '2' => ['Female', '<span class="badge bg-warning">Female</span>'],
            '3' => ['Other', '<span class="badge bg-secondary">Other</span>'],
        ]
    ];

    return statusReturn($prefix, $statuses, $status, $type );
}

function getStockStatus($prefix, $status = null, $type = null)
{
    $statuses = [
        'general'=> [
            '1' => ['In Stock', '<span class="badge bg-primary">In Stock</span>'],
            '2' => ['Low stock', '<span class="badge bg-warning">Low stock</span>'],
            '3' => ['Out of Stock', '<span class="badge bg-danger">Out of Stock</span>'],
            '4' => ['Reordered', '<span class="badge bg-info">Reordered</span>']
        ],
        'woocommerce'=> [
            'instock' => ['Instock', '<span class="badge bg-primary">Instock</span>'],
            'outofstock' => ['Out of Stock', '<span class="badge bg-danger">Out of Stock</span>'],
            'onbackorder' => ['On Back Order', '<span class="badge bg-info">On Back Order</span>'],
        ]
    ];

    return statusReturn($prefix, $statuses, $status, $type );
}

function getPayment($prefix, $status = null, $type = null)
{
    $statuses = [
        'status'=> [
            '1' => ['Paid', '<span class="badge bg-success font-size-18"> <i class="bx bx-euro"></i> Paid</span>'],
            '2' => ['Partially Paid', '<span class="badge bg-primary font-size-18"> <i class="bx bx-euro"></i> Partially Paid</span>'],
            '3' => ['Pending', '<span class="badge bg-warning font-size-18"> <i class="bx bx-euro"></i> Pending</span>'],
            '4' => ['Unpaid', '<span class="badge bg-danger font-size-18"> <i class="bx bx-euro"></i> Unpaid</span>']
        ],
        'via'=> [
            '1' => ['Cash', '<span class="badge bg-primary">Cash</span>'],
            '2' => ['Check', '<span class="badge bg-danger">Check</span>'],
            '3' => ['Bank Transfer', '<span class="badge bg-info">Bank Transfer</span>'],
            '4' => ['Card', '<span class="badge bg-info">Card</span>'],
            '5' => ['Stripe', '<span class="badge bg-info">Stripe</span>'],
        ]
    ];

    return statusReturn($prefix, $statuses, $status, $type );
}

function getCaseStatus($prefix, $status = null, $type = null)
{
    $statuses = [
        'general'=> [
            '1' => ['To Recieve', '<span class="badge bg-primary">To Recieve</span>'],
            '2' => ['Recieved', '<span class="badge bg-warning">Recieved</span>'],
            '3' => ['Inspecting', '<span class="badge bg-danger">Inspecting</span>'],
            '4' => ['Update Faults', '<span class="badge bg-info">Update Faults</span>'],
            '5' => ['Work In Progress', '<span class="badge bg-info">Work In Progress</span>'],
            '6' => ['Completed', '<span class="badge bg-info">Completed</span>'],
            '7' => ['Ready To Dispatch', '<span class="badge bg-info">Ready To Dispatch</span>'],
            '8' => ['Dispatched', '<span class="badge bg-info">Dispatched</span>'],
            '9' => ['Delivered', '<span class="badge bg-info">Delivered</span>'],
        ],
        'woocommerce'=> [
            'instock' => ['Instock', '<span class="badge bg-primary">Instock</span>'],
            'outofstock' => ['Out of Stock', '<span class="badge bg-danger">Out of Stock</span>'],
            'onbackorder' => ['On Back Order', '<span class="badge bg-info">On Back Order</span>'],
        ]
    ];

    return statusReturn($prefix, $statuses, $status, $type );
}

function getService($prefix, $status = null, $type = null)
{
    $statuses = [
        'location'=> [
            '1' => ['Deliver to office', '<span class="badge bg-primary">Deliver to office</span>'],
            '2' => ['I will send to office', '<span class="badge bg-warning">I will send to office</span>'],
            '3' => ['Invite engineer to my home', '<span class="badge bg-danger">Invite engineer to my home</span>'],
        ],
    ];

    return statusReturn($prefix, $statuses, $status, $type );
}

function getDocument($prefix, $status = null, $type = null)
{
    $statuses = [
        'types'=> [
            '1' => ['picture', '<span class="badge bg-primary">picture</span>'],
            '2' => ['passpord', '<span class="badge bg-warning">passpord</span>'],
            '3' => ['result card', '<span class="badge bg-danger">result card</span>'],
            '4' => ['id card', '<span class="badge bg-danger">id card</span>'],
        ],
    ];

    return statusReturn($prefix, $statuses, $status, $type );
}

function getFields($prefix, $status = null, $type = null)
{
    $statuses = [
        'types'=> [
            '1' => ['text', '<span class="badge bg-primary">text</span>'],
            '2' => ['number', '<span class="badge bg-warning">number</span>'],
            '3' => ['phone', '<span class="badge bg-danger">phone</span>'],
            '4' => ['email', '<span class="badge bg-danger">email</span>'],
            '5' => ['textarea', '<span class="badge bg-danger">textarea</span>'],
        ],
    ];

    return statusReturn($prefix, $statuses, $status, $type );
}


// ************************* OTHERS ************************
function getFileTypeFromExtension($extension) {
    // Define arrays for different file types
    $imageExtensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
    $videoExtensions = ['mp4', 'avi', 'mov', 'mkv'];
    $documentExtensions = ['doc', 'docx', 'pdf', 'txt', 'xls', 'xlsx', 'ppt', 'pptx'];
    // Add more arrays as needed for other file types

    // Convert extension to lowercase for case-insensitive comparison
    $lowercaseExtension = strtolower($extension);

    // Check if the extension belongs to images
    if (in_array($lowercaseExtension, $imageExtensions)) {
        return '1'; // Return 'image' for images
    }
    // Check if the extension belongs to videos
    elseif (in_array($lowercaseExtension, $videoExtensions)) {
        return '2'; // Return 'video' for videos
    }
    // Check if the extension belongs to documents/files
    elseif (in_array($lowercaseExtension, $documentExtensions)) {
        return '3'; // Return 'document' for documents/files
    }
    else {
        return '0'; // Default type or handle other types as needed
    }
}

function getTax() {
    $tax = Setting::where('type', 'tax')->pluck('data')->first();
    return json_decode($tax)[0]->percentage;
}

function numberFormat($amount, $type=null) {
    $formatted = number_format($amount, 2, '.', ',');

    switch ($type) {
        case 'euro':
            return $formatted . '€';
        case 'percentage':
            return $formatted . '%';
        default:
            return $formatted;
    }
}

function getShifts($prefix, $status = null, $type = null)
{
    $statuses = [
        'types'=> [
            '1' => ['Morning', '<span class="badge bg-primary">Morning</span>'],
            '2' => ['Evening', '<span class="badge bg-warning">Evening</span>'],
            '3' => ['Weekend', '<span class="badge bg-secondary">Weekend</span>'],
        ],
    ];

    return statusReturn($prefix, $statuses, $status, $type );
}

function getLang($prefix, $status = null, $type = null)
{
    $statuses = [
        'names' => [
            '1' => ['Afrikaans', '<span class="badge bg-secondary">Afrikaans</span>'],
            '2' => ['Albanian', '<span class="badge bg-info">Albanian</span>'],
            '3' => ['Amharic', '<span class="badge bg-danger">Amharic</span>'],
            '4' => ['Arabic', '<span class="badge bg-danger">Arabic</span>'],
            '5' => ['Armenian', '<span class="badge bg-dark">Armenian</span>'],
            '6' => ['Azerbaijani', '<span class="badge bg-success">Azerbaijani</span>'],
            '7' => ['Basque', '<span class="badge bg-warning">Basque</span>'],
            '8' => ['Belarusian', '<span class="badge bg-primary">Belarusian</span>'],
            '9' => ['Bengali', '<span class="badge bg-danger">Bengali</span>'],
            '10' => ['Bosnian', '<span class="badge bg-secondary">Bosnian</span>'],
            '11' => ['Bulgarian', '<span class="badge bg-info">Bulgarian</span>'],
            '12' => ['Catalan', '<span class="badge bg-light">Catalan</span>'],
            '13' => ['Chinese', '<span class="badge bg-success">Chinese</span>'],
            '14' => ['Croatian', '<span class="badge bg-primary">Croatian</span>'],
            '15' => ['Czech', '<span class="badge bg-secondary">Czech</span>'],
            '16' => ['Danish', '<span class="badge bg-info">Danish</span>'],
            '17' => ['Dutch', '<span class="badge bg-primary">Dutch</span>'],
            '18' => ['English', '<span class="badge bg-primary">English</span>'],
            '19' => ['Esperanto', '<span class="badge bg-warning">Esperanto</span>'],
            '20' => ['Estonian', '<span class="badge bg-light">Estonian</span>'],
            '21' => ['Filipino', '<span class="badge bg-success">Filipino</span>'],
            '22' => ['Finnish', '<span class="badge bg-dark">Finnish</span>'],
            '23' => ['French', '<span class="badge bg-warning">French</span>'],
            '24' => ['Galician', '<span class="badge bg-secondary">Galician</span>'],
            '25' => ['Georgian', '<span class="badge bg-danger">Georgian</span>'],
            '26' => ['German', '<span class="badge bg-info">German</span>'],
            '27' => ['Greek', '<span class="badge bg-success">Greek</span>'],
            '28' => ['Gujarati', '<span class="badge bg-primary">Gujarati</span>'],
            '29' => ['Haitian Creole', '<span class="badge bg-warning">Haitian Creole</span>'],
            '30' => ['Hausa', '<span class="badge bg-light">Hausa</span>'],
            '31' => ['Hebrew', '<span class="badge bg-dark">Hebrew</span>'],
            '32' => ['Hindi', '<span class="badge bg-danger">Hindi</span>'],
            '33' => ['Hungarian', '<span class="badge bg-secondary">Hungarian</span>'],
            '34' => ['Icelandic', '<span class="badge bg-info">Icelandic</span>'],
            '35' => ['Igbo', '<span class="badge bg-success">Igbo</span>'],
            '36' => ['Indonesian', '<span class="badge bg-primary">Indonesian</span>'],
            '37' => ['Irish', '<span class="badge bg-warning">Irish</span>'],
            '38' => ['Italian', '<span class="badge bg-light">Italian</span>'],
            '39' => ['Japanese', '<span class="badge bg-dark">Japanese</span>'],
            '40' => ['Javanese', '<span class="badge bg-danger">Javanese</span>'],
            '41' => ['Kannada', '<span class="badge bg-success">Kannada</span>'],
            '42' => ['Kazakh', '<span class="badge bg-info">Kazakh</span>'],
            '43' => ['Khmer', '<span class="badge bg-primary">Khmer</span>'],
            '44' => ['Korean', '<span class="badge bg-danger">Korean</span>'],
            '45' => ['Kurdish', '<span class="badge bg-warning">Kurdish</span>'],
            '46' => ['Kyrgyz', '<span class="badge bg-light">Kyrgyz</span>'],
            '47' => ['Lao', '<span class="badge bg-secondary">Lao</span>'],
            '48' => ['Latin', '<span class="badge bg-dark">Latin</span>'],
            '49' => ['Latvian', '<span class="badge bg-success">Latvian</span>'],
            '50' => ['Lithuanian', '<span class="badge bg-primary">Lithuanian</span>'],
            '51' => ['Luxembourgish', '<span class="badge bg-info">Luxembourgish</span>'],
            '52' => ['Macedonian', '<span class="badge bg-warning">Macedonian</span>'],
            '53' => ['Malagasy', '<span class="badge bg-danger">Malagasy</span>'],
            '54' => ['Malay', '<span class="badge bg-success">Malay</span>'],
            '55' => ['Malayalam', '<span class="badge bg-light">Malayalam</span>'],
            '56' => ['Maltese', '<span class="badge bg-primary">Maltese</span>'],
            '57' => ['Maori', '<span class="badge bg-info">Maori</span>'],
            '58' => ['Marathi', '<span class="badge bg-dark">Marathi</span>'],
            '59' => ['Mongolian', '<span class="badge bg-secondary">Mongolian</span>'],
            '60' => ['Nepali', '<span class="badge bg-warning">Nepali</span>'],
            '61' => ['Norwegian', '<span class="badge bg-danger">Norwegian</span>'],
            '62' => ['Pashto', '<span class="badge bg-success">Pashto</span>'],
            '63' => ['Persian', '<span class="badge bg-info">Persian</span>'],
            '64' => ['Polish', '<span class="badge bg-primary">Polish</span>'],
            '65' => ['Portuguese', '<span class="badge bg-success">Portuguese</span>'],
            '66' => ['Punjabi', '<span class="badge bg-warning">Punjabi</span>'],
            '67' => ['Romanian', '<span class="badge bg-danger">Romanian</span>'],
            '68' => ['Russian', '<span class="badge bg-info">Russian</span>'],
            '69' => ['Serbian', '<span class="badge bg-dark">Serbian</span>'],
            '70' => ['Sesotho', '<span class="badge bg-light">Sesotho</span>'],
            '71' => ['Shona', '<span class="badge bg-success">Shona</span>'],
            '72' => ['Sindhi', '<span class="badge bg-primary">Sindhi</span>'],
            '73' => ['Sinhala', '<span class="badge bg-warning">Sinhala</span>'],
            '74' => ['Slovak', '<span class="badge bg-danger">Slovak</span>'],
            '75' => ['Slovenian', '<span class="badge bg-info">Slovenian</span>'],
            '76' => ['Somali', '<span class="badge bg-light">Somali</span>'],
            '77' => ['Spanish', '<span class="badge bg-primary">Spanish</span>'],
            '78' => ['Sundanese', '<span class="badge bg-success">Sundanese</span>'],
            '79' => ['Swahili', '<span class="badge bg-warning">Swahili</span>'],
            '80' => ['Swedish', '<span class="badge bg-danger">Swedish</span>'],
            '81' => ['Tagalog', '<span class="badge bg-info">Tagalog</span>'],
            '82' => ['Tajik', '<span class="badge bg-success">Tajik</span>'],
            '83' => ['Tamil', '<span class="badge bg-primary">Tamil</span>'],
            '84' => ['Telugu', '<span class="badge bg-warning">Telugu</span>'],
            '85' => ['Thai', '<span class="badge bg-light">Thai</span>'],
            '86' => ['Turkish', '<span class="badge bg-success">Turkish</span>'],
            '87' => ['Ukrainian', '<span class="badge bg-info">Ukrainian</span>'],
            '88' => ['Urdu', '<span class="badge bg-dark">Urdu</span>'],
            '89' => ['Uzbek', '<span class="badge bg-secondary">Uzbek</span>'],
            '90' => ['Vietnamese', '<span class="badge bg-danger">Vietnamese</span>'],
            '91' => ['Welsh', '<span class="badge bg-primary">Welsh</span>'],
            '92' => ['Xhosa', '<span class="badge bg-success">Xhosa</span>'],
            '93' => ['Yoruba', '<span class="badge bg-warning">Yoruba</span>'],
            '94' => ['Zulu', '<span class="badge bg-light">Zulu</span>'],
        ],
    ];

    return statusReturn($prefix, $statuses, $status, $type);
}
