<?php

namespace App\Http\Controllers;

use App\Therapist;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\TherapistRequest;

class TherapistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $therapists = Therapist::get();
        return view('backend.viewall.therapists')->withTherapists($therapists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.add.therapist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TherapistRequest $request)
    {
        $root_folder = '24102020';
        $year = date('Y');
        $internal_dir = 'therapist';

        // check the existence of the folders
        if (!file_exists("$root_folder")) {
                mkdir("$root_folder", 0777);

                //Create a redirect file.
                $myfile = fopen("$root_folder/index.php", "w") or die("Unable to open file!");
                $txt = "<?php\n";
                $txt .= "header('Location: http://google.com');\n";
                $txt .= "exit();\n";
                fwrite($myfile, $txt);
                fclose($myfile);
        }
        if (!file_exists("$root_folder/$year")) {
                mkdir("$root_folder/$year", 0777);

                //Create a redirect file.
                $myfile = fopen("$root_folder/$year/index.php", "w") or die("Unable to open file!");
                $txt = "<?php\n";
                $txt .= "header('Location: http://google.com');\n";
                $txt .= "exit();\n";
                fwrite($myfile, $txt);
                fclose($myfile);
        }
        if (!file_exists("$root_folder/$year/$internal_dir")) {
                mkdir("$root_folder/$year/$internal_dir", 0777);

                //Create a redirect file.
                $myfile = fopen("$root_folder/$year/$internal_dir/index.php", "w") or die("Unable to open file!");
                $txt = "<?php\n";
                $txt .= "header('Location: http://google.com');\n";
                $txt .= "exit();\n";
                fwrite($myfile, $txt);
                fclose($myfile);
        }
        // End of checks

        //The final path
        $destinationpath = $root_folder . '/' . $year . '/' . $internal_dir . '/';

        //Renaming the file to encrypted name
        $file = $request->file('image_url');
        $filename = $file->getClientOriginalName();
        $exe = explode('.', $filename);
        $extension = $exe[1];
        $newfilename = md5(rand().date("Ymd")).".".$extension; 

        //finally move the file to the server
        $file->move($destinationpath, $newfilename);

        $image_url = $destinationpath . $newfilename;
        $therapist = new Therapist;

        $therapist->name = $request->input('name');
        $therapist->title = $request->input('title');
        $therapist->image_url =  $image_url;
        
        $therapist->description = $request->input('description');
        $therapist->price = $request->input('price');

        $therapist->save();


        session()->push('msg', 'success');
        session()->push('msg', 'Data has been added successfully');

        return redirect('sitebackend/therapist/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Therapist  $therapist
     * @return \Illuminate\Http\Response
     */
    public function show(Therapist $therapist)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Therapist  $therapist
     * @return \Illuminate\Http\Response
     */
    public function edit(Therapist $therapist)
    {
        $therapists = Therapist::find($id);
        if(!$therapists){abort('404');}
        return view('backend.viewall.therapists')->withTherapists($therapist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Therapist  $therapist
     * @return \Illuminate\Http\Response
     */
    public function update(TherapistRequest $request,$id)
    {
        $therapist = Therapist::find($id);
        $therapist->name = $request->input('name');
        $therapist->description = $request->input('description');
        
        $therapist->title = $request->input('title');
        $therapist->price = $request->input('price');
        $therapist->save();
        session()->push('msg', 'success');
        session()->push('msg', 'Data has been updated successfully.');
        return redirect('/sitebackend/therapists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Therapist  $therapist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Therapist $therapist ,$id)
    {
        $therapist = Therapist::find($id);
        Therapist::destroy($id);

        session()->push('msg', 'alert');
        session()->push('msg', 'Data has been deleted successfully.');
         
        return redirect('/sitebackend/therapists');
    }

}
