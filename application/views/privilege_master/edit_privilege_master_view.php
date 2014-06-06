<div class="grid_4">

                                        
                                          <div class="da-form-row" id="msg">
                                                    
                                                </div>
                                        
                                        
                                    </div>                
                            
                            
                            
                            
    <div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="../employee/images/icons/color/accept.png" alt="" />
                                        <?php echo $title;?>
                                    </span>
                                </div>
                                <div class="da-panel-content">
                                	<form id="edit_master_priviledge" class="da-form" name="edit_master_priviledge">
                                            <div id="da-validate-error" class="da-message error" style="display:none;"></div>
                                            <div class="da-form-inline">
                                                <div class="da-form-row">
                                                    <label>LCS System</label>
                                                    <div class="da-form-item small">
                                                       <select id="Main_System_Code" name="Main_System_Code">
                                                       
                                                        <!-- <option value="">Please Select</option>  -->
                                                         <?php	foreach($systems as $rowsystems)
														{  ?> 
                                                       <option <?php  if($masterpriviledgebyid->Main_System_Code==$rowsystems->System_Code){  echo 'selected="selected"'; }?> value="<?php echo $rowsystems->System_Code;?>"><?php echo $rowsystems->System;?></option>
                                                       <?php } ?>
                                                       </select>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="da-form-row">
                                                    <label>Master Priviledge</label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="Master_Privilege" id="Master_Privilege" value="<?php echo $masterpriviledgebyid->Master_Privilege; ?>" />
                                                    </div>
                                                </div>
                                                
                                                
                                              
                                              <div class="da-form-row">
                                          <label>Master Priviledge Description</label>
                                          <div class="da-form-item large">
                                              <input type="text" name="Master_Privilege_Description"  id="Master_Privilege_Description" value="<?php echo $masterpriviledgebyid->Master_Privilege_Description; ?>"  />
                                                    </div>
                                                </div>
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                
                                                
                                                
                                                
                                            <div class="da-button-row">
                                     
      <input type="hidden" name="Privilege_Master_Code"  id="Privilege_Master_Code" value="<?php  echo $masterpriviledgebyid->Privilege_Master_Code;?>" />

                                     
                                     
           <input type="submit" value="Save" class="da-button pink left"  onclick="editmasterpriviledge()"/>
                                             
                                        </div>    
                                                
                                              
                                              
                                            </div>
                                        </form>
                                        
                                        
                                    <div class="da-form-row" id="msg">
                                                    
                                                </div>    
                                </div>
                            </div>
                        </div>                        
              
                        
      
      
      
      
 <script type="text/javascript">        
 $('#priviledges_parent_menu').addClass('active');  
  $('#priviledges_sub_menu').removeClass('closed'); 

</script>                          