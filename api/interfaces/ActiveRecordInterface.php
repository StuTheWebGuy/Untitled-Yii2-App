<?php

namespace app\interfaces;

interface ActiveRecordInterface
{
    /**
     * Returns the singular form of the table name.
     * @return string
     */
    public static function tableNameSingular(): string;
}
