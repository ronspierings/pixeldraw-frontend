<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PixelModel;
use Illuminate\Http\Request; // Import the Request class
use Illuminate\Http\Response; // Import the Response class

class PixelController extends Controller
{
 
    public function index()
    {
        // Initialize empty array (to be returned)
        $pixelsArray = [];

        // Retrieve all Pixels and divide into Rows and Columns
        foreach(PixelModel::all() as $value)
        {
            $pixelsArray[$value->pos_x][$value->pos_y] = $value;
        }

        // Send to the User
        return response()->json($pixelsArray, Response::HTTP_OK);
    }


    /*
        https://laravel.com/docs/10.x/eloquent#updates
    */
    public function pixelChange(Request $request)
    {
        // TODO Let the validate request check 'color' for a valid HEX-color
          /* $validated = $request->validate([
            'pos_x' => ['required', 'int'],
            'pos_y' => ['required', 'int'],
            'color' => 'required|regex:/^#[A-Fa-f0-9]{6}$/'
        ]);
        */

        // Read the request data
        $reqPos_x = $request->input('pos_x');
        $reqPos_y = $request->input('pos_y');
        $reqColor = $request->input('color');



        // Find the PixelModel in the DB
        $pixelModel = PixelModel::where([
          ['pos_x', '=', $reqPos_x],
          ['pos_y', '=', $reqPos_y]          
        ])->first();
      

        // PixelModel not found?
        if( $pixelModel == false)
        {
            // PixelModel not found in the database
            return response()->json([
                'message' => 'The given Pixel could not be found.',
                'request' => $request,
                'data' => $request->all()
            ], 404);
        }

        // Update the color
        $pixelModel->color = $reqColor;

        // Write to to database
        if($pixelModel->save())
        {
            return response()->json([
                'message' => 'Pixel-color updated successfully.',
                'data' => $pixelModel
            ], 201);
        }
        else {
            return response()->json([
                'message' => 'Pixel update could not be saved.',
                'error' => $pixelModel->getErrors(),
                'data' => $request->all(),
                'request' => $request

            ], 500);
        }
    }
}