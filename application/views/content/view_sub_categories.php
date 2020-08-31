<?php //echo "<pre/>"; print_r($sub_categories); exit(); ?>
<div id="note">
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>   
</div>
<?php
$str = '[';
foreach ($categories as $value) {
    $str .= "{value:" . $value->category_id . ",text:'" . $value->category_name . " '},";
}
$str = substr($str, 0, -1);
$str .= "]";
?>

<!-- X-Editable Scripts-->
<?php
   $this->load->view('plugin_scripts/x-editable_scripts');
?>


               <div class="row">
                    <div class="col-lg-12">
										
						
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                              Sub-category  <strong class="card-title">List</strong>
                            </div>							
                            <div class="card-body">
                <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-2">Sub-category Name</th>
                    <th class="col-2">Parent Category</th>
                    <th  class="col-1">Have Exams</th>
                    <th class="col-1">Have Courses</th>
                    <th class="col-2">Status</th>
                    <th class="col-4">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            foreach ($sub_categories as $category) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td class="col-2"><a href="#" data-name="sub_cat_name" data-type="text" data-url="<?php echo base_url('index.php/admin_control/update_subcategory'); ?>" data-pk="<?=$category->id; ?>" class="data-modify-<?=$category->id; ?> no-style"><?=$category->sub_cat_name; ?></a></td>
                    <td class="col-2"><?php echo $category->category_name; ?> </td>
                    <td class="col-1"><?php echo $mock_count[$category->id]; ?></td>
                    <td class="col-1"><?php echo $course_count[$category->id]; ?></td>
                    <td class="col-2"><?php echo $category->sub_cat_active == 1 ? 'Avtive':'Inactive'; ?></td>
                    <td class="col-4">
<a class="btn btn-outline-primary btn-sm modify" name="modify-<?=$category->id; ?>" href = "#"><i class="fa ti-pencil"></i><span class="invisible-on-md">  Modify</span></a>						
                        <?php if ($category->sub_cat_active == 1) {?>
                            <a class="btn btn-outline-primary btn-sm" href = "<?php echo base_url('index.php/admin_control/mute_subcategory/' . $category->id); ?>"><i class="fa fa-power-off"></i>  Deactivate</a>        
                        <?php }else { ?>
                            <a class="btn btn-outline-primary btn-sm" href = "<?php echo base_url('index.php/admin_control/activate_subcategory/' . $category->id); ?>"><i class="fa fa-check"></i>  Activate </a>
                        <?php } ?>

                        <a onclick="return delete_confirmation()" href = "<?php echo base_url('index.php/admin_control/delete_subcategory/' . $category->id); ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-trash"></i>  Delete</a>
                    </td>
                </tr>
                <?php $i++;
            } ?>
            </tbody>
        </table> 					

                            </div>
                        </div>
                    </div>	


                    </div>
					</div>

