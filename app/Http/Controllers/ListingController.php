<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingFormRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index(Request $request) {

        $tagQuery=$request->query('tag');

        $listings=Listing::filterByTagName($tagQuery)->paginate(5)->withQueryString();
        
        return view('laragigs.home',[
            'listings'=>$listings
        ]);
        
    }

    public function show(string $slug,Listing $listing) {

        $trueSlug=$listing->slug; 
  /* 
        if($slug!==$trueSlug) {
          return redirect()->route('listings.show',['slug'=>$trueSlug,'listing'=>$listing->id]);
        }   */

        return view('laragigs.show',[
            'listing'=>$listing
        ]);
    }

    public function create() {
        return view('laragigs.create');
    }

    public function store(ListingFormRequest $request) {
      
        $listing=(new Listing());
        $data=$request->validated();

        /**
        * @var UploadedFile
        */
        $logo=$request->validated('logo');
        $filename=$this->getUploadedFileName($logo);
        if($filename) {
            $data['logo']=$filename;
        }

        $element=Listing::create($data);
       
       return redirect()->route('listings.show',['slug'=>$element->slug,'listing'=>$element->id])
                        ->with('success','Job created succesfully');
    }

    public function update(Listing $listing) {
        
        return view('laragigs.update',[
            'listing'=>$listing
        ]);
    }

    public function save(UpdateListingRequest $request,Listing $listing) {
        
        $data=$request->validated();
        
        /**
         * L'image est supprimée dans la DB si l'utilisateur coche la case pour supprimer
         */
        $delete_status=$request->validated('delete_status')?true:false;
        if($delete_status) {
            /**
             * la cle logo est null si il n'y a pas d'upload d'image
             */
            $data['logo']=null;
            $this->deleteOldLogoPath($listing);
        }

        /**
         * @var uploadedFile
         */
        $logo=$request->validated('logo');

        $filename=$this->getUploadedFileName($logo);
        if($filename) {
            $data['logo']=$filename;
            $this->deleteOldLogoPath($listing);
        }

        $slug=$request->validated('slug');

        $updateStatus=$listing->update($data);
        
        if(!$updateStatus) {
            return redirect()->route('listings.show',['slug'=>$listing->slug,'listing'=>$listing->id])
                        ->with('update_error','Job not update');
        }

        return redirect()->route('listings.show',['slug'=>$slug,'listing'=>$listing->id])
                        ->with('success','Job update successfuly');
    }

    /**
     * Donne le nom du fichier ajouter
     *
     * @param UploadedFile|null $file
     * @param Listing $listing
     * @param boolean $canDeleteFile determine si l'image doit etre supprimé sur le disque
     * @return string|boolean
     */
    private function getUploadedFileName(?UploadedFile $file):string|bool {


        if($file) {
            $newFilename=$file->store();
            return $newFilename;
        }

        return false;

    }

    /**
     * Supprime l'ancienne image du post si il existe
     *
     * @param string $filename
     * @return void
     */
    public function deleteOldLogoPath(Listing $listing):bool {

        $filename=$listing->logo;
        $storage=Storage::disk('public');

        if(empty($filename)) {
            return false;
        }
        
        $status=$storage->fileExists($filename);

        if(!$status) {
            return false;
        }

        return $storage->delete($filename);
    }
}
