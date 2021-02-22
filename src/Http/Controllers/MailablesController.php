<?php

namespace mailcct\mailablecct\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use mailcct\mailablecct\Models\MailTemplate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Mail\WelcomeMail;
use Mail;
use Redirect;
use Artisan;

class MailablesController extends Controller
{
    protected $MailTemplate;
    /**
     * 
     * @param 
     */
    public function __construct(MailTemplate $MailTemplate) {

        $this->MailTemplate = $MailTemplate;

    }
    public function index()
    {
        //get data from mail templtaes 
        $mail_template = MailTemplate::select('mail_templates.*')->get();

        //view template
        return view('mailable::sections.view-mailable',compact('mail_template'));
    }

    public function create(Request $request)
    {
        try{
        // create view file
        return view('mailable::sections.new-template');


        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->route('template.templatelist');
        }
    }

    public function store(Request $request)
    {
        try{

        //validation rules
        $validator = Validator::make($request->all(),[
            'mailable_type' => 'required|unique:mail_templates',
            'subject' => 'required',
            'html_template' => 'required',
        ]);


       //check validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
         $mailable = 'WelcomeMail';
        //store mailable
        MailTemplate::create([
            'mailable' =>  $mailable,
            'mailable_type' => $request->mailable_type,
            'subject' => $request->subject,
            'html_template' => $request->html_template,
            'text_template' => $request->text_template,
        ]);

        return redirect()->route('template.templatelist')->withFlashSuccess(__('mailablelang::mailable.successmsg.template_create'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->route('template.templatelist');
        }
    }

    public function edit(Request $request,$id)
    {
        // find detail
        $mail_template =  MailTemplate::findOrFail($id);
        // return view
        return view('mailable::sections.edit-template',compact('mail_template'));
    }

    public function update(Request $request,$id)
    {

        try{
        //validation rules
        $validator = Validator::make($request->all(),[
            'mailable_type' => 'required|unique:mail_templates,mailable_type,'.$id.',id,deleted_at,NULL',
            'subject' => 'required',
            'html_template' => 'required',
        ]);

       //check validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        //update data
       MailTemplate::whereId($id)->update([
            'mailable' => 'WelcomeMail',
            'mailable_type' => $request->mailable_type,
            'subject' => $request->subject,
            'html_template' => $request->html_template,
            'text_template' => $request->text_template,
        ]);
        //view template
        return redirect()->route('template.templatelist');

        }catch(\Exception $ex) {

            Log::error($ex->getMessage());
            return redirect()->route('template.templatelist');

        }
    }
    // soft delete
    public function destroy($id)
    {
       try{
        //check exit or not
        $MailTemplate = MailTemplate::findOrFail($id);
        //delete 
        $MailTemplate->delete();
        // return redirect method
        return redirect()->route('template.templatelist')->withFlashSuccess(__('mailablelang::mailable.successmsg.template_delete'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('template.templatelist')->withFlashDanger($ex->getMessage());
        }
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move(public_path('template/uploads'), $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('template/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function active($id)
    {
        $templateActive = $this->MailTemplate->findOrFail($id);
        $templateActive->status = 'Active';
        $templateActive->save();

        // return redirect method
       return redirect()->route('template.templatelist')->withFlashSuccess(__('mailablelang::mailable.successmsg.template_active'));
    }

    /**
     * Inactive Site User
     * @param $id
     * @return mixed
     */
    public function inactive($id)
    {
        $templateinActive = $this->MailTemplate->findOrFail($id);
        $templateinActive->status = 'Inactive';
        $templateinActive->save();

       // return redirect method
        return redirect()->route('template.templatelist')->withFlashSuccess(__('mailablelang::mailable.successmsg.template_inactive'));
    }




   
}
