
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Category</h2>
                <div class="panel-group category-products" id="accordian"><!--category-products-->
                    <?php
                        $published_category=DB::table('tbl_category')
                            ->where('publication_status',1)
                            ->get();
                    foreach ($published_category as $v_category) {

                        ?>
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$v_category->category_id)}}">{{$v_category->category_name}}</a></h4>
                        </div>
                    </div>
                   <?php } ?>
                </div><!--/category-products-->
            
                <div class="brands_products"><!--brands_products-->
                    <h2>Brands</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            <?php
                                $published_manufacture=DB::table('tbl_manufacture')
                                    ->where(['publication_status'=>1])
                                    ->get();
                            foreach ($published_manufacture as $v_manufacture) {
                                
                            ?>
                            <li><a href="{{URL::to('/product_by_manufacture/'.$v_manufacture->manufacture_id)}}"> <span class="pull-right">{{-- (4) --}}</span>{{$v_manufacture->manufacture_name}}</a></li>
                            <?php 
                                }
                            ?>
                        </ul>
                    </div>
                </div><!--/brands_products-->
                
                <div class="price-range"><!--price-range-->
                    <h2>Price Range</h2>
                    <div class="well text-center">
                         <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                         <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                    </div>
                </div><!--/price-range-->
                
                <div class="shipping text-center"><!--shipping-->
                    <img src="{{URL::to('frontend/images/home/shipping.jpg')}}" alt="" />
                </div><!--/shipping-->
            
            </div>
        </div>
        
        