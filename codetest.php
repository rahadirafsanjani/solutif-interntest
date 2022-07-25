<?php
    // Rafsanjani Rahadi - UAD

    // Note 
    /* saya menggunakan algoritma sliding window untuk pengelesaian masalah pada soal yang saya kerjakan,
    algoritma ini berjalan dengan cara "pergeseran jendela" mempertahankan jendela yang dimulai dari elemen saat 
    ini, dan jumlah elemennya lebih dari atau sama dengan jumlah yang diberikan. Jika jumlah jendela saat ini menjadi 
    kurang dari jumlah yang diberikan, maka jendela tidak stabil, dan kami terus menambahkan elemen ke jendela saat 
    ini dari kanan sampai jendela menjadi stabil kembali. */


    function app($myArray, $nofArray, $sum){
        // variable deklaration
        $windowSum = 0;
        $high = 0;

        // starting loop
        for ($low = 0; $low < $nofArray; $low++) {
            // also loop for finding target with windowsum
            while ($windowSum < $sum && $high < $nofArray){
                $windowSum += $myArray[$high];
                $high++;
            }
            // special case if 0 is targeted
            if ($sum === 0){
                $find0 = array_search( 0, $myArray);
                echo "Sum found between indexes ", $find0, " and ", $find0, " and the real number is : ", 0, " + ", 0, " = ", 0;
                break;
            } 
            if ($windowSum == $sum){
                $sum1 = $myArray[$low];
                $sum2 = $myArray[$high-1];
                if ($sum1 !== $sum2){
                    echo "Sum found between indexes ", $low, " and ", $high-1, " and the real number is : ", $sum1, " + ", $sum2, " = ", $sum;
                    return;
                } 
                // special case for target just need 1 index
                if ($sum1 === $sum2) {
                    echo "Sum found use single index ", $low, " and the real number is : ", $sum1, " + ", 0, " = ", $sum;
                }
            }
            $windowSum -= $myArray[$low];
        }
    }

    // Driver Code
    $myArray= array(1, 8, 2, 6, 0, 9, 7, 3, 5, 4);
    $nofArray = sizeof($myArray);
    $sum = 9;
    app($myArray, $nofArray, $sum);

?>