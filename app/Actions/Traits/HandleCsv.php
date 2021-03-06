<?php

namespace App\Actions\Traits;

use App\Actions\Init;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait HandleCsv
{
    /**
     * 把 csv 轉成需要放進資料庫內的 data
     *
     * @param string $fileName csv 檔名，同時為 database, model 的名字
     * @param string $type
     * @return array
     */
    private function handleCsvData(string $fileName, string $type): array
    {
        $csvArray = $this->openCsvToArray($fileName, $type);

        $model = "App\\Model\\" . Str::ucfirst(Str::singular($fileName));
        $tableAttributes = Schema::getColumnListing((new $model())->getTable());

        $insertKeys = $this->handleInsertKeys($tableAttributes);
        $keyNumber = count($insertKeys);

        $insertData = [];
        foreach ($csvArray as $data) {
            if (count(array_slice($data, 0, $keyNumber)) == $keyNumber) {
                $insertData[] = array_combine($insertKeys, array_slice($data, 0, $keyNumber));
            }
        }
        return $insertData;
    }

    /**
     * 把需要的 attributes 取出來
     * @param array $tableAttributes
     *
     * @return array
     */
    private function handleInsertKeys(array $tableAttributes): array
    {
        $insertKeys = [];
        foreach ($tableAttributes as $attribute) {
            if (strpos($attribute, 'id') === false) {
                $insertKeys[] = $attribute;
            }
        }
        return $insertKeys;
    }

    /**
     * @param string $fileName
     * @param string $type
     *
     * @return array
     */
    private function openCsvToArray(string $fileName, string $type): array
    {
        if ($type === Init::CSV_TYPE_TEST) {
            $fileName .= '_' . Init::CSV_TYPE_TEST;
        }
        try {
            $filePath = storage_path("app/$fileName.csv");
            $file = file($filePath);
        } catch (\Exception $e) {
            dd("$fileName.csv 不存在！");
        }

        $csvArray = array_map('str_getcsv', $file);
        // 標頭不需要，把它推除 array
        array_shift($csvArray);

        return $csvArray;
    }
}
