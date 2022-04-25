<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Zwrócenie sformatowanej tablicy z podziałem na dane właściwe oraz metadane z podstawowymi informacjami paginacji
     */
    public function preparePagination($entity, ?int $currentPage = null) {
        return [
            'data' => $entity ? $entity->items() : null,
            'metadata' => [
                'count' => $entity ? $entity->count() : 0,
                'total' => $entity ? $entity->total() : 0,
                'currentPage' => $entity ? $entity->currentPage() : $currentPage,
                'lastPage' => $entity ? $entity->lastPage() : 1,
                'previousPageUrl' => $entity ? $entity->previousPageUrl() : null,
                'nextPageUrl' => $entity ? $entity->nextPageUrl() : null
            ]
        ];
    }

    /**
     * Zwrócenie liczby elementów do wyświetlenia na stronie oraz numeru bieżącej strony (wykorzystywane w paginacji)
     */
    public function getPaginationAttributes(Request $request) {

        $perPage = (int) $request->get('per_page', env('MAX_SELECTING_RECORDS_LIMIT'));
        $currentPage = (int) $request->get('page', 1);

        if (!is_int($perPage)) {
            $perPage = (int) env('MAX_SELECTING_RECORDS_LIMIT');
        }

        if (!is_int($currentPage)) {
            $currentPage = 1;
        }

        return [
            'perPage' => $perPage,
            'currentPage' => $currentPage,
        ];
    }
}
