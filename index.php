<?php
header('Content-type: Application/x-mpegURL'); 
echo'#EXTM3U
#EXT-X-VERSION:3
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=1500000,NAME=720p,RESOLUTION=1280x720'."\n";
$id = $_GET['id'];
echo choos('https://app-etslive-2.vidio.com/live/' ,"$id")."\n";
function choos($url, $exxauzt){
    $ch = curl_init();
 
    curl_setopt($ch, CURLOPT_URL, 'https://www.vidio.com/live/'.$exxauzt.'/tokens');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    
    $headers = array();
    $headers[] = 'Authority: www.vidio.com';
    $headers[] = 'Content-Length: 0';
    $headers[] = 'Origin: https://www.vidio.com';
    $headers[] = 'X-UA-Device: mobile-smart';
    $headers[] = 'Dnt: 1';
    $headers[] = 'Accept: /';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Referer: https://www.vidio.com/live/205-live-streaming-indosiar-tv-online-indonesia-vidio-com';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
	$headers[] = 'cookie: ahoy_visitor=4f948ed3-2189-4cb4-bf96-389716e130f3;remember_user_token=eyJfcmFpbHMiOnsibWVzc2FnZSI6IlcxczNPVGs1TnpNd04xMHNJaVF5WVNReE1DUk9TV2wwU2xwRE1HcFRlR0ZOYzA1dlFrOUtRMEpQSWl3aU1UWXpOREl6TXpFeU5DNDNNVE01TkRRMElsMD0iLCJleHAiOiIyMDIzLTEwLTE0VDE3OjM4OjQ0LjcxM1oiLCJwdXIiOiJjb29raWUucmVtZW1iZXJfdXNlcl90b2tlbiJ9fQ%3D%3D--8bca7815bffbd060c82558e02389de9a6e3f4787;ce.s=v11.rlc~1611136422169;shva=1;_vidio=true;sda=false;_dc_gtm_UA-47200845-12=1;asc=5a910da91771f36c462d0f191b3;_auc=3d1686a4175fa4879aa9a435470;_gid=GA1.2.1127931063.1611136420;_gat_UA-47200845-12=1;plenty_id=57152563;_vidio_session=UjI1QTRTSWt1cXZTYjZlQjBKOFlGdWxaelFFVzlRd2FURmVmcWIrTUcvY0FLSnlBbUNCMDlMYm85dU40TnZ2cHBIbmNjNlErU2hKZ0c4SWllZnJreFkwNGRIeWoxaVVoM3FJL25nTzNhQmhZREpFd254dGQ1T3I1MnFOSmgyQWdGcnlVRlF0QXozaEZLaTd0Vkprd2NOTitnSW9zUklGNDVKRWFYYnNLZFZ4Z0o3RGdFMnoyVHJNaXEvNEF2aHhBREtUS2VnWTU1QzJ6ZEFtc1AwMXlrdTJJZSsrZjVMUktqTlZ5ZWgwNklQZkd6bkZWL0t5ZURNbTdhOFpnTFpLL2VsVGJXRFZQYzdFcHI5WXdHYWdBYXlxdU16d1RIbWpGSTk1ditXSnBkMGhBam5yUnFUYjBJSGEzQ0lNSk9pL3hkSHNTcHI3YWV1cU5TejhnUFZNTjYxNVgxUnhheDZqUlhrS1pjaElIZTNtUDZRU3JaQlkydjJ0Y3ovUGN2ZEw3dmh5YktPNkVkcFVkOS9WVThZYjVmTHFRUnBidWRpdDVBVzYvYkhYUThVdURFY0tvcEFWM2JNY09uc3BSZ0JyVVBYOTMydDZGaW5oNDdVZDBtVUhka3JaanRaY1lYR0ZjL2FMZlcyOGNlZng0SkVVZWVqNFJkVDV0bGZocGlKMnNqV2RXRmlwUmNwdDlLaW1mVXZhbS9BPT0tLW90SlpFZUdmSHhvRDZ1VVptTHZsaHc9PQ%3D%3D--a78041767b2a9bfc6c61b0517845fbfc2c863ead=GS1.1.1611136419.31.1.1611137095.53;_ga=GA1.1.457970976.1605540749;_fbp=fb.1.1608799772349.519047493;ahoy_visit=eab44f40-b5aa-4454-a587-02c1039e989a;show_phone_verification_modal=true;luws=fc6901b639730e006deb0554_57152563;kppid_managed=kppidff_NxLYJm71';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
}
 
    $result = json_decode($result, true);
    $token = $result['token'];
    curl_close($ch);
   
    if (preg_match("/@/", $url)) {
        $urlreq = $url.'/master.m3u8?'.$token;
    }else{
        $urlreq = "https://app-etslive-2.vidio.com/live/$exxauzt/master.m3u8?$token";
    }
    // echo $urlreq;
    $ch = curl_init();
 
    curl_setopt($ch, CURLOPT_URL, $urlreq);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
 
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
 
    $headers = array();
    $headers[] = 'Authority: app-etslive-2.vidio.com';
    $headers[] = 'Origin: https://www.vidio.com';
    $headers[] = 'X-UA-Device: mobile-smart';
    $headers[] = 'Dnt: 1';
    $headers[] = 'Accept: /';
    $headers[] = 'Sec-Fetch-Site: same-site';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Referer: https://www.vidio.com/';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    $result = preg_replace('/#(.*?)\n/', '', $result);
    // $result = explode("\n", );
    $result = preg_replace('/#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=(.?)RESOLUTION(.?)\n/', '', $result);
    $tot = count(explode("\n", $result));
    if ($tot <= 2) {
        echo " exxauzt Eror ";
    }else{
        $dat = explode("\n", $result);
        echo $dat[0];
echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=1200000,NAME=480p,RESOLUTION=854x480'."\n";
         $dat = explode("\n", $result);
        echo $dat[1];
echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=625000,NAME=360p,RESOLUTION=640x360'."\n";
         $dat = explode("\n", $result);
        echo $dat[2];
echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=375000,NAME=240p,RESOLUTION=426x240'."\n";
         $dat = explode("\n", $result);
        echo $dat[3];
        preg_match_all('/(.?)_720(.?)\n/', $result, $match);
         preg_match_all('/(.?)_480(.?)\n/', $result, $match);
          preg_match_all('/(.?)_360(.?)\n/', $result, $match);
          preg_match_all('/(.?)_240(.?)\n/', $result, $match);
        // preg_match_all('/(.?)_720(.?)\n/', $result, $match);
        if (count($match[0])<=1) {
            preg_match_all('/(.?)_720(.?)\n/', $result, $match);
                if (count($match[0])<=1) {
                preg_match_all('/(.?)_720(.?)\n/', $result, $match);
            }
        }
        // var_dump($match[0]); //ini buat manggil result cuman resolusi 720p
        // var_dump(explode("\n", $result)); // Ini buat liat semua resolusi
        // echo $result[5]; // ini buat manggil result index ke 5 /hls-b/ ingest_205_720p
    }
 
    curl_close($ch);
 
   
}