<?php

namespace mrssoft\pecom;

use yii\base\Component;

/**
 * Public API for https://pecom.ru/business/developers/api_public/
 */
class Pecom extends Component
{
    /**
     * Getting a list of delivery cities
     * @return array
     */
    public function cityList()
    {
        $data = file_get_contents('http://www.pecom.ru/ru/calc/towns.php');
        if ($data) {
            return json_decode($data, true);
        }

        return null;
    }

    /**
     * Calculating the cost of delivery
     * @param array $params
     * @return array
     */
    public function calc(array $params)
    {
        $p = http_build_query($params);
        $data = file_get_contents('http://calc.pecom.ru/bitrix/components/pecom/calc/ajax.php?' . $p);

        return json_decode($data, true);
    }
}