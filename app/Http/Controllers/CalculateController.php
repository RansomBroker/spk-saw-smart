<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function calculateView()
    {
        return view('calculates.calculate');
    }

    public function calculate(Request $request)
    {
        $data = [
            'criteria' => Criteria::all(),
            'candidate' => Candidate::with('rating.subCriteria.criteria')->get()
        ];

        if ($request->calculate_type == 1) {
            $this->saw($data);
        } else {
            $this->smart($data);
        }
    }

    private function saw($data)
    {
        $sawData = collect($data);

        // nilai bobot kriteria
        $normalizeCrit = $sawData['criteria']->map(function ($item) {
           return $item->weight / 100;
        })->values();

        // mencari nilai min-max dari tiap kriteria pada calon / alternatif
        $critData = $sawData['candidate']->map(function ($candidate) {
            return $candidate->rating->map(function ($rating) {
                return $rating->subCriteria;
            });
        })->flatten();

        $groupCrit = $critData->groupBy('criteria_id');

        $max = $groupCrit->map(function ($group) {
            return $group->max('value');
        })->values();

        $min = $groupCrit->map(function ($group) {
            return $group->min('value');
        })->values();

        // normalisasi tiap kriteria calon / alternatif
        $normalizeCandidate = $sawData['candidate']->map(function ($candidate) use ($min, $max) {
                return [
                    'name' => $candidate['name'],
                    'candidate_id' => $candidate['id'],
                    'normal' => $candidate->rating->map(function ($rating, $index) use ($min, $max) {
                        if ($rating->subCriteria->criteria['attribute'] == 1) {
                            return $rating->subCriteria['value'] / $max[$index];
                        } else {
                            return $min[$index] / $rating->subCriteria['value'];
                        }
                    })
                ];
        });

        // menghitung perangkingan dari tiap alternatif
        $calculateRanking = $normalizeCandidate->map(function ($candidate) use ($normalizeCrit) {
                return [
                    'name' => $candidate['name'],
                    'candidate_id' => $candidate['candidate_id'],
                    'result' => $candidate['normal']->map(function ($normal, $index) use ($normalizeCrit) {
                                return round($normal * $normalizeCrit[$index], 4);
                    })->sum()
                ];
        });

        $sortedRanking = $calculateRanking->sortByDesc('result')->values();

        $ranking = $sortedRanking->map(function ($item, $rangking) {
            return [
                'name' => $item['name'],
                'candidate_id' => $item['candidate_id'],
                'result' => $item['result'],
                'ranking' => $rangking+1
            ];
        })->values();

    }

    private function smart($data)
    {
        $sawData = collect($data);

        // nilai bobot kriteria
        $normalizeCrit = $sawData['criteria']->map(function ($item) {
            return $item->weight / 100;
        })->values();

        // mencari nilai min-max dari tiap kriteria pada calon / alternatif
        $critData = $sawData['candidate']->map(function ($candidate) {
            return $candidate->rating->map(function ($rating) {
                return $rating->subCriteria;
            });
        })->flatten();

        $groupCrit = $critData->groupBy('criteria_id');

        $max = $groupCrit->map(function ($group) {
            return $group->max('value');
        })->values();

        $min = $groupCrit->map(function ($group) {
            return $group->min('value');
        })->values();

        // normalisasi tiap kriteria calon / alternatif
        $normalizeCandidate = $sawData['candidate']->map(function ($candidate) use ($min, $max) {
            return [
                'name' => $candidate['name'],
                'candidate_id' => $candidate['id'],
                'normal' => $candidate->rating->map(function ($rating, $index) use ($min, $max) {
                    if ($rating->subCriteria->criteria['attribute'] == 1) {
                        return (($rating->subCriteria['value'] - $min[$index]) / ($max[$index] - $min[$index])) * 1;
                    } else {
                        return (($max[$index] - $rating->subCriteria['value']) / ($max[$index] - $min[$index])) * 1;
                    }
                })
            ];
        });

        // menghitung perangkingan dari tiap alternatif
        $calculateRanking = $normalizeCandidate->map(function ($candidate) use ($normalizeCrit) {
            return [
                'name' => $candidate['name'],
                'candidate_id' => $candidate['candidate_id'],
                'result' => $candidate['normal']->map(function ($normal, $index) use ($normalizeCrit) {
                    return round($normal * $normalizeCrit[$index], 4);
                })->sum()
            ];
        });

        $sortedRanking = $calculateRanking->sortByDesc('result')->values();

        $ranking = $sortedRanking->map(function ($item, $rangking) {
            return [
                'name' => $item['name'],
                'candidate_id' => $item['candidate_id'],
                'result' => $item['result'],
                'ranking' => $rangking+1
            ];
        })->values();
    }
}
