function send_message()
{
    jQuery('.contact_feild_error').html('');

	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var message=jQuery("#message").val();
	var is_error='';

	if(name=="")
	{
		jQuery('#name_error').html('Please Enter Name*');
			is_error='Yes';

	}
	if(email=="")
	{
		jQuery('#email_error').html('Please Enter Email*');
			is_error='Yes';

	}
	if(mobile=="")
	{
		jQuery('#mobile_error').html('Please Enter Mobile*');
			is_error='Yes';

	}
	if(message == "")
	{
		jQuery('#message_error').html('Please Fill Message*');
			is_error='Yes';

	}
	if(is_error=="")
	{
          jQuery.ajax({
                url:'send_message.php',
                type:'POST',
                data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
                success:function(result)
                {
					result=result.trim();
                  if(result == 'ThankYou')
				  {
					  jQuery('#thank_result').html('Thank You!')
				  }
                }

          });
          
	}
}

function user_register()
{
	jQuery('.user_field_error').html('');

	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var password=jQuery("#password").val();
	var is_error='';

	if(name=="")
	{
		jQuery('#name_error').html('Please Enter Name*');
			is_error='Yes';

	}
	if(email=="")
	{
		jQuery('#email_error').html('Please Enter Email*');
			is_error='Yes';

	}
	if(mobile=="")
	{
		jQuery('#mobile_error').html('Please Enter Mobile*');
			is_error='Yes';

	}
	if(password == "")
	{
		jQuery('#password_error').html('Please Enter Password*');
			is_error='Yes';

	}
	if(is_error=="")
	{
          jQuery.ajax({
                url:'register_submit.php',
                type:'POST',
                data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
                success:function(result)
                {
					result=result.trim();

                  if(result == 'present')
				  {
                    jQuery('#email_error').html('Email is ALreay Exist!!');
				  }
				  if(result == 'insert')
				  {
					jQuery('.btn_error p').html('ThankYou For Registration');
					window.location.href='login.php';

				  }
                }

          });
          
	}
}

function login()
{
	jQuery('.login_field_error').html('');

	;
	var email=jQuery("#email").val();
	var password=jQuery("#password").val();
	var is_error='';

	
	if(email=="")
	{
		jQuery('#email_error').html('Please Enter Email*');
			is_error='Yes';

	}
	if(password == "")
	{
		jQuery('#password_error').html('Please Enter Password*');
			is_error='Yes';

	}
	if(is_error=="")
	{
          jQuery.ajax({
                url:'login_submit.php',
                type:'POST',
                data:'email='+email+'&password='+password,
                success:function(result)
                {
					result=result.trim();

                  if(result == 'wrong')
				  {
                    jQuery('.login_msg p').html('Please Enter Valid Login Details!!');
				  }
				  if(result == 'valid')
				  {
					window.location.href=window.location.href;
				  }
                }

          });
          
	}
	
}

//add to cart
function manage_cart(pid,type)
{
	if(type == 'update')
	{
		var qty = jQuery("#"+pid+"qty").val();
	}
	else
	{
		var qty = jQuery("#qty").val();
	}

	
	jQuery.ajax({
		url:'manage_cart.php',
		type:'POST',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result)
		{ 
			result=result.trim();
	        if(type == 'remove' || type == 'update')
			{
				window.location.href=window.location.href;
			}
		    
			if(result == 'not_avaliable')
			{
               alert('Out Of Stock!');
			}	
			else
			{
				jQuery('.header-action-num').html(result);
			}	
			
		}

  });
}

function sort_product_drop(cat_id,site_path)
{
   var  sort_product_id =jQuery('#sort_product_id').val();
  window.location.href= site_path+"	categories.php?id="+cat_id+"&sort="+sort_product_id
}

function wishlist_manage(pid,type)
{
	jQuery.ajax({
		url:'wishlist_manage.php',
		type:'POST',
		data:'pid='+pid+'&type='+type,
		success:function(result)
		{ 
			result=result.trim();
		if(result == 'not_login')
		{
			window.location.href='login.php';
		}
		else
		{
			
			jQuery('.header-action-num').html(result);
		}
		  
		}

  });
}

