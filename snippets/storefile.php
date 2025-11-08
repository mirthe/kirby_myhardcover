<?php if (!file_exists($localfile) OR time()-filemtime($localfile) > 2 * 3600 OR isset($_GET['forcecache'])) {
    
    $endpoint = 'https://api.hardcover.app/v1/graphql';
    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . option('mirthe.myhardcover.token'),
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['query' => $query]));

    $response = curl_exec($ch);
    curl_close($ch);
    
    $fp = fopen($localfile, 'w');
    fwrite($fp, $response);
    fclose($fp);

} else {
    $response = file_get_contents($localfile); 
} ?>
