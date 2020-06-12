<aside class="right-sidebar">

              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>

              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                    @foreach($categories as $category)
                      <li><i class="icon-angle-right"></i><a href="{{ route('category-posts', ['id'=>$category->id ] ) }}">  {{ $category->name }} </a> </li> </a>
                    @endforeach
                </ul>

              </div>

              
              <div class="widget">
                <h5 class="widgetheading">Tags Clouds</h5>
                <ul class="tags">
                 
                   @foreach($tags as $tags)
                      <li><a href="{{ route('posts-tags', ['id' => $tags->id ]) }}"> {{ $tags->name }}</a></li>
                    @endforeach
                </ul>
              </div>
</aside>