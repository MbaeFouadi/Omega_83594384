<?php
session_start();
include('connexion.php');

function calc( $link, $code_depart){
    $rep = mysqli_query($link,"SELECT * 
    FROM note, candidats, appartenir
    WHERE appartenir.code_depart =  '$code_depart'
    AND candidats.nin = note.nin
    AND (
    candidats.choix1 =  '$code_depart'
    OR candidats.choix2 =  '$code_depart'
    OR candidats.choix3 =  '$code_depart'
    )");
    $e = array();
    $n = array();
    while($data = mysqli_fetch_assoc($rep))
    {       

        $lastMat = null;
        foreach ($data as $index => $element) {
            # code...                
            if(strpos($index, 'bac') || strpos($index, 'tle') || strpos($index, 'pre') || strpos($index, 'sec')){
                $mat = explode('_', $index);
                if($lastMat != $mat[0]){
                    if( (isset($data[$mat[0].'_bac']) && !is_null($data[$mat[0].'_bac'])) && (isset($data[$mat[0].'_sec']) && !is_null($data[$mat[0].'_sec']))  && (isset($data[$mat[0].'_tle']) && !is_null($data[$mat[0].'_tle'])) && (isset($data[$mat[0].'_pre']) && !is_null($data[$mat[0].'_pre']))){

                        $n[$mat[0]] = ((isset($data[$mat[0].'_bac']) && !is_null($data[$mat[0].'_bac']) ? floatval( $data[$mat[0].'_bac'] ) : 0) + (isset($data[$mat[0].'_tle']) && !is_null($data[$mat[0].'_tle']) ? floatval( $data[$mat[0].'_tle'] ) : 0) + (isset($data[$mat[0].'_sec']) && !is_null($data[$mat[0].'_sec']) ? floatval( $data[$mat[0].'_sec'] ) : 0) + (isset($data[$mat[0].'_pre']) && !is_null($data[$mat[0].'_pre']) ? floatval( $data[$mat[0].'_pre'] ) : 0)) / 4;

                    }else{

                        $n[$mat[0]] = ((isset($data[$mat[0].'_bac']) && !is_null($data[$mat[0].'_bac']) ? floatval( $data[$mat[0].'_bac'] ) : 0) + (isset($data[$mat[0].'_tle']) && !is_null($data[$mat[0].'_tle']) ? floatval( $data[$mat[0].'_tle'] ) : 0) + (isset($data[$mat[0].'_sec']) && !is_null($data[$mat[0].'_sec']) ? floatval( $data[$mat[0].'_sec'] ) : 0) + (isset($data[$mat[0].'_pre']) && !is_null($data[$mat[0].'_pre']) ? floatval( $data[$mat[0].'_pre'] ) : 0));
                    }

                    // $element != NULL ? $n[$index] = floatval( $element ) : null;
                }
            }
            $lastMat = $mat[0];

        }
        

        $note = array();

        foreach ($n as $key => $value) {
            # code...$value['note']

            if($value != 0){
                array_push($note, array( 'moyenne' => $value , 'matiere' => $key));
            }
            
        }
        // foreach ($note as $key) {
        // # code...
        //     if($note[$key]['notes'] < 11){
        //         $norme = false;

        //         break;
        //     }
        // }



        $canditat = array(
            'num_recu' => $data['num_recu'],
            'nom' => $data['nom'],
            'nin' => $data['nin'],
            'prenom' => $data['prenom'],
            'date_naiss' => $data['date_naiss'],
            'lieu_naiss' => $data['lieu_naiss']
        );

        array_push($e,array( 'candidat' => $canditat, 'note'=>$note));
    }
        
        
       
    

    return $e;
 
}

// $po = calc( $link , $nin, 'AES');
// echo "<pre>";
// print_r($po);
// echo "</pre>";