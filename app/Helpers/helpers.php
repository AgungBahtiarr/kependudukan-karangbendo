<?php

use Illuminate\Support\Facades\Auth;
use App\Model\MedicalRecord;
use App\Model\Option;
use Illuminate\Support\Facades\Request;

function arrayToString($arr, $separator = ',', $ucFirst = false)
{
    $str = '';
    foreach ($arr as $idx => $ar) {
        $str .= $ucFirst ? ucfirst($ar) : $ar;
        if ($idx < count($arr) - 1) $str .= $separator . " ";
    }
    return $str;
}

function unauthorizedReject()
{
    abort(403, 'You don\'t have right permission to access this page / do this action');
}

function getUser()
{
    return Auth::user();
}

function returnStats($status, $message = '', $data = null)
{
    return compact('status', 'message', 'data');
}

function birthdayCounter($dateOfBirth)
{
    $dateOfBirth = new DateTime(date('Y-m-d', strtotime($dateOfBirth)));
    $dateNow = new DateTime('now');

    return $dateOfBirth->diff($dateNow);
}

function generateMedicalRecordId($dateOfBirth, $userSortBy = 'created_at')
{
    $age = birthdayCounter($dateOfBirth)->y;
    $prefix = 'PD';

    if ($age <= 12) {
        $prefix = 'PA';
    } else if ($age <= 17) {
        $prefix = 'PR';
    }

    $lastMedicalRecord = MedicalRecord::orderBy($userSortBy, 'DESC')->first();
    $lastMedicalRecordId = $lastMedicalRecord ? $lastMedicalRecord->id : '0';

    $lastMedicalIDNumber = (int) filter_var($lastMedicalRecordId, FILTER_SANITIZE_NUMBER_INT);

    return $prefix . str_pad($lastMedicalIDNumber + 1, 3, '0', STR_PAD_LEFT);
}

function isActiveSidebar($urlToCompare)
{
    $activeClass = 'active';

    if (is_array($urlToCompare)) {
        foreach ($urlToCompare as $url) {
            if (Request::fullUrl() === $url) return $activeClass;
        }
    } else {
        return Request::fullUrl() == $urlToCompare ? $activeClass : '';
    }
}


function compareTime($first, $comparison, $last)
{
    $first = date('H:i:s', strtotime($first));
    $first = explode(':', $first);
    $first = ($first[0] * 60 * 60) + ($first[1] * 60);

    $last = date('H:i:s', strtotime($last));
    $last = explode(':', $last);
    $last = ($last[0] * 60 * 60) + ($last[1] * 60);

    switch ($comparison) {
        case '<':
            return $first < $last;
        case '>':
            return $first > $last;
        case '<=':
            return $first <= $last;
        case '>=':
            return $first >= $last;
        case '==':
            return $first == $last;
    }
}

function compareDate($firstDate, $comparison, $secondDate)
{

    if (strlen($firstDate > 10)) $firstDate = substr($firstDate, 0, 10);
    if (strlen($secondDate > 10)) $secondDate = substr($secondDate, 0, 10);

    $firstDate = (int) strtotime($firstDate);
    $secondDate = (int) strtotime($secondDate);

    switch ($comparison) {
        case '==':
            return $firstDate === $secondDate;
        case '<':
            return $firstDate < $secondDate;
        case '>':
            return $firstDate > $secondDate;
        case '>=':
            return $firstDate >= $secondDate;
        case '<=':
            return $firstDate <= $secondDate;
    }
}

function remapOptionKey($sources)
{
    $sourceBuff = [];
    foreach ($sources as $source) {
        $sourceBuff[$source->key] = $source;
    }
    return $sourceBuff;
}

function systemOption($key)
{
    $options = remapOptionKey(Option::all());
    return $options[$key]->value;
}

function generateMonthList()
{
    $months = [];
    for ($i = 1; $i <= 12; $i++) {
        $months[date('F', mktime(0, 0, 0, $i, 1, date('Y', time())))] = str_pad($i, 2, '0', STR_PAD_LEFT);
    }
    return $months;
}

function whatMonthIsThis($month, $year = null)
{
    return date($year ? 'F Y' : 'F', mktime(0, 0, 0, $month, 1, $year ?? date('Y', time())));
}

function getCurrentMonthAndYear()
{
    return [
        'month' => date('m', time()),
        'year' => date('Y', time()),
    ];
}

function spawnDateFilterIndicator($reportType = 'monthly', $params = [])
{
    switch ($reportType) {
        case 'monthly':
            return whatMonthIsThis($params['month'], $params['year']);
            break;
        case 'daily':
            return date('d F Y', strtotime($params['date']));
            break;
        case 'range':
            return date('d F Y', strtotime($params['startDate'])) . ' - ' . date('d F Y', strtotime($params['endDate']));
            break;
    }
}

function dataTableBuilder($model, $columns = [])
{
    $dtb = DataTables::of($model);
    foreach ($columns as $columnName => $cb) {
        $dtb->addColumn($columnName, $cb);
    }
    return $dtb->toJson();
}

function processOdontogramScheme($schemas)
{

    $processedOdontograms = [];

    // 4-d-c-10
    // 4-d-t-10
    foreach ($schemas as $schema) {

        $odontogramArr = explode('-', $schema);
        $odontogramLength = $odontogramArr[0];
        $currentOdontogramId = (string) $odontogramArr[3];

        $processedOdontograms[$currentOdontogramId][] = $schema;

        if (count($processedOdontograms[$currentOdontogramId]) == $odontogramLength) {
            $processedOdontograms[$currentOdontogramId] = $currentOdontogramId;
        }
    }

    foreach ($processedOdontograms as $idx => $processedOdontogram) {
        if (gettype($processedOdontogram) === 'array') {
            foreach ($processedOdontogram as $pdIdx => $pd) {
                $pdExploded = explode('-', $pd);
                $processedOdontogram[$pdIdx] = strtoupper($pdExploded[2]) . '-' . $pdExploded[3];
            }
            $processedOdontograms[$idx] = implode(', ', $processedOdontogram);
        };
    }

    return implode(', ', $processedOdontograms);
}

function filterQuery($query, ...$fieldNames)
{
    foreach ($fieldNames as $fn) {
        if (request()->has($fn) && request()[$fn] != '') {
            $query->where($fn, request()[$fn]);
        }
    }
}

function convertIdDateToEn($idDateString)
{
    $idDateString = str_replace('"', '', $idDateString);
    $idDateString = str_replace('sen', 'mon', $idDateString);
    $idDateString = str_replace('sel', 'tue', $idDateString);
    $idDateString = str_replace('rab', 'wed', $idDateString);
    $idDateString = str_replace('kam', 'thu', $idDateString);
    $idDateString = str_replace('jum', 'fri', $idDateString);
    $idDateString = str_replace('sab', 'sat', $idDateString);

    return $idDateString;
}
