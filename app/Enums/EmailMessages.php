<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class EmailMessages
 * @package App\Enums
 */
final class EmailMessages extends Enum
{

    const DeletionOfNodeMessage = "The Node has been removed by the owner of the Node and it no longer exists.
    All uploaded contents have also been removed. Please target another Node.";
    const RemovalOfContentMessage = "  has been removed from the Node. Please contact Node owner for more information.";
    const UploadOfContentMessage = "  has been uploaded to the Node. Contact the content owner for more information. ";
    const DisplayFlaggedMessage = " has been flagged. Being flagged is an indication that a user might have uploaded unsuitable
    to the node. Please check all uploads for any inappropriate content and remove the content if need be!";

}

