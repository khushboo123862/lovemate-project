

    <!-- ================ footer Section start Here =============== -->
    <footer class="footer-section">        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-content text-center">
                            <p>© 2025 <a href="#">KhushabooLav</a> -Best For Dating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ footer Section end Here =============== -->



    <!-- scrollToTop start here -->
    <a href="index.html#" class="scrollToTop" style="bottom: 5%; opacity: 1; transition: 0.5s;"><i class="fa-solid fa-angle-up"></i></a>
    <!-- scrollToTop ending here -->
	
	<div class="modal" id="mypropic">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Change Profile Pic</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="intro-form">
						<div class="account-wrapper">
							<form class="account-form" action="" method="post" enctype="multipart/form-data" id="needs-validation" novalidate >
								<div class="form-group">  
									<label>Profile Picture</label>  
									<div class="custom-file">  
										<input type="file" class="custom-file-input" id="validatedCustomFile" name="pic" required>  
										<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>  
										<div class="invalid-feedback">Choose file for upload</div>  
									</div>  
								</div>
								<div class="form-group">
									<input type="submit" class="d-block lab-btn" value="UPLOAD" name="uplbtn">
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>
	
	<!----change pwd form---------------------------->
	
	<div class="modal" id="changepwd">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Changre Password</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
						<form class="account-form" action="" method="post"id="needs-validation" novalidate>
							<div class="form-group">
								<input type="password" placeholder="Old Password" name="oldpwd" class="form-control" aria-describedby="inputGroupPrepend" required>
								<div class="invalid-feedback">  
								Please enter Old Password.  
								</div>
							</div>
							
							<div class="form-group">
								<input type="password" placeholder="New Password" name="newpwd" class="form-control" aria-describedby="inputGroupPrepend" required>
								<div class="invalid-feedback">  
								Please enter New Password.  
								</div>
							</div>
							
							<div class="form-group">
								<input type="submit" class="d-block lab-btn" value="Update" name="updatepwd">
							</div>
						</form>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Edit Your post</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form action="">
			<p><textarea name="postcontent" id="postcontent" cols="30" rows="4"><?php echo $rowp['postcontent'] ?></textarea></p>
			<button name="uplp" class="btn btn-success">Update</button>
		</form>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>



    <!-- All Scripts -->
    <script src="js/jquery.3.7.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/functions.js"></script>
	<script type="text/javascript">  
        (function () {  
            'use strict';  
            window.addEventListener('load', function () {  
                var form = document.getElementById('needs-validation');  
                form.addEventListener('submit', function (event) {  
                    if (form.checkValidity() === false) {  
                        event.preventDefault();  
                        event.stopPropagation();  
                    }  
                    form.classList.add('was-validated');  
                }, false);  
            }, false);  
        })();
		
		$(document).ready(function() {
             // Event handler for the button click
		$("#kuchhbhi").click(function() {
			alert("hgjhgfh");
			$.ajax({
				url: 'testing.php', // Sample API endpoint
				method: 'GET',
				//dataType: 'json',
				beforeSend: function() {
					alert("req is ready to go");
				},
				success: function(data) {
					alert("success chala");
					alert(data);
				},
				error: function(error) {
					alert("error aa gaya");
				},
				complete: function() {
					alert("req poori hui..");
				},
			});
			 
		});
		
		$("#postform").submit(function(e) {
			e.preventDefault(e);
			pc=$("#postcontent").val();
			pc=pc.trim();
			if( pc=="" ){
				$("#msg").html("Please Write Something");
			}else{
				datastring="postcontent="+pc+"&gali=bsdk";
				//alert(datastring);
				$.ajax({
					url: 'ajaxprocess.php', // Sample API endpoint
					method: 'POST',
					//dataType: 'json',
					data: datastring,
					beforeSend: function() {
						alert("req is ready to go");
						$('#postbtn').prop('disabled', true);
					},
					success: function(data) {
						alert("success chala");
						
						var dataObject = JSON.parse(data);
						alert(dataObject);
						
						post=`<div class="post-item mb-20">
						<div class="post-content">
							<!-- post-author -->
							<div class="post-author">
								<div class="post-author-inner">
									<div class="author-thumb">
										<img src="${dataObject.propic}" alt="img" style="width:40px;height:40px;object-fit:cover;border-radius:50%">
									</div>
									<div class="author-details">
										<h6><a href="#">${dataObject.name}</a></h6>
										<ul class="post-status">
											<li class="post-privacy"><i class="icofont-world"></i>
												Public</li>
											<li class="post-time">6 Mintues Ago
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- post-description -->
							<div class="post-description">
								<p>${dataObject.postcontent}</p>
							</div>
						</div>
						<!-- post meta -->
						<div class="post-meta">
							<div class="post-meta-bottom">
								<ul class="react-list">
									<li class="react">
										<a href="#">
											<i class="fa fa-thumbs-up"></i>Like
										</a>
									</li>
									<li class="react">
										<a href="#">
											<i class="icofont-speech-comments"></i>Comment
										</a>
									</li>
									
									
								</ul>
							</div>
						</div>
					</div>`;
					alert(post);
						
						$("#allposts").prepend(post);
					},
					error: function(error) {
						alert("error aa gaya");
					},
					complete: function() {
						alert("req poori hui..");
						$('#postbtn').prop('disabled',false);
						$("#postcontent").val("");
					},
				});
			}
			
		});
		
		$("#searchterm").keyup(function(e) {
			st=$("#searchterm").val();
			st=st.trim();
			if( st=="" ){
				$("#searchhints").fadeOut(500);
			}else{
				datastring="searchhints="+st;
				//alert(datastring);
				$.ajax({
					url: 'ajaxprocess.php', // Sample API endpoint
					method: 'POST',
					//dataType: 'json',
					data: datastring,
					beforeSend: function() {
						
					},
					success: function(data) {
						$("#searchhints").html(data);
						$("#searchhints").fadeIn(500);
					},
					error: function(error) {
						alert("error aa gaya");
					},
					complete: function() {
						
					},
				});
			}
			
		});
		
		$("#searchterm").blur(function(e) {
			$("#searchhints").fadeOut(500);
		});
		
	});
    </script>

</body>
</html>