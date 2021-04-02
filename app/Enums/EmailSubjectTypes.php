<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class EmailSubjectTypes extends Enum
{
    const DeletionOfNode =   "Deletion of Node";
    const RemovalOfContent =   "Content Removed from Node";
    const UploadOfContent = "Content Uploaded to Node";
}
