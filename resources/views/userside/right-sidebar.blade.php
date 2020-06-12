<aside class="right-sidebar">
 
              <div class="widget">
                <form action="{{ route('searchPosts') }}" method="get" role="search" class="form-search"> 
                   {{ csrf_field() }}
                  <input placeholder="Type something" type="text" name="q" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                 @foreach($categories as $category)
                   <li><i class="icon-angle-right"></i>
                     <a href="{{ route('postcategory', ['id'=> $category->id ]) }} ">{{ $category->name }}</a>
                   </li>
                 @endforeach
                 
                  
                </ul>
              </div>
             
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                
                  @foreach($tags as $tag)
                   <li><i class="icon-angle-right"></i> <a href="{{ route('postTag', ['id'=> $tag->id ]) }} ">{{ $tag->name }}</a> </li>
                  @endforeach
                </ul>
              </div>
            </aside>