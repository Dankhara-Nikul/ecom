
<?php $__env->startSection('page_title','Manage Product'); ?>
<?php $__env->startSection('product_select','active'); ?>
<?php $__env->startSection('container'); ?>
<?php if($id>0): ?>
   <?php
      $image_required="";
   ?>
   <?php else: ?>
   <?php
      $image_required="required";
   ?>
<?php endif; ?>
<h1 class="mb10">Manage Product</h1>
<?php if(session()->has('sku_error')): ?>
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   <?php echo e(session('sku_error')); ?>  
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
   </button>
</div> 
<?php endif; ?> 	

<?php $__errorArgs = ['attr_image.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   <?php echo e($message); ?>  
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
   </button>
</div> 
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

<?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   <?php echo e($message); ?>  
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
   </button>
</div> 
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<a href="<?php echo e(url('admin/product')); ?>">
<button type="button" class="btn btn-success">
Back
</button>
</a>
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<div class="row m-t-30">
   <div class="col-md-12">
      <form action="<?php echo e(route('product.manage_product_process')); ?>" method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <?php echo csrf_field(); ?>
                     <div class="form-group">
                        <label for="name" class="control-label mb-1"> Name</label>
                        <input id="name" value="<?php echo e($name); ?>" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" role="alert">
                           <?php echo e($message); ?>		
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     </div>
                     <div class="form-group">
                        <label for="slug" class="control-label mb-1"> Slug</label>
                        <input id="slug" value="<?php echo e($slug); ?>" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" role="alert">
                           <?php echo e($message); ?>		
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     </div>
                     <div class="form-group">
                        <label for="image" class="control-label mb-1"> Image</label>
                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" <?php echo e($image_required); ?>>
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" role="alert">
                           <?php echo e($message); ?>		
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php if($image!=''): ?>
                           <a href="<?php echo e(asset('storage/upload/product/'.$image)); ?>" target="_blank"><img width="100px" src="<?php echo e(asset('storage/upload/product/'.$image)); ?>"/></a>
                        <?php endif; ?>
                     </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-4">
                              <label for="category_id" class="control-label mb-1"> Category</label>
                              <select id="category_id" name="category_id" class="form-control" required>
                                 <option value="">Select Categories</option>
                                 <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($category_id==$list->id): ?>
                                 <option selected value="<?php echo e($list->id); ?>">
                                    <?php else: ?>
                                 <option value="<?php echo e($list->id); ?>">
                                    <?php endif; ?>
                                    <?php echo e($list->category_name); ?>

                                 </option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <div class="col-md-4">
                              <label for="category_id" class="control-label mb-1"> Brand</label>
                              <select id="brand" name="brand" class="form-control" required>
                                 <option value="">Select Brand</option>
                                 <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($brand==$list->id): ?>
                                 <option selected value="<?php echo e($list->id); ?>">
                                    <?php else: ?>
                                 <option value="<?php echo e($list->id); ?>">
                                    <?php endif; ?>
                                    <?php echo e($list->name); ?>

                                 </option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <div class="col-md-4">
                              <label for="model" class="control-label mb-1"> Model</label>
                              <input id="model" value="<?php echo e($model); ?>" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="short_desc" class="control-label mb-1"> Short Desc</label>
                        <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required><?php echo e($short_desc); ?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="desc" class="control-label mb-1"> Desc</label>
                        <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required><?php echo e($desc); ?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="keywords" class="control-label mb-1"> Keywords</label>
                        <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required><?php echo e($keywords); ?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="technical_specification" class="control-label mb-1"> Technical Specification</label>
                        <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required><?php echo e($technical_specification); ?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="uses" class="control-label mb-1"> Uses</label>
                        <textarea id="uses" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required><?php echo e($uses); ?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="warranty" class="control-label mb-1"> Warranty</label>
                        <textarea id="warranty" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required><?php echo e($warranty); ?></textarea>
                     </div>

                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-8">
                              <label for="model" class="control-label mb-1"> Lead Time</label>
                              <input id="lead_time" value="<?php echo e($lead_time); ?>" name="lead_time" type="text" class="form-control" aria-required="true" aria-invalid="false">
                           </div>
                           <div class="col-md-4">
                              <label for="model" class="control-label mb-1"> Tax</label>
                              <select id="tax_id" name="tax_id" class="form-control" required>
                                 <option value="">Select Tax</option>
                                 <?php $__currentLoopData = $taxs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($tax_id==$list->id): ?>
                                 <option selected value="<?php echo e($list->id); ?>">
                                    <?php else: ?>
                                 <option value="<?php echo e($list->id); ?>">
                                    <?php endif; ?>
                                    <?php echo e($list->tax_desc); ?>

                                 </option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                          
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-3">
                              <label for="model" class="control-label mb-1"> IS Promo	</label>
                              <select id="is_promo" name="is_promo" class="form-control" required>
                     <?php if($is_promo=='1'): ?>
                     <option value="1" selected>Yes</option>
                     <option value="0">No</option>
                     <?php else: ?>
                     <option value="1">Yes</option>
                     <option value="0" selected>No</option>
                     <?php endif; ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="model" class="control-label mb-1"> IS Featured	</label>
                              <select id="is_featured" name="is_featured" class="form-control" required>
                     <?php if($is_featured=='1'): ?>
                     <option value="1" selected>Yes</option>
                     <option value="0">No</option>
                     <?php else: ?>
                     <option value="1">Yes</option>
                     <option value="0" selected>No</option>
                     <?php endif; ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="model" class="control-label mb-1"> IS Tranding	</label>
                              <select id="is_tranding" name="is_tranding" class="form-control" required>
                     <?php if($is_tranding=='1'): ?>
                     <option value="1" selected>Yes</option>
                     <option value="0">No</option>
                     <?php else: ?>
                     <option value="1">Yes</option>
                     <option value="0" selected>No</option>
                     <?php endif; ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="model" class="control-label mb-1"> IS Discounted	</label>
                              <select id="is_discounted" name="is_discounted" class="form-control" required>
                     <?php if($is_discounted=='1'): ?>
                     <option value="1" selected>Yes</option>
                     <option value="0">No</option>
                     <?php else: ?>
                     <option value="1">Yes</option>
                     <option value="0" selected>No</option>
                     <?php endif; ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <h2 class="mb10 ml15">Product Images</h2>
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <div class="form-group">
                        <div class="row" id="product_images_box">
                        <?php 
                        $loop_count_num=1;
                        ?>
                        <?php $__currentLoopData = $productImagesArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                        $loop_count_prev=$loop_count_num;
                        $pIArr=(array)$val;
                        ?>
                        <input id="piid" type="hidden" name="piid[]" value="<?php echo e($pIArr['id']); ?>">
                        <div class="col-md-4 product_images_<?php echo e($loop_count_num++); ?>"  >
                              <label for="images" class="control-label mb-1"> Image</label>
                              <input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" >

                              <?php if($pIArr['images']!=''): ?>
                                 <a href="<?php echo e(asset('storage/upload/product/'.$pIArr['images'])); ?>" target="_blank"><img width="100px" src="<?php echo e(asset('storage/upload/product/'.$pIArr['images'])); ?>"/></a>
                              <?php endif; ?>
                           </div>
                           
                           <div class="col-md-2">
                              <label for="images" class="control-label mb-1"> 
                              &nbsp;&nbsp;&nbsp;</label>
                              
                              <?php if($loop_count_num==2): ?>
                                <button type="button" class="btn btn-success btn-lg" onclick="add_image_more()">
                                <i class="fa fa-plus"></i>&nbsp; Add</button>
                              <?php else: ?>
                              <a href="<?php echo e(url('admin/product/product_images_delete/')); ?>/<?php echo e($pIArr['id']); ?>/<?php echo e($id); ?>"><button type="button" class="btn btn-danger btn-lg">
                                <i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                              <?php endif; ?>  

                           </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
            <h2 class="mb10 ml15">Product Attributes</h2>
            <div class="col-lg-12" id="product_attr_box">
               <?php 
               $loop_count_num=1;
               ?>
               <?php $__currentLoopData = $productAttrArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php 
               $loop_count_prev=$loop_count_num;
               $pAArr=(array)$val;
               ?>
               <input id="paid" type="hidden" name="paid[]" value="<?php echo e($pAArr['id']); ?>">
               <div class="card" id="product_attr_<?php echo e($loop_count_num++); ?>">
                  <div class="card-body">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-2">
                              <label for="sku" class="control-label mb-1"> SKU</label>
                              <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo e($pAArr['sku']); ?>" required>
                           </div>
                           <div class="col-md-2">
                              <label for="mrp" class="control-label mb-1"> MRP</label>
                              <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo e($pAArr['mrp']); ?>" required>
                           </div>
                           <div class="col-md-2">
                              <label for="price" class="control-label mb-1"> Price</label>
                              <input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo e($pAArr['price']); ?>" required>
                           </div>
                           <div class="col-md-3">
                              <label for="size_id" class="control-label mb-1"> Size</label>
                              <select id="size_id" name="size_id[]" class="form-control">
                                 <option value="">Select</option>
                                 <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pAArr['size_id']==$list->id): ?>
                                    <option value="<?php echo e($list->id); ?>" selected><?php echo e($list->size); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($list->id); ?>"><?php echo e($list->size); ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="color_id" class="control-label mb-1"> Color</label>
                              <select id="color_id" name="color_id[]" class="form-control">
                                 <option value="">Select</option>
                                 <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pAArr['color_id']==$list->id): ?>
                                    <option value="<?php echo e($list->id); ?>" selected><?php echo e($list->color); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($list->id); ?>"><?php echo e($list->color); ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="fabric_id" class="control-label mb-1"> Fabric</label>
                              <select id="fabric_id" name="fabric_id[]" class="form-control">
                                 <option value="">Select</option>
                                 <?php $__currentLoopData = $fabrics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pAArr['fabric_id']==$list->id): ?>
                                    <option value="<?php echo e($list->id); ?>" selected><?php echo e($list->fabric); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($list->id); ?>"><?php echo e($list->fabric); ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="collar_id" class="control-label mb-1"> Collar</label>
                              <select id="collar_id" name="collar_id[]" class="form-control">
                                 <option value="">Select</option>
                                 <?php $__currentLoopData = $collars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pAArr['collar_id']==$list->id): ?>
                                    <option value="<?php echo e($list->id); ?>" selected><?php echo e($list->collar); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($list->id); ?>"><?php echo e($list->collar); ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="type_id" class="control-label mb-1"> Type</label>
                              <select id="type_id" name="type_id[]" class="form-control">
                                 <option value="">Select</option>
                                 <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pAArr['type_id']==$list->id): ?>
                                    <option value="<?php echo e($list->id); ?>" selected><?php echo e($list->type); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($list->id); ?>"><?php echo e($list->type); ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="pattern_id" class="control-label mb-1"> Pattern</label>
                              <select id="pattern_id" name="pattern_id[]" class="form-control">
                                 <option value="">Select</option>
                                 <?php $__currentLoopData = $patterns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pAArr['pattern_id']==$list->id): ?>
                                    <option value="<?php echo e($list->id); ?>" selected><?php echo e($list->pattern); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($list->id); ?>"><?php echo e($list->pattern); ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <div class="col-md-2">
                              <label for="qty" class="control-label mb-1"> Qty</label>
                              <input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo e($pAArr['qty']); ?>" required>
                           </div>
                           <div class="col-md-4">
                              <label for="attr_image" class="control-label mb-1"> Image</label>
                              <input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" >

                              <?php if($pAArr['attr_image']!=''): ?>
                                 <img width="100px" src="<?php echo e(asset('storage/upload/product/'.$pAArr['attr_image'])); ?>"/>
                              <?php endif; ?>
                           </div>
                           <div class="col-md-2">
                              <label for="attr_image" class="control-label mb-1"> 
                              &nbsp;&nbsp;&nbsp;</label>
                              
                              <?php if($loop_count_num==2): ?>
                                <button type="button" class="btn btn-success btn-lg" onclick="add_more()">
                                <i class="fa fa-plus"></i>&nbsp; Add</button>
                              <?php else: ?>
                              <a href="<?php echo e(url('admin/product/product_attr_delete/')); ?>/<?php echo e($pAArr['id']); ?>/<?php echo e($id); ?>"><button type="button" class="btn btn-danger btn-lg">
                                <i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                              <?php endif; ?>  

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
         <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
            Submit
            </button>
         </div>
         <input type="hidden" name="id" value="<?php echo e($id); ?>"/>
      </form>
   </div>
</div>
<script>
   var loop_count=1; 
   function add_more(){
       loop_count++;
       var html='<input id="paid" type="hidden" name="paid[]" ><div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="form-group"><div class="row">';

       html+='<div class="col-md-2"><label for="sku" class="control-label mb-1"> SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>'; 

       html+='<div class="col-md-2"><label for="mrp" class="control-label mb-1"> MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>'; 

       html+='<div class="col-md-2"><label for="price" class="control-label mb-1"> Price</label><input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

       var size_id_html=jQuery('#size_id').html(); 
       size_id_html = size_id_html.replace("selected", "");
       html+='<div class="col-md-3"><label for="size_id" class="control-label mb-1"> Size</label><select id="size_id" name="size_id[]" class="form-control">'+size_id_html+'</select></div>';

       var color_id_html=jQuery('#color_id').html(); 
       color_id_html = color_id_html.replace("selected", "");
       html+='<div class="col-md-3"><label for="color_id" class="control-label mb-1"> Color</label><select id="color_id" name="color_id[]" class="form-control" >'+color_id_html+'</select></div>';

       html+='<div class="col-md-2"><label for="qty" class="control-label mb-1"> Qty</label><input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

       html+='<div class="col-md-4"><label for="attr_image" class="control-label mb-1"> Image</label><input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" ></div>';

       html+='<div class="col-md-2"><label for="attr_image" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>'; 

       html+='</div></div></div></div>';

       jQuery('#product_attr_box').append(html)
   }
   function remove_more(loop_count){
        jQuery('#product_attr_'+loop_count).remove();
   }

   var loop_image_count=1; 
   function add_image_more(){
      loop_image_count++;
      var html='<input id="piid" type="hidden" name="piid[]" value=""><div class="col-md-4 product_images_'+loop_image_count+'"><label for="images" class="control-label mb-1"> Image</label><input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required></div>';
      //product_images_box
       html+='<div class="col-md-2 product_images_'+loop_image_count+'""><label for="attr_image" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_image_more("'+loop_image_count+'")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>'; 
       jQuery('#product_images_box').append(html)
   }

   function remove_image_more(loop_image_count){
        jQuery('.product_images_'+loop_image_count).remove();
   }
   CKEDITOR.replace('short_desc');
   CKEDITOR.replace('desc');
   CKEDITOR.replace('technical_specification');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/manage_product.blade.php ENDPATH**/ ?>