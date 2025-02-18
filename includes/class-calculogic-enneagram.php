<?php

namespace Calculogic\Includes;

class Calculogic_Enneagram {

    public static function calculate_scores($responses) {
        $scores = array(
            'A' => Calculogic_Workflow::sum_fields(array($responses['Q1']['A'], $responses['Q2']['A'], $responses['Q3']['A'], $responses['Q4']['A'], $responses['Q5']['A'])),
            'B' => Calculogic_Workflow::sum_fields(array($responses['Q1']['B'], $responses['Q2']['B'], $responses['Q3']['B'], $responses['Q4']['B'], $responses['Q5']['B'])),
            'E' => Calculogic_Workflow::sum_fields(array($responses['Q1']['E'], $responses['Q2']['E'], $responses['Q3']['E'], $responses['Q4']['E'], $responses['Q5']['E'])),
            'F' => Calculogic_Workflow::sum_fields(array($responses['Q1']['F'], $responses['Q2']['F'], $responses['Q3']['F'], $responses['Q4']['F'], $responses['Q5']['F'])),
            'G' => Calculogic_Workflow::sum_fields(array($responses['Q1']['G'], $responses['Q2']['G'], $responses['Q3']['G'], $responses['Q4']['G'], $responses['Q5']['G'])),
            'I' => Calculogic_Workflow::sum_fields(array($responses['Q1']['I'], $responses['Q2']['I'], $responses['Q3']['I'], $responses['Q4']['I'], $responses['Q5']['I'])),
        );

        $filtered_scores = Calculogic_Workflow::filter_fields($scores, function($score) {
            return $score > 0;
        });

        $sorted_scores = Calculogic_Workflow::sort_fields($filtered_scores, 'desc');

        return $sorted_scores;
    }

    public function calculate_enneagram($data) {
        // Enneagram calculation logic
    }
}