<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Blog - Helicopter Transportation Website Template</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/web/css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<div class="background">
				<h1 id="logo"> <a href="index.html">Rent a Helicopter</a> </h1>
				<div id="navigation">
					<ul>
						<li>
							<a href="index.html">Home</a>
						</li>
						<li>
							<a href="services.html">Services</a>
						</li>
						<li>
							<a href="rates.html">Rates</a>
						</li>
						<li>
							<a href="about.html">About</a>
						</li>
						<li class="selected">
							<a href="blog.html">Blog</a>
						</li>
						<li>
							<a href="contact.html">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="contents">
			<div id="blog">
				<div id="sidebar">
					<div class="section">
						<h5>Recent Post</h5>
						<ul class="posts">
							<li>
								<span class="time">August 2023 | by <a href="index.html">blogger</a></span> <a href="blog.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
							</li>
							<li>
								<span class="time">August 2023 | by <a href="index.html">blogger</a></span> <a href="blog.html">Maecenas nec risus at nulla accumsan varius. Aliquam eget malesuada tortor.</a>
							</li>
							<li>
								<span class="time">August 2023 | by <a href="index.html">blogger</a></span> <a href="blog.html">Nullam quis ultrices orci. Aliquam erat volutpat. Maecenas nec risus at nulla accumsan varius</a>
							</li>
						</ul>
					</div>
					<div class="section">
						<h5>Archives</h5>
						<ul>
							<li>
								<a href="blog.html">Quisque vitae mauris non diam tincidunt elementum.</a>
							</li>
							<li>
								<a href="blog.html">Aenean ligula elit, volutpat nec elementum dignissim conse.</a>
							</li>
							<li>
								<a href="blog.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
							</li>
							<li>
								<a href="blog.html">Duis tempor, nibh accumsan ornare dapibus, neque risus faucibus</a>
							</li>
						</ul>
					</div>
				</div>
                            
				<div id="main">
			<?php foreach ($data as $d) { ?>
                                    <ul class="list">
						<li>
							<span class="time">August 2023 | by <a href="blog.html">blogger</a></span>
							<h5><?php echo $d['judul']; ?></h5>
							<img src="<?php echo base_url();?>assets/web/images/wedding.jpg" alt="Img" height="180" width="290">
							<p>
								<?php echo $d['isi'] ?>
							</p>
						</li>
						
					</ul><?php }?>
				</div>
				</div>
		</div>
		<div id="footer">
			<div class="background">
				<div class="body">
					<form action="index.html" method="post" id="message" class="section">
						<h3>Send a Message</h3>
						<ul>
							<li>
								<label>Your Name:</label>
								<input type="text" value="">
							</li>
							<li>
								<label>Email Address:</label>
								<input type="text" value="">
							</li>
							<li>
								<label>Message:</label>
								<textarea></textarea>
							</li>
							<li>
								<input type="submit" value="Send">
							</li>
						</ul>
					</form>
					<div class="section">
						<h3>Contact Details</h3>
						<ul>
							<li>
								<span>Location</span><strong>:</strong>
								<p>
									This is just a place holder, so you can see what the site would look like
								</p>
							</li>
							<li>
								<span>Phone</span><strong>:</strong>
								<p>
									(987) 654 321 000; (123) 000 456 789; 123 000 456 789
								</p>
							</li>
							<li>
								<span>Email</span><strong>:</strong>
								<p>
									This is just a place holder
								</p>
							</li>
							<li>
								<span>Social</span><a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a><a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a><a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a>
							</li>
						</ul>
					</div>
					<p id="footnote">
						© Copyright 2023. All rights reserved.
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>