<?php  namespace App\Models;

use CodeIgniter\Model;

class Url extends Model
{
    protected $table = 'url';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'long_url',
        'short_url',
        'nsfw'
    ];
    protected static $codeLength = 7;
    protected static $chars = "abcdfghjkmnpqrstvwxyz|ABCDFGHJKLMNPQRSTVWXYZ|0123456789";

    function store_long_url($postUrl)
    {
       
        if(filter_var($postUrl, FILTER_VALIDATE_URL ))
    	{
    		// $this->db->insert('long_url', array('long_url'=>$this->input->post('short_url')));
    		$shortCode = $this->generateRandomString(self::$codeLength, $postUrl);
            return $shortCode;
    	}
        else
        {
            return false;
        }
    }

    // Generate random string to create short url
    protected function generateRandomString($length = 6, $postUrl){
        $sets = explode('|', self::$chars);
        $all = '';
        $randString = '';
        foreach($sets as $set){
            // array_rand -> Return an array of random keys:
            $randString .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++){
            $randString .= $all[array_rand($all)];
        }
        // Remove http, https, etc.
        $baseUrl = preg_replace( "#^[^:/.]*[:/]+#i", "", $postUrl );
        // Remove all content after /
        $baseUrl = substr($baseUrl, 0, strpos($baseUrl, "/")); 
        // str_shuffle -> Randomly shuffle all characters of a string:
        $randString = $baseUrl."/".str_shuffle($randString);
        return $randString;
    }
}

?>