<?php namespace App\Controllers;

use App\Models\Url;

class UrlController extends BaseController
{
    public function index()
    {
        return view('url/index');
    }

    // Store url to DB
    public function store()
    {
        $url = new Url();
        // Verify long_url input is not empty
        $data['long_url']=$this->request->getPost('long_url');
        if ($this->request->getPost('nsfw')) {
            $data['nsfw'] = 1;
        }else{
            $data['nsfw'] = 0;
        }
        if($data['long_url'])
        {
            // Call model function to short url
            $short_url=$url->store_long_url($data['long_url']);
            if($short_url)
            {
                $data['short_url']=$short_url;
                $url->save($data);
                return redirect()->to(base_url('result'))->with('short_url',  $data['short_url'])->with('long_url',  $data['long_url']);
            }else{
                return redirect()->to(base_url('result'))->with('error', 'Something went wrong, please add a valid URL.');
            }
        }
        
        
    }

    // Get url from DB
    public function result()
    {
        return view('url/result');
    }

    // Get url from DB
    public function top()
    {
        $url = new Url();
        // Fetch all the urls
        $data['url'] = $url->findAll();

        // Pass the data to the view
        return view('url/top', $data);
    }
}