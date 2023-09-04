 <!-- Masthead-->
 <style>

<!-- HTML !-->


/* CSS */
.button-86 {
  all: unset;
  width: 100px;
  height: 30px;
  font-size: 16px;
  background: transparent;
  border: none;
  position: relative;
  color: #f0f0f0;
  cursor: pointer;
  z-index: 1;
  padding: 10px 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  white-space: nowrap;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-86::after,
.button-86::before {
  content: '';
  position: absolute;
  bottom: 0;
  right: 0;
  z-index: -99999;
  transition: all .4s;
}

.button-86::before {
  transform: translate(0%, 0%);
  width: 100%;
  height: 100%;
  background: #28282d;
  border-radius: 10px;
}

.button-86::after {
  transform: translate(10px, 10px);
  width: 35px;
  height: 35px;
  background: #ffffff15;
  backdrop-filter: blur(5px);
  -webkit-backdrop-filter: blur(5px);
  border-radius: 50px;
}

.button-86:hover::before {
  transform: translate(5%, 20%);
  width: 110%;
  height: 110%;
}

.button-86:hover::after {
  border-radius: 10px;
  transform: translate(0, 0);
  width: 100%;
  height: 100%;
}

.button-86:active::after {
  transition: 0s;
  transform: translate(0, 5%);


/* video background */
#background-video {
  width: 100vw;
  height: 100vh;
  object-fit: cover;
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: -1;
}

/* page content */

body {
  font-family: Sans-serif MS;
  margin: 0;
  padding: 0;
}

h1, h2 {
  color: white;
  font-weight: bold;
  text-align: center;
}

h1 {
  font-size: 6rem;
  margin-top: 30vh; 
}

h2 { font-size: 3rem; }

@media (max-width: 750px) {
    #background-video { display: none; }
    body {
      background: url("https://assets.codepen.io/6093409/river.jpg") no-repeat;
      background-size: cover;
    }
}

main {
  background-color: lightblue;
  font-size: 2rem;
  margin-top: 50vh;
  padding: 10px;
  position: relative;
}


}
 </style>     
 
 
 <header class="masthead">
 	
            <div class="container h-100">
				
			<h1 style="text-align: center;  margin-top: 250px;" class="text-uppercase text-white font-weight-bold">Rent Spaces</h1>
      <h6 style="text-align: center; border-style: solid;border-color: black; background:black; border-spacing: 25px;" class=" text-uppercase text-white font-weight-bold" >We make Booking or Renting Space simple for you.</h6>
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4">
						
                    	<div class="card" id="filter-book">
							
                    		<div class="card-body">
                    			<div style="font-family: sans-serif;"class="container-fluid">
								
                    				<form style="margin-top: -200px; margin-left: 170px;" action="index.php?page=list" id="filter" method="POST">
                    					<div class="row">
                    						<div class="col-md-3">
                    							<label for="">Chech-in Date</label>
                    							<input type="text" class="form-control datepicker" name="date_in" autocomplete="off">
                    						</div>
                    						<div class="col-md-3">
                    							<label for="">Chech-out Date</label>
                    							<input type="text" class="form-control datepicker" name="date_out" autocomplete="off">
                    						</div>
                    						
                    						<div class="col-md-3">
                    							<br>
                    							<button style="background-color: transparent; border: 0px; color: white;font:ariel; " class="button-86" role="button">Check Availability</button>
                    						</div>

                    					</div>
                    				</form>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section">
        </section>
	<div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                	<?php 
                	include'admin/db_connect.php';
                	$qry = $conn->query("SELECT * FROM  spaces order by rand() ");
                	while($row = $qry->fetch_assoc()):
                	?>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="#">
                            <img class="img-fluid" src="assets/img/<?php echo $row['cover_img'] ?>" alt="" />
                            <div class="portfolio-box-caption ">
                                <div class="project-category text-white-30"><?php echo "$ ".number_format($row['price'],2) ?> per day</div>
                                <div class="project-name"><?php echo $row['name'] ?></div>
                            </div>
                        </a>
                    </div>
                	<?php endwhile; ?>

                </div>
            </div>
        </div>
