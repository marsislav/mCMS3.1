<div class="col-xl-4 col-lg-5">
    <div class="sidebar-wrapper">
        <div class="sidebar-box search-form-box mb-30">
            @include('includes.search')
        </div>
        <div class="sidebar-box recent-blog-box mb-30">
            <h4>Recent Blog</h4>
            @foreach($posts as $post)
            <div class="recent-blog-items">
                <div class="recent-blog mb-30">
                    <div class="recent-blog-img">
                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                    </div>
                    <div class="recent-blog-content">
                        <h5><a href="{{ route('post.single', ['slug' => $post->slug ]) }}">{{ $post->title }}</a></h5>
                        <span class="date"><i class="lni lni-calendar"></i>  {{ $post->created_at->toFormattedDateString() }}</span>
                        <p class="category"><i class="lni lni-folder"></i> <a href="{{ route('category.single', ['id' => $post->category->id ]) }}">{{ $post->category->name }}</a> </p>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
        <div class="sidebar-box catagories-box mb-30">
            <h4>Categories</h4>
            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('category.single', ['id' => $category->id ]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar-box tags-box mb-30">
            <h4>All Tags</h4>
            <ul>
                @foreach($tags as $tag)
                    <li>
                        <a href="{{ route('tag.single', ['id' => $tag->id ]) }}">{{ $tag->tag }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar-box mb-30">
            <h4>Follow On</h4>
            <div class="footer-social-links">
                <ul class="d-flex justify-content-start">
                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
