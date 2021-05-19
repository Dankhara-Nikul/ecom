<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = Product::all();
        return view('admin/product', $result);
    }


    public function manage_product(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Product::where(['id' => $id])->get();

            $result['category_id'] = $arr['0']->category_id;
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['slug'] = $arr['0']->slug;
            $result['brand'] = $arr['0']->brand;
            $result['model'] = $arr['0']->model;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['desc'] = $arr['0']->desc;
            $result['keywords'] = $arr['0']->keywords;
            $result['technical_specification'] = $arr['0']->technical_specification;
            $result['uses'] = $arr['0']->uses;
            $result['warranty'] = $arr['0']->warranty;
            $result['lead_time'] = $arr['0']->lead_time;
            $result['tax_id'] = $arr['0']->tax_id;
            $result['is_promo'] = $arr['0']->is_promo;
            $result['is_featured'] = $arr['0']->is_featured;
            $result['is_discounted'] = $arr['0']->is_discounted;
            $result['is_tranding'] = $arr['0']->is_tranding;
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id;

            $result['productAttrArr'] = DB::table('products_attr')->where(['products_id' => $id])->get();

            $productImagesArr = DB::table('product_images')->where(['products_id' => $id])->get();

            if (!isset($productImagesArr[0])) {
                $result['productImagesArr']['0']['id'] = '';
                $result['productImagesArr']['0']['images'] = '';
            } else {
                $result['productImagesArr'] = $productImagesArr;
            }
            //$result['productImagesArr']
        } else {
            $result['category_id'] = '';
            $result['name'] = '';
            $result['slug'] = '';
            $result['image'] = '';
            $result['brand'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keywords'] = '';
            $result['technical_specification'] = '';
            $result['uses'] = '';
            $result['warranty'] = '';
            $result['lead_time'] = '';
            $result['tax_id'] = '';
            $result['is_promo'] = '';
            $result['is_featured'] = '';
            $result['is_discounted'] = '';
            $result['is_tranding'] = '';
            $result['status'] = '';
            $result['id'] = 0;

            $result['productAttrArr'][0]['id'] = '';
            $result['productAttrArr'][0]['products_id'] = '';
            $result['productAttrArr'][0]['sku'] = '';
            $result['productAttrArr'][0]['attr_image'] = '';
            $result['productAttrArr'][0]['mrp'] = '';
            $result['productAttrArr'][0]['price'] = '';
            $result['productAttrArr'][0]['qty'] = '';
            $result['productAttrArr'][0]['size_id'] = '';
            $result['productAttrArr'][0]['color_id'] = '';
            $result['productAttrArr'][0]['fabric_id'] = '';
            $result['productAttrArr'][0]['type_id'] = '';
            $result['productAttrArr'][0]['pattern_id'] = '';
            $result['productAttrArr'][0]['collar_id'] = '';
            $result['productAttrArr'][0]['pattern_id'] = '';
            $result['productAttrArr'][0]['type_id'] = '';

            $result['productImagesArr']['0']['id'] = '';
            $result['productImagesArr']['0']['images'] = '';
            /*echo '<pre>';
            print_r( $result['productAttrArr']);
            die();*/
        }
        /*echo '<pre>';
        print_r( $result);
        die();*/
        $result['category'] = DB::table('categories')->where(['status' => 1])->get();

        $result['sizes'] = DB::table('sizes')->where(['status' => 1])->get();

        $result['colors'] = DB::table('colors')->where(['status' => 1])->get();
        $result['fabrics'] = DB::table('fabrics')->where(['status' => 1])->get();
        $result['collars'] = DB::table('collars')->where(['status' => 1])->get();
        $result['types'] = DB::table('types')->where(['status' => 1])->get();
        $result['patterns'] = DB::table('patterns')->where(['status' => 1])->get();

        $result['brands'] = DB::table('brands')->where(['status' => 1])->get();

        $result['taxs'] = DB::table('taxs')->where(['status' => 1])->get();
        return view('admin/manage_product', $result);
    }

    public function manage_product_process(Request $request)
    {
        //return $request->post();
        //echo '<pre>';
        //print_r($request->post());
        //die();
        if ($request->post('id') > 0) {
            $image_validation = "mimes:jpeg,jpg,png";
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png";
        }
        $request->validate([
            'name' => 'required',
            'image' => $image_validation,
            'slug' => 'required|unique:products,slug,' . $request->post('id'),
            'attr_image.*' => 'mimes:jpg,jpeg,png',
            'images.*' => 'mimes:jpg,jpeg,png'
        ]);

        $paidArr = $request->post('paid');
        $skuArr = $request->post('sku');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');
        $fabric_idArr = $request->post('fabric_id');
        $collar_idArr = $request->post('collar_id');
        $type_idArr = $request->post('type_id');
        $pattern_idArr = $request->post('pattern_id');
        foreach ($skuArr as $key => $val) {
            $check = DB::table('products_attr')->where('sku', '=', $skuArr[$key])->where('id', '!=', $paidArr[$key])->get();

            if (isset($check[0])) {
                $request->session()->flash('sku_error', $skuArr[$key] . ' SKU already used');
                return redirect(request()->headers->get('referer'));
            }
        }

        if ($request->post('id') > 0) {
            $model = Product::find($request->post('id'));
            $msg = "Product updated";
        } else {
            $model = new Product();
            $msg = "Product inserted";
        }

        if ($request->hasfile('image')) {
            if ($request->post('id') > 0) {
                $arrImage = DB::table('products')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/public/media/' . $arrImage[0]->image)) {
                    Storage::delete('/public/media/' . $arrImage[0]->image);
                }
            }
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media', $image_name);
            $model->image = $image_name;
        }

        $model->category_id = $request->post('category_id');;
        $model->name = $request->post('name');
        $model->slug = $request->post('slug');
        $model->brand = $request->post('brand');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->desc = $request->post('desc');
        $model->keywords = $request->post('keywords');
        $model->technical_specification = $request->post('technical_specification');
        $model->uses = $request->post('uses');
        $model->warranty = $request->post('warranty');
        $model->lead_time = $request->post('lead_time');
        $model->tax_id = $request->post('tax_id');
        $model->is_promo = $request->post('is_promo');
        $model->is_featured = $request->post('is_featured');
        $model->is_discounted = $request->post('is_discounted');
        $model->is_tranding = $request->post('is_tranding');
        $model->status = 1;
        $model->save();
        $pid = $model->id;
        /*Product Attr Start*/
        foreach ($skuArr as $key => $val) {
            $productAttrArr = [];
            $productAttrArr['products_id'] = $pid;
            $productAttrArr['sku'] = $skuArr[$key];
            $productAttrArr['mrp'] = (int)$mrpArr[$key];
            $productAttrArr['price'] = (int)$priceArr[$key];
            $productAttrArr['qty'] = (int)$qtyArr[$key];
            if ($size_idArr[$key] == '') {
                $productAttrArr['size_id'] = 0;
            } else {
                $productAttrArr['size_id'] = $size_idArr[$key];
            }

            if ($color_idArr[$key] == '') {
                $productAttrArr['color_id'] = 0;
            } else {
                $productAttrArr['color_id'] = $color_idArr[$key];
            }
            if ($fabric_idArr[$key] == '') {
                $productAttrArr['fabric_id'] = 0;
            } else {
                $productAttrArr['fabric_id'] = $fabric_idArr[$key];
            }
            if ($collar_idArr[$key] == '') {
                $productAttrArr['collar_id'] = 0;
            } else {
                $productAttrArr['collar_id'] = $collar_idArr[$key];
            }
            if ($type_idArr[$key] == '') {
                $productAttrArr['type_id'] = 0;
            } else {
                $productAttrArr['type_id'] = $type_idArr[$key];
            }
            if ($pattern_idArr[$key] == '') {
                $productAttrArr['pattern_id'] = 0;
            } else {
                $productAttrArr['pattern_id'] = $pattern_idArr[$key];
            }
            if ($request->hasFile("attr_image.$key")) {
                if ($paidArr[$key] != '') {
                    $arrImage = DB::table('products_attr')->where(['id' => $paidArr[$key]])->get();
                    if (Storage::exists('/public/media/' . $arrImage[0]->attr_image)) {
                        Storage::delete('/public/media/' . $arrImage[0]->attr_image);
                    }
                }

                $rand = rand('111111111', '999999999');
                $attr_image = $request->file("attr_image.$key");
                $ext = $attr_image->extension();
                $image_name = $rand . '.' . $ext;
                $request->file("attr_image.$key")->storeAs('/public/media', $image_name);
                $productAttrArr['attr_image'] = $image_name;
            }

            if ($paidArr[$key] != '') {
                DB::table('products_attr')->where(['id' => $paidArr[$key]])->update($productAttrArr);
            } else {
                DB::table('products_attr')->insert($productAttrArr);
            }
        }

        /*Product Attr End*/

        /*Product Images Start*/
        $piidArr = $request->post('piid');
        foreach ($piidArr as $key => $val) {
            $productImageArr['products_id'] = $pid;
            if ($request->hasFile("images.$key")) {

                if ($piidArr[$key] != '') {
                    $arrImage = DB::table('product_images')->where(['id' => $piidArr[$key]])->get();
                    if (Storage::exists('/public/media/' . $arrImage[0]->images)) {
                        Storage::delete('/public/media/' . $arrImage[0]->images);
                    }
                }

                $rand = rand('111111111', '999999999');
                $images = $request->file("images.$key");
                $ext = $images->extension();
                $image_name = $rand . '.' . $ext;
                $request->file("images.$key")->storeAs('/public/media', $image_name);
                $productImageArr['images'] = $image_name;

                if ($piidArr[$key] != '') {
                    DB::table('product_images')->where(['id' => $piidArr[$key]])->update($productImageArr);
                } else {
                    DB::table('product_images')->insert($productImageArr);
                }
            }
        }

        /*Product Images End*/

        $request->session()->flash('message', $msg);
        return redirect('admin/product');
    }

    public function delete(Request $request, $id)
    {
        $model = Product::find($id);
        $model->delete();
        $request->session()->flash('message', 'Product deleted');
        return redirect('admin/product');
    }

    public function product_attr_delete(Request $request, $paid, $pid)
    {
        $arrImage = DB::table('products_attr')->where(['id' => $paid])->get();
        if (Storage::exists('/public/media/' . $arrImage[0]->attr_image)) {
            Storage::delete('/public/media/' . $arrImage[0]->attr_image);
        }
        DB::table('products_attr')->where(['id' => $paid])->delete();
        return redirect('admin/product/manage_product/' . $pid);
    }

    public function product_images_delete(Request $request, $paid, $pid)
    {
        $arrImage = DB::table('product_images')->where(['id' => $paid])->get();
        if (Storage::exists('/public/media/' . $arrImage[0]->images)) {
            Storage::delete('/public/media/' . $arrImage[0]->images);
        }
        DB::table('product_images')->where(['id' => $paid])->delete();
        return redirect('admin/product/manage_product/' . $pid);
    }

    public function status(Request $request, $status, $id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Product status updated');
        return redirect('admin/product');
    }
    public function import_product(Request $request)
     {
    //     $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    //     // Validate whether selected file is a CSV file
    //     if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

    //         // If the file is uploaded
    //         if (is_uploaded_file($_FILES['file']['tmp_name'])) {

    //             // Open uploaded CSV file with read-only mode
    //             $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

    //             // Skip the first line
    //             fgetcsv($csvFile);

    //             // Parse data from CSV file line by line
    //             while (($line = fgetcsv($csvFile)) !== FALSE) {
    //                 // Get row data
    //                 $name   = $line[0];
    //                 $email  = $line[1];
    //                 $phone  = $line[2];
    //                 $status = $line[3];

    //                 // Check whether member already exists in the database with the same email
    //                 $prevQuery = "SELECT id FROM members WHERE email = '" . $line[1] . "'";
    //                 $prevResult = $db->query($prevQuery);

    //                 if ($prevResult->num_rows > 0) {
    //                     // Update member data in the database
    //                     $db->query("UPDATE members SET name = '" . $name . "', phone = '" . $phone . "', status = '" . $status . "', modified = NOW() WHERE email = '" . $email . "'");
    //                 } else {
    //                     // Insert member data in the database
    //                     $db->query("INSERT INTO members (name, email, phone, created, modified, status) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', NOW(), NOW(), '" . $status . "')");
    //                 }
    //             }

    //             // Close opened CSV file
    //             fclose($csvFile);

    //             $qstring = '?status=succ';
    //         } else {
    //             $qstring = '?status=err';
    //         }
    //     } else {
    //         $qstring = '?status=invalid_file';
    //     }
        $result['data'] = Product::all();
        return view('admin/product', $result);
    }
    public function export_product(Request $request)
    {
        $filename = "members_" . date('Y-m-d') . ".csv";
        $delimiter = ",";

        // Create a file pointer 
        $f = fopen('php://memory', 'w');

        // Set column headers 
        $fields = array('category_id', 'name', 'image', 'slug', 'brand', 'model', 'short_desc', 'desc', 'keywords', 'technical_specification', 'uses', 'warranty', 'lead_time', 'tax_id', 'is_promo', 'is_featured', 'is_discounted', 'is_tranding', 'status');
        fputcsv($f, $fields, $delimiter);

        // Get records from the database 
        $result = Product::all();



        //     // Output each row of the data, format line as csv and write to file pointer 
        foreach ($result as $row) {
            $lineData = array($row['id'], $row['category_id'], $row['name'], $row['image'], $row['slug'], $row['brand'], $row['model'], $row['short_desc'], $row['desc'], $row['keywords'], $row['technical_specification'], $row['uses'], $row['warranty'], $row['lead_time'], $row['tax_id'], $row['is_promo'], $row['is_featured'], $row['is_tranding'], $row['status']);
            fputcsv($f, $lineData, $delimiter);
        }

        // Move back to beginning of file 
        fseek($f, 0);

        // Set headers to download file rather than displayed 
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        // Output all remaining data on a file pointer 
        fpassthru($f);

        // Exit from file 
        exit();
        $result['data'] = Product::all();
        return view('admin/product', $result);
    }
}
