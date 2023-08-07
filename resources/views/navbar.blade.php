<nav class="navbar navbar-expand-md navbar-light navbar_custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu1">
            <div class="nav_line"></div>
            <ul class="navbar-nav">
                @foreach($categories as $category)
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white dropdown-toggle" data-toggle="dropdown">{{$category->name}}</a>
                        <div class="dropdown-menu dropdown-menu_custom1 shadow-sm rounded-bottom border-0" id="custom-main-dropdown-menu">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        @foreach($category->childs as $item)
                                            <div class="top_link">
                                                <a href="#"><i class="material-icons">keyboard_arrow_left</i>{{$item->name}}</a>
                                            </div>
                                            <ul class="list-group custom-list-group">
                                                @foreach($item->childs as $child)
                                                    <li class="list-group-item border-0 px-0"><a href="{{route('show_category',['id'=>$child->id])}}">{{$child->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="mr-auto">
                <ul class="navbar-nav special_sale">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">فروش ویژه</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

