<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ProductTrait;
use App\Models\Products;
use App\Helpers\GlobalHelper;

class ProductController extends Controller
{
    use ProductTrait;

    public function create(Request $request) {
        try {
            $validator = Validator::make($request->all(), Products::$rules['onCreate'], Products::$messages);

            if ($validator->fails()) {
                $message = implode(" | ",$validator->errors()->all());
                $response = GlobalHelper::createResponse(true, $message);

                return $response;
            }

            $name = $this->formattingName($request->name);

            $createProduct = $this->createProduct($name);

        } catch (\Exception $e) {
            $message = 'Terjadi kesalahan saat menambah data product';
            $response = GlobalHelper::createResponse(true, $message);

            return $response;
        }

        $message = 'Sukses menambah data product';
        $response = GlobalHelper::createResponse(false, $message, $createProduct);

        return $response;
    }
}
