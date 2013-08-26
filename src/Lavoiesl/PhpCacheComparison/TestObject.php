<?php

namespace Lavoiesl\PhpCacheComparison;

class TestObject
{
    public $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8;

    public function fill($size)
    {
        $length = round($size / 8);

        for ($i=1; $i <= 8; $i++) {
            $this->{"data$i"} = self::generateGarbage($length);
        }
    }

    private static function generateGarbage($length)
    {
        $garbage = '';

        while (strlen($garbage) < $length) {
            $garbage .= md5(microtime(true));
        }

        return substr($garbage, 0, $length);
    }

    /**
     * Needed by Doctrine\Common\Cache\PhpFileCache
     *
     * @param  array  $data
     * @return self
     */
    public static function __set_state(array $data)
    {
        $obj = new self;

        foreach ($data as $key => $value) {
            $obj->$key = $value;
        }

        return $obj;
    }
}