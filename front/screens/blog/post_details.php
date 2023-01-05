<style>

  img{
    margin: 6px;
  }
  .widget-author ul li a{
    font-family: "Rubik",sans-serif;
    color:#7d848a;
    margin-left: 8px;
    font-weight: 400;
  }
  .widget ul > li:hover::before {
  color: #f7b135;
}
  </style>
<section>
<?php 

// For similar Posts
                  $limitposts = $this->db->select('*')->order_by('rand()')->limit('3')->where('category_id',$post->category_id)->where('status_ind',1)->where('post_id !=',$post->post_id)->get('blog')->result();


    ?>



      <div class="container pb-100">
        <div class="row">
          <div class="col-lg-8 col-xl-9">
            <div class="blog-posts single-post mb-md-30">
              <article class="post clearfix mb-0">
                <div class="entry-header mb-30">
                  <div class="post-thumb thumb"> <img src="<?php echo BLOG_PHOTO_UPLOAD_PATH.$post->post_image; ?>" alt="images" class="img-responsive img-fullwidth"> </div>
                  <h1 class="mt-30" style="font-size: 2.24rem"><?php echo $post->title; ?></h1>
                  <div class="entry-meta mt-0">
                    <span class="mb-10 text-gray mr-10"><i class="far fa-calendar-alt mr-10 text-theme-colored1"></i> <?php echo $post->created_at; ?></span>
                    <?php  $user = $this->db->select('*')->where('id',$post->author)->get('author')->row(); ?>
                    <a href="blog/author/<?php echo $post->author; ?>"><span class="mb-10 text-gray mr-10"><i class="far fa-user mr-10 text-theme-colored1"></i> <?php echo $user->name; ?></span></a>
                    <a href="blog/category/<?php echo $post->category_id; ?>"><span class="mb-10 text-gray mr-10"><i class="fas fa-suitcase mr-10 text-theme-colored1"></i> <?php echo $this->db->where('category_id', $post->category_id)->get('blogcategory')->row()->category_name; ?></span></a>
                  </div>
                </div>
                <div class="entry-content">
                <?php echo $post->post_content; ?>
                </div>
              </article>
              
            </div>
          </div>
          <div class="col-lg-4 col-xl-3 sidebar-area sidebar-right position-sticky">

            <div class="mt-sm-30">
             
            <div class="widget">
                <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Search</h4>
                <div class="latest-posts">
                <div id="search-1" class="widget widget_search"><div class="widget-inner">
                  <form role="search" method="post" class="search-form" action="blog ">
                    <input type="search" class="form-control search-field" placeholder="Search …" value="" name="blog_search">
                    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>
              </div>
                </div>
              </div>

              <div class="widget">
                <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Latest Blogs</h4>
                <div class="latest-posts">
                <?php foreach($posts as $post){ ?>  
                <article class="post clearfix pb-0 mb-20">
                    <a class="post-thumb" href="blog/post/<?php echo $post->page_slug; ?>"><img src="<?php echo BLOG_PHOTO_UPLOAD_PATH.$post->post_image; ?>" alt="images"></a>
                    <div class="post-right">
                      <h5 class="post-title mt-0"><a href="blog/post/<?php echo $post->page_slug; ?>"><?php echo $post->title; ?></a></h5>
                      <span class="post-date">  
                        <time class="entry-date" datetime="<?php echo $post->crated_at; ?>"><?php echo $post->created_at; ?></time>
                      </span>
                    </div>
                  </article>
                  <?php } ?>
                </div>
              </div>

          
              <div class="widget widget_categories">
                <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Categories</h4>
                <ul>
                    <?php foreach($categories as $category){ 
                        ?>
                  <li class="fa fa-archive d-block"><a href="blog/category/<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></a> </li>
                  <?php } ?>
                  
                </ul>
              </div>
              <div class="widget widget-author text-dark">
              <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Authors</h4>
              <ul>
                <?php foreach ($authors as $author) {
                ?>
                  <li class="fa fa-user d-block"><a href="blog/author/<?php echo $author->id; ?>"><?php echo $author->name; ?></a> </li>
                <?php } ?>

              </ul>
            </div>
             
            </div>
          </div>
        </div>
      </div>
    </section>

   

<div class="container">
  <div class="row">
  <div class="col-lg-12">
            <div class="row">
              <h4>Similar Posts</h4>
              <?php if(empty($blog)){ ?>
                   
                <?php } ?>
          <?php foreach ($limitposts as $limitpost) { ?>
            <div class="col-sm-12 col-md-4 col-lg-4 mt-3 item">
              <div class="product">
                <div class="product-header">
                  <a href="blog/category/<?php echo $limitpost->category_id;?>"><span class="onsale"><?php echo $this->db->where('category_id', $limitpost->category_id)->get('blogcategory')->row()->category_name; ?></span></a>
                  <div class="thumb image-swap">
                    <a href="blog/post/<?php echo $limitpost->page_slug; ?>"><img src="<?php echo BLOG_PHOTO_UPLOAD_PATH . $limitpost->post_image; ?>" class="product-main-image img-responsive img-fullwidth" width="300" height="300" alt="Hare Krishna Mandir"></a>
                    <a href="blog/post/<?php echo $limitpost->page_slug; ?>"><img src="<?php echo BLOG_PHOTO_UPLOAD_PATH . $limitpost->post_image; ?>" class="product-hover-image img-responsive img-fullwidth" alt="Hare Krishna Mandir" width="300" height="300"></a>
                  </div>

                </div>
                <div class="product-details">
                   <?php $user = $this->db->select('*')->where('id', $limitpost->author)->get('author')->row(); ?>
                  <span class="product-categories d-flex justify-content-between">
                    <a href="blog/author/<?php echo $limitpost->author; ?>" rel="tag">By <?php echo $user->name; ?> </a>
                    <a class="ml-auto"><?php echo $limitpost->created_at; ?></a>
                  </span>
                  <h5 class="product-title"><a href="blog/post/<?php echo $limitpost->page_slug; ?>"><?php echo $limitpost->title; ?></a></h5>

                </div>
              </div>

            </div>
          <?php } ?>
            </div>
          </div>
  </div>
</div>

