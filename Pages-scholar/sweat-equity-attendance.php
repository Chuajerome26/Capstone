<?php

function predictAcceptance($gwa, $numDocumentsSubmitted, $attendanceHours) {
    // Assuming 1 is the highest GWA and 5 is the lowest
    $maxGwa = 5.0; 
    $minGwa = 1.0; 
    $maxAttendanceHours = 100; // Hypothetical maximum attendance hours for full weight
    $totalRequiredDocuments = 5; // Total number of required documents

    // Weights for each factor
    $gwaWeight = 0.30;
    $documentWeight = 0.30;
    $attendanceWeight = 0.40;

    // Normalize scores
    // Higher GWA (closer to 5) results in a lower score, and vice versa
    $normalizedGwaScore = ($maxGwa - $gwa) / ($maxGwa - $minGwa); //5 - 1 / 5 - 1
    $normalizedDocumentScore = $numDocumentsSubmitted / $totalRequiredDocuments; //5 / 5
    $normalizedDocumentScore = min($normalizedDocumentScore, 1); // Cap at 1 
    $attendanceScore = min($attendanceHours / $maxAttendanceHours, 1);

    // Weighted scores
    $weightedGwaScore = $normalizedGwaScore * $gwaWeight;
    $weightedDocumentScore = $normalizedDocumentScore * $documentWeight;
    $weightedAttendanceScore = $attendanceScore * $attendanceWeight;

    // Total weighted score
    $totalWeightedScore = $weightedGwaScore + $weightedDocumentScore + $weightedAttendanceScore;

    // Convert the score to a percentage and round to 2 decimal places
    $acceptanceChance = round($totalWeightedScore * 100, 2);

    return $acceptanceChance;
}

// Example usage
$percentageChance = predictAcceptance(1.5, 3, 100); // Example values: 2.5 GWA, 4 documents submitted, 80 hours of attendance
echo "Chance of being accepted: " . $percentageChance . "%";
