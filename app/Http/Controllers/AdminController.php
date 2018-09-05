<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Partner;
use Validator;

class AdminController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {

      $partner = Partner::orderBy('id', 'desc')->get();

      return view('dashboard')->with('partners', $partner);
    }

    public function uploadImagePartner(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'file' => 'image',
            ],
            [
                'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
            ]);
        if ($validator->fails())
            return array(
                'fail' => true,
                'errors' => $validator->errors()
            );
        $extension = $request->file('file')->getClientOriginalExtension();
        $dir = 'uploads/partner-image/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('file')->move($dir, $filename);
        return $filename;
    }

    public function addPartner(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'image' => 'required',
          'description' => 'required',
      ]);

      if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
      }

      $partnerData = [
          'image' => $request->post('image'),
          'description' => $request->post('description')
      ];

      Partner::create($partnerData);

      return response()->json($partnerData, 200);

    }

    public function getPartnerById($id)
    {
        $partner = Partner::find($id);

        return response()->json(['partner' => $partner], 200);
    }

    public function putPartner(Request $request, Partner $partner)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
              return response()->json(['error' => $validator->errors()], 400);
        }

        $partner->where('id', $request->post('id'))->update([
          'image' => $request->post('image'),
          'description' => $request->post('description')
        ]);

        return response()->json([], 204);
    }

    public function deletePartner($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return redirect('admiin');
    }
}
