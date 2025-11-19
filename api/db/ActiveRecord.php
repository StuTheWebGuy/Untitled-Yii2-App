<?php

declare(strict_types=1);

namespace app\db;

use app\interfaces\ActiveRecordInterface;

/**
 * apply overrides to ActiveRecord
 */
abstract class ActiveRecord extends \yii\db\ActiveRecord implements ActiveRecordInterface
{

}
