
<style>
  section {
      width: 100%;
      padding: 0 7%;
      display: table;
      margin: 0;
      max-width: none;
      background-color: #373B44;
	  background-size: cover;
      height: 100vh;

      /*added here
      background-image:url("https://images.pexels.com/photos/67636/rose-blue-flower-rose-blooms-67636.jpeg?auto=compress&cs=tinysrgb&h=350");
       added here }*/

      section:nth-of-type(2n) {
        background-color: #FE4B74;
      }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php include('admin/db_connect.php');?>
<header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 style="margin-top: -300px;"class="text-uppercase text-white font-weight-bold">Host</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>

<section class="page-section bg-light">
<h2 style="text-align: center; padding: bottom 100px ;  margin-bottom: 100px;" class=" text-uppercase text-black font-weight-bold" >Rent Your Space</h2>
<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-category">
				<div class="card">
					<div class="card-header">
						    Add Space
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Description</label>
								<input type="text" class="form-control" name="name">
							</div>
							<div class="form-group">
								<label class="control-label">Price</label>
								<input type="number" class="form-control text-right" name="price" step="any">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Image</label>
								<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
							</div>
							<div class="form-group">
								<img src="<?php echo isset($image_path) ? '../assets/img/'.$cover_img :'' ?>" alt="" id="cimg">
							</div>
							<div class="form-group">
								<label class="control-label">Host Name</label>
								<input type="text" class="form-control" name="host">
							</div>
							<div class="form-group">
								<label class="control-label">Host Contact</label>
								<input type="number" class="form-control" name="contact">
							</div>
							<div class="form-group">
								<label class="control-label">Rooms</label>
								<input type="number" class="form-control" name="rooms">
							</div>
							<div class="form-group">
								<label class="control-label">Baths</label>
								<input type="number" class="form-control" name="baths">
							</div>
							<div class="form-group">
								<label class="control-label">Address</label>
								<input type="text" class="form-control" name="address">
							</div>
							<div class="form-group">
								<label class="control-label">City</label>
								<input type="text" class="form-control" name="city">
							</div>
							<div class="form-group">
								
								<input type="hidden" value="1" class="form-control" name="uid">
							</div>
					</div>
					<div class="col-md-12">
								<button class="btn btn-sm btn-dark col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-category').get(0).reset()"> Cancel</button>
							</div>	
							</br></br></br>
				</div>
	
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Img</th>
									<th class="text-center">Room</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM spaces order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>

								
									<td class="text-center">
										<img src="<?php echo isset($row['cover_img']) ? 'assets/img/'.$row['cover_img'] :'' ?>" alt="" id="cimg">
									</td>
									<td class="">
										<p>Name : <b><?php echo $row['name'] ?></b></p>
										<p>Price : <b><?php echo "$".number_format($row['price'],2) ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_cat" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-price="<?php echo $row['price'] ?>" data-cover_img="<?php echo $row['cover_img'] ?>">Edit</button>
										<button class="btn btn-sm btn-danger delete_cat" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
								</br>

</div>
<div style="margin-top:200  padding-top: 500px;"class="card-footer">
						
					</div>
</section>


<style>
	img#cimg,.cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
	td{
		vertical-align: middle !important;
	}
</style>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage-category').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_category',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_cat').click(function(){
		start_load()
		var cat = $('#manage-category')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='price']").val($(this).attr('data-price'))
		cat.find("#cimg").attr('src','../assets/img/'+$(this).attr('data-cover_img'))
		end_load()
	})
	$('.delete_cat').click(function(){
		_conf("Are you sure to delete this category?","delete_cat",[$(this).attr('data-id')])
	})
	function delete_cat($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_category',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}



	(function($){
  function floatLabel(inputType){
    $(inputType).each(function(){
      var $this = $(this);
      // on focus add cladd active to label
      $this.focus(function(){
        $this.next().addClass("active");
      });
      //on blur check field and remove class if needed
      $this.blur(function(){
        if($this.val() === '' || $this.val() === 'blank'){
          $this.next().removeClass();
        }
      });
    });
  }
  // just add a class of "floatLabel to the input field!"
  floatLabel(".floatLabel");
})(jQuery);
</script>