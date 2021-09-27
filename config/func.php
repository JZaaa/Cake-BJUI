<?php
use Cake\Core\Configure;


if (!function_exists('jsonToArray')) {
    /**
     * jsonDecode json字符串转数组
     * @param string $jsonStr json字符串
     * @return array|mixed
     */
    function jsonToArray(string $jsonStr)
    {
        try {
            $data = json_decode($jsonStr, true);
        } catch (\Exception $e) {
            $data = [];
        }
        return $data;
    }
}

if (!function_exists('arrayToJson')) {
    /**
     * array转json
     * @param $array
     * @param bool $addslashes 在预定义字符之前添加反斜杠的字符串,若用于js解析，请设置为true
     * @return false|string
     */
    function arrayToJson($array, bool $addslashes = false)
    {
        try {
            $data = json_encode($array);
            if ($addslashes) {
                $data = addslashes($data);
            }
        } catch (\Exception $e) {
            $data = json_encode([]);
        }
        return $data;
    }
}

if (!function_exists('formatEnter')) {
    /**
     * 格式化换行，每行格式化为数组
     * @param $string
     * @return array
     */
    function formatEnter(string $string): array
    {
        return !empty($string) ? explode("\r\n", $string) : [];
    }
}


if (!function_exists('unserializeString')) {
    /**
     * 反序列化数据
     * @param string $content
     * @return array
     */
    function unserializeString(string $content): ?array
    {
        $data = null;
        try {
            $data = unserialize($content);
        } catch (\Exception $e) {
        }
        return $data;
    }
}


if (!function_exists('isBlank')) {
    /**
     * 是否为空，排除0
     * @param $value
     * @return boolean
     */
    function isBlank($value): bool
    {
        return empty($value) && !is_numeric($value);
    }
}

if (!function_exists('replaceStr')) {
    /**
     * 中文符号替换为英文
     * @param string $str
     * @return string|string[]
     */
    function replaceStr(string $str)
    {
        return str_replace(['，', '（', '）'],[',', '(', ')'],$str);
    }
}

if (!function_exists('trimSpace')) {
    /**
     * 删除字符串中空格
     * @param string $string
     * @return string|string[]|null
     */
    function trimSpace(string $string)
    {
        return preg_replace('/\s+/','', $string);
    }
}

if (!function_exists('validateDate')) {
    /**
     * 验证时间是否合法
     * @param $date
     * @param string $format
     * @return bool
     */
    function validateDate($date, string $format = 'Y-m-d'): bool
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}

/**
 * 密码强度验证
 */
if (!defined('ValidatePwd')) {
    define('ValidatePwd', '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\s\S]{8,16}$/');
}
if (!defined('ValidatePwdMsg')) {
    define('ValidatePwdMsg', '至少8-16个字符，至少1个大写字母，1个小写字母和1个数字');
}
if (!function_exists('checkPassword')) {
    /**
     * 验证密码强度
     * @param $string
     * @return boolean
     */
    function checkPassword(string $string): bool
    {
        return preg_match(ValidatePwd, $string);
    }
}

