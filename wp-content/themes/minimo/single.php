<?php
get_header();
?>

<main class="main-content">
	<section class="hero">
		<img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="hero-image">
	</section>

	<article class="blog-post">

		<p class="category">PHOTODIARY</p>
		<h2 class="title">The perfect weekend getaway</h2>
		<p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, dolore aut
			placeat fugiat voluptas cumque aliquid adipisci sapiente accusamus, blanditiis ex magni. Dicta quos
			aspernatur molestiae sapiente illum, natus nobis voluptas neque cum adipisci molestias? Fuga vero
			modi nam autem natus est officiis recusandae asperiores ea molestias mollitia minima id illum maxime
			aspernatur deleniti tenetur dignissimos ipsam temporibus labore cum quam dolor, eum exercitationem.
			Officiis minus omnis reprehenderit eaque placeat, facere architecto excepturi voluptatem, nisi
			sapiente incidunt eveniet culpa quam voluptatum ipsa, nesciunt a repudiandae! Soluta facilis, non
			sunt minima harum fugiat recusandae aut doloribus pariatur libero quaerat provident?</p>

		<div class="images">
			<img src="../img/woman-scarf.jpg" alt="Walking with a scarf">
			<img src="../img/woman-hills.jpg" alt="Standing near hills">
			<img src="../img/woman-sand.jpg" alt="Back view near sand">
		</div>

		<blockquote class="quote">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum optio totam
			necessitatibus esse dignissimos porro recusandae veritatis, consectetur quisquam, blanditiis ipsa
			tenetur vitae molestiae! Quisquam consequuntur expedita quis! Dignissimos dicta sapiente beatae
			ipsum quaerat."</blockquote>
		<p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum optio totam
			necessitatibus esse dignissimos porro recusandae veritatis, consectetur quisquam, blanditiis ipsa
			tenetur vitae molestiae! Quisquam consequuntur expedita quis! Dignissimos dicta sapiente beatae
			ipsum quaerat. Iusto cupiditate blanditiis vitae enim quia error minus, molestias architecto.
			Nesciunt, reiciendis! Voluptates quos repellendus similique in tenetur ea recusandae aliquam
			temporibus dolor? Repudiandae necessitatibus delectus sint blanditiis modi reprehenderit architecto,
			asperiores possimus veniam fugiat temporibus consequuntur sunt neque, in numquam ex ipsa natus
			mollitia quasi, ratione quibusdam repellat sequi. Facere, sit exercitationem fuga eaque repellat
			earum excepturi ipsum laborum quasi totam placeat reiciendis. Vero, repellendus.</p>

		<div class="share">
			<p>SHARE</p>
			<a href="#"><img src="../img/facebook.png" alt="Facebook"></a>
			<a href="#"><img src="../img/twitter.png" alt="Twitter"></a>
			<a href="#"><img src="../img/google.png" alt="Google"></a>
			<a href="#"><img src="../img/pinterest.png" alt="Pinterest"></a>
		</div>
	</article>

	<section class="related-posts">
		<h3>YOU MAY ALSO LIKE</h3>
		<div class="related-cards">
			<div class="card">
				<img src="../img/road.jpg" alt="Cold winter days">
				<p>Cold winter days</p>
			</div>
			<div class="card">
				<img src="../img/calmness.jpg" alt="A day exploring the Alps">
				<p>A day exploring the Alps</p>
			</div>
			<div class="card">
				<img src="../img/bridge.jpg" alt="American dream">
				<p>American dream</p>
			</div>
		</div>
	</section>

	<section class="comments">
		<h3>2 COMMENTS</h3>
		<div class="comment">
			<img src="../img/john-doe.jpg" alt="John Doe">
			<div class="commemt-content">
				<p class="name">Jane Doe</p>
				<p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				<h3><a href="#">REPLY</a></h3>
			</div>
		</div>
		<div class="comment">
			<img src="../img/john-doe.jpg" alt="John Doe">
			<div class="commemt-content">
				<p class="name">Jane Doe</p>
				<p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				<h3><a href="#">REPLY</a></h3>
			</div>
		</div>
		<div class="comment">
			<img src="../img/john-doe.jpg" alt="John Doe">
			<form class="comment-form">
				<textarea placeholder="Join the discussion"></textarea>
				<button>&#10148;</button>
			</form>
		</div>
		<div class="connected">
			<p>CONNECTED WITH</p>
			<a href="#"><img src="../img/facebook.png" alt="Facebook"></a>
			<a href="#"><img src="../img/twitter.png" alt="Twitter"></a>
		</div>
	</section>
</main>

<?php
get_sidebar();
get_footer();
